<x-authentication-layout>
    <h1 class="mb-6 text-3xl font-bold text-slate-800">{{ __('Welcome back!') }} ✨</h1>
    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            <div class="mr-1">
            </div>
            <x-jet-button class="ml-3">
                {{ __('Sign in') }}
            </x-jet-button>
        </div>
    </form>
    <x-jet-validation-errors class="mt-4" />
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-slate-200">
        <div class="text-sm">
            {{ __('Can\'t access to sign in?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600" href="tel:+85598608284">{{ __('Contact Us') }}</a>
        </div>
        <!-- Warning -->
        <div class="mt-5">
            <div class="px-3 py-2 rounded bg-amber-100 text-amber-600">
                <svg class="inline w-3 h-3 fill-current shrink-0" viewBox="0 0 12 12">
                    <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                </svg>
                <span class="text-sm">
                    {{$setting->title}}
                </span>
            </div>
        </div>
    </div>
</x-authentication-layout>
