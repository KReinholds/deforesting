{{-- resources/views/orders/show-order.blade.php --}}

{{-- Header/Submenu only when NOT embedded --}}

  <x-public-header />


<div x-data="{ showForm: false }" class="container mx-auto mb-20 scroll-smooth">

  @if(!request()->boolean('embed'))
    <x-client.submenu />
  @else
    {{-- Back link for admin embed mode --}}
     <div class="basis-full md:basis-2/6 self-center text-center pt-8 px-4">
            <div class="flex text-center justify-start">
              <p class="text-lg text-degreen mr-1">
            <a href="{{ request('back') ?: route('admin.orders') }}"
            class="text-degreen hover:underline uppercase">
            Atpakaļ uz Admin pasūtījumiem
            </a>
        
        </p>
        <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
    </div>
    </div>
  @endif

  {{-- Admin info card in Show orders --}}
  @php $isAdmin = auth()->check() && auth()->user()->is_admin; @endphp
@if($isAdmin)
  @php
    $until = isset($activeUntil) ? $activeUntil : $order->created_at->copy()->addWeeks(2);
  @endphp

  <div class="border border-degreen rounded-sm px-6 py-4 mx-4 bg-white">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      {{-- Left: Active-until text --}}
      <p class="text-debrown">
        Pasūtījums aktīvs līdz {{ $until->format('d.m.Y') }}.
      </p>

      {{-- Middle: action buttons --}}
      <div class="flex items-center gap-4">
        @if($order->attachments->count() ?? false)
          <a href="{{ route('admin.orders.documents.download', $order) }}"
             class="inline-flex items-center px-4 py-2 border border-degreen rounded text-degreen hover:bg-degreen/5">
            LEJUPLĀDĒT DOKUMENTUS
          </a>
        @endif

        <button type="button"
                onclick="window.print()"
                class="inline-flex items-center px-4 py-2 border border-degreen rounded text-degreen hover:bg-degreen/5">
          IZDRUKĀT
        </button>

        <form method="POST" action="{{ route('admin.orders.close', $order) }}">
          @csrf @method('PATCH')
          <button type="submit"
                  class="inline-flex items-center px-4 py-2 border border-degreen rounded text-degreen hover:bg-degreen/5">
            ARHIVĒT
            <img src="/img/arrow-green.png" class="h-4 ml-2" alt="">
          </button>
        </form>
      </div>

      {{-- Right: delete --}}
      <form method="POST"
            action="{{ route('admin.orders.destroy', $order) }}"
            onsubmit="return confirm('Dzēst šo pasūtījumu? Šī darbība nav atgriezeniska.');"
            class="md:ml-auto">
        @csrf @method('DELETE')
        <button type="submit" class="inline-flex items-center text-dered hover:underline">
          DZĒST PASŪTĪJUMU
          <img src="/img/trash.svg" class="h-4 ml-2" alt="">
        </button>
      </form>
    </div>
  </div>
  <br>
