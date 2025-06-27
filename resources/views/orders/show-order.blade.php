<x-public-header />

<div x-data="{ showForm: false }" class="container mx-auto mb-20 scroll-smooth" >
    <x-client.submenu />
    <div class="px-4">
    {{-- Offer Info --}}
    <h1 class="text-degray text-5xl font-normal my-5 uppercase">
        {{ $order->title }}
    </h1>
    
    <div class="flex flex-row md:flex-row border border-degreen rounded-sm gap-10 py-10 px-10 mb-10">
        <div class="w-1/2 md:w-1/2">
            <img class="w-full rounded-sm mb-10" src="/img/atmezosana-23.jpg" alt="">
            <p class="text-base text-degray">
                {{ $order->description }}
            </p>
        </div>
        <div class="w-1/2 md:w-1/2">
            <h3 class="text-xl text-degray mb-10"><b>KATEGORIJA:</b> <i>{{ $order->category->name ?? '-' }}</i></h3>
            <h2 class="text-3xl text-degreen mb-4"> {{ $order->title }}</h2>
            <p class="text-base text-degray mb-4">ID Nr. <b>{{ $order->id }}</b><br>
                <span class="inline-block px-2 py-1 text-xs font-semibold rounded 
                {{ $order->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                {{ ucfirst($order->status) }}
            </span>
            </p>
            <p class="text-base text-degray italic mb-8">Publicēts {{ $order->created_at->format('d.m.Y H:i') }}</p>
            <div class="flex flex-row-2 mb-8">
                <div class="w-1/2 font-bold">Platība </div>
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
            
            <p class="text-base text-dered text-center mb-8">Pasūtījums aktīvs līdz {{ $order->created_at->addWeeks(2)->format('d.m.Y H:i') }} </p>


            @php
                $user = auth()->user();
                $isOwner = $user && $user->id === $order->user_id;
                $hasSubmitted = $user && $order->offers->where('user_id', $user->id)->isNotEmpty();
            @endphp

            @if ($user && !$isOwner && !$hasSubmitted)
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


{{-- Show Offers to the offer owners and admins --}}
{{-- Show Offers --}}
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


{{-- Offer Form - Toggle --}}
<div x-show="showForm" x-transition.duration.400ms class="mx-5 mt-6 border border-green-400 rounded px-20 py-20  bg-white">
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
                {{-- <select name="currency" class="w-full border border-green-300 rounded px-3 py-2">
                    <option value="EUR">EUR</option>
                    <option value="USD">USD</option>
                </select> --}}
            </div>

            <div>
                <label class="block mb-1 font-medium text-sm text-degray"><span class="sup text-red-500">*</span> Prognozētās papildus izmaksas, EUR</label>
                <input type="text" step="1" name="extra_costs" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="0,00" required />
                {{-- <input type="number" step="0.01" name="extra_costs" class="w-full border border-green-300 rounded px-3 py-2" placeholder="0,00" required /> --}}
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





</div>

<x-footer />