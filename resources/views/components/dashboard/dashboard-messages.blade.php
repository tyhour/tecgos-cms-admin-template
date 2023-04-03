<div
    class="flex flex-col bg-white border rounded-sm shadow-lg col-span-full sm:col-span-6 xl:col-span-6 border-slate-200">
    <div class="px-5 py-5">
        <header class="flex items-start justify-between mb-2">
            <!-- Icon -->
            <img src="{{ asset('images/icon-01.svg') }}" width="32" height="32" alt="Icon 01" />
        </header>
        <h2 class="mb-2 text-lg font-semibold text-slate-800">Messages</h2>
        <div class="mb-1 text-xs font-semibold uppercase text-slate-400">Total</div>
        <div class="flex items-start">
            <div class="mr-2 text-3xl font-bold text-slate-800">{{ number_format($attributes['total_messages'], 0) }}
            </div>
            <div class="text-sm font-semibold text-white px-1.5 bg-emerald-500 rounded-full">
                {{ $attributes['message_percent'] >= 0 ? '+' : '' }}{{ number_format($attributes['message_percent'], 2) }}%
            </div>
        </div>
    </div>
    <!-- Chart built with Chart.js 3 -->
    <!-- Check out src/js/components/dashboard-messages.js for config -->
    {{-- <div class="grow">
        <!-- Change the height attribute to adjust the chart height -->
        <canvas id="dashboard-messages" width="389" height="128"></canvas>
    </div> --}}
</div>
