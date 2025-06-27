<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>
<body class="font-sans bg-gray-100">
{{-- Navbar --}}
<div class="container mx-auto">
<nav class="border-gray-200 px-4 border-b border-green-500">
    <div class="max-w-(--breakpoint-xl) flex flex-wrap items-end justify-between mx-auto py-6">
    <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="/img/logo-3.png" class="h-20" alt="Deforesting Logo" />
    </a>
    <div class="hidden md:block flex items-end md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      @auth
          <a href="/dashboard">
              <div class="w-12 h-12 rounded-full bg-degreen text-white flex items-center justify-center font-semibold">
                  {{ strtoupper(substr(auth()->user()->name, 0, 1) . substr(auth()->user()->surname, 0, 1)) }}
              </div>
          </a>
      @else
          <a href="/login">
              <img class="w-12 h-12" src="/img/login.png" alt="Login">
          </a>
      @endauth
  </div>
    <!-- Dropdown menu -->
    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-12 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-hidden focus:ring-2 focus:ring-gray-200" aria-controls="navbar-user" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <img class="w-12" src="/img/menu-icon.png" alt="Login">
  </button>
    <div class="items-end justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-normal p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
        <li>
          <a href="{{ url('/') }}" class="block py-2 px-3 text-degray rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-degreenlight md:p-0  {{ request()->is('/') ? 'md:text-degreen md:font-semibold ' : ''}}" aria-current="page">SĀKUMS</a>
        </li>
        <li>
          <a href="{{ url('/about-us') }}" class="block py-2 px-3 text-degray rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-degreenlight md:p-0 {{ request()->is('about-us') ? 'md:text-degreen md:font-semibold ' : ''}}">PAR MUMS</a>
        </li>
        <li>
          <a href="{{ url('/services') }}" class="block py-2 px-3 text-degray rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-degreenlight md:p-0 {{ request()->is('services') ? 'md:text-degreen md:font-semibold ' : ''}}">PAKALPOJUMI</a>
        </li>
        <li>
          <a href="{{ url('/orders') }}" class="block py-2 px-3 text-degray rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-degreenlight md:p-0 {{ request()->is('orders') ? 'md:text-degreen md:font-semibold ' : ''}}">PASŪTĪJUMI</a>
        </li>
        {{-- <li>
          <a href="{{ url('/aktualitates') }}" class="block py-2 px-3 text-degray rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-degreenlight md:p-0 {{ request()->is('aktualitates') ? 'md:text-degreen md:font-semibold ' : ''}}">AKTUALITĀTES</a>
        </li> --}}
        <li>
          <a href="{{ url('/kontakti') }}" class="block py-2 px-3 text-degray rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-degreenlight md:p-0 {{ request()->is('kontakti') ? 'md:text-degreen md:font-semibold ' : ''}}">KONTAKTI</a>
        </li>
      </ul>
    </div>
    </div>
</nav>
  {{-- Navbar end --}}
</div>