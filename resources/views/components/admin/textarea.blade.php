<div>
    <label for="{{ $attributes['name'] }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $attributes['title'] }} @if ($attributes['required'])
            *
        @endif
    </label>
    <textarea id="{{ $attributes['name'] }}" @if ($attributes['readonly']) readonly @endif
        name="{{ $attributes['name'] }}"
        @if ($attributes['model']) wire:model.defer="{{ $attributes['model'] }}" @endif
        :rows="{{ $attributes['rows'] }}"
        class="block p-2.5 w-full text-sm {{ $attributes['height'] ?? 'min-h-[132px]' }} text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="{{ $attributes['placeholder'] }}" @if ($attributes['required']) required @endif>{{ $attributes['value'] }}</textarea>
    @error($attributes['model'])
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
