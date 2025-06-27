<x-public-header/>
<div class="flex flex-col sm:justify-center py-10 md:py-20 px-4 items-center bg-gray-100">
    <div class="flex w-full sm:max-w-md px-6 py-4 mx-auto justify-center gap-10">
        <x-button-link href="/login" variant="secondary" :arrow="false" class="text-xl border-degreenlight text-degreenlight">Ienākt</x-button>
        <x-button-link href="/register/individual" variant="secondary" :arrow="false" class="text-xl">Reģistrēties</x-button>
    
    </div>
    
    <section class="container mx-auto py-10 md:py-20 px-4 bg-white">
    <div class="w-full sm:max-w-md px-6 py-4 mx-auto">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-pasts')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Parole')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        
        <div class="flex items-center justify-between gap-4  mt-10">
            <x-primary-button class="">
                {{ __('Ienākt') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="text-degreen border border-degreen bg-transparent font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-center uppercase" href="{{ route('password.request') }}">
                    {{ __('Vai aizmirsāt paroli?') }}
                </a>
            @endif

            
        </div>
    </form>
</div>
    </section>
</div>
<x-footer />