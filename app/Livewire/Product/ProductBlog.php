<?php

namespace App\Livewire\Product;

use App\Models\Methodology;
use App\Models\Product;
use Livewire\Component;
use Mary\Traits\Toast;

class ProductBlog extends Component
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

    /**
     * Adds Methodology step for the Product Blog
     * 
     * The Methodology is a table containing steps with
     *  id; product_id; step_no; step_name; step_description
     */
    public function addStep()
    {
        $this->validate();
        Methodology::create([
            'product_id'=>$this->productId,
            'step_no'=>$this->stepNo,
            'step_name'=>$this->stepName,
            'step_description'=>$this->stepDescription,
        ]);
        $this->success('Methodology step successfully added', position:'toast-bottom');
        $this->methodologySteps = $this->getMethodologySteps();
    }

    public function deleteStep($methodologyStepId)
    {
        $step = Methodology::find($methodologyStepId);
        $step->delete();
        $this->warning('Step successfully deleted','toast-bottom');
        redirect()->to('/dashboard/product/project-blog/'.$this->productId);
    }

    public function getMethodologySteps()
    {
        $steps = Methodology::with('product')->where('product_id',$this->productId)->get();
        return $steps;
    }

    public function render()
    {
        return view('livewire.product.product-blog');
    }
}
 