<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-degreen rounded-sm font-semibold text-base text-degreen uppercase  shadow-sm ']) }}>
    {{ $slot }}
</button>
