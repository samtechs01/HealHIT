<?php

namespace App\Livewire\RolesAndPermission;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleAssignment extends Component
{
    public $selectedRole, $rolesMap;
    public $usersMap, $selectedUsers;

    protected $rules = [
        'selectedRole'=>['required'],
        'selectedUsers'=>['required'],
    ];

    public function mount()
    {
        $this->rolesMap = $this->getRolesMap();
        $this->usersMap = $this->getUsersMap();
    }

    public function getRolesMap()
    {
        $map=[];
        /*Make this first item disabled*/
        $map[]=[
            'id'=>null,
            'name'=>'Select Role'
        ];
        $roles = Role::get();
        foreach($roles as $role)
        {
            $map[]=[
                'id'=>$role->name,
                'name'=>$role->name
            ];
        }
        return $map;
    }

    public function getUsersMap()
    {
        $map=[];
        $map[]=[
            'id'=>null,
            'name'=>'Select User(s)'
        ];
        $users = User::get();
        foreach($users as $user)
        { 
            $map[]=[
                'id'=>$user->id,
                'name'=>$user->name
            ];
        }
        return $map;
    }

    public function assignRole()
    {
        $this->validate();
        foreach($this->selectedUsers as $selectedUserId)
        {
            $user = User::find($selectedUserId);
            $user->assignRole($this->selectedRole);
        }
        return redirect()->to('/dashboard/admin/roles');
    }

    public function render()
    {
        return view('livewire.roles-and-permission.role-assignment');
    }
}
