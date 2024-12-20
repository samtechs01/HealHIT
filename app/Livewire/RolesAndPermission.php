<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermission extends Component
{
 
    public function render()
    {
        return view('livewire.roles-and-permission');
    }
}
 