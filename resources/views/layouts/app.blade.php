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
                <x-mary-menu class="hidden md:static md:grid grid-flow-col  md:gap-12">
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
    
            {{-- This is a sidebar that works also as a drawer on small screens --}}
            {{-- Notice the `main-drawer` reference here --}}
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200 bg-gradient-to-b from-white to-green-200  bg-opacity-25 text-blue-800">
    
                {{-- User --}}
                @if($user = auth()->user())
                    <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="pt-2">
                        <x-slot:actions>
                            <x-mary-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-mary-list-item>
    
                    <x-mary-menu-separator />
                @endif
    
                {{-- Activates the menu item when a route matches the `link` property --}}
                <x-mary-menu activate-by-route>
                    @can('SuperAdmin')
                    <x-mary-menu-sub title="Admin" icon="o-envelope">
                        <x-mary-menu-item title="Dashboard" icon="o-home" link="/dashboard/admin" wire:navigate />
                        <x-mary-menu-item title="Show Permissons" icon="o-envelope" link="/dashboard/admin/permissions" wire:navigate/>
                        <x-mary-menu-item title="Add Permisson" icon="o-envelope" link="/dashboard/admin/add-permission" wire:navigate />
                        <x-mary-menu-item title="Add Roles" icon="o-envelope" link="/dashboard/admin/add-role" wire:navigate />
                        <x-mary-menu-item title="Show Roles" icon="o-envelope" link="/dashboard/admin/roles" wire:navigate />
                        <x-mary-menu-item title="Assign Roles" icon="o-envelope" link="/dashboard/admin/assign-role" wire:navigate/>
                        <x-mary-menu-item title="Add Admin" icon="o-envelope"  link="/dashboard/admin/add-admin" wire:navigate />
                    </x-mary-menu-sub>
                    @endcan
                    @can('Product.Create')
                    <x-mary-menu-sub title="Product" icon="o-envelope">
                        <x-mary-menu-item title="Dashboard" icon="o-home" link="###" wire:navigate />
                        <x-mary-menu-item title="Product Proposal" icon="o-envelope" link="/dashboard/product/add-proposal" wire:navigate/>
                        <x-mary-menu-item title="Initiated Project" icon="o-envelope" link="/dashboard/product/initiated-projects" wire:navigate />
                        <x-mary-menu-item title="Publishing" icon="o-envelope" link="/dashboard/product/publishing" wire:navigate />
                    </x-mary-menu-sub>
                    @endcan
                    @can('Product.Approve')
                    <x-mary-menu-sub title="HITAdmin" icon="o-envelope">
                        <x-mary-menu-item title="Dashboard" icon="o-home" link="###" wire:navigate />
                        <x-mary-menu-item title="Proposals" icon="o-envelope" link="/dashboard/admin/show-proposals" wire:navigate/>
                        <x-mary-menu-item title="Products" icon="o-envelope" link="/dashboard/admin/show-projects" wire:navigate />
                    </x-mary-menu-sub>
                    @endcan

                </x-mary-menu>
            </x-slot:sidebar>

    
            {{-- The `$slot` goes here --}}
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>
        </x-mary-main>
    
        {{--  TOAST area --}}
        <x-mary-toast />
    </body>
</html>
