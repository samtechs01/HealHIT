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
        <div  class="grid grid-flow-col gap-0">
            <x-mary-header title="Methodology" size="text-3xl" />
        </div>
    </div>

    {{--Steps--}}
    <div>
        @forelse ($methodologySteps as $methodologyStep)
            <div class="mb-[30px]">
                <div class="grid grid-flow-col grid-cols-8 mb-[30px] gap-0">
                    <div class="col-span-2 font-bold text-2xl">{{$methodologyStep->step_no}}.  {{$methodologyStep->step_name}}</div>
                </div>
                <div>{{$methodologyStep->step_description}}</div>
            </div>
        @empty
            No steps enlisted!!
        @endforelse
    </div>
    {{--Complete Button--}}
    <div>
        <div class="grid justify-self-center my-[30px]">
            <x-mary-button label="Complete" responsive wire:click="completeProduct"
            class="border-solid border-[3px] border-blue-800  text-blue-800 rounded-2xl px-[20px] py-0 btn-ghost shadow-md hover:shadow-green-700 hover:border-solid hover:border-[3px] hover:border-blue-800  hover:text-blue-800 hover:bg-green-100"/>    
        </div>
    </div>

</div>
