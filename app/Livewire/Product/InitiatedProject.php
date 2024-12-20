<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class InitiatedProject extends Component
{

    use WithPagination;

    public $projectsMap;
    public $search, $user;

    public function mount()
    {
        $this->user=Auth::user();
        $this->search='';
        $this->projectsMap=$this->getProjectsMap($this->user->id);
    }

    public function updated()
    {
        
        $this->projectsMap=$this->getProjectsMap($this->user->id);
    }

    public function getProjectsMap($id)
    {
        $map=[];
        $projectsRecords = Product::whereHas('productProposal', function($query) use ($id){
              $query= $query->where('student_id','=',$id);
              return $query;
            });
        //retain the context
        $projects = ( $this->search==='') ? $projectsRecords->get(): $projectsRecords->where(function($query){
            $query->where('title','LIKE','%'.$this->search.'%')->orWhere('description','LIKE','%'.$this->search.'%')->orWhere('to_market','LIKE','%'.$this->search.'%');    
        })->get();

        foreach($projects as $project)
        {
            
            $map[]=[
                'id'=>$project->id,
                'featuredImgSrc'=>$project->product_src,
                'title'=>$project->title,
                'description'=>$project->description,
                'category'=>$project->product_category,
                'progress'=>$project->to_market
            ];

        }
        return $map;
    }

    public function render()
    {
        return view('livewire.product.initiated-project');
    }
}