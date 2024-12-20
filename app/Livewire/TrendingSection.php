<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class TrendingSection extends Component
{
    public $publishedProducts, $draftProducts;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->publishedProducts=$this->getPublishedProducts();
        $this->draftProducts=$this->getDraftProducts();
    }

    public function getPublishedProducts()
    {
        return Product::where('to_market','APPROVED')->get();
    }

    public function getDraftProducts()
    {
        return Product::where('to_market','DRAFT')->get();
    }

    public function render()
    {
        return view('livewire.trending-section');
    }
}
