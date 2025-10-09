<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Deforesting Admin Panel</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="flex bg-gray-100">

    {{-- Sidebar --}}
    <aside class="w-64 bg-degreen text-white min-h-screen p-6">
        <div class="mb-8">
           <img src="/img/logo-3.png" class="h-16" alt="Deforesting Logo" />
        </div>

        <nav class="space-y-4 uppercase">
            {{-- Sākums --}}
            @php $active = request()->routeIs('admin.dashboard'); @endphp
            <a href="{{ route('admin.dashboard') }}"
               class="block {{ $active ? 'text-white' : 'text-degreenlight' }} hover:text-white"
               @if($active) aria-current="page" @endif>
                Sākums
            </a>

            {{-- Kategorijas (single page) --}}
            @php $active = request()->routeIs('admin.categories') || request()->is('admin/categories*'); @endphp
            <a href="{{ route('admin.categories') }}"
            class="block {{ $active ? 'text-white' : 'text-degreenlight' }} hover:text-white"
            @if($active) aria-current="page" @endif>
                Kategorijas
            </a>

            {{-- Pasūtījumi (wire up later when route exists) --}}
            @php $active = request()->routeIs('admin.orders') || request()->is('admin/orders*'); @endphp
            <a href="{{ route('admin.orders') }}"
            class="block {{ $active ? 'text-white' : 'text-degreenlight' }} hover:text-white"
            @if($active) aria-current="page" @endif>
                Pasūtījumi
            </a>

            {{-- Piedāvājumi --}}
            @php $active = request()->routeIs('admin.offers.*') || request()->is('admin/offers*'); @endphp
            <a href="#"
               class="block {{ $active ? 'text-white' : 'text-degreenlight' }} hover:text-white"
               @if($active) aria-current="page" @endif>
                Piedāvājumi
            </a>

            {{-- Lietotāji --}}
            @php $active = request()->routeIs('admin.users.*') || request()->is('admin/users*'); @endphp
            <a href="{{ route('admin.users') }}"
            class="block {{ request()->is('admin/users*') ? 'text-white' : 'text-degreenlight' }} hover:text-white">
            Lietotāji
            </a>

            {{-- Ziņapmaiņa --}}
            @php $active = request()->routeIs('admin.messages.*') || request()->is('admin/messages*'); @endphp
            <a href="#"
               class="block {{ $active ? 'text-white' : 'text-degreenlight' }} hover:text-white"
               @if($active) aria-current="page" @endif>
                Ziņapmaiņa
            </a>

            {{-- Atsauksmes --}}
            @php $active = request()->routeIs('admin.reviews.*') || request()->is('admin/reviews*'); @endphp
            <a href="#"
               class="block {{ $active ? 'text-white' : 'text-degreenlight' }} hover:text-white"
               @if($active) aria-current="page" @endif>
                Atsauksmes
            </a>

            {{-- Definētās ziņas --}}
            @php $active = request()->routeIs('admin.defined-messages.*') || request()->is('admin/defined-messages*'); @endphp
            <a href="#"
               class="block {{ $active ? 'text-white' : 'text-degreenlight' }} hover:text-white"
               @if($active) aria-current="page" @endif>
                Definētās ziņas
            </a>
        </nav>
    </aside>

    {{-- Main content --}}
    <main class="flex-1 p-8">
        <header class="flex justify-end items-center mb-8">
            <div class="flex items-center gap-10">
               <p class="text-lg text-degray uppercase">
                    <span>{{ auth()->user()->name }}</span>
                    {{ auth()->user()->surname }}
                </p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="p-0 bg-transparent border-0 cursor-pointer"
                            aria-label="Logout"
                            title="Logout">
                        <img src="/img/admin-logout.svg" alt="Logout" class="h-10" />
                    </button>
                </form>
            </div>
        </header>

        @yield('content')
    </main>
</body>
</html>
