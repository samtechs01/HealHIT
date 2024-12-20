<div class="justify-self-start w-[70vw]">
    {{-- Only Assigns A Role To A User --}}
    <div class="pb-5 justify-self-center">
        <x-page-heading textA="Kickstart Your" textB="Product Development"/>
    </div>

    {{--Blog Design Container--}}
    <div>
        <x-mary-form wire:submit="initiateProject" class=" grid grid-flow-row grid-cols-6  gap-8 justify-self-center">                
        {{--Custodian And Start date--}}

        <div class="col-span-3">
            <x-mary-input wire:model="custodianName" readonly
            class="bg-gray-50  rounded-md text-zinc-400"/>
        </div>
        <div  class="col-span-3">
            <x-mary-input wire:model="initiationDate"  readonly
            class="bg-gray-50 rounded-md text-zinc-400"/>
        </div>

        {{--Title--}}
        <div  class="col-span-3">
            <x-mary-input placeholder="Product Name"  wire:model.live="title" type="text"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
        </div>
        {{--Description--}}
        <div class="col-span-3">
            <x-mary-input placeholder="Project Description"  wire:model.live="description" type="text"
            class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
        </div>
        {{--Profile Image--}}
        <div class="col-span-3">
            <x-mary-file label="Attach Featured Image" wire:model.live="featuredImageObj" accept="image/jpeg, image/jpg, image/png"
            class="border-none hover:border-blue-800 rounded-md text-zinc-400">
                <img src="{{$user->avatar ?? '/site-imgs/healhithubLogo.png'}}" alt="user-upload" class="w-full h-50 shadow-md"/>
            </x-mary-file> 
        </div>
        <div class="col-span-3">

        </div>
        <div class="col-span-3">

        </div>
        <div class="col-span-3">
            <x-heal-hit-button label="Launch Project" type="submit"/>
        </div>
        {{--INGRIDIENTS/ METHODOLOGY/ COMMENTS--}}

        </x-mary-form>

    </div>

</div>
  