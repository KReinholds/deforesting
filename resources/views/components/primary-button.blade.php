<button {{ $attributes->merge(['type' => 'submit', 'class' => 'items-center group text-white bg-degreen hover:bg-degreenlight font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-degreen uppercase']) }}>
    {{ $slot }}
    <img class="block group-hover:hidden w-6" src="/img/white-arrow.png" alt="">
    <img class="hidden group-hover:block w-6" src="/img/green-arrow.png" alt="">
</button>
