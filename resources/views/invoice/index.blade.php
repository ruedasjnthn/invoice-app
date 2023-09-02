<x-app-layout>
    <div class="max-w-xs md:max-w-2xl mx-auto">
        <div class="mt-9 md:mt-16 xl:mt-20 flex justify-between items-center">
            <div>
                <h1 class="text-[#0C0E16] font-bold text-4xl">{{ __('Invoices') }}</h1>
                <p class="text-[#888EB0] text-xs mt-1.5 font-medium md:hidden">{{ count($invoices) }} invoices</p>
                <p class="text-[#888EB0] text-xs mt-1.5 font-medium hidden md:block">There are {{ count($invoices) }}
                    total invoices</p>
            </div>
            <div>
                <button type="button" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'create-invoice')"
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
                </button>
            </div>
        </div>
        <ul class="py-8 md:py-14 space-y-4">
            @foreach ($invoices as $invoice)
                <li>
                    <a href="{{ route('invoice.show', $invoice->id) }}">
                        <div class="flex items-center pl-8 pr-6 pt-8 pb-7 bg-white rounded-lg shadow-md">
                            <p class="flex-1">#{{ $invoice->id }}</p>
                            <p class="flex-1">{{ \Carbon\Carbon::now()->format('d M Y') }}</p>
                            <p class="flex-1">{{ $invoice->client_name }}</p>
                            <p class="flex-1">£ 1,800.90</p>
                            <p
                                class="flex-1 @if ($invoice->status === 'Pending') bg-[#FF8F00]/10 text-[#FF8F00] @elseif($invoice->status === 'Paid') bg-[#00FF00]/10 text-[#00FF00] @elseif($invoice->status === 'Draft') bg-[#0000FF]/10 text-[#0000FF] @endif">
                                {{ $invoice->status }}</p>
                            <div>
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

        <div class="container">
            <h1>Create Invoice</h1>

            <form method="POST" action="{{ route('invoice.store') }}">
                @csrf

                <!-- User ID (assuming it's the logged-in user) -->
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <!-- Client Information -->
                <div class="mb-4">
                    <label for="client_name">Client Name</label>
                    <input type="text" name="client_name" id="client_name" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="client_email">Client Email</label>
                    <input type="email" name="client_email" id="client_email" class="form-control" required>
                </div>
                <!-- Add more client fields as needed -->

                <div class="mb-4">
                    <label for="client_street_address">Client Street Address</label>
                    <input type="text" name="client_street_address" id="client_street_address" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="client_city">Client City</label>
                    <input type="text" name="client_city" id="client_city" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="client_postal_code">Client Postal Code</label>
                    <input type="text" name="client_postal_code" id="client_postal_code" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="client_country">Client Country</label>
                    <input type="text" name="client_country" id="client_country" class="form-control">
                </div>

                <!-- Your Address -->
                <div class="mb-4">
                    <label for="street_address">Your Street Address</label>
                    <input type="text" name="street_address" id="street_address" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="city">Your City</label>
                    <input type="text" name="city" id="city" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="postal_code">Your Postal Code</label>
                    <input type="text" name="postal_code" id="postal_code" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="country">Your Country</label>
                    <input type="text" name="country" id="country" class="form-control">
                </div>

                <!-- Invoice Date and Payment Terms -->
                <div class="mb-4">
                    <label for="invoice_date">Invoice Date</label>
                    <input type="date" name="invoice_date" id="invoice_date" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="payment_terms">Payment Terms</label>
                    <input type="text" name="payment_terms" id="payment_terms" class="form-control" required>
                </div>

                <!-- Project Description -->
                <div class="mb-4">
                    <label for="project_description">Project Description</label>
                    <textarea name="project_description" id="project_description" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Item List (Assuming you'll use JavaScript to dynamically add items) -->
                <div class="mb-4">
                    <label for="item_name">Item Name</label>
                    <input type="text" id="item_name" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="price">Price</label>
                    <input type="number" id="price" class="form-control">
                </div>
                <button type="button" id="addItem" class="btn btn-primary">Add Item</button>

                <!-- Invoice Status -->
                <input type="hidden" name="status" value="Pending">

                <button type="submit" class="btn btn-success mt-4">Create Invoice</button>
            </form>
        </div>

        {{-- <x-modal-invoice>
            <div>form</div>
        </x-modal-invoice> --}}
    </div>
</x-app-layout>
