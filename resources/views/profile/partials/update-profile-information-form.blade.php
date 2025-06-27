<section>
    <header class="flex items-center justify-between gap-4">
        <p class="mt-1 text-sm text-gray-600">
            Lietotāja identifikācijas Nr. 
        </p>
        <p class="mt-1 text-sm text-gray-600 font-bold">
            {{ auth()->user()->id ?? 'Not specified' }} 
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    @auth
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Vārds')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', auth()->user()->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="surname" :value="__('Uzvārds')" />
            <x-text-input id="name" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', auth()->user()->surname)" required autofocus autocomplete="surname" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div>

        <!-- ✅ Company-specific fields -->
        @if (auth()->user()->client_type === 'company')
        <div>
            <x-input-label for="company_name" :value="__('Uzņēmuma nosaukums')" />
            <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name', auth()->user()->company_name)" required autofocus autocomplete="company_name" />
            <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
        </div>

        <div>
            <x-input-label for="company_reg_no" :value="__('Reģistrācijas Nr.')" />
            <x-text-input id="company_reg_no" name="company_reg_no" type="text"
                        :value="old('company_reg_no', auth()->user()->company_reg_no)" required />
            <x-input-error :messages="$errors->get('company_reg_no')" />
        </div>
        @endif

        <div>
            <x-input-label for="phone" :value="__('Tālruņa Nr.')" />
            <x-text-input id="name" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', auth()->user()->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('E-pasts')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', auth()->user()->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center justify-end gap-4">
           
            <p class="flex items-center text-lg text-degray text-right">
                <button class="uppercase text-degreen"><i>Labot profila informāciju</i>
                <img class="h-5 ml-1 inline" src="/img/edit.svg" alt=""></a>
            </p>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Informācija saglabāta') }}</p>
            @endif
        </div>
    </form>
    @endauth
</section>
