<x-app-layout>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="bg-white">
        <div class="max-w-xs md:max-w-2xl mx-auto py-16">
            <h1 class="text-2xl font-bold text-[#0C0E16]">New Invoice</h1>
            <form method="POST" action="{{ route('invoice.store') }}">
                @csrf

                <input type="text" name="user_id" value="{{ $user->id }}" hidden>

                <div class="mt-11">
                    <p class="font-bold text-[#7C5DFA]">Bill From</p>
                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full text-sm">
                            <label for="street_address" class="font-medium text-[#7E88C3]">Street Address</label>
                            <input type="text" name="street_address" value="{{ old('street_address') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="text-sm font-medium text-[#7E88C3]">City</label>
                            <input type="text" name="city" value="{{ old('city') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="postal_code" class="text-sm font-medium text-[#7E88C3]">Postal Code</label>
                            <input type="text" name="postal_code" value="{{ old('postal_code') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="country" class="text-sm font-medium text-[#7E88C3]">Country</label>
                            <input type="text" name="country" value="{{ old('country') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                    </div>
                </div>
                <div class="mt-11">
                    <p class="font-bold text-[#7C5DFA]">Bill To</p>
                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="client_name" class="text-sm font-medium text-[#7E88C3]">Client's Name</label>
                            <input type="text" name="client_name" value="{{ old('client_name') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="col-span-full">
                            <label for="client_email" class="text-sm font-medium text-[#7E88C3]">Client's Email</label>
                            <input type="email" name="client_email" value="{{ old('client_email') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="col-span-full">
                            <label for="client_street_address" class="text-sm font-medium text-[#7E88C3]">Street
                                Address</label>
                            <input type="text" name="client_street_address"
                                value="{{ old('client_street_address') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="client_city" class="text-sm font-medium text-[#7E88C3]">City</label>
                            <input type="text" name="client_city" value="{{ old('client_city') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="client_postal_code" class="text-sm font-medium text-[#7E88C3]">Postal
                                Code</label>
                            <input type="text" name="client_postal_code" value="{{ old('client_postal_code') }}"
                                required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="client_country" class="text-sm font-medium text-[#7E88C3]">Country</label>
                            <input type="text" name="client_country" value="{{ old('client_country') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                    </div>
                </div>
                <div class="mt-11">
                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="invoice_date" class="text-sm font-medium text-[#7E88C3]">Invoice Date</label>
                            <input type="date" name="invoice_date" value="{{ old('invoice_date') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="sm:col-span-3">
                            <label for="payment_terms" class="text-sm font-medium text-[#7E88C3]">Payment Terms</label>
                            <input type="text" name="payment_terms" value="{{ old('payment_terms') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                        <div class="col-span-full">
                            <label for="project_description" class="text-sm font-medium text-[#7E88C3]">Project
                                Description</label>
                            <input type="text" name="project_description"
                                value="{{ old('project_description') }}" required
                                class="block w-full mt-2 px-5 pt-[1.125rem] pb-4 rounded-[4px] border-0 ring-inset ring-1 ring-[#DFE3FA] text-[#0C0E16] font-semibold focus:ring-[#9277FF] focus:ring-inset focus:ring-2">
                        </div>
                    </div>
                </div>
                <input type="text" name="item_list" value='["Item 1","Item 2"]' hidden>
                <input type="text" name="status" value="Pending" hidden>
                <div x-data="{ items: [] }">
                    <template x-for="(item, index) in items" :key="index">
                        <div>
                            <input type="text" :name="'items[' + index + ']'" x-model="item">
                            <button type="button" @click="items.splice(index, 1)">Remove</button>
                        </div>
                    </template>
                    <button type="button" @click="items.push('')">Add Item</button>
                </div>


                <div class="flex mt-12 justify-between">
                    <a href="{{ route('invoice.index') }}"
                        class="text-[#7E88C3] px-6 py-[1.125rem] bg-[#F9FAFE] rounded-full font-bold">Discard</a>
                    <div class="space-x-2">
                        <button
                            class="text-[#888EB0] px-4 md:px-6 py-[1.125rem] bg-[#373B53] rounded-full font-bold">Save
                            as
                            Draft</button>
                        <button type="submit"
                            class="text-[#FFFFFF] px-6 py-[1.125rem] bg-[#7C5DFA] rounded-full font-bold">
                            Save & Send
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
