<div class="justify-self-center">
    {{-- Only Assigns A Role To A User --}}
    <div class="mb-5">
        <x-page-heading textA="Assign" textB="Role"/>
        <div>Use this form to assign a role a selected user</div>
    </div>
    <div>
        <x-mary-form wire:submit="assignRole" class="w-[25vw]">
            <x-mary-select label="Select Role" :options="$rolesMap" wire:model="selectedRole"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
            <x-mary-select label="Select User" :options="$usersMap" wire:model="selectedUsers" multiple
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>    
            <div>
                <x-heal-hit-button label="Assign Role" type="submit"/>
            </div>
        </x-mary-form>
    </div>
</div>
 