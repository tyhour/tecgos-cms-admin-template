<div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $attributes['title'] }} @if ($attributes['required'])
            *
        @endif
    </label>
    <input @change="{{ $attributes['event'] }}"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        id="{{ $attributes['name'] }}" name="{{ $attributes['name'] }}" type="file" accept="image/png, image/jpeg,.webp"
        @if (!$attributes['image']) required @endif>
    @if ($attributes['error'])
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $attributes['error'] }}</p>
    @else
        @error($attributes['model'])
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    @endif

    @if ($attributes['image'] !== '/storage/' && $attributes['image'])
        <img alt="{{ $attributes['name'] }}" width="{{ $attributes['width'] }}" height="{{ $attributes['height'] }}"
            src="{{ $attributes['image'] }}" class="mt-4" />
    @endif
</div>
