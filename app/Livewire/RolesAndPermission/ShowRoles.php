<?php

namespace App\Livewire\RolesAndPermission;

use App\Livewire\BaseComponent;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ShowRoles extends BaseComponent
{
    public $currentTab; 
    public $students, $admins, $superAdmins;
    public $rolesMap, $selectedRole, $permissionsMap, $selectedPermissions;

    protected $rules=[
        'selectedRole'=>['required'],
        'selectedPermissions'=>['required'],
    ];

    public function mount()
    {
        $this->currentTab = "student";
        $this->superAdmins=$this->getSuperAdmins();
        $this->admins=$this->getAdmins();
        $this->students=$this->getStudents();
        $this->rolesMap = $this->getRolesMap();
        $this->permissionsMap = $this->getPermissionsMap();
    }

    public function getSuperAdmins()
    {
        $superAdmins = User::with('roles')->whereHas('roles',function($query){
            $query->where(
                'name','SuperAdmin'
            );
            return $query;
        })->get();
        return $superAdmins;
    }

    public function getAdmins()
    {
        $superAdmins = User::with('roles')->whereHas('roles',function($query){
            $query->where(
                'name','Admin'
            );
            return $query;
        })->get();
        return $superAdmins;
    }
    public function getStudents()
    {
        $superAdmins = User::with('roles')->whereHas('roles',function($query){
            $query->where(
                'name','Student'
            );
            return $query;
        })->get();
        return $superAdmins;
    }

    public function getRolesMap()
    {
        $map=[];
        $map[]=[
            'id'=>null,
            'name'=>'Select a role'
        ];
        $roles = Role::get();
        foreach($roles as $role)
        {
            $map[]=[
                'id'=>$role->id,
                'name'=>$role->name
            ];
        }
        return $map;
    }

    public function getPermissionsMap()
    {
        $map=[];
        $permissions = Permission::get();
        foreach($permissions as $permission)
        {
            $map[]=[
                'id'=>$permission->name,
                'name'=>$permission->name
            ];
        }
        return $map;
    }

    public function assignRole()
    {
        $this->validate();
        if($this->selectedRole!=null)
        {
            $role = Role::find($this->selectedRole);
            foreach($this->selectedPermissions as $permission)
            {
                $role->givePermissionTo($permission);
            }
            return redirect('/dashboard/admin/permissions');
        }
        return redirect('/dashboard/roles')->back();
    }

    public function removeUser($id)
    {
        return redirect()->to('/dashboard/admin/remove-user/'.$id);
    }

    public function render()
    {
        return view('livewire.roles-and-permission.show-roles');
    }
}
 