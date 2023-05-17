<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Code Questions') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Open+Sans:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm">
        <header class="flex items-center justify-between px-8 py-4">
            <a href="#"><img src="{{ asset('storage/img/logo.svg') }}" alt="logo"></a>
            <div class="flex items-center">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <a
                            href="{{  route('logout') }}"
                            onclick="
                                event.preventDefault();
                                this.closest('form').submit();
                            ">
                            {{ __('Log out') }}
                        </a>
                    </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <a href="#">
                    <img
                        src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp"
                        alt="avatar"
                        class="w-10 h-10 rounded-full"
                    >
                </a>
            </div>
        </header>

        <main class="container mx-auto flex max-w-custom">
            <div class="w-70 mr-5">Amet illo neque aliquam dignissimos obcaecati Reprehenderit eveniet sit delectus consequuntur quibusdam. Sequi tenetur cumque aliquam illo omnis. Aliquid magnam eligendi nobis cumque ipsa quod odit. Sint iste tenetur alias ab excepturi. Illum aliquid nam provident deserunt distinctio voluptates? Ab fugiat explicabo vitae aliquam reiciendis repellendus voluptatibus? Odit totam sint soluta dicta culpa. Inventore earum itaque in dignissimos odit. Et quibusdam beatae deleniti provident ea. Officia illo quis iure quae animi! Dolor ea magnam nisi officia suscipit at Aperiam veritatis unde dolorum doloremque ipsam magni Fugit molestiae blanditiis architecto numquam quo Eveniet animi consectetur vitae maxime nobis! Ipsa sed cupiditate?</div>
            <div class="w-175">
                <nav class="flex items-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="border-b-4 pb-3 border-blue">All Ideas (87)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Considering (6)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">In Progress (1)</a></li>
                    </ul>
                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Implementing</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Closed (55)</a></li>
                    </ul>
                </nav>
                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </body>
</html>
