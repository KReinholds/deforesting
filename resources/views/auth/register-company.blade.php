<x-public-header/>
<div class="flex flex-col sm:justify-center py-10 md:py-20 px-4 items-center bg-gray-100">
<div class="flex w-full sm:max-w-md px-6 py-4 mx-auto justify-center gap-10">
    <x-button-link href="/login" variant="secondary" :arrow="false" class="text-xl ">Ienākt</x-button>
    <x-button-link href="/register/individual" variant="secondary" :arrow="false" class="text-xl border-degreenlight text-degreenlight">Reģistrēties</x-button>

</div>
<section class="container mx-auto py-10 md:py-20 px-4 bg-white">
    <div class="w-full sm:max-w-3xl px-6 py-4 mx-auto">

        <div class="flex flex-row justify-around items-center">
            <div class="">
              <input type="checkbox" id="" name="individual"  class="rounded border-degreen text-degreen focus:outline-none focus:ring-0" onclick="window.location.href='/register/individual'">
              <label for="individual" class="ml-4 text-base text-degreen uppercase" onclick="window.location.href='/register/individual'">
                  Fiziska persona
              </label>
            </div>
          <div>
            <input type="checkbox" id="terms" name="company" checked disabled class="rounded border-degreen text-degreen focus:outline-none focus:ring-0">
            <label for="company"
                    class="ml-4 text-base text-degreenlight uppercase cursor-pointer">
                Juridiska persona
            </label>
          </div>
      </div>

        <form method="POST" action="{{ route('register.company') }}" class="max-w-4xl mx-auto p-6 bg-white space-y-6">
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            @csrf
        
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
                <!-- First Name: Always first -->
                <div class="order-1 md:order-none">
                    <x-input-label for="name" :value="__('Vārds')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <!-- Last Name: Appears second on mobile -->
                <div class="order-2 md:order-none">
                    <x-input-label for="surname" :value="__('Uzvārds')" />
                    <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
                    <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                </div>

                <!-- Company Name: Always first -->
                <div class="order-3 md:order-none">
                    <x-input-label for="company_name" :value="__('Uzņēmuma nosaukums')" />
                        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="company_name" />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                </div>

                <!-- Company reg. no.: Always first -->
                <div class="order-3 md:order-none">
                    <x-input-label for="company_reg_no" :value="__('Reģistrācijas Nr.')" />
                        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_reg_no" :value="old('company_reg_no')" required autofocus autocomplete="company_reg_no" />
                        <x-input-error :messages="$errors->get('company_reg_no')" class="mt-2" />
                </div>
        
                <!-- Email: Appears third on mobile -->
                <div class="order-3 md:order-none">
                    <x-input-label for="email" :value="__('E-pasts')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Phone: Appears fourth on mobile -->
                <div class="order-4 md:order-none">
                    <x-input-label for="phone" :value="__('Tālruņa numurs')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <!-- Pswd: Appears fifth on mobile -->
                <div class="order-5 md:order-none">
                    <x-input-label for="password" :value="__('Parole')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <p class="italic text-xs text-degray mt-1">Parolei jābūt vismaz 8 simbolu garai un jāsatur vismaz 1 lielais burts un vismaz 1 cipars </p>
                </div>
                <!-- Confirm pswd: Appears fourth on mobile -->
                <div class="order-6 md:order-none">
                    <x-input-label for="password_confirmation" :value="__('Apstipriniet paroli')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        <p class="italic text-xs text-degray mt-1">Lūdzam paroli ievadīt atkārtoti</p>
                </div>
        
            </div>
            <div class="flex flex-col gap-2">
                  <div>
                    <input type="checkbox" id="gdpr" name="gdpr" required class="rounded border-degreen text-degreen focus:outline-none focus:ring-0">
                    <label for="gdpr" class="text-xs text-degray">
                        Es piekrītu savu datu apstrādei veidos un gadījumos, kā tas ir noteikts vietnes privātuma politikā un lietošanas noteikumos
                    </label>
            </div>
                <div>
                    <input type="checkbox" id="terms" name="terms" required class="rounded border-degreen text-degreen focus:outline-none focus:ring-0">
                    <label for="terms" class="text-xs text-degray">
                        Esmu iepazinies ar lietošanas noteikumiem
                    </label>
                    
                </div>
            </div>
            
            <div class="flex flex-col items-center justify-center gap-4">
                  <div>
                <x-primary-button class="mt-5">
                    {{ __('Izveidot profilu') }}
                </x-primary-button>
            </div>
                <div>
                    <a href="/" class="text-degreen border border-degreen bg-transparent font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-center uppercase">
                        Atgriezties sākumlapā
                        <img class="w-7" src="/img/arrow-green.png" alt="">
                      </a>
            </div>
            </div>
        </form>
        
    
  
    
</div>
</section>
</div>
<x-footer/>