@endif
 {{-- end - Admin info card in Show orders --}}


  <div class="px-4">
    {{-- Offer Info --}}
    <h1 class="text-degray text-5xl font-normal my-5 uppercase">
      {{ $order->title }}
    </h1>
    
    <div class="flex flex-row md:flex-row border border-degreen rounded-sm gap-10 py-10 px-10 mb-10 bg-white">
      <div class="w-1/2 md:w-1/2">
        <img class="w-full rounded-sm mb-10" src="/img/atmezosana-23.jpg" alt="">
        <p class="text-base text-degray">
          {{ $order->description }}
        </p>
      </div>

      <div class="w-1/2 md:w-1/2">
        <h3 class="text-xl text-degray mb-10">
          <b>KATEGORIJA:</b> <i>{{ $order->category->name ?? '-' }}</i>
        </h3>

        <h2 class="text-3xl text-degreen mb-4">{{ $order->title }}</h2>

        <p class="text-base text-degray mb-4">
          ID Nr. <b>{{ $order->id }}</b><br>
          @php
            $statusClass = match($order->status) {
                'approved'  => 'bg-green-100 text-green-800',
                'archived'  => 'bg-gray-100 text-gray-800',
                'completed' => 'bg-gray-100 text-gray-800',
                'rejected'  => 'bg-red-100 text-red-800',
                default     => 'bg-yellow-100 text-yellow-800',
            };
            @endphp
            <span class="inline-block px-2 py-1 text-xs font-semibold rounded {{ $statusClass }}">
            {{ ucfirst($order->status) }}
            </span>
        </p>

        <p class="text-base text-degray italic mb-8">
          Publicēts {{ $order->created_at->format('d.m.Y H:i') }}
        </p>

        <div class="flex flex-row-2 mb-8">
          <div class="w-1/2 font-bold">Platība</div>
          <div class="w-1/2">{{ $order->platiba }} m2</div>
        </div>

        <div class="flex flex-row-2 mb-8">
          <div class="w-1/2 font-bold">Pilsētas, novads</div>
          <div class="w-1/2">{{ $order->pilseta }}</div>
        </div>

        <div class="flex flex-row-2 mb-8">
          <div class="w-1/2 font-bold">Aizsargjoslas, aizsardzības pazīmes</div>
          <div class="w-1/2">{{ $order->pazimes }}</div>
        </div>

        @php
        $activeUntil = ($activeUntil ?? $order->created_at->copy()->addWeeks(2));
        @endphp

        @if(in_array($order->status, ['archived','completed']))
        <p class="text-red-600">Termiņš beidzies</p>
        @else
        <p class="text-degray">Aktīvs līdz {{ $activeUntil->format('d.m.Y H:i') }}</p>
        @endif

        @php
          $user = auth()->user();
          $isOwner = $user && $user->id === $order->user_id;
          $hasSubmitted = $user && $order->offers->where('user_id', $user->id)->isNotEmpty();
        @endphp

        {{-- Hide submit button in admin embed mode (optional). Remove the embed check if you still want it visible. --}}
        @if ($user && !$isOwner && !$hasSubmitted && !request()->boolean('embed'))
          <div class="flex justify-center">
            <x-primary-button type="button" @click="showForm = !showForm" class="bg-degreen text-white px-4 py-2 rounded transition">
              Izteikt piedāvājumu
            </x-primary-button>
          </div>
        @endif
      </div>
    </div>
    {{-- Offer Info End --}}
  </div>

  {{-- Offers visibility --}}
  @php
    $user = auth()->user();
    $isOwnerOrAdmin = $user && ($user->id === $order->user_id || $user->is_admin);
    $userOffer = $user ? $order->offers->where('user_id', $user->id)->first() : null;
  @endphp

  @if ($isOwnerOrAdmin && $order->offers->count())
    <h3 id="offers" class="text-3xl text-degreen uppercase text-center mb-10 scroll-mt-32">Piedāvājumi</h3>
    @foreach ($order->offers as $offer)
      @include('orders.partials.offer-card', ['offer' => $offer])
    @endforeach
  @elseif ($userOffer)
    <h3 id="offers" class="text-3xl text-degreen uppercase text-center mb-10 scroll-mt-32">Jūsu piedāvājums</h3>
    @include('orders.partials.offer-card', ['offer' => $userOffer])
  @endif

  {{-- Offer Form (only for public/non-embed context) --}}
  @if (!request()->boolean('embed'))
    <div x-show="showForm" x-transition.duration.400ms class="mx-5 mt-6 border border-green-400 rounded px-20 py-20 bg-white">
      <h2 class="text-2xl md:text-3xl uppercase text-degreenlight mb-10">IZTEIKT PIEDĀVĀJUMU</h2>

      @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('offers.store', $order->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Price and extra costs --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div>
            <label class="block mb-1 font-medium text-sm text-degray"><span class="sup text-red-500">*</span> Cena, EUR</label>
            <input type="text" step="1" name="price" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="0,00" required />
          </div>

          <div>
            <label class="block mb-1 font-medium text-sm text-degray"><span class="sup text-red-500">*</span> Mērvienība</label>
            <input type="text" step="1" name="currency" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="" required />
          </div>

          <div>
            <label class="block mb-1 font-medium text-sm text-degray"><span class="sup text-red-500">*</span> Prognozētās papildus izmaksas, EUR</label>
            <input type="text" step="1" name="extra_costs" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="0,00" required />
          </div>
        </div>

        {{-- Explanation --}}
        <div>
          <label class="block mb-1 font-medium text-sm text-degray">Papildus izmaksu skaidrojums</label>
          <textarea name="extra_costs_info" rows="3" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="Skaidrot papildus izmaksas"></textarea>
        </div>

        {{-- Dates --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block mb-1 font-medium text-sm text-degray"><span class="sup text-red-500">*</span> Darbu uzsākšanas datums</label>
            <input type="text" name="start_date" datepicker datepicker-format="dd.mm.yyyy" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="00/00/0000" required />
          </div>
          <div>
            <label class="block mb-1 font-medium text-sm text-degray">Izpildes termiņš</label>
            <input type="text" name="deadline" datepicker datepicker-format="dd.mm.yyyy" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="00/00/0000" />
          </div>
        </div>

        {{-- Comments --}}
        <div>
          <label class="block mb-1 font-medium text-sm text-degray">Komentārs</label>
          <textarea name="comments" rows="3" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight"></textarea>
        </div>

        {{-- Checkbox --}}
        <div class="flex items-start gap-2">
          <input type="checkbox" name="agreed_to_terms" required class="rounded border-degreen text-degreen focus:outline-none focus:ring-0" />
          <label class="text-sm text-degray">
            Piesakoties pakalpojumam kategorijā ATMEŽOŠANA, izpildītājs apņemas līguma noslēgšanas gadījumā veikt starpniecības maksājumu www.deforesting.lv platformai 5 % apmērā no noslēgtā līguma summas
          </label>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col md:flex-row justify-center gap-6 pt-6">
          <button type="submit" class="bg-degreen hover:bg-green-700 text-white px-6 py-2 font-semibold rounded shadow">
            IZTEIKT PIEDĀVĀJUMU
          </button>
          <a href="#" @click.prevent="showForm = false" class="border border-degreen text-degreen px-6 py-2 font-semibold rounded shadow text-center">
            NEPIEKRĪTU – ATCELT PIEDĀVĀJUMU
          </a>
        </div>
      </form>
    </div>
  @endif
</div>

{{-- Footer only when NOT embedded --}}
@if(!request()->boolean('embed'))
  <x-footer />
@endif
