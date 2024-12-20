<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']) 

        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    </head>
    <body class="font-body antialiased">
        {{-- The navbar with `sticky` and `full-width` --}}
        {{--
        <x-mary-nav sticky full-width>
    
            <x-slot:brand>
                <label for="main-drawer" class="lg:hidden mr-3">
                    <x-mary-icon name="o-bars-3" class="cursor-pointer" />
                </label>
    
                <div>App</div>
            </x-slot:brand>
    
            <x-slot:actions>
                <x-mary-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive />
                <x-mary-button label="Notifications" icon="o-bell" link="/notification" wire:navigate class="btn-ghost btn-sm" responsive />
            </x-slot:actions>
        </x-mary-nav>
        --}}

    <div class="bg-gradient-to-b from-green-200 to-white bg-opacity-45">
    
        <x-mary-nav fixed full-width x-data="{open: false}" class="text-blue-800 justify-self-center bg-transparent">
            {{-- Right side actions --}}
            <x-slot:actions>
                <x-mary-menu class="hidden md:static md:grid grid-flow-col  md:gap-12 activate-by-route">
                    <x-mary-menu-item title="Home" link="/" wire:navigate/>
                    <x-mary-menu-item title="Prescriptions" link="###"/>
                    <x-mary-menu-item title="About" link="###"/>
                    <x-mary-menu-item>
                        {{-- Brand --}}
                        <div class="absolute top-[-10px] left-0 h-[60px] w-[70px]">
                            <img class="" src="{{asset('site-imgs/healhithubLogo.png')}}" alt="evres-logo"/>
                        </div>
                    </x-mary-menu-item>
                    <x-mary-menu-item title="Alumni-Consultancy" link="###"/>

                    @if(auth()->user())

                    @else
                        <x-mary-button label="Login" link="login" responsive  wire:navigate 
                        class="border-solid border-[3px] bg-white border-blue-400  text-blue-400 rounded-3xl px-[20px] py-0 btn-ghost shadow-inner hover:text-white"/>
                        
                        <x-mary-button label="Sign-up" link="register" responsive  wire:navigate 
                        class="border-solid border-[3px] bg-white border-blue-400  text-blue-400 rounded-3xl px-[20px] py-0 btn-ghost shadow-inner hover:text-white"/>
                        
                        <x-mary-icon x-show="!open" x-on:click="open=!open" name="c-bars-3" 
                        class="w-[6vw] md:w-[3vw] cursor-pointer md:hidden"/>
                    @endif
                </x-mary-menu>
    
                <x-mary-menu x-show="open" x-on:click.outside="open = false"
                 class="absolute z-index-90 right-3 top-8 grid grid-flow-row 
                 w-[30vw] md:hidden">
                    <x-mary-menu-item title="Home" link="###"/>
                    <x-mary-menu-item title="Prescriptions" link="###"/>
                    <x-mary-menu-item title="About" link="###"/>
                    <x-mary-menu-item title="Alumni-Consultancy" link="###"/>
                    @if(auth()->user())

                    @else
                        <x-mary-menu-item title="Login" link="login"/>
                        <x-mary-menu-item title="Sign-up" link="signup"/>
                    @endif
                </x-mary-menu>
            </x-slot:actions>
            
        </x-mary-nav>  
    
    </div>
    
        {{-- The main content with `full-width` --}}
        <x-mary-main with-nav full-width>
    
            {{-- The `$slot` goes here --}}
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>
        </x-mary-main>
    
        {{--  TOAST area --}}
        <x-mary-toast />
    </body>
</html>
