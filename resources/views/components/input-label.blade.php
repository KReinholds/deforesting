@props(['value', 'required' => false])

<label {{ $attributes->merge(['class' => 'block mb-1 text-sm font-normal text-degray']) }}>
    @if ($required)
        <span class="sup text-red-500">*</span>
    @endif
    {{ $value ?? $slot }}
</label>
