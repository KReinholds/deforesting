<x-public-header />

@php
    $plans = [
        '30d' => ['label' => '30 dienu abonements', 'price' => '5.99€'],
        '6m'  => ['label' => '6 mēnešu abonements', 'price' => '9.99€'],
        '1y'  => ['label' => '12 mēnešu abonements', 'price' => '15.99€'],
    ];

    $selected = $plans[$plan] ?? null;
@endphp

@if ($selected)
        <div class="container mx-auto px-4 py-10 border border-degreenlight bg-white my-10 rounded-sm">
           

            <div class="grid md:grid-cols-3 gap-10 p-10">
                    <div class="flex flex-col justify-between col-span-2">
                        <h1 class="text-3xl font-normal text-dered uppercase">Izvēlētais abonements</h1>
                        <div>
                        <p class="text-xl text-degreenlight mb-2">{{ $selected['label'] }}</p>
                        <p class="text-sm text-gray-500 ">Izvēlētais abonements būs spēkā 6 (sešus) mēnešus no tā apmaksas brīža.</p>
                        </div>
                    </div>
                    
                    <div class="border-2 border-degreen rounded p-10 flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl text-degray font-normal uppercase mb-2 text-center">{{ $selected['label'] }}</h2>
                            <h2 class="text-3xl text-center text-degreenlight mt-10 mb-4">{{ $selected['price'] }}</h2>
                            {{-- <h2 class="text-xl text-degray font-normal uppercase mb-2 text-center">{{ $plan['label'] }}</h2>
                            <h2 class="text-3xl text-center text-degreenlight mt-10 mb-4">{{ $plan['price'] }}</p> --}}
                            {{-- <ul class="text-sm text-degray space-y-1 mb-6">
                                <li>✔️ Pilna pieeja pasūtījumiem</li>
                                <li>✔️ Iespēja iesniegt piedāvājumus</li>
                                <li>✔️ Atbalsts un redzamība platformā</li>
                            </ul> --}}
                        </div>
                        <div class="text-center">
                        {{-- <x-button class="justify-center" href="{{ route('subscription.confirm', ['plan' => $key]) }}">Izvēlēties</x-button> --}}
                        {{-- <a href="{{ route('subscription.confirm', ['plan' => $key]) }}"
                        class="text-center bg-degreen text-white py-2 px-4 rounded hover:bg-degreenlight transition">
                            Aktivizēt
                        </a> --}}
                    </div>
                    </div>
              
            </div>
            
        </div>

        <div class="container mx-auto mb-20">
            <div class="mb-10">
                <div class="flex flex-col gap-2 ml-10">
                    <div>
                      <input type="checkbox" id="gdpr" name="gdpr" required class="rounded border-degreen text-degreen focus:outline-none focus:ring-0">
                      <label for="gdpr" class="text-xs text-degray">
                        Es piekrītu savu datu apstrādei veidos un gadījumos, kā tas ir noteikts vietnes privātuma politikā un lietošanas noteikumos
                      </label>
                    </div>
                  <div class="">
                      <input type="checkbox" id="terms" name="terms" required class="rounded border-degreen text-degreen focus:outline-none focus:ring-0">
                      <label for="terms" class="text-xs text-degray">
                        Esmu iepazinies un piekrītu lietošanas noteikumiem
                      </label>
                  </div>
              </div>
            </div>
            <div class="text-center">
                <form method="POST" action="{{ route('subscription.activate', ['plan' => $plan]) }}">
                    @csrf
                    <x-primary-button type="submit">Veikt apmaksu</x-primary>
                    {{-- <button type="submit" class="bg-degreen text-white px-6 py-2 rounded">
                        Aktivizēt plānu
                    </button> --}}
                    </form>
            </div>
        
        </div>


@else
    <div class="container mx-auto px-4 py-10 text-center text-red-500">
        <p>Nederīgs plāns.</p>
    </div>
@endif

<x-footer />
