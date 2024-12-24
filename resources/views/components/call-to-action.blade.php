@props(['title', 'btnLabel'])
<div style="background-image: url('/site-imgs/card-gradient-bg.png')"
class="grid grid-flow-row bg-no-repeat bg-cover justify-center rounded-lg w-full h-[32vh] py-[60px]">
    <div class="text-4xl text-blue-800  mb-[30px]">{{$title}}</div>
    <div class="justify-self-center">
        <x-mary-button label="{{$btnLabel}}" link="###" responsive  wire:navigate 
        class="border-solid border-[3px] bg-white border-blue-400  text-blue-400 rounded-3xl px-[20px] py-0 btn-ghost shadow-inner hover:text-white"/>
    </div>
</div>