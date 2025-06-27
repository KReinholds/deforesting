
<div class="container mx-auto py-6">
    @php
    $current = request()->path();
@endphp

<div class="flex flex-col md:flex-row px-4 h-10 gap-1">
    @php
        $links = [
            ['label' => 'Mans profils', 'href' => 'dashboard'],
            ['label' => 'Mani pasūtījumi', 'href' => 'client/orders'],
            ['label' => 'Mani piedāvājumi', 'href' => 'client/offers'],
            ['label' => 'Mans abonements', 'href' => 'client/subscription'],
        ];
    @endphp

    @foreach ($links as $link)
        @php
            $isActive = Str::startsWith($current, $link['href']);
        @endphp

        <x-button-link
            href="/{{ $link['href'] }}"
            variant="custom"
            :arrow="true"
            arrowColor="{{ $isActive ? 'white' : 'green' }}"
            class="w-full normal-case justify-between text-[13px] font-[400]
                {{ $isActive 
                    ? 'bg-degreen text-white' 
                    : 'bg-white text-degreen border border-degreen hover:border-degreenlight' }}">
            {{ $link['label'] }}
        </x-button-link>
    @endforeach

    <x-button-link
        href="{{ route('logout') }}"
        variant="custom"
        :arrow="true"
        arrowColor="green"
        class="w-full normal-case justify-between text-[13px] font-[400] bg-white text-degreen border border-degreen hover:border-dered"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Iziet
    </x-button-link>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
        @csrf
    </form>
</div>

</div>
