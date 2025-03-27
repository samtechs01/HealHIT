<div>
    <div class="pb-5 justify-self-center">
        <x-page-heading textA="Product" textB="List"/>
    </div>
    {{--SET OF THE FILTERS--}}
    <div class="grid grid-flow-row gap-4 grid-cols-8">
        {{--Search by title/ ingredient/ custodian/ supervisor--}}
        
        <div class="col-span-3">
            <x-mary-input placeholder="Search" wire:model.live.debounce="search" type="text"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
        </div>
        <div class="col-span-5">

        </div>
    </div>

    {{--Product List Container--}}
    <div class="grid grid-flow-row justify-self-center w-[60vw] pt-[60px]">
        @forelse($projectsMap as $project)
            <x-project-card 
                id="{{$project['id']}}"
                img="{{$project['featuredImgSrc']}}"
                title="{{$project['title']}}"
                description="{{$project['description']}}"
                category="{{$project['category']}}"
                progress="{{$project['progress']}}"
                :marketStatus="$project['progress']"
                :completionBar="$project['completionBar']"
             />
        @empty

        @endforelse
    </div>

</div>
