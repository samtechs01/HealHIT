@props(['value'])

<label {{ $attributes->merge(['class' => ' border-none hover:border-blue-800 rounded-md text-black block']) }}>
    {{ $value ?? $slot }}
</label>
 