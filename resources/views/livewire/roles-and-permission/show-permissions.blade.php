<div>
    <div>
        <x-page-heading textA="Permissions" textB="Display"/>
    </div>
    <div>
        <x-mary-tabs wire:model="currentTab">
            <x-mary-tab name="permissionsTab">
                <x-slot:label>
                    Permissions
                </x-slot:label>
                <div>
                    @foreach ($permissions as $permission)
                        <div wire:key="{{$permission->id}}">
                            <x-permission-card permissionName="{{$permission->name}}"/>  
                        </div>       
                    @endforeach
                </div>
            </x-mary-tab>
            <x-mary-tab name="rolesTab">
                <x-slot:label>
                    Roles With Their Permissions
                </x-slot:label>
                <div class="w-full">
                    @foreach ($rolesAndPermissions as $role)
                    <div wire:key="{{$role->id}}" 
                        class="grid grid-flow-col grid-cols-6 shadow-md mb-12 mt-8 py-8">
                        <div class="col-span-2 justify-self-center text-blue-800">
                            {{$role->name}}
                        </div>
                    
                        <div class="col-span-3 grid grid-flow-row  text-green-700">
                            
                            @foreach($role->permissions as $permission)
                                <div class="mb-5">
                                    {{$permission->name}}
                                </div>
                            @endforeach
                        </div>  

                        {{--Actions--}}
                        @if($role->name!=='SuperAdmin')
                        <div>
                            <x-mary-button icon="o-trash" class="text-red-700 bg-white w-12 h-12" 
                            wire:click="removeRole({{$role->id}})"/>
                        </div>
                        @endif
                    </div>    
                    @endforeach
                </div>
            </x-mary-tab>
        </x-mary-tabs>
    </div>


</div>
