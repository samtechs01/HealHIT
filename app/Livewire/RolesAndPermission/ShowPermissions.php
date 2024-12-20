<?php

namespace App\Livewire\RolesAndPermission;

use App\Livewire\BaseComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ShowPermissions extends BaseComponent
{
    public $currentTab, $permissions, $rolesAndPermissions;

    public function mount()
    {
        $this->currentTab = "permissionsTab";
        $this->permissions = $this->getPermissions(); 
        $this->rolesAndPermissions = $this->getRolesAndPermissions(); 
    }

    public function getPermissions()
    {
        $permissions = Permission::get();
        return $permissions;
    }

    public function getRolesAndPermissions()
    {
        $rolesAndPermissions=Role::with('permissions')->get();
        return $rolesAndPermissions;
    }

    public function removeRole($id)
    {
        return redirect()->to('/dashboard/admin/remove-role/'.$id);
    }

    public function render()
    {
        return view('livewire.roles-and-permission.show-permissions');
    }
}
