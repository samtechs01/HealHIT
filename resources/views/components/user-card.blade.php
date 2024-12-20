@props(['fullname'])

<div class="bg-white opacity-80 text-white pt-5 mb-10 rounded-md shadow-md">
    <div class="grid grid-flow-col grid-cols-5">
        <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
        <div class="col-span-4 pl-8 text-black">
            <x-mary-header title="{{$fullname}}" size="text-lg"/>
        </div>
        <div class="col-span-1 grid grid-flow-col">
            <x-mary-icon name="o-user" color="text-blue-800"/>
        </div>
    </div>
</div>
