@php
    $canChangeStatus = auth()->check() && (auth()->id() === $offer->order->user_id || auth()->user()->is_admin);
@endphp

<div class="flex bg-white border border-degreen rounded p-4 mb-4 gap-5">
    <div class="flex basis-1/4 flex-col mb-2 justify-center text-center">
        <p class="text-3xl text-degreenlight uppercase">{{ $offer->user->name }} {{ $offer->user->surname }}</p>
        <span class="text-sm text-gray-500">{{ $offer->created_at->format('d.m.Y H:i') }}</span>
    </div>
    <div class="basis-3/4">
        <div class="w-full py-10 px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 mb-8">
                <div class="text-degray font-base space-y-4">
                    <p class="text-degreenlight font-bold uppercase">CENA</p>
                    <p>Prognozētās papildus izmaksas</p>
                    <p>Darbu uzsākšanas datums</p>
                    <p>Izpildes termiņš</p>
                </div>
                <div class="text-degray text-right md:text-left font-semibold space-y-4">
                    <p class="text-degreenlight">{{ $offer->price ?? '–' }} {{ $offer->currency }}</p>
                    <p><span class="font-bold">{{ $offer->extra_costs }} {{ $offer->currency }}</span> / {{ $offer->extra_costs_info }}</p>
                    <p class="font-bold">{{ \Carbon\Carbon::parse($offer->start_date)->format('d.m.Y') }}</p>
                    <p class="font-bold">{{ \Carbon\Carbon::parse($offer->deadline)->format('d.m.Y') }}</p>
                </div>
            </div>
            
            @if (!empty($offer->comments))
                <div class="border border-degreenlight bg-gray-50 text-degreen p-6 rounded mb-8">
                    {{ $offer->comments }}
                </div>
            @endif

            @if ($offer->attachment)
                <p>
                    <a href="{{ asset('storage/' . $offer->attachment) }}" target="_blank" class="text-blue-600 underline">
                        Apskatīt pielikumu
                    </a>
                </p>
            @endif
            @if ($canChangeStatus)
            
    <div class="flex gap-3 mt-6 justify-center">

        <form action="{{ route('offers.changeStatus', $offer) }}" method="POST" class="flex gap-5 mt-6 justify-between">
            @csrf
            @method('PATCH')
        
            <x-secondary-button type="submit" name="status" value="approved" class="">
                NODOT IZPILDEI
            </x-secondary-button>
            <x-secondary-button type="submit" name="status" value="rejected" class="">
                ATCELT
            </x-secondary-button>
            <x-secondary-button type="submit" name="status" value="completed" class="">
                IZPILDĪTS
            </x-secondary-button>
        </form>
        

    </div>
@endif

            @can('delete', $offer)
                <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" onsubmit="return confirm('Vai tiešām vēlaties dzēst šo piedāvājumu?')">
                    @csrf
                    @method('DELETE')
                    <p class="text-right"><x-secondary-button>Dzēst piedāvājumu</x-secondary-button></p>
                    
                </form>
            @endcan
        </div>
    </div>
</div>
