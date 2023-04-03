<div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
    <div class="mb-8 sm:flex sm:justify-between sm:items-center">
        <!-- Left: Title -->
        <x-admin.page-header title="{{ $attributes['title'] }}" link="{{ $attributes['link'] }}" />

        <div class="items-end gap-4 mt-4 space-y-4 sm:mt-0 sm:flex sm:space-y-0">
            @stack('filter')
            <!-- Add New -->
            @if ($attributes['add_new'])
                <button @click="{{ $attributes['add_new'] }}"
                    class="text-white bg-indigo-500 btn hover:bg-indigo-600 h-[38px]">
                    <svg class="w-4 h-4 opacity-50 fill-current shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden ml-2 xs:block">Add New</span>
                </button>
            @endif
        </div>
    </div>
    <div class="grid">
        {{ $slot }}
    </div>
</div>
