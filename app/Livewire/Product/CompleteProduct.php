<?php

namespace App\Livewire\Product;

use App\Models\Methodology;
use App\Models\Product;
use Livewire\Component;
use Mary\Traits\Toast;

class CompleteProduct extends Component
{

    use Toast;

    public $productId, $product;
    public $stepNo, $stepName, $stepDescription;
    public $methodologySteps;

    protected $rules=[
        'stepNo'=>['required'],
        'stepName'=>['required','max:35'],
        'stepDescription'=>['required']
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->loadData($productId);
    }

    private function loadData($productId)
    {
        $this->product=$this->getProduct($productId);
        $this->methodologySteps = $this->getMethodologySteps();
    }

    public function getProduct($productId)
    {
        $product =Product::find($productId);
        return $product;

    }

    public function getMethodologySteps()
    {
        $steps = Methodology::with('product')->where('product_id',$this->productId)->get();
        return $steps;
    }

    public function completeProduct()
    {
        $this->product->update([
            'is_complete'=>true,
            'to_market'=>'SENT'
            ]
        );
        $this->success('You have successfully completed your project',position:'toast-bottom');
        redirect()->to('/dashboard/product/publishing');

    }

    public function render()
    {
        return view('livewire.product.complete-product');
    }
}
