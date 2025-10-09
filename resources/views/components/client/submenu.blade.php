<div class="container mx-auto py-6">
    @php
        use Illuminate\Support\Str;

        // Build links with explicit "active" rules
        $links = [
            [
                'label'  => 'Mans profils',
                'href'   => 'dashboard',
                'active' => request()->is('dashboard*'),
            ],
            [
                'label'  => 'Mani pasūtījumi',
                'href'   => 'client/orders',
                // Active on client/orders AND orders/archive
                'active' => request()->is('client/orders*') || request()->is('orders/archive*'),
            ],
            [
                'label'  => 'Mani piedāvājumi',
                'href'   => 'client/offers',
                'active' => request()->is('client/offers*'),
            ],
            [
                'label'  => 'Mans abonements',
                'href'   => 'client/subscription',
                'active' => request()->is('client/subscription*'),
            ],
        ];
    @endphp

    <div class="flex flex-col md:flex-row px-4 h-10 gap-1">
        @foreach ($links as $link)
            @php $isActive = $link['active']; @endphp

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
