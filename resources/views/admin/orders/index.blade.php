{{-- resources/views/admin/orders/index.blade.php --}}
@extends('layouts.admin')

@section('content')
  <p class="text-lg text-degreenlight uppercase mb-5">
    Pasūtījumi mājas lapā:
  </p>

  {{-- Category summary list (green = active, red = total) --}}
  <div class="">
    <div class="divide-y divide-gray-100">
      @forelse($categories as $cat)
        @php
          $isSelected = (int)request('category') === (int)$cat->id;
        @endphp

        <div class="flex items-baseline justify-between py-1">
          <div class="text-[14px] tracking-wide text-degreen">
            <a href="{{ route('admin.orders', ['category' => $cat->id, 'show' => request('show','all')]) }}"
               class="hover:underline {{ $isSelected ? 'font-semibold text-degreenlight' : '' }}">
              {{ strtoupper($cat->name) }}
            </a>
          </div>

          <div class="flex items-baseline gap-2 tabular-nums">
            <span class="text-degreenlight font-medium">{{ $cat->active_orders_count }}</span>
            <span class="text-gray-400">/</span>
            <span class="text-red-500 font-medium">{{ $cat->total_orders_count }}</span>
          </div>
        </div>
      @empty
        <div class="px-4 py-6 text-gray-500">Nav kategoriju.</div>
      @endforelse
    </div>
  </div>

  <div class="mt-4">
    {{ $categories->links() }}
  </div>

  {{-- Orders list for selected category --}}
  @if($selectedCategory)
    <div class="mt-10">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-degreen text-xl font-semibold uppercase">
          {{ strtoupper($selectedCategory->name) }}
        </h2>

        {{-- Toggle Active / All --}}
        <div class="flex items-center gap-2 text-sm">
          <a href="{{ route('admin.orders', ['category' => $selectedCategoryId, 'show' => 'active']) }}"
             class="px-3 py-1 rounded border
               {{ $show === 'active'
                    ? 'bg-degreen text-white border-degreen'
                    : 'bg-white text-degreen border-degreen hover:border-degreenlight' }}">
            Aktīvie
          </a>
          <a href="{{ route('admin.orders', ['category' => $selectedCategoryId, 'show' => 'all']) }}"
             class="px-3 py-1 rounded border
               {{ $show === 'all'
                    ? 'bg-degreen text-white border-degreen'
                    : 'bg-white text-degreen border-degreen hover:border-degreenlight' }}">
            Visi
          </a>
        </div>
      </div>

      @forelse($orders as $order)
        <div class="flex border border-degreen rounded-sm p-1 mb-1">
          {{-- Left: meta --}}
          <div class="basis-full md:basis-1/6 self-center justify-items-center text-center">
              <p class="text-degray">
            ID Nr. {{ $order->id }}<br>
            {{ $order->created_at->format('d.m.Y H:i') }}
            </p>

            @php
            $statusClass = match($order->status) {
                'approved'  => 'bg-green-100 text-green-800',
                'archived'  => 'bg-gray-100 text-gray-800',   // added
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
                {{ $order->user->name ?? '' }} {{ $order->user->surname ?? '' }}
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
                <a href="{{ route('orders.show', $order->id) }}?embed=1&back={{ urlencode(request()->fullUrl()) }}"
                class="text-degreen hover:underline uppercase">
                Skatīt
                </a>
              </p>
              <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
            </div>

            @php
              $activeUntil = $order->created_at->copy()->addWeeks(2);
              $isActive    = $order->status !== 'completed' && now()->lt($activeUntil);
            @endphp

            @if($isActive)
              <p class="text-degray">
                Aktīvs līdz {{ $activeUntil->format('d.m.Y H:i') }}
              </p>
            @else
              @php
                $activeUntil = $order->created_at->copy()->addWeeks(2);
                @endphp

                @if(in_array($order->status, ['archived','completed']))
                <p class="text-red-600">Termiņš beidzies</p>
                @else
                <p class="text-degray">Aktīvs līdz {{ $activeUntil->format('d.m.Y H:i') }}</p>
                @endif
            @endif
          </div>

          {{-- Offers button --}}
          <div class="basis-full md:basis-2/6 self-center text-center">
            <a href="{{ route('orders.show', $order->id) }}?embed=1&back={{ urlencode(request()->fullUrl()) }}#offers"
            class="inline-flex items-center gap-2 px-4 py-2 border bg-degreenlight border-degreen text-white rounded transition text-sm font-semibold uppercase">
            Skatīt Piedāvājumus:
            <span class="{{ $order->offers_count > 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $order->offers_count }}
            </span>
            </a>
          </div>
        </div>
      @empty
        <p class="text-degray">Šajā kategorijā nav pasūtījumu.</p>
      @endforelse

      @if($orders)
        <div class="mt-6">
          {{ $orders->links() }}
        </div>
      @endif
    </div>
  @endif
@endsection
