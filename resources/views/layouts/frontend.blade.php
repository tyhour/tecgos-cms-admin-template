<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    <title>{{ $attributes['title'] . ' - ' . config('app.name', 'Best Angkor Driver') }}</title>
    <meta name="description"
        content="{{ $attributes['description'] ?? 'We provide the private transportation services to Angkor wat complex and optional places in SiemReap with TukTuk, SUV, Mini Van and also hotel reservation in SiemReap with best price, stay comfort, best service experience' }}">
    <meta name="keywords"
        content="best angkor driver,best angkor driver license,tuk tuk driver siem reap,siem reap private driver,siem reap best driver,siem reap taxi driver,driver job in siem reap,van taxi driver in siem reap,driver from siem reap to battambang,siem reap administration,siem reap airways,siem reap airport departures,car taxi driver in siem reap,siem reap departures,siem reap district,siem reap district map,siem reap essay,driver from siem reap to phnom penh,siem reap governor,siem reap golf courses,siem reap google map,siem reap hospital,siem reap homestay,the best driver in siem reap,driver in siem reap,apa itu indriver,driver license siem reap,siem reap map,siem reap marathon,siem reap mini golf,siem reap new airport,new siem reap international airport,siem reap new airport map,sap pi po support activities,siem reap qr code,siem reap quad bike,siem reap quad bike adventure,quad siem reap,siem reap road,siem reap road construction,siem reap taxi service,siem reap taxi,siem reap tuk tuk driver,siem reap university,ucare siem reap,siem reap water supply authority,siem reap wake park,wing siem reap,siem reap what to do,x bar siem reap,xiaomi siem reap,isp siem reap,siem reap zipline,siem reap zip code,zto siem reap,siem reap daily news,siem reap lockdown,khmer os siemreap-kh auto,phnom penh siem reap distance,siem reap to sihanoukville bus,3 star hotel in siem reap,what to do in siem reap in 3 days,tripadvisor siem reap restaurant,4 star hotel in siem reap,5 star hotel siem reap,driver hp 6200,j7 siem reap,siem reap sunrise,siem reap provincial administration,{{ $attributes['keywords'] }}">
    <meta name="author" content="Tecgos Cambodia">
    <link rel="canonical" href="{{ Request::url() }}" />
    <link rel="alternate" hreflang="en" href="{{ Request::url() }}" />
    <meta http-equiv="content-language" content="en">
    <meta name="robots" content="nofollow">
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:site_name" content="Best Angkor Driver" />
    <meta property="og:title" content="{{ $attributes['title'] . ' - ' . config('app.name', 'Laravel') }}">
    <meta property="og:description"
        content="{{ $attributes['description'] ?? 'We provide the private transportation services to Angkor wat complex and optional places in SiemReap with TukTuk, SUV, Mini Van and also hotel reservation in SiemReap with best price, stay comfort, best service experience' }}">
    <meta property="og:image"
        content="{{ Request::root() }}{{ $attributes['image'] ?? '/storage/images/logo-wide.jpg' }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ Request::url() }}">
    <meta property="twitter:title" content="{{ $attributes['title'] . ' - ' . config('app.name', 'Laravel') }}">
    <meta property="twitter:description" content="{{ $attributes['description'] ?? $company->contact_us }}">
    <meta property="twitter:image"
        content="{{ Request::root() }}{{ $attributes['image'] ?? '/storage/images/logo-wide.jpg' }}">


    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (Request::segment(1) === 'contact-us')
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjYnnngle8vEl3w2D85_iUlZRiFHgqLcA&callback=initMap"></script>
    @endif
</head>

