<?php

namespace App\Livewire\Product\Admin;

use App\Livewire\BaseComponent;
use App\Models\ProductProposal;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class ShowProposal extends BaseComponent
{
    use WithPagination;
    use Toast;

    public $studentsMap, $unverifiedProposalsMap, $verifiedProposalsMap;
    public $selectedProposalSeq;
    public $user;
    public $studentHeaders, $proposalsHeaders;

    public function mount()
    {
        $this->user=auth()->user();
        $this->studentsMap=$this->getStudentsMap();
        $this->unverifiedProposalsMap=$this->getUnverifiedProposalsMap();
        $this->verifiedProposalsMap=$this->getVerifiedProposalsMap();
        $this->selectedProposalSeq="unverifiedProposals";
        $this->proposalsHeaders=$this->getProposalsHeaders();
        $this->studentHeaders=$this->getStudentHeaders();

    }

    public function update()
    {

    }

    public function getStudentHeaders():array
    {
        /***
        'custodian'=>$proposal->students->id,
        'supervisor'=>$proposal->supervisor->name,
        'project'=>$proposal->project_name,
        'proposal'=>'Download'
        'form'=>$proposal->proposal_form
        ****/

        return [
            ['key'=>'productName','label'=>'Product Name','class'=>'text-black text[16px'],
            ['key'=>'project','label'=>'Project','class'=>'text-black text[16px'],
            ['key'=>'custodian','label'=>'Custodian','class'=>'text-black text[16px'],
            ['key'=>'supervisor','label'=>'Supervisor','class'=>'text-black text[16px'],
        ];
    }

    public function getProposalsHeaders():array
    {
        /***
        'custodian'=>$proposal->students->id,
        'supervisor'=>$proposal->supervisor->name,
        'project'=>$proposal->project_name,
        'proposal'=>'Download'
        'form'=>$proposal->proposal_form
        ****/

        return [
            ['key'=>'productName','label'=>'Product Name','class'=>'text-black text[16px'],
            ['key'=>'custodian','label'=>'Custodian','class'=>'text-black text[16px'],
            ['key'=>'supervisor','label'=>'Supervisor','class'=>'text-black text[16px'],
            ['key'=>'form','label'=>'Proposal Document','class'=>'text-black text[16px'],
            ['key'=>'status','label'=>'Status','class'=>'text-black text[16px'],
        ];
    }

    public function getStudentsMap()
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

    
    public function getUnverifiedProposalsMap()
    {
        $map=[];
        $proposals = ProductProposal::with(['student','supervisor'])
                        ->where('supervisor_id',$this->user->id)
                        ->get();
       
        foreach($proposals as $proposal )
        {
            if(!$proposal->is_validated)
            {
            $map[]=[
                'id'=>$proposal->id,
                'productName'=>$proposal->project_name,
                'custodian'=>$proposal->student->name,
                'supervisor'=>$proposal->supervisor->name,
                'project'=>$proposal->project_name,
                'proposal'=>'Download',
                'form'=>$proposal->proposal_form
            ];
            }
            continue;
        }
        return $map;
    }

    public function getVerifiedProposalsMap()
    {
        $map=[];
        $proposals = ProductProposal::with(['student','supervisor'])
                        ->where('supervisor_id',$this->user->id)
                        ->get();
       
        foreach($proposals as $proposal )
        {
            
            if($proposal->is_validated)
            {
            $map[]=[
                'id'=>$proposal->id,
                'productName'=>$proposal->project_name,
                'custodian'=>$proposal->student->name,
                'supervisor'=>$proposal->supervisor->name,
                'proposal'=>'Download',
                'form'=>$proposal->proposal_form
            ];
            }
            continue;
        }
        return $map;
    }


    public function validateProposal($proposalID)
    { 
        $proposal=ProductProposal::find($proposalID);
        $proposal->update([
            'is_validated'=>true,
        ]);
        $this->success('Hurray !!! One proposal successfully verified', position:'toast-bottom');
        return redirect()->to('/dashboard/admin/show-proposals');
        
    }

    public function download($filePath)
    {
        return response()->download(storage_path('\\app\\private\\'.$filePath));
    }


    public function render()
    {
        return view('livewire.product.admin.show-proposal');
    }
}
 