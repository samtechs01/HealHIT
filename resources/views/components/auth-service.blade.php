@props(['title','createUrl','showAllUrl'=>null])

<div class="bg-white opacity-80 text-white pt-5 mb-10 rounded-md shadow-md">
    <div class="grid grid-flow-col grid-cols-5">
        <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
        <div class="col-span-4 pl-8 text-green-700">
            <x-mary-header title="{{$title}}" size="text-lg"/>
        </div>
        <div class="col-span-1 grid grid-flow-col">
            <x-healhit-button label="Create" link="{{$createUrl}}" wire:navigate/>
            <x-healhit-button label="Show" link="{{$showAllUrl}}" wire:navigate/>
        </div>
    </div>
</div>
