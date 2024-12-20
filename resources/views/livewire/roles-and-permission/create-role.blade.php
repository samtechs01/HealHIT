<div class="justify-self-center">
    {{-- Only Assigns A Role To A User --}}
    <div class="mb-5">
        <x-page-heading textA="Add" textB="A New Role"/>
        <div>Use this form to add role permissions</div>
    </div>
    <div>
        <x-mary-form wire:submit="addRole" class="w-[25vw]">
            <x-mary-select label="Select Role To Add" :options="$newRolesMap" wire:model="roleName" 
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
            <div>
                <x-heal-hit-button label="Add New Role" type="submit"/>
            </div>
        </x-mary-form>
    </div>
</div>
 