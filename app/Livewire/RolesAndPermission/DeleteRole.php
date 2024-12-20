<?php

namespace App\Livewire\RolesAndPermission;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class DeleteRole extends Component
{
    public function removeRole(int $id)
    {
        //dd("delete role called for Role Id {{$id}}");
        $role = Role::find($id);
        $role->delete();
        return redirect('dashboard/admin/permissions');
    }

    public function render()
    {
        return view('livewire.roles-and-permission.delete-role');
    }
}
