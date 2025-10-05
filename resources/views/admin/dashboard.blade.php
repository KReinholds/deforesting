@extends('layouts.admin')

@section('content')
   <h3 class="text-2xl text-degreen pb-12 uppercase text-left">
      Laipni lūgti Deforesting administratora sadaļā! 
  </h3>

    
    <p class="text-lg text-degreenlight uppercase mb-5">
                  Jaunākie notikumi:
    </p>
    <div class="space-y-6">
        @foreach($latestOffers as $offer)
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-between">
                    <div>
                        <p class="font-bold">Cena: {{ $offer->price }} {{ $offer->currency }}</p>
                        <p>Darbu uzsākšanas datums: {{ $offer->start_date }}</p>
                        <p>Izpildes termiņš: {{ $offer->deadline }}</p>
                        <p class="text-sm text-gray-600">{{ $offer->comments }}</p>
                    </div>
                    <span class="text-green-700 font-bold">{{ $offer->user->name }}</span>
                </div>
                <div class="mt-4 flex gap-3">
                    <button class="px-3 py-1 bg-green-600 text-white rounded">Nodot izpildei</button>
                    <button class="px-3 py-1 bg-yellow-500 text-white rounded">Atcelt</button>
                    <button class="px-3 py-1 bg-gray-600 text-white rounded">Izpildīts</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
