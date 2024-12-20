<?php

namespace App\Livewire\RolesAndPermission;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Role;

class CreateAdminUser extends Component
{
    public $name, $email, $password, $passwordConfirmation;
    public $adminRole;

    protected $rules=[
        'name'=>['required'],
        'email'=>['required','email'],
        'password'=>['required'],
        'passwordConfirmation'=>['required','same:password']
    ];

    public function mount()
    {
        $this->adminRole="Admin";
    }

    public function addAdmin()
    {
        $result=Role::where('name',$this->adminRole)->get();
        if(count($result)===0)
        {
            return redirect()->to('/dashboard/admin/add-role');
        }else{
            $this->validate();
            $user=User::create([
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>bcrypt($this->password)
            ]);
            $user->assignRole($this->adminRole);
            return redirect()->to('/dashboard/admin/roles');
        }
       
    }

    public function render()
    {
        return view('livewire.roles-and-permission.create-admin-user');
    }
}
