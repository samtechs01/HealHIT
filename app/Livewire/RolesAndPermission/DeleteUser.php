<?php

namespace App\Livewire\RolesAndPermission;

use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{
    public function removeUser($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->to('/dashboard/admin/roles');
    }
    public function render()
    {
        return view('livewire.roles-and-permission.delete-user');
    }
}
