<x-public-header />

<div class="container mx-auto px-4 py-10 border border-degreenlight bg-white my-10 rounded-sm">
    <h1 class="text-3xl font-normal text-dered text-center pt-5 uppercase">izvēlēties abonementu</h1>

    <div class="grid md:grid-cols-3 gap-10 p-10">
        @foreach([
            '30d' => ['label' => '30 dienu abonements', 'price' => '5.99€'],
            '6m'  => ['label' => '6 mēnešu abonements', 'price' => '9.99€'],
            '1y'  => ['label' => '12 mēnešu abonements',    'price' => '15.99€'],
        ] as $key => $plan)
            <div class="border-2 border-degreen rounded p-10 flex flex-col justify-between">
                <div>
                    <img class="w-8 mb-5 justify-self-end" src="/img/alert-icon.svg" alt="">
                    <h2 class="text-xl text-degray font-normal uppercase mb-2 text-center">{{ $plan['label'] }}</h2>
                    <h2 class="text-3xl text-center text-degreenlight mt-10 mb-4">{{ $plan['price'] }}</p>
                    {{-- <ul class="text-sm text-degray space-y-1 mb-6">
                        <li>✔️ Pilna pieeja pasūtījumiem</li>
                        <li>✔️ Iespēja iesniegt piedāvājumus</li>
                        <li>✔️ Atbalsts un redzamība platformā</li>
                    </ul> --}}
                </div>
                <div class="text-center">
                <x-button class="justify-center" href="{{ route('subscription.confirm', ['plan' => $key]) }}">Izvēlēties</x-button>
                {{-- <a href="{{ route('subscription.confirm', ['plan' => $key]) }}"
                   class="text-center bg-degreen text-white py-2 px-4 rounded hover:bg-degreenlight transition">
                    Aktivizēt
                </a> --}}
            </div>
            </div>
        @endforeach
    </div>
</div>

<x-footer />
