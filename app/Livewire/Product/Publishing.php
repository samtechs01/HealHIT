<?php

namespace App\Livewire\Product;

use App\Livewire\BaseComponent;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class Publishing extends BaseComponent
{

    /**
     * 
     * *Sending to market can be 
     * DRAFT /SENT/ /APPROVED/ WITHDRAWN / CANCELLED
     * 
     * 
     */

     public $stagedProductHeaders;
     public $draftProductsMap, $completedProductsMap, $validatedProductsMap;
     public $stagedProjects;
 
     public function mount()
     {
         $this->loadData();
     }
 
     private function loadData()
     {
         $this->stagedProjects="incompleteProjects";
         $this->draftProductsMap= $this->getdraftProductsMap();
         $this->completedProductsMap= $this->getCompletedProductsMap();
         $this->validatedProductsMap= $this->getValidatedProductsMap();
         $this->stagedProductHeaders=$this->headers();
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
             ['key'=>'product_src','label'=>'Featured Image','class'=>'text-black text[16px'],
             ['key'=>'title','label'=>'Custodian','class'=>'text-black text[16px'],
             ['key'=>'product_category','label'=>'Category','class'=>'text-black text[16px'],
             ['key'=>'custodian','label'=>'Custodian','class'=>'text-black text[16px'],
             ['key'=>'status','label'=>'Status','class'=>'text-black text[16px'],
         ];
     }
 
     public function getdraftProductsMap()
     {
         $draftProducts = Product::with('productProposal')->where('to_market','DRAFT')->get();
         return $draftProducts;
     }
 
     public function getCompletedProductsMap()
     {
         $completedProducts = Product::with('productProposal')->where('to_market','SENT')->get();
         return $completedProducts;
     }
 
     public function getValidatedProductsMap()
     {
         $validatedProducts = Product::with('productProposal')->where('to_market','APPROVED')->get();
         return $validatedProducts;
     }
 
    
    public function render()
    {
        return view('livewire.product.publishing');
    }
}
