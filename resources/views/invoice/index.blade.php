<x-app-layout>
    <div class="max-w-xs md:max-w-2xl xl:max-w-3xl mx-auto">
        <div class="mt-9 md:mt-16 xl:mt-20 flex justify-between items-center">
            <div>
                <h1 class="text-[#0C0E16] font-bold text-4xl">{{ __('Invoices') }}</h1>
                <p class="text-[#888EB0] text-xs mt-1.5 font-medium md:hidden">{{ count($invoices) }} invoices</p>
                <p class="text-[#888EB0] text-xs mt-1.5 font-medium hidden md:block">There are {{ count($invoices) }}
                    total invoices</p>
            </div>
            <div>
                <a href="{{ route('invoice.create') }}"
                    class="w-[5.625rem] h-11 bg-[#7C5DFA] rounded-3xl flex items-center gap-x-2 pl-1.5 text-sm font-bold text-white md:w-[9.375rem] md:h-12 md:gap-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                        fill="none">
                        <circle cx="16" cy="16" r="16" fill="white" />
                        <path
                            d="M17.3131 21.0234V17.3136H21.0229V14.7333H17.3131V11.0234H14.7328V14.7333H11.0229V17.3136H14.7328V21.0234H17.3131Z"
                            fill="#7C5DFA" />
                    </svg>
                    <span class="md:hidden">{{ __('New') }}</span>
                    <span class="hidden md:block">{{ __('New Invoice') }}</span>
                </a>
            </div>
        </div>

        <ul class="py-8 md:py-14 space-y-4">
            @foreach ($invoices as $invoice)
                <li>
                    <a href="{{ route('invoice.show', $invoice->id) }}">
                        <div class="block md:hidden">
                            <p class="font-bold text-[#0C0E16]"><span
                                    class="text-[#7E88C3]">#</span>{{ $invoice->id }}</p>
                        </div>
                        <div class="hidden md:flex items-center pl-8 pr-6 pt-8 pb-7 bg-white rounded-lg shadow-md">
                            <p class="flex-1 font-bold text-[#0C0E16]"><span
                                    class="text-[#7E88C3]">#</span>{{ $invoice->id }}</p>
                            <p class="flex-1 text-[#858BB2] font-medium">
                                Due {{ \Carbon\Carbon::now()->format('d M Y') }}
                            </p>
                            <p class="flex-1 text-[#858BB2] font-medium">{{ $invoice->client_name }}</p>
                            <p class="flex-1 text-[#0C0E16] font-bold text-right">£ 1,800.90</p>
                            <div
                                class="flex gap-x-2 items-center py-3 w-[6.5rem] justify-center ml-10 rounded-md @if ($invoice->status === 'Pending') bg-[#FF8F00]/5 text-[#FF8F00] @elseif($invoice->status === 'Paid') bg-[#00FF00]/5 text-[#00FF00] @elseif($invoice->status === 'Draft') bg-[#0000FF]/5 text-[#0000FF] @endif">
                                <div
                                    class="w-2 h-2 rounded-full @if ($invoice->status === 'Pending') bg-[#FF8F00] @elseif($invoice->status === 'Paid') bg-[#00FF00] @elseif($invoice->status === 'Draft') bg-[#0000FF] @endif">
                                </div>
                                <p class="font-bold">{{ $invoice->status }}</p>
                            </div>
                            <div class="ml-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10"
                                    fill="none">
                                    <path d="M1 1L5 5L1 9" stroke="#7C5DFA" stroke-width="2" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
