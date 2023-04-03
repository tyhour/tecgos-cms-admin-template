{{-- Sidebar --}}
<div class="fixed top-0 z-30 flex justify-end w-full sm:hidden">

    <!-- Sidebar -->
    <div id="sidebar" class="flex flex-col w-64 p-4 shrink-0">

        <!-- Sidebar header -->
        <div class="flex justify-between pr-3 mb-4 sm:px-2">
            <!-- Close button -->
            <button class="text-gray-200 hover:text-white" @click.stop="frontSidebarOpen = !frontSidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <x-frontend.icon name='go-arrow-right-24' class='w-5 h-5 ml-2' color='none' />
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('frontend.homepage') }}">
                <img src="/images/logo-white.png" alt="logo" width="55" height="55" />
            </a>
        </div>

        <!-- Menu List -->
        <div class="">
            <!-- Pages group -->
            <div>
                <h3 class="pl-3 text-xs font-semibold uppercase text-slate-500">
                    <span>MENU</span>
                </h3>
                <ul class="mt-3">
                    <!-- Home -->
                    <x-frontend.navlist name='heroicon-o-home' title='HOME' href='homepage' />
                    <x-frontend.navlist name='go-package-24' title='TOUR PACKAGES' href='tour-packages' />
                    <x-frontend.navlist name='heroicon-o-map-pin' title='DESTINATIONS' href='destinations' />
                    <x-frontend.navlist name='bx-car' title='OUR SERVICES' href='our-services' />
                    <x-frontend.navlist name='vaadin-comment-ellipsis-o' title='Contact Us' href='contact-us'
                        class="scale-x-[-1]" />
                </ul>
            </div>
        </div>
    </div>
</div>
