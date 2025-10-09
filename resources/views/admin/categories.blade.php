{{-- resources/views/admin/categories/index.blade.php --}}
@extends('layouts.admin')

@section('content')
 <p class="text-lg text-degreenlight uppercase mb-5">
                  Kategorijas mājas lapā:
    </p>

  <div class="">
    <div class="divide-y divide-gray-100">
      @forelse($categories as $cat)
        <div class="flex items-baseline justify-between  py-1">
          <div class="text-[14px] tracking-wide text-degreen">
            {{ strtoupper($cat->name) }}
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
@endsection
