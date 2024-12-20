<div class="justify-self-center">
    {{-- Only Assigns A Role To A User --}}
    <div class="mb-5">
        <x-page-heading textA="Add" textB="Permission"/>
        <div>Use this form to add role permissions</div>
    </div>
    <div>
        <x-mary-form wire:submit="addPermission" class="w-[25vw]">
            <x-mary-input label="Name of Module"  wire:model="moduleName" type="text"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
            <x-mary-input label="Specify User's Action" wire:model="userAction" type="text"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>    
            <div>
                <x-heal-hit-button label="Add Permission" type="submit"/>
            </div>
        </x-mary-form>
    </div>
</div>
 