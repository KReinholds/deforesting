@props([
    'href',
    'arrow' => true,
    'arrowColor' => 'hover', // 'hover' (default), 'green', or 'white'
    'variant' => 'primary', // 'primary', 'secondary', or 'custom'
])

@php
    $base = 'inline-flex items-center justify-between gap-x-2.5 text-sm px-5 py-3 rounded-[4px] font-semibold uppercase transition-all duration-150';

    $variants = [
        'primary' => 'bg-degreen text-white hover:bg-degreenlight hover:text-degreen',
        'secondary' => 'bg-white text-degreen border border-degreen hover:border-degreenlight',
        'custom' => '', // Use this for full control via $attributes->get('class')
    ];

    $variantClass = $variants[$variant] ?? '';

    // Arrow icons
    if ($arrow) {
        if ($arrowColor === 'green') {
            $arrowImages = '<img class="w-6" src="/img/green-arrow.png" alt="">';
        } elseif ($arrowColor === 'white') {
            $arrowImages = '<img class="w-6" src="/img/white-arrow.png" alt="">';
        } else { // hover
            $arrowImages = '
                <img class="block group-hover:hidden w-6" src="/img/white-arrow.png" alt="">
                <img class="hidden group-hover:block w-6" src="/img/green-arrow.png" alt="">
            ';
        }
    } else {
        $arrowImages = '';
    }
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => "group $base $variantClass"]) }}>
    {{ $slot }}
    {!! $arrowImages !!}
</a>
