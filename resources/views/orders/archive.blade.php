<x-public-header/>

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

  <div class="flex flex-col md:flex-col px-4 pt-10 pb-5 gap-5">
    <p class="text-lg text-degreen">
      <a href="{{ route('orders.create-order') }}">IZVEIDOT PASŪTĪJUMU</a>
    </p>
    <p class="text-lg text-degreen">
      <a href="{{ route('client.orders') }}">AKTĪVIE PASŪTĪJUMI</a>
    </p>
    <p class="text-lg text-degreenlight">
      <a href="{{ route('orders.archive') }}">PASŪTĪJUMU ARHĪVS</a>
    </p>
  </div>
</div>

<div class="w-full bg-gray-100">
  <div class="container mx-auto pb-10 px-4">

    @forelse ($orders as $order)
      <div class="flex border border-degreen rounded-sm p-1 mb-1">
        {{-- Left: meta --}}
        <div class="basis-full md:basis-1/6 self-center justify-items-center text-center">
          <p class="text-degray">
            ID Nr. {{ $order->id }}
            <br>
            {{ $order->created_at->format('d.m.Y H:i') }}
          </p>

          @php
            $statusClass = match($order->status) {
              'approved'  => 'bg-green-100 text-green-800',
              'completed' => 'bg-gray-100 text-gray-800',
              'rejected'  => 'bg-red-100 text-red-800',
              default     => 'bg-yellow-100 text-yellow-800',
            };
          @endphp

          <span class="inline-block px-2 py-1 text-xs font-semibold rounded {{ $statusClass }}">
            {{ ucfirst($order->status) }}
          </span>
        </div>

        {{-- Thumbnail --}}
        <div class="basis-full md:basis-1/6">
          <img class="object-cover w-48 h-32 md:h-32 md:w-48 rounded-sm" src="/img/zemes-raksana.png" alt="">
        </div>

        {{-- Title / location --}}
        <div class="basis-full md:basis-3/6 self-center text-left pl-4">
          <p class="text-lg text-degreen mb-2">{{ $order->title }}</p>
          <p class="mb-2 text-degray">
            {{ auth()->user()->name }} {{ auth()->user()->surname }}
            <br>
            Kategorija: {{ $order->category->name ?? '-' }}
          </p>

          <div class="flex items-center space-x-6">
            <img class="w-10" src="/img/location.svg" alt="">
            <p class="text-degray">{{ $order->pilseta }}</p>
          </div>
        </div>

        {{-- Actions / status note --}}
        <div class="basis-full md:basis-2/6 self-center text-center">
          <div class="flex text-center justify-center">
            <p class="text-lg text-degreen mr-1">
              <a href="{{ route('orders.show', $order->id) }}" class="text-degreen hover:underline uppercase">
                Skatīt
              </a>
            </p>
            <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
          </div>

          @if($order->status === 'completed')
            <p class="text-degray">Pabeigts</p>
          @else
            <p class="text-red-600">
              Termiņš beidzies
              <span class="block text-degray text-xs">
                (aktīvs līdz {{ $order->created_at->copy()->addWeeks(2)->format('d.m.Y H:i') }})
              </span>
            </p>
          @endif
        </div>

        {{-- Offers button --}}
        <div class="basis-full md:basis-2/6 self-center text-center">
          <a href="{{ route('orders.show', $order->id) }}#offers"
             class="inline-flex items-center gap-2 px-4 py-2 border bg-degreenlight border-degreen text-white rounded transition text-sm font-semibold uppercase">
            Skatīt Piedāvājumus:
            <span class="{{ $order->offers_count > 0 ? 'text-green-600' : 'text-red-600' }}">
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

    {{-- (Optional) Static pagination sample below can be removed; Laravel pagination above is enough --}}
    {{-- 
    <nav class="mt-10" aria-label="Page navigation example">
      ...
    </nav>
    --}}
  </div>
</div>

{{-- Footer --}}
<x-footer />
