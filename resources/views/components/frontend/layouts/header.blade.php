{{-- Header --}}
<header class="bg-white border-b border-slate-200">
    <div class="flex flex-col items-center h-16 pt-2 bg-white md:pt-0 md:h-14 md:justify-evenly md:px-4 md:flex-row">
        <div class="flex items-center justify-center gap-6 divide-x-2">
            <div class="flex gap-6">
                @foreach ($socials->slice(0, 4) as $social)
                    <a href="{{ $social->link . $social->profile_id }}" target="_blank" rel="noopener noreferrer"
                        title="{{ $social->title }}">
                        <x-frontend.icon name="{{ $social->icon_name }}" />
                    </a>
                @endforeach
            </div>
            <div class="flex gap-6 pl-6">
                @foreach ($socials->slice(4, count($socials)) as $social)
                    <a href="{{ $social->link . $social->profile_id }}" target="_blank" rel="noopener noreferrer"
                        title="{{ $social->title }}">
                        <x-frontend.icon name="{{ $social->icon_name }}" />
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex items-center justify-center gap-4 mt-2 md:mt-0">
            <a href="tel:<?php echo preg_replace('/^0?/', '+855', $company->phone_number); ?>" class="flex items-center">
                <x-frontend.icon name='fas-phone' class='w-3 h-3' />&nbsp;&nbsp;<span
                    class="text-[12px]">{{ preg_replace('/^0?/', '+855(0) ', $company->phone_number) }}</span>
            </a>
            <a href="mailto:{{ $company->email }}" class="flex items-center">
                <x-frontend.icon name='fontisto-email' class='w-4 h-4' />&nbsp;&nbsp;<span
                    class="text-[13px]">{{ $company->email }}</span>
            </a>
        </div>
    </div>
    {{-- Menu --}}
    <div class="visible sm:hidden flex items-center justify-between pr-4 h-[65px] bg-gray-700">
        <a class="block" href="{{ route('frontend.homepage') }}">
            <div class="flex items-center">
                <img src="/images/logo-white.png" class="object-cover w-[60px]" />

                <div>
                    <p class="font-semibold"><span class="text-[#fe8901]">BEST</span>&nbsp;<span
                            class="text-white">ANGKOR</span></p>
                    <fieldset class="border-t border-slate-300">
                        <legend class="px-[6px] mx-auto text-white !font-[satisfy]">Driver</legend>
                    </fieldset>
                </div>
            </div>
        </a>
        <div class="flex items-center justify-center">
            <button class="items-center justify-center p-2 sm:hidden" @click.stop="modelSearch=!modelSearch">
                <span class="sr-only">Open search</span>
                <x-frontend.icon name='css-search' class='mt-2 w-7 h-7' color='text-white' />
            </button>
            <button class="inline-flex items-center p-2 ml-3 border border-white rounded-lg sm:hidden hover:bg-gray-500"
                @click.stop="frontSidebarOpen = !frontSidebarOpen" aria-controls="sidebar"
                :aria-expanded="frontSidebarOpen">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" fill="#ffffff" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
</header>
