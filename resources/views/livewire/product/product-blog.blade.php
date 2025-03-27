<div class="grid justify-self-center w-[50vw] mt-[20px]">

    {{--Header--}}
    <div>
        <div class="grid grid-flow-col justify-self-center text-sm gap-4 mb-[60px] ">
            <div class="bg-amber-200 text-green-600 rounded-3xl py-2 px-4 align-self-center">{{$product->product_category}}</div><div class="align-self-center py-2">{{$product->created_at}}</div>
        </div>
        <div>
            <x-mary-header title="{{$product->title}}" size="text-5xl" class="justify-self-center text-center"/>
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
        x-data="{openEditCriteriaForm:false, showDate:false }"
        x-init="$watch('selectedCriterionId', value=> showDate = (value === 21) ) ">
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
                   {{ dump($selectedCriterionId) }}
                    <div x-show="showDate">
                        <x-mary-datetime  label="Select date" wire:model="criterionVal" icon="o-calendar"
                        class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>        
                    </div>

                    <div x-show="!showDate">
                        <x-mary-textarea  rows="6" label="Your criterion description"  wire:model="criterionVal" type="text"
                        class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>  
                    </div>
                              
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
            No steps enlisted!!
        @endforelse
    </div>
    {{--Comments--}}
    <div></div>

</div>
