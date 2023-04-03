<div class="{{ $attributes['class'] ?? 'col-span-6 sm:col-span-3' }}">
    <label for="{{ $attributes['name'] }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $attributes['title'] }} @if ($attributes['required'])
            *
        @endif
    </label>
    <input type="{{ $attributes['type'] ?? 'text' }}" @if ($attributes['readonly']) readonly @endif
        name="{{ $attributes['name'] }}" id="{{ $attributes['name'] }}"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        @if ($attributes['model']) wire:model.defer="{{ $attributes['model'] }}" @endif
        value="{{ $attributes['value'] }}" placeholder="{{ $attributes['placeholder'] }}"
        @if ($attributes['required']) required @endif>

    @error($attributes['model'])
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
