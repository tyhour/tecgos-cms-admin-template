<div x-data="{
    openModal: false
}" class="relative {{ $attributes['class'] ?? 'col-span-6 sm:col-span-3' }}">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $attributes['title'] }} @if ($attributes['required'])
            *
        @endif
    </label>
    <button @click.stop="openModal = !openModal;" type="button"
        class="flex flex-row w-full text-sm shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 {{ $attributes['filter'] ? 'p-[7px]' : 'p-2.5' }} dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @if ($attributes['filter'])
            <p class="flex-1 text-left px-2.5 text-gray-600 truncate">
                {{ $attributes['value']['title'] }}
            </p>
        @else
            <p x-text="modalValue.title ?? '{{ $attributes['placeholder'] }}'"
                class="flex-1 text-left text-gray-600 truncate">
            </p>
        @endif
        <x-frontend.icon name='css-chevron-down' class="{{ $attributes['icon'] ?? 'w-6 h-6' }}" color='text-gray-700' />
    </button>
    <div x-show="openModal"
        class="absolute left-auto right-auto z-10 mt-1 bg-white divide-y divide-gray-100 rounded-md shadow-lg min-w-full w-auto">
        @foreach ($attributes['list'] as $data)
            <div class="py-1 first:rounded-t-md last:rounded-b-md hover:bg-gray-100">
                <button type="button"
                    @if ($attributes['filter']) @click.stop="livewire.emit('{{ $attributes['event'] }}',{{ $data }});
                    openModal = false;"
                    @else
                    @click.stop="modalValue = {
                        'id': {{ @$data['id'] ?? '""' }},
                        'title': '{{ @$data['title'] }}'
                    };
                    livewire.emit('{{ $attributes['event'] }}',{{ @$data['id'] }});
                    openModal = false;" @endif
                    class="block w-full px-4 py-2 text-sm text-left text-gray-700 truncate">{{ @$data['title'] }}</button>
            </div>
        @endforeach
        </ul>
    </div>
    @if (!$attributes['filter'])
        @error($attributes['model'])
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    @endif
</div>
