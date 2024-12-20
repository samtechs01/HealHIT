<?php

namespace App\Livewire\RolesAndPermission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermission extends Component
{
    public $permissionName, $moduleName, $userAction;

    protected $rules=[
        'moduleName'=>['required'],
        'userAction'=>['required'],
    ]; 

    public function addPermission()
    {
        $this->validate();
        $this->permissionName = ucfirst($this->moduleName).'.'.ucfirst($this->userAction);
        Permission::create([
            'name'=>$this->permissionName,
        ]);
        $this->permissionName='';
        return redirect()->to('/dashboard/admin/permissions');
    }
    public function render()
    {
        return view('livewire.roles-and-permission.create-permission');
    }
}