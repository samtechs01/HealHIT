<div class="bg-gradient-to-b from-green-200 to-white bg-opacity-45">
    <x-mary-nav fixed full-width x-data="{open: false}" class="justify-self-center bg-transparent">
        {{-- Right side actions --}}
        <x-slot:actions>
            <x-mary-menu class="text-blue-800 hidden md:static md:grid grid-flow-col  md:gap-12 activate-by-route">
                <x-mary-menu-item title="Home" link="/"/>
                <x-mary-menu-item title="Prescriptions" link="/prescriptions"/>
                <x-mary-menu-item title="About" link="/about"/>
                <x-mary-menu-item>
                    {{-- Brand --}}
                    <div class="absolute top-[-10px] left-0 h-[60px] w-[70px]">
                        <img src="{{asset('site-imgs/healhithubLogo.png')}}" alt="evres-logo"/>
                    </div>
                </x-mary-menu-item> 
                <x-mary-menu-item title="Alumni-Consultancy" link="/alumni-consultancy"/>
                <x-mary-button label="Login" link="login" responsive  wire:navigate 
                class="border-solid border-[3px] bg-white border-blue-400  text-blue-400 rounded-3xl px-[20px] py-0 btn-ghost shadow-inner hover:text-white"/>
                <x-mary-button label="Sign-up" link="register" responsive  wire:navigate 
                class="border-solid border-[3px] bg-white border-blue-400  text-blue-400 rounded-3xl px-[20px] py-0 btn-ghost shadow-inner hover:text-white"/>
                <x-mary-icon x-show="!open" x-on:click="open=!open" name="c-bars-3" 
                class="w-[6vw] md:w-[3vw] cursor-pointer md:hidden"/>
            </x-mary-menu>

            <x-mary-menu x-show="open" x-on:click.outside="open = false"
             class="absolute z-index-90 right-3 top-8 grid grid-flow-row 
             w-[30vw] md:hidden">
                <x-mary-menu-item title="Home" link="###"/>
                <x-mary-menu-item title="Services" link="###"/>
                <x-mary-menu-item title="About" link="###"/>
                <x-mary-menu-item title="FAQs" link="###"/>
                <x-mary-menu-item title="Testimonials" link="###"/>
                <x-mary-menu-item title="Contact Us" link="###"/>
            </x-mary-menu>
        </x-slot:actions>
        
    </x-mary-nav>  
</div>
