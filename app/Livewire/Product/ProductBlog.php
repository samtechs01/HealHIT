<?php

namespace App\Livewire\Product;

use App\Models\Criteria;
use App\Models\CriteriaProduct;
use App\Models\Methodology;
use App\Models\Product;
use Livewire\Component;
use Mary\Traits\Toast;

class ProductBlog extends Component
{
    use Toast;

    public $productId, $product;
    public $selectedCriterionId, $criterionVal;
    public $criteriaDefinitions ,$criteriaMap;

    protected $rules=[
        'selectedCriterionId'=>['required'],
        'criterionVal'=>['required','max:350']
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->loadData($productId);
    }

    private function loadData($productId)
    {
        $this->product=$this->getProduct($productId);
        $this->criteriaDefinitions = $this->getCriteriaDefinitions();
        $this->criteriaMap=$this->getCriteriaMap();
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
    public function addCriterionProduct()
    {
        $this->validate();
        dd($this->criterionVal);
        CriteriaProduct::create([
            'product_id'=>$this->productId,
            'criteria_id'=>$this->selectedCriterionId,
            'criteria_val'=>$this->criterionVal,
        ]);
        $this->success('Criterion definition successfully added', position:'toast-bottom');
        $this->criteriaDefinitions = $this->getCriteriaDefinitions();
    }

    public function deleteCriterionProduct($criteriaProductId)
    {
        $criterionDefinition = CriteriaProduct::find($criteriaProductId);
        $criterionDefinition->delete();
        $this->warning('Criteria definition successfully deleted','toast-bottom');
        redirect()->to('/dashboard/product/project-blog/'.$this->productId);
    }

    public function getCriteriaDefinitions()
    {
        $map = [];
        CriteriaProduct::where('product_id',$this->productId)->each(function ($criteriaProduct) use (&$map)
        {
            $map[]=[
                'itemId'=>$criteriaProduct->id,
                'criteriaId'=>$criteriaProduct->criteria_id,
                'criterionName'=>$criteriaProduct->criteria->criterion_description,
                'criterionValue'=>$criteriaProduct->criteria_val,
            ];
        });
        return $map;
    }
    public function getCriteriaMap()
    {
        $map = [];
        $map[]=[
            'id'=>0,
            'name'=>'Select a criteria'
        ];
        Criteria::each(function($criterion) use (&$map)
            {
                $map[]=[
                    'id'=>$criterion->id,
                    'name'=>$criterion->criterion_description
                ];
            }
        );
        return $map;
    }

    public function render()
    {
        return view('livewire.product.product-blog');
    }
}
 