<?php

namespace App\Livewire\RolesAndPermission;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{

    public $roleName, $newRolesMap, $safeRoles;

    protected $rules=[
        'roleName'=>['required'],
    ];

    public function mount()
    {
        $this->safeRoles = ['Student', 'Admin'];   
        $this->newRolesMap = $this->getNewRolesMap();
    }

    public function addRole()
    {
        $this->validate();
        $this->roleName = ucfirst($this->roleName);
        Role::create([
            'name'=>$this->roleName,
        ]);
        $this->roleName='';
        return redirect()->to('/dashboard/admin/permissions');
    }

    public function getNewRolesMap()
    {
        $map=[];
        $map[]=[
            'id'=>null,
            'name'=>'Select Role'
        ];
        foreach($this->safeRoles as $safeRole)
        {
            $existingRoles = Role::where('name',$safeRole)->get();
            if(count($existingRoles)===0)
            {
                $map[]=[
                    'id'=>$safeRole,
                    'name'=>$safeRole
                ];
            }
        }
        return $map;
    }

    
    public function render()
    {
        return view('livewire.roles-and-permission.create-role');
    }
}
