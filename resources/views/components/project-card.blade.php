@props(['id', 'img', 'title', 'description', 'category', 'progress'])

<div class="grid grid-flow-col grid-cols-8 gap-10 mb-[60px]">

    <div class="col-span-3">
        <img src="/{{$img}}" alt="featured-img" class="w-200 h-90 rounded-md shadow-md shadow-green-600"/>
    </div>

    <div class="col-span-5 grid grid-flow-row py-2">

        {{--Project Header--}}
        <div class="grid grid-flow-col grid-cols-5">
            <div class="col-span-4">
                <div class="font-bold text-2xl">{{$title}}</div>
            </div>
            <div class="col-span-1 grid  grid-flow-col gap-3">
                <div>
                    <x-mary-button icon="m-eye" class="w-12 h-4 bg-blue-600 hover:-blue-600 text-white cursor-pointer rounded-3xl" wire:navigate link="/dashboard/product/project-blog/{{$id}}"/>
            
                </div>
                <div>
                    <x-mary-button icon="s-check" class="w-12 h-4 bg-green-600 hover:bg-green-600 text-white cursor-pointer rounded-3xl" wire:navigate link="/dashboard/product/complete-project/{{$id}}"/>
                </div>
            </div>   
        </div>

        {{--Project Description--}}
        <div>
            {{$description}}
        </div>

        {{--Project Footer--}}
        <div class="grid grid-flow-col grid-cols-5 gap-2">
            <div class="col-span-2">
                {{$category}}
            </div>

            <div class="col-span-2 text-[14px] align-self-center">
                <span>Project Status:</span> 
                @if ($progress==="CANCELLED")
                    <span class="bg-zinc-400 text-white rounded-3xl px-5">{{$progress}}</span>
                @elseif($progress==="WITHDRAWN")
                    <span class="bg-red-600 text-white rounded-3xl px-5">{{$progress}}</span>
                @elseif($progress==="SENT")
                    <span class="bg-blue-600 text-white rounded-3xl px-5">{{$progress}}</span>
                @else
                    <span class="bg-amber-400 text-white rounded-3xl px-5">{{$progress}}</span>
                @endif
            </div>
        </div>
        
    </div>

</div>