<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\ProductProposal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class AddProductProposal extends Component
{
    use WithFileUploads;
    use Toast;

    public $projectName, $proposalForm; 
    public $supervisorsMap, $selectedSupervisor, $selectedProposalSeq;
    public $unverifiedProposalsMap, $verifiedProposalsMap;
    public bool $isValidated;
    public $user, $headers, $verifiedProposalHeaders;

    protected $rules = [
        'projectName'=>['required'],
        'proposalForm'=>['required','max:2000'],
        'selectedSupervisor'=>['required']
    ];

    public function mount()
    {
        $this->user=Auth::user();
        $this->selectedProposalSeq = "proposalSubmission";
        $this->supervisorsMap=$this->getSupervisorsMap();
        $this->unverifiedProposalsMap = $this->getUnverifiedProposalsMap();
        $this->verifiedProposalsMap = $this->verifiedProposalsMap();
        $this->headers =$this->headers();
        $this->verifiedProposalHeaders =$this->getVerifiedProposalHeaders();
    }

    public function update()
    {
        $this->unverifiedProposalsMap = $this->getUnverifiedProposalsMap();
        $this->verifiedProposalsMap = $this->verifiedProposalsMap();
        $this->headers =$this->headers();
    }

    public function headers():array
    {
        /***
        'custodian'=>$proposal->students->id,
        'supervisor'=>$proposal->supervisor->name,
        'project'=>$proposal->project_name,
        'proposal'=>'Download'
        'form'=>$proposal->proposal_form
        ****/

        return [
            ['key'=>'custodian','label'=>'Custodian','class'=>'text-black text-[16px]'],
            ['key'=>'supervisor','label'=>'Supervisor','class'=>'text-black text-[16px]'],
            ['key'=>'project','label'=>'Project','class'=>'text-black text-[16px]' ],
            ['key'=>'form','label'=>'Proposal Document','class'=>'text-black text-[16px]'],
             
        ];
    }
    

    public function getVerifiedProposalHeaders():array
    {
        /***
        'custodian'=>$proposal->students->id,
        'supervisor'=>$proposal->supervisor->name,
        'project'=>$proposal->project_name,
        'proposal'=>'Download'
        'form'=>$proposal->proposal_form
        ****/

        return [
            ['key'=>'custodian','label'=>'Custodian','class'=>'text-black text[16px'],
            ['key'=>'supervisor','label'=>'Supervisor','class'=>'text-black text[16px'],
            ['key'=>'project','label'=>'Project','class'=>'text-black text[16px'],
            ['key'=>'form','label'=>'Proposal Document','class'=>'text-black text[16px'],
            ['key'=>'activation','label'=>'Activation','class'=>'text-black text[16px'],
        ];
    }

    public function getSupervisorsMap()
    {
        $map=[];
        $map[]=[
            'id'=>Null,
            'name'=>'Select Assigned Supervisor'
        ];
        $supervisors = User::whereHas('roles', function($query){
            $query->where('name','LIKE','%'.'Admin'.'%');
            return $query;
        })->get();

        foreach($supervisors as $supervisor)
        {
            $map[]=[
                'id'=>$supervisor->id,
                'name'=>$supervisor->name
            ];
        }
        return $map;
    }

    public function submitProposal()
    { 
        $this->validate();
        $proposalFormPath = $this->proposalForm->storeAs('product-proposal',$this->proposalForm->getClientOriginalName(),'public');
        $this->isValidated =false;
        ProductProposal::create([
            'supervisor_id'=>$this->selectedSupervisor,
            'student_id'=>$this->user->id,
            'project_name'=>$this->projectName,
            'proposal_form'=>$proposalFormPath,
            'is_validated'=>$this->isValidated
        ]);
        $this->success('Successful proposal report submission', position:'toast-bottom');
        return redirect()->to('/dashboard/product/add-proposal');
        
    }

    public function getUnverifiedProposalsMap()
    {
        $map=[];
        $proposals = ProductProposal::with(['student','supervisor'])
                        ->where('student_id',$this->user->id)
                        ->get();
       
        foreach($proposals as $proposal )
        {
            if(!$proposal->is_validated)
            {
            $map[]=[
                'custodian'=>$proposal->student->name,
                'supervisor'=>$proposal->supervisor->name,
                'project'=>$proposal->project_name,
                'form'=>$proposal->proposal_form
            ];
            }
            continue;
        }
        return $map;
    }

    public function verifiedProposalsMap()
    {
        $map=[];
        $proposals = ProductProposal::with(['student','supervisor'])
                        ->where('student_id',$this->user->id)
                        ->get();
       
        foreach($proposals as $proposal )
        {
            if($proposal->is_validated)
            {
                $productCount = Product::where('product_proposal_id',$proposal->id)->count();
                $map[]=[
                    'id'=>$proposal->id,
                    'custodian'=>$proposal->student->name,
                    'supervisor'=>$proposal->supervisor->name,
                    'project'=>$proposal->project_name,
                    'productCount'=>$productCount,
                    'form'=>$proposal->proposal_form
                ];
            }
            continue;
        }
        return $map;
    }

    public function initiateProject($proposalId)
    {
        redirect()->to('/dashboard/product/initiate-project/'.$proposalId);
    }

    public function initiatedProjectAlert()
    {
        $this->success('Product project already initiated', position:'toast-bottom');
    }

    public function render()
    {
        return view('livewire.product.add-product-proposal');
    }
}
