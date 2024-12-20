<div class="justify-self-center">
    {{-- Only Assigns A Role To A User --}}
    <div class="mb-5">
        <x-page-heading textA="Let's Add" textB="Admin"/>
        <div>Use this form to add an a new Admin User</div>
    </div>
    <div>
        <x-mary-form wire:submit="addAdmin" class="w-[25vw]">
            <x-mary-input label="Name "  wire:model="name" type="text"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
            <x-mary-input label="Email "  wire:model="email" type="text"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
            <x-mary-input label="Password "  wire:model="password" type="password"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
            <x-mary-input label="Confirm Password "  wire:model="passwordConfirmation" type="password"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/><div>
                <x-heal-hit-button label="Add Admin" type="submit"/>
            </div>
        </x-mary-form>
    </div>
</div>
 