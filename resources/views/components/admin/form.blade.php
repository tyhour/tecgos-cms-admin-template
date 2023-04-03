<div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
    <form id="{{ $attributes['formId'] }}" wire:submit.prevent="{{ $attributes['event'] }}">
        <div class="mb-8 sm:flex sm:justify-between sm:items-center">
            <!-- Left: Title -->
            <x-admin.page-header title="{{ $attributes['title'] }}" />
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            {{ $slot }}
        </div>
        @if (!$attributes['hideSave'])
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $attributes['submit'] }}</button>
        @endif
        @if ($attributes['cancel'])
            <a href="{{ $attributes['cancel'] }}"
                class="text-white ml-2 bg-slate-500 hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-[13px] text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Back</a>
        @endif
    </form>
</div>
