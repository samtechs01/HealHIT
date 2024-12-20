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
    {{--Methodology--}}
    <div  class="justify-self-start mb-[30px]">
        <div  class="grid grid-flow-col gap-0" x-data="{openMethodologyStepForm:false}">
            <x-mary-header title="Methodology" size="text-3xl" />
            @can('Product.Create')
                <x-mary-icon name="m-pencil" class="w-7 h-7 cursor-pointer text-blue-600"
                x-on:click="openMethodologyStepForm = !openMethodologyStepForm"/>    
            @endcan
            <div x-show="openMethodologyStepForm" x-on:click.outside="openMethodologyStepForm = false"
            class="relative">
                <x-mary-form wire:submit="addStep" class="w-[25vw] justify-self-center absolute bg-white px-10 py-5 shadow-md opacity-95 rounded-md">
                    <x-mary-input label="Specify Step No."  wire:model="stepNo" type="integer"
                    class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
                    <x-mary-input label="Step Name"  wire:model="stepName" type="text"
                    class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
                    <x-mary-textarea rows="6" label="Step Description"  wire:model="stepDescription" type="text"
                    class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
                                                
                    <div>
                        <x-heal-hit-button label="Add Step" type="submit"/>
                    </div>
                </x-mary-form>
            </div>
        </div>
    </div>

    {{--Steps--}}
    <div>
        @forelse ($methodologySteps as $methodologyStep)
            <div class="mb-[30px]">
                <div class="grid grid-flow-col grid-cols-8 mb-[30px] gap-0">
                    <div class="col-span-2 font-bold text-2xl">{{$methodologyStep->step_no}}.  {{$methodologyStep->step_name}}</div>
                    @can('Product.Create')
                        <div class="col-span-6">
                            <x-mary-icon name="m-trash" class="w-5 h-5 text-red-600 cursor-pointer" wire:click="deleteStep({{$methodologyStep->id}})"/>
                        </div>
                    @endcan
                </div>
                <div>{{$methodologyStep->step_description}}</div>
            </div>
        @empty
            No steps enlisted!!
        @endforelse
    </div>
    {{--Comments--}}
    <div></div>

</div>
