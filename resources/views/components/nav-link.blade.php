@props(['active' => false,
        'type'  => 'a'         
])

@if ($type === 'a')
    <a class="{{ $active ? 'bg-emerald-950 text-white' : 'text-gray-100 hover:bg-emerald-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium text-white"
        aria-current="{{ $active ? 'page' : 'false' }}"
        {{ $attributes }}
    >{{ $slot }}</a>

@else
    <button class="{{ $active ? 'bg-emerald-950 text-white' : 'text-gray-100 hover:bg-emerald-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium text-white"
        aria-current="{{ $active ? 'page' : 'false' }}"
        {{ $attributes }}
    >{{ $slot }}</button>
@endif