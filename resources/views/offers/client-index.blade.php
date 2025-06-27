<x-public-header />
<x-client.submenu />

<div class="container mx-auto py-6 px-4">
    <div class="flex flex-col md:flex-row align-center gap-1">
        <div class="">
            <h3 class="text-3xl text-degreenlight uppercase">
                {{ auth()->user()->name }} {{ auth()->user()->surname }}
            </h3>
        </div>
        <div>
            <img class="w-12 -mt-2" src="img/arrow-degreenlight-low.svg" alt="">
        </div> 
    </div>
    

    <div class="flex gap-4 py-10 flex-wrap">
        @foreach(['pending' => 'Izskatīšanā', 'approved' => 'Izpildē', 'completed' => 'Arhīvā', 'rejected' => 'Noraidītie'] as $key => $label)
    @php
        $isActive = request('status') === $key || (request('status') === null && $key === 'pending');
    @endphp
    <a href="{{ route('offers.client', ['status' => $key]) }}"
       class="group {{ $isActive ? 'bg-degreen text-white hover:text-white' : 'text-degreen bg-white hover:text-dered hover:underline' }} border border-degreen font-semibold rounded-sm text-sm px-5 py-3 inline-flex items-end uppercase">
        {{ $label }}
    </a>
@endforeach
    </div>

    @forelse ($offers as $offer)
    <div class="flex border border-degreen rounded-sm p-1 mb-1">
        <div class="basis-full md:basis-1/6 self-center justify-items-center text-center">
            <p class="text-degray">
            ID Nr. {{ $offer->order->id }} 
            <br>
            {{ $offer->created_at->format('d.m.Y H:i') }}
            </p>
            {{-- <p><strong></strong> 
                <span class="px-2 py-1 rounded text-sm 
                    @if($offer->status == 'approved') bg-green-100 text-green-800 
                    @elseif($offer->status == 'izskatīšanā') bg-yellow-100 text-yellow-800 
                    @elseif($offer->status == 'completed') bg-blue-100 text-blue-800 
                    @elseif($offer->status == 'rejected') bg-red-100 text-red-800 
                    @endif">
                    {{ ucfirst($offer->status) }}
                </span>
            </p> --}}
        </div>
        <div class="basis-full md:basis-1/6">
          <img class="object-cover w-48 h-32 md:h-32 md:w-48 rounded-sm" src="/img/zemes-raksana.png" alt="">
        </div>
        <div class="basis-full md:basis-3/6 self-center text-left pl-4">
            <p class="text-lg text-degreen mb-2">{{ $offer->order->title }}</p>
            <p class="mb-2 text-degray">{{ auth()->user()->name }} {{ auth()->user()->surname }}
              <br>
              Kategorija: {{ $offer->order->category->name ?? '-' }}
  
            </p>
            <div class="flex items-center space-x-6">
              <img class="w-10" src="/img/location.svg" alt="">
              <p class="text-degray">{{ $offer->order->pilseta }}</p>
            </div>
        </div>
        <div class="basis-full md:basis-2/6 self-center text-center">
            <div class="flex text-center justify-center">
              <p class="text-lg text-degreen mr-1"><a href="{{ route('orders.show', $offer->order_id) }}" class="text-degreen hover:underline uppercase">
                Skatīt
            </a></p>
              <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
            </div>
          
          <p class="text-degray">Aktīvs līdz {{ $offer->order->created_at->addWeeks(2)->format('d.m.Y H:i') }} </p>
        </p>
        </div>
        <div class="basis-full md:basis-1/6 self-center text-center">
            
            @if ($offer->user_id === auth()->id())
            <div class="flex gap-4">
                {{-- <a href="{{ route('offers.edit', $offer->id) }}"
                   class="text-blue-600 hover:underline text-sm">Rediģēt</a> --}}
        
                <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" onsubmit="return confirm('Vai tiešām vēlaties dzēst šo piedāvājumu?')">
                    @csrf
                    @method('DELETE')
                    <x-primary-button type="submit"> Dzēst</x-primary-button>
                </form>
            </div>
        @endif
        </div>
      </div>

    @empty
        <p class="text-degray">Nav atrasti piedāvājumi šim filtram.</p>
    @endforelse

    <div class="mt-6">
        {{ $offers->appends(request()->query())->links() }}
    </div>
</div>

<x-footer />
