@extends('layouts.admin')

@section('content')
  <p class="text-lg text-degreenlight uppercase mb-6">Reģistrētie lietotāji</p>

  {{-- Search bar --}}
  <form method="GET" class="mb-6">
    <div class="relative w-full md:w-2/3">
      <input type="text" name="q" value="{{ request('q') }}"
             placeholder="Meklēt pēc vārda, e-pasta vai tālruņa"
             class="w-full border border-degreen rounded px-12 py-3 text-sm placeholder:text-degraylight focus:ring-degreen focus:border-degreen">
      <svg class="absolute left-4 top-3.5 w-5 h-5 text-degreenlight" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="8"></circle>
        <path d="m21 21-4.3-4.3"></path>
      </svg>
    </div>
  </form>

  {{-- Filters --}}
  <div class="flex flex-wrap items-center gap-6 text-degray text-sm mb-6">
    <span class="uppercase font-semibold text-[12px] tracking-wide">Atlasīt pēc:</span>

    <label class="inline-flex items-center gap-2">
      <input type="checkbox" name="filter[name]" class="rounded border-degreen text-degreen focus:ring-0"> Vārds, uzvārds
    </label>

    <label class="inline-flex items-center gap-2">
      <input type="checkbox" name="filter[phone]" class="rounded border-degreen text-degreen focus:ring-0"> Tālrunis
    </label>

    <label class="inline-flex items-center gap-2">
      <input type="checkbox" name="filter[email]" class="rounded border-degreen text-degreen focus:ring-0"> E-pasts
    </label>

    <label class="inline-flex items-center gap-2">
      <input type="checkbox" name="filter[expiring]" class="rounded border-degreen text-degreen focus:ring-0"> Abonements beidzas pēc 1 nedēļas
    </label>

    <label class="inline-flex items-center gap-2">
      <input type="checkbox" name="filter[expired]" class="rounded border-degreen text-degreen focus:ring-0"> Abonements beidzies
    </label>
  </div>

  {{-- Users list --}}
  <div class="space-y-3">
    @forelse($users as $user)
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center border border-gray-300 rounded-sm px-6 py-4 bg-white shadow-sm">
        
        {{-- Left side --}}
        <div class="flex flex-col md:flex-row items-start md:items-center gap-6 w-full md:w-2/3">
          <div class="text-sm text-degray">
            <p class="text-xs text-degray mb-1">ID Nr. {{ str_pad($user->id, 2, '0', STR_PAD_LEFT) }}_{{ sprintf('%04d',$user->id) }}</p>
            <p class="text-degreen font-semibold text-lg">{{ strtoupper($user->name) }} {{ strtoupper($user->surname) }}</p>
            <p class="text-[13px]">
              <span class="text-degray">tālrunis</span> {{ $user->phone ?? '+371 00000000' }}<br>
              <span class="text-degray">e-pasts</span> {{ $user->email }}
            </p>
          </div>
        </div>

        {{-- Middle / subscription --}}
        <div class="w-full md:w-1/3 mt-4 md:mt-0 text-center md:text-left">
          @if($user->is_subscribed)
            <p class="text-degreen font-semibold">Abonements: aktīvs</p>
            <p class="text-degray text-sm italic">
              Abonements spēkā līdz 
              <span class="font-bold">{{ optional($user->subscription_ends_at)->format('d.m.Y') ?? '00.00.0000' }}</span>
            </p>
          @else
            <p class="text-dered font-semibold">Abonements: neaktīvs</p>
            <p class="text-degray text-sm italic">
              Abonements beidzās 
              <span class="font-bold">{{ optional($user->subscription_ends_at)->format('d.m.Y') ?? '00.00.0000' }}</span>
            </p>
          @endif
        </div>

        {{-- Right / actions --}}
        <div class="flex flex-col md:flex-row items-center justify-end gap-2 mt-4 md:mt-0 w-full md:w-auto">
          <a href="mailto:{{ $user->email }}"
             class="px-6 py-2 border border-degreen text-degreen rounded-sm hover:bg-degreen/5 uppercase font-semibold text-sm">
            Saziņa
          </a>

          <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                onsubmit="return confirm('Vai tiešām dzēst šo lietotāju?');">
            @csrf @method('DELETE')
            <button type="submit" class="text-dered uppercase text-sm font-semibold hover:underline">
              Dzēst lietotāju
            </button>
          </form>
        </div>
      </div>
    @empty
      <p class="text-center text-degray mt-10">Nav reģistrētu lietotāju.</p>
    @endforelse
  </div>

  {{-- Pagination --}}
  <div class="mt-6">
    {{ $users->links() }}
  </div>
@endsection