<body class="antialiased font-inter bg-slate-800" x-data="{ frontSidebarOpen: false, modelSearch: false, showBar: false }">
    <!-- Page wrapper -->
    <div class="relative h-screen">
        {{-- Fixed Menu --}}
        <div class="h-0 transition-all duration-300 ease-in-out"
            :class="!showBar ? '-translate-y-24' :
                'fixed z-60 top-0 left-0 right-0 px-3 bg-slate-800 translate-y-0 h-auto'"
            x-cloak="lg">
            <div
                class="items-center justify-between hidden h-16 max-w-6xl ml-auto mr-auto lg:h-20 xl:h-24 xl:max-w-7xl sm:flex">
                <a href="{{ route('frontend.homepage') }}">
                    <div class="flex items-center">
                        <img src="/images/logo-white.png" class="object-cover w-[50px] lg:w-[70px] xl:w-[80px]" />

                        <div>
                            <p class="font-semibold"><span
                                    class="text-color text-[14px] xl:text-xl lg:text-lg">SIEM</span>&nbsp;<span
                                    class="text-[14px] lg:text-lg xl:text-xl text-white">REAP</span></p>
                            <fieldset class="border-t border-slate-300">
                                <legend
                                    class="px-[6px] mx-auto text-white xl:text-xl text-[14px] lg:text-lg !font-[satisfy]">
                                    Driver</legend>
                            </fieldset>
                        </div>
                    </div>
                </a>
                <div class="flex items-center justify-evenly">
                    <ul class="mt-2 mr-2 lg:mr-8">
                        <!-- Home -->
                        <x-frontend.menulist title='HOME' href='homepage' />
                        <x-frontend.menulist title='TOUR PACKAGES' href='tour-packages' />
                        <x-frontend.menulist title='DESTINATIONS' href='destinations' />
                        <x-frontend.menulist title='OUR SERVICES' href='our-services' />
                        <x-frontend.menulist title='CONTACT US' href='contact-us' class="scale-x-[-1]" />
                    </ul>
                    <button class="" @click.stop="modelSearch=!modelSearch">
                        <span class="sr-only">Open search</span>
                        <x-frontend.icon name='css-search'
                            class='w-5 h-5 min-[688px]:w-[22px] min-[688px]:h-[22px] xl:w-7 xl:h-7'
                            color='text-white' />
                    </button>
                </div>
            </div>
        </div>
        <div class="flex w-full overflow-x-hidden overflow-y-auto no-scrollbar"
            @scroll.window="showBar = (window.pageYOffset > 180) ? true : false">
            <!-- Content area -->
            <div class="w-full z-40 transition-all duration-300 ease-in-out flex flex-col  @if ($attributes['background']) {{ $attributes['background'] }} @endif sm:translate-x-0"
                x-ref="contentarea" :class="!frontSidebarOpen ? 'translate-x-0' : '-translate-x-64'"
                @keydown.escape.window="frontSidebarOpen = false" x-cloak="lg"
                @resize.window="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                if (width >= 640) {
                    frontSidebarOpen = false
                }">

                <!-- Sidebar backdrop (mobile only) -->
                <div class="fixed inset-0 z-50 transition-opacity duration-200 bg-slate-900 bg-opacity-30"
                    :class="frontSidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
                    @click.stop="frontSidebarOpen = false" aria-hidden="true" x-cloak>
                </div>

                <x-frontend.layouts.header />

                <main>
                    {{ $slot }}
                </main>
                <x-frontend.layouts.footer />
            </div>
        </div>
        <template x-if="frontSidebarOpen">
            <x-frontend.layouts.sidebar />
        </template>
    </div>

    {{-- Search --}}
    <div x-show="modelSearch" class="fixed inset-0 block z-60">
        <div x-cloak x-show="modelSearch" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-black bg-opacity-75"
            aria-hidden="true">
            <div x-data="{ search: '{{ route('frontend.search-by-destination', ['search' => ':searchText']) }}', searchText: '' }" class="table w-full h-full">
                <div class="table-cell px-8 align-middle">
                    <div class="relative max-w-2xl ml-auto mr-auto">
                        <input x-model="searchText" placeholder="Search..."
                            class="bg-transparent w-full
                        font-bold !leading-[48px] pb-4 pr-32 tracking-wider placeholder-white text-white text-4xl border-b-3 outline-none border-b-[#646464]" />
                        <a x-bind:href="searchText.length > 0 ? search.replace(':searchText', searchText.replace(/\s+/g, '-')
                                .toLowerCase()) :
                            '#'"
                            class="absolute top-0 right-16">
                            <x-frontend.icon name='css-search' class='w-11 h-11' color='text-white' />
                        </a>
                        <button class="absolute top-0 right-0" @click.stop="modelSearch = false;">
                            <x-frontend.icon name='css-close' class='w-11 h-11' color='text-white' />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/datepicker.js"></script>

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.22/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.22/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>

</html>
