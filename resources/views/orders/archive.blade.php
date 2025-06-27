<x-public-header />
<x-client.submenu />

<div class="container mx-auto py-6">
    <div class="flex flex-col md:flex-row align-center px-4 gap-1">
        <div class="">
            <h3 class="text-3xl text-degreenlight uppercase text-right">
                {{ auth()->user()->name }} {{ auth()->user()->surname }}
            </h3>
        </div>
        <div>
            <img class="w-12 -mt-2" src="img/arrow-degreenlight-low.svg" alt="">
        </div> 
    </div>
    <div class="flex flex-col md:flex-col px-4 pt-10 pb-5  gap-5">
      <p class="text-lg text-degreen">
        <a href="{{ route('orders.create-order') }}">IZVEIDOT PASŪTĪJUMU</a>
      </p>
      <p class="text-lg text-degreen">
        <a href="/client/orders">AKTĪVIE PASŪTĪJUMI</a>
      </p>
      <p class="text-lg text-degreenlight">
        <a href="{{ route('orders.archive') }}">PASŪTĪJUMU ARHĪVS</a>
      </p>
  </div>
  </div>

  {{-- <div class="w-full bg-gray-100">
    <div class="container mx-auto pb-10 px-4">
        <div class="flex justify-end mb-4">
            <p class="text-sm text-degray font-semibold uppercase">
                Kopā piedāvājumi: {{ $orders->sum('offers_count') }}
            </p>
        </div>

        @forelse ($orders as $order)
            <div class="bg-white rounded-sm border border-degreen px-6 py-4 mb-4 flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center gap-4">
                    <img src="/img/zemes-raksana.png" alt="Order image" class="w-28 h-20 object-cover rounded-sm" />

                    <div class="text-left">
                        <p class="text-xs text-degray">ID Nr. {{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                        <h3 class="text-degreen text-lg font-bold uppercase">{{ $order->title }}</h3>
                        <p class="text-sm text-degray">{{ $order->user->name }}</p>
                        <div class="flex items-center gap-1 text-sm text-degray">
                            <img src="/img/location.svg" class="w-4 h-4" />
                            {{ $order->pilseta }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-center justify-center mt-4 md:mt-0">
                    <a href="{{ route('orders.show', $order->id) }}#offers"
                       class="bg-degreen text-white px-6 py-2 text-sm rounded uppercase font-semibold hover:bg-green-700 transition">
                        Skatīt Piedāvājumus: <span class="{{ $order->offers_count > 0 ? 'text-green-100' : 'text-red-100' }}">
                            {{ $order->offers_count }}
                        </span>
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-degray mt-10">Nav arhivētu pasūtījumu.</p>
        @endforelse

        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    </div>
</div> --}}


<x-footer />
