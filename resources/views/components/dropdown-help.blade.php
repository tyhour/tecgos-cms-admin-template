@props([
    'align' => 'right',
])

<div class="relative inline-flex" x-data="{ open: false }">
    <button
        class="flex items-center justify-center w-8 h-8 transition duration-150 rounded-full bg-slate-100 hover:bg-slate-200"
        :class="{ 'bg-slate-200': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
        <span class="sr-only">Info</span>
        <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path class="fill-current text-slate-500"
                d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z" />
        </svg>
    </button>
    <div class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1 {{ $align === 'right' ? 'right-0' : 'left-0' }}"
        @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-cloak>
        <div class="text-xs font-semibold text-slate-400 uppercase pt-1.5 pb-2 px-3">Need help?</div>
        <ul>
            <li>
                <a class="flex items-center px-2.5 py-1 text-sm font-medium text-indigo-500 hover:text-indigo-600"
                    target="_blank" href="{{ route('frontend.homepage') }}" @click="open = false" @focus="open = true"
                    @focusout="open = false">
                    <svg class="w-4 h-4 mr-2 text-indigo-300 fill-current shrink-0" viewBox="0 0 16 16"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.018 7.5H5.005C5.046 5.586 5.322 3.846 5.758 2.539C5.927 2.032 6.124 1.576 6.351 1.195C3.437 1.899 1.235 4.425 1.018 7.5Z" />
                        <path
                            d="M1.018 8.5C1.235 11.575 3.437 14.101 6.351 14.805C6.124 14.424 5.927 13.968 5.758 13.461C5.322 12.154 5.046 10.414 5.005 8.5H1.018Z" />
                        <path
                            d="M9.649 14.805C12.563 14.101 14.765 11.575 14.982 8.5H10.995C10.954 10.414 10.678 12.154 10.242 13.461C10.073 13.968 9.876 14.424 9.649 14.805Z" />
                        <path
                            d="M14.982 7.5C14.765 4.425 12.563 1.899 9.649 1.195C9.876 1.576 10.073 2.032 10.242 2.539C10.678 3.846 10.954 5.586 10.995 7.5H14.982Z" />
                        <path
                            d="M8 1C7.874 1 7.674 1.076 7.42 1.399C7.17 1.716 6.923 2.205 6.707 2.855C6.311 4.042 6.047 5.67 6.006 7.5H9.994C9.953 5.67 9.689 4.042 9.293 2.855C9.077 2.205 8.83 1.716 8.58 1.399C8.326 1.076 8.126 1 8 1Z" />
                        <path
                            d="M9.293 13.145C9.689 11.958 9.953 10.33 9.994 8.5H6.006C6.047 10.33 6.311 11.958 6.707 13.145C6.923 13.795 7.17 14.284 7.42 14.601C7.674 14.924 7.874 15 8 15C8.126 15 8.326 14.924 8.58 14.601C8.83 14.284 9.077 13.795 9.293 13.145Z" />
                    </svg>
                    <span>View Site</span>
                </a>
            </li>
            <li>
                <a class="flex items-center px-3 py-1 text-sm font-medium text-indigo-500 hover:text-indigo-600"
                    target="_blank" href="https://www.facebook.com/tecgos" @click="open = false" @focus="open = true"
                    @focusout="open = false">
                    <svg class="w-3 h-3 mr-2 text-indigo-300 fill-current shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M15.334 0L0.667 0C0.298 0 0 0.298 0 0.666L0 15.334C0 15.701 0.298 16 0.667 16L8.5 16L8.5 10L6.5 10L6.5 7.5L8.5 7.5L8.5 5.5C8.5 3.433 9.808 2.417 11.652 2.417C12.535 2.417 13.294 2.482 13.515 2.511L13.515 4.671L12.236 4.672C11.234 4.672 11 5.148 11 5.848L11 7.5L13.5 7.5L13 10L11 10L11.04 16L15.334 16C15.701 16 16 15.701 16 15.334L16 0.666C16 0.298 15.701 0 15.334 0" />
                    </svg>
                    <span>Facebook Page</span>
                </a>
            </li>
            <li>
                <a class="flex items-center px-3 py-1 text-sm font-medium text-indigo-500 hover:text-indigo-600"
                    target="_blank" href="https://tecgos.com/" @click="open = false" @focus="open = true"
                    @focusout="open = false">
                    <svg class="w-3 h-3 mr-2 text-indigo-300 fill-current shrink-0" viewBox="0 0 12 12">
                        <path
                            d="M10.5 0h-9A1.5 1.5 0 000 1.5v9A1.5 1.5 0 001.5 12h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 0zM10 7L8.207 5.207l-3 3-1.414-1.414 3-3L5 2h5v5z" />
                    </svg>
                    <span>Support Site</span>
                </a>
            </li>
            <li>
                <a class="flex items-center px-3 py-1 text-sm font-medium text-indigo-500 hover:text-indigo-600"
                    href="tel:+85598608284" @click="open = false" @focus="open = true" @focusout="open = false">
                    <svg class="w-3 h-3 mr-2 text-indigo-300 fill-current shrink-0" viewBox="0 0 12 12">
                        <path
                            d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z" />
                    </svg>
                    <span>Contact us</span>
                </a>
            </li>
        </ul>
    </div>
</div>
