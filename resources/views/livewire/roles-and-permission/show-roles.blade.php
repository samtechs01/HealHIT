<div>
    <div>
        <x-page-heading textA="Roles" textB="Display"/>
    </div>
    <div> 
        <x-mary-tabs wire:model="currentTab">
            <x-mary-tab name="student">
                <x-slot:label>
                    Student
                </x-slot:label>
                <div>
                    @forelse ($students as $student)
                        <div class="relative" wire:key="{{$student->id}}">
                            <x-user-card fullname="{{$student->name}}"/> 
                            <x-mary-button icon="o-trash" class="absolute right-0 top-0 text-red-700 bg-white w-12 h-12" 
                            wire:click="removeUser({{$student->id}})" /> 
                        </div>
                    @empty
                    <div class="justify-self-center">
                        No Student Enlisted
                    </div>               
                    @endforelse
                </div>
            </x-mary-tab>
            <x-mary-tab name="admins">
                <x-slot:label>
                    Admin
                </x-slot:label>
                <div>
                    @forelse ($admins as $admin)
                        <div class="relative" wire:key="{{$admin->id}}">
                            <x-user-card fullname="{{$admin->name}}"/> 
                            <x-mary-button icon="o-trash" class="absolute right-0 top-0 text-red-700 bg-white w-12 h-12" 
                            wire:click="removeUser({{$admin->id}})" />
                        </div> 
                    @empty
                    <div class="justify-self-center">
                        No Admin Enlisted
                    </div>               
                    @endforelse
                </div>
            </x-mary-tab>
            <x-mary-tab name="superAdmin">
                <x-slot:label>
                    Super Admin
                </x-slot:label>
                <div>
                    @forelse ($superAdmins as $superAdmin)
                    <div wire:key="{{$superAdmin->id}}">
                        <x-user-card fullname="{{$superAdmin->name}}"/>  
                    </div> 
                    @empty
                    <div class="justify-self-center">
                        No Super Admin Enlisted
                    </div>               
                    @endforelse
                </div>
            </x-mary-tab>
            <x-mary-tab name="assignPermissions">
                <x-slot:label>
                    Assign Permissions
                </x-slot:label>
                <div>
                    <div class="justify-self-center">
                        {{-- Only Assigns A Role To A User --}}
                        <div class="mb-5">
                            <div>Use this form to give permissions to a specified role</div>
                        </div>
                        <div>
                            <x-mary-form wire:submit="assignRole" class="w-[25vw]">
                                <x-mary-select label="Select Role"  :options="$rolesMap" wire:model="selectedRole" 
                                class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
                                <x-mary-select  label="Select Permissions" :options="$permissionsMap" wire:model="selectedPermissions" multiple 
                                class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>    
                                <div>
                                    <x-heal-hit-button label="Assign Role" type="submit"/>
                                </div>
                            </x-mary-form>
                        </div>
                    </div>
                </div>
            </x-mary-tab>
        </x-mary-tabs>
    </div>
</div>
