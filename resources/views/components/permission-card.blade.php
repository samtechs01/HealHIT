@props(['permissionName'])

<div class="bg-white opacity-80 text-white pt-5 mb-10 rounded-md shadow-md">
    <div class="grid grid-flow-col grid-cols-5">
        <div class="col-span-3 pl-8 text-black">
            <x-mary-header title="{{$permissionName}}" size="text-lg"/>
        </div>
    </div>
</div>

