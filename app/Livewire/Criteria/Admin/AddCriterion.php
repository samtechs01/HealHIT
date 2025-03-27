<?php

namespace App\Livewire\Criteria\Admin;

use App\Models\Criteria;
use Livewire\Component;
use Mary\Traits\Toast;

class AddCriterion extends Component
{
    use Toast;

    public $criterionNumber, $criterionDescription;
    public $selectedTab, $headers, $criteriaMap;

    public function mount()
    {
        $this->loadData();
    }

    public function updated()
    {
        $this->loadData();
    }

    
    public function loadData()
    {
        $this->headers=$this->headers();
        $this->criteriaMap=$this->getCriteriaMap();
        $this->selectedTab='addCriteria';
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
            ['key'=>'criterionNumber','label'=>'Criterion Number','class'=>'text-black text[16px'],
            ['key'=>'criterionDescription','label'=>'Criterion Description','class'=>'text-black text-[16px]'], 
        ];
    }

    public function submitCriteria()
    {
        $this->validate([
            'criterionNumber'=>'required|integer',
            'criterionDescription'=>'required'

        ]);

        $criterion=Criteria::create([
            'criterion_no'=>$this->criterionNumber,
            'criterion_description'=>$this->criterionDescription
        ]);
        $this->success('New Criterion Added');
        return redirect()->route('dashboard.admin.addcriterion');
    }

    public function getCriteriaMap()
    {
        $map=[];
        Criteria::all()->each( function($criterion) use (&$map) {
            $map[]= [
                    'criterionNumber'=>$criterion->criterion_no,
                    'criterionDescription'=>$criterion->criterion_description
                ];
            }
        );
       return $map;
    }

    public function render()
    {
        return view('livewire.criteria.admin.add-criterion');
    }
}
