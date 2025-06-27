<x-public-header />
<x-client.submenu />

<div class="container mx-auto px-4 py-10">
    {{-- <h1 class="text-3xl text-degreen font-bold mb-6">Mans abonements</h1> --}}

    @if ($user->is_subscribed)
        <div class="border border-degreen rounded p-10 bg-white text-degray">
            <p class="text-3xl text-degray uppercase mb-10"> {{ $userPlanLabel }}</p>
            <p class="uppercase mb-5"><strong>Aktivizēts:</strong>  {{ \Carbon\Carbon::parse($user->subscribed_at)->format('d.m.Y') }}</p>
            <p class="text-md text-degray uppercase"><strong>Spēkā līdz:</strong> {{ \Carbon\Carbon::parse($user->subscription_expires_at)->format('d.m.Y') }}</p>
        </div>
        <form action="{{ route('subscription.delete') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit"
                class="px-4 py-2 bg-dered text-white font-semibold rounded hover:bg-red-700 transition">
                Dzēst abonementu
            </button>
        </form>
        
    @else
        <div class="flex justify-between items-center bg-white border border-degreenlight p-10">
            <p class="text-xl text-dered uppercase">Jums šobrīd nav aktīva abonementa.</p>
            <x-button-link href="/subscription" class="">Izvēlēties plānu</x-button-link>
        </div>
        
    @endif
</div>
<x-footer />
