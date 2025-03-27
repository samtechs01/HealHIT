<div class="grid justify-self-center w-[50vw] mt-[20px]">

    {{--Header--}}
    <div>

        <div>
            <div class="grid grid-flow-col justify-between">
                <div class="grid grid-flow-col justify-self-center text-sm gap-4 mb-[60px] ">
                    <div class="bg-amber-200 text-green-600 rounded-3xl py-2 px-4 align-self-center">{{$product->product_category}}</div>
                    <div class="align-self-center py-2">{{$product->created_at}}</div>
                </div>
                <div x-data="{openMessagesList:false}">
                    <x-mary-icon  name="s-chat-bubble-left" class="h-10 w-10 text-blue-600 cursor-pointer fixed" 
                    x-on:click="openMessagesList=!openMessagesList"/>
                    <div x-show="openMessagesList" x-on:click.outside="openMessagesList = false"
                    class="relative">
                        <div class="grid grid-cols-2">
                            <div class="col-end-3 col-start-2">PharmaCloud Chat</div>
                        </div>
                        <div>
                            <x-mary-form wire:submit="addMessageTo" class="w-[30vw] justify-self-center absolute bg-white px-10 py-5 shadow-md opacity-95 rounded-md" >
                                <div>
                                    @foreach($messages as $message)
                                        <div class="mt-[5px] bg-blue-800 text-white rounded-md py-[3px] px-[4px]">{{$message['content']}}</div>
                                    @endforeach
                                </div>
                            
                                
                                <x-mary-textarea  rows="3" label="Message"  wire:model="messageContent" type="text"
                                    class="mt-[30px] bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
                                <div>
                                    <x-heal-hit-button label="Send" type="submit"/>
                                </div>
                            </x-mary-form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <x-mary-header title="{{$product->title}}" size="text-5xl" class="justify-self-center text-center"/>
            </div>
        </div>

    </div>
    {{--Featured Image--}}
    <div class="mb-[60px]">
        <img src="/{{$product->product_src}}" alt="product feature image" class="w-full justify-self-center rounded-md">
    </div>
    {{--Description--}}
    <div class="justify-self-start mb-[30px]">
        <div>
            <x-mary-header title="Project Description" size="text-3xl" />
        </div>
        <div>
            {{$product->description}}
        </div>
    </div>

    {{--Criteria--}}
    <div  class="justify-self-start mb-[30px]">
        <div  class="grid grid-flow-col gap-0" 
        x-data="{openEditCriteriaForm:false}">
            <x-mary-header title="Product Criteria" size="text-3xl" />
            @can('Product.Create')
                <x-mary-icon name="m-pencil" class="w-7 h-7 cursor-pointer text-blue-600"
                x-on:click="openEditCriteriaForm = !openEditCriteriaForm"/>    
            @endcan

            <div x-show="openEditCriteriaForm" x-on:click.outside="openEditCriteriaForm = false"
            class="relative">
                <x-mary-form wire:submit="addCriterionProduct" class="w-[25vw] justify-self-center absolute bg-white px-10 py-5 shadow-md opacity-95 rounded-md" >
                    <x-mary-select label="Select Criterion No."  
                    wire:model.live="selectedCriterionId" 
                    x-model="selectedCriterionId" 
                    :options="$criteriaMap"
                    class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400" />
                    @if($selectedCriterionId===21 || $selectedCriterionId===22)
                        <div>
                            <x-mary-datetime  label="Select date" wire:model="criterionVal" icon="o-calendar"
                            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>        
                        </div>
                    @else
                        <div>
                            <x-mary-textarea  rows="6" label="Your criterion description"  wire:model="criterionVal" type="text"
                            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>  
                        </div>
                    @endif    
                    <div>
                        <x-heal-hit-button label="Add Criterion Definition" type="submit"/>
                    </div>
                </x-mary-form>
            </div>
        </div>
    </div>

    {{--Steps--}}
    <div>
        @forelse ($criteriaDefinitions as $criteriaDefinition)
            <div class="mb-[30px]">
                <div class="grid grid-flow-col grid-cols-8 mb-[30px] gap-0">
                    <div class="col-span-6 font-bold text-2xl">{{$criteriaDefinition['criteriaId']}}.{{$criteriaDefinition['criterionName']}}</div>
                    @can('Product.Create')
                        <div class="col-span-2">
                            <x-mary-icon name="m-trash" class="w-5 h-5 text-red-600 cursor-pointer" wire:click="deleteCriterionProduct({{$criteriaDefinition['itemId']}})"/>
                        </div>
                    @endcan
                </div>
                <div>{{$criteriaDefinition['criterionValue']}}</div>
            </div>
        @empty
            No assessment criteria added yet!!
        @endforelse
    </div>
    {{--Comments--}}
    <div></div>

</div>
