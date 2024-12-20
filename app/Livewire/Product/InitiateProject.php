<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\ProductProposal;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class InitiateProject extends Component
{
    /**
     * 
     * *Sending to market can be 
     * DRAFT /SENT/ /APPROVED/ WITHDRAWN / CANCELLED
     * 
     * 
     */

    use WithPagination;
    use Toast;
    use WithFileUploads;

    public $custodianName, $custodianID, $proposalID, $title, $description, $product_src;
    public $is_complete, $is_validated, $to_market, $featuredImageObj;
    public $initiationDate, $proposalId;

    protected $rules=[
        'title'=>['required'],
        'description'=>['required'],
        'featuredImageObj'=>['required','max:5000']
    ];

    public function mount($proposalID)
    {
        $this->getCustodianDetail($proposalID);
    }



    public function getProductDetailMap()
    {

    }

    public function getCustodianDetail($proposalID)
    {
        $proposal =ProductProposal::with('student')->get()[0];
        $this->custodianName=$proposal->student->name;
        $this->initiationDate=Carbon::parse($proposal->updated_at)->format('Y/m/d');
        $this->title=$proposal->project_name;
        $this->proposalID= $proposalID;
    }

    public function initiateProject()
    {
        $this->validate();
        $this->getCustodianDetail($this->proposalID);
        $this->product_src=$this->featuredImageObj->storeAs('product', $this->featuredImageObj->getClientOriginalName(), 'public');
        $product = Product::create([
            'product_proposal_id'=>$this->proposalID,
            'title'=>$this->title,
            'description'=>$this->description,
            'product_src'=>$this->product_src,
            'product_category'=>"UNCATEGORIZED",
            'is_complete'=>false,
            'is_validated'=>false,
            'to_market'=>"DRAFT"
        ]);
        $this->success('Product project initiated successfully',position:'toast-bottom');
        //need for a delay
        redirect()->to('/dashboard/product/initiated-projects');
    }

    public function render()
    {
        return view('livewire.product.initiate-project');
    }
}
