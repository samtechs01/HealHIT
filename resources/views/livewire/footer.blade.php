<div class="grid grid-flow-row gap-10 mt-[60px]">
    <div class="grid grid-flow-col grid-cols-2 gap-10 justify-center px-[30px]">
        <x-call-to-action title="Browse Products" btnLabel="Get Started"/>
        <x-call-to-action title="Contact Alumni" btnLabel="Get Assistance"/>
    </div>
    <div class="grid grid-flow-col px-10">
        <div class="text-blue-400">
            <x-mary-menu>
                <x-mary-menu-item title="Contact Us" link="###" wire:navigate />
                <x-mary-menu-item title="Prescriptions" link="###" wire:navigate />
                <x-mary-menu-item title="Latest Products" link="###" wire:navigate />
                <x-mary-menu-item title="Popular Products" link="###" wire:navigate />
            </x-mary-menu>
        </div>

        <div class="justify-self-center">
            <div class="h-[150px] w-[150px]">
                <img src="/site-imgs/healhithubLogo.png" alt="evres-logo"/>
            </div>
        </div>

        <div>
            <div class="justify-self-end">
                <x-mary-button label="Recommend Product" link="###" responsive  wire:navigate 
                class="border-solid border-[3px] bg-blue-100 border-blue-400  text-blue-700 rounded-3xl btn-ghost shadow-md hover:text-white
                font-bold text-5xl w-[24vw] h-[22vh] "/>
            </div>
        </div>
    </div>
    <div class=" bg-gradient-to-r from-green-400 to-green-500 h-[8vh]  py-[15px] px-[20px] grid grid-flow-col justify-between bg-no-repeat bg-cover">

        <div class="h-[40px] w-[40px] mt-[-5px]">
            <img src="{{asset('site-imgs/healhithubLogo.png')}}" alt="healhit-logo"/>
        </div>
 
        <div class="text-white">
            &copyCopyright 2024
        </div>
    </div>
</div>
