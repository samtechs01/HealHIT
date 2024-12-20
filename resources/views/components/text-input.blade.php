 @props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400']) }}>
