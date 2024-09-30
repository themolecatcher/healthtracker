@props(['active' => false, 'type' => 'a'])

@if ($type === 'a')
    <a class="{{ $active ? 'bg-gray-900 text-white border-indigo-500' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 hover:border-indigo-500' }} relative flex flex-row items-center h-11 focus:outline-none border-l-4 pr-6"
       aria-current="{{ $active ? 'page' : 'false' }}"
       {{ $attributes }}>
        <span class="inline-flex justify-center items-center ml-4">
            {{ $icon ?? '' }}
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">{{ $slot }}</span>
    </a>

@else
    <button class="{{ $active ? 'bg-gray-900 text-white border-indigo-500' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800 border-transparent' }} relative flex flex-row items-center h-11 focus:outline-none border-l-4 pr-6"
       aria-current="{{ $active ? 'page' : 'false' }}"
       {{ $attributes }}>
        <span class="inline-flex justify-center items-center ml-4">
            {{ $icon ?? '' }}
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">{{ $slot }}</span>
    </button>
@endif
