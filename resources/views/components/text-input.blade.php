@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight']) }}>
