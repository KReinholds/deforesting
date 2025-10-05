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
        <a href="{{ route('admin.dashboard') }}"
           class="block {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-degreenlight' }} hover:text-white">
            Sākums
        </a>
        <a href="#"
           class="block {{ request()->is('admin/categories*') ? 'text-white' : 'text-degreenlight' }} hover:text-white">
            Kategorijas
        </a>
        <a href="#"
           class="block {{ request()->is('admin/orders*') ? 'text-white' : 'text-degreenlight' }} hover:text-white">
            Pasūtījumi
        </a>
        <a href="#"
           class="block {{ request()->is('admin/offers*') ? 'text-white' : 'text-degreenlight' }} hover:text-white">
            Piedāvājumi
        </a>
        <a href="#"
           class="block {{ request()->is('admin/users*') ? 'text-white' : 'text-degreenlight' }} hover:text-white">
            Lietotāji
        </a>
        <a href="#"
           class="block {{ request()->is('admin/messages*') ? 'text-white' : 'text-degreenlight' }} hover:text-white">
            Ziņapmaiņa
        </a>
        <a href="#"
           class="block {{ request()->is('admin/reviews*') ? 'text-white' : 'text-degreenlight' }} hover:text-white">
            Atsauksmes
        </a>
        <a href="#"
           class="block {{ request()->is('admin/defined-messages*') ? 'text-white' : 'text-degreenlight' }} hover:text-white">
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
