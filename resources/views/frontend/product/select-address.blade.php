@extends('frontend.layouts.app')
@section('content')
    <main>


        <div id="pageNavShow " class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4 lg:px-[120px] ">
            <div class="backIcon">
                <img src="{{ asset('frontend/assets/images/backIcon.svg') }}" alt="">
            </div>
            <div class="homeIcon flex gap-2 items-center font-[500] text-[#6E6E6E] text-[16px]">
                <img src="{{ asset('frontend/assets/images/HomeIcon.svg') }}" alt=""> Home
            </div>
            <div class="line">
                <img src="{{ asset('frontend/assets/images/Line.svg') }}" alt="">
            </div>
            <div class="currentPage text-[#6E6E6E] font-[500] text-[16px] flex items-center gap-2">
                Cart
                <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
                <span class="text-[#E2001A]">

                    Select Address
                </span>

            </div>

        </div>

        <!-- Select Address Section -->

        <section id="selectAddress" class="px-4 lg:px-[120px] py-[80px]">
            <div class="heading">Select a delivery address</div>
            <div class="description">Please select a delivery address to confirm your order</div>

            <!-- Delivery Address Selection -->
            <div class="shortHeading mt-7 font-medium text-[24px]">Delivery addresses ({{ $addresses->count() }})</div>
            <div class="addresses mt-5 flex flex-col gap-5">
                @if ($addresses->isNotEmpty())
                    @foreach ($addresses as $key => $address)
                        <div class="address bg-gray-100 flex p-4 gap-5 rounded-lg" data-address-id="{{ $address->id }}"
                            data-type="delivery">
                            <div class="selection flex justify-center items-center">
                                @if ($key == 0)
                                    <img src="{{ asset('frontend/assets/images/checked.svg') }}" class="w-[25px] h-[25px]">
                                @else
                                    <div class="circle w-[25px] h-[25px] bg-[#DADDDE] rounded-full"></div>
                                @endif
                            </div>
                            <div class="info">
                                <div class="nameAndDef flex gap-3 items-center">
                                    <div class="name text-[20px] font-medium">
                                        {{ $address->first_name }} {{ $address->last_name }}
                                    </div>
                                    @if ($key == 0)
                                        <div class="defaultButton text-[#3CC4D5] bg-[#3CC4D51A] p-1 rounded-lg">Default
                                        </div>
                                    @endif
                                </div>
                                <div class="description mt-2">
                                    {{ $address->street }}, {{ $address->city }}, {{ $address->state }} <br>
                                    Phone: {{ $address->phone_number }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center text-gray-500 text-lg font-semibold py-6">No Address Available</div>
                @endif
            </div>

            <!-- Same as Delivery Checkbox -->
            <div class="mt-6 flex items-center">
                <input type="checkbox" id="sameAsDelivery" class="mr-2">
                <label for="sameAsDelivery" class="font-medium">Billing address is the same as delivery</label>
            </div>

            <!-- Billing Address Selection -->
            <div id="billingAddressSection">
                <div class="shortHeading mt-7 font-medium text-[24px]">Billing addresses ({{ $addresses->count() }})</div>
                <div class="addresses mt-5 flex flex-col gap-5">
                    @foreach ($addresses as $key => $address)
                        <div class="address bg-gray-100 flex p-4 gap-5 rounded-lg" data-address-id="{{ $address->id }}"
                            data-type="billing">
                            <div class="selection flex justify-center items-center">
                                @if ($key == 0)
                                    <img src="{{ asset('frontend/assets/images/checked.svg') }}" class="w-[25px] h-[25px]">
                                @else
                                    <div class="circle w-[25px] h-[25px] bg-[#DADDDE] rounded-full"></div>
                                @endif
                            </div>
                            <div class="info">
                                <div class="nameAndDef flex gap-3 items-center">
                                    <div class="name text-[20px] font-medium">
                                        {{ $address->first_name }} {{ $address->last_name }}
                                    </div>
                                </div>
                                <div class="description mt-2">
                                    {{ $address->street }}, {{ $address->city }}, {{ $address->state }} <br>
                                    Phone: {{ $address->phone_number }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Hidden Input for Selected Addresses -->
            <form action="{{ route('frontend.confirm-order') }}" method="POST">
                @csrf
                <input type="hidden" id="selectedDeliveryAddressId" name="delivery_address_id"
                    value="{{ $addresses->first()->id ?? '' }}">
                <input type="hidden" id="selectedBillingAddressId" name="billing_address_id"
                    value="{{ $addresses->first()->id ?? '' }}">

                <div class="mt-4 flex justify-end items-center">
                    <button type="submit"
                        class="text-[#54114C] rounded-lg font-medium bg-[#54114C] px-6 py-4 text-[#FFFFFF]">
                        Confirm Order
                    </button>
                </div>
            </form>

            <!-- Add New Address Button -->
            <div class="addAddressButton mt-6">
                <button class="text-[#54114C] w-full bg-gray-100 p-4 rounded-lg font-bold">Add New Address</button>
            </div>
        </section>

        <!-- Add this inside <body>, preferably after the 'Add New Address' button -->
        <div id="addressPopup"
            class="fixed inset-0 bg-opacity-30 backdrop-blur-sm hidden flex justify-center items-start overflow-y-auto scrollbar-hide ">
            <div class="bg-white px-4 lg:px-20 py-10 mt-10 rounded-lg shadow-lg w-full max-w-2xl">
                <div class="text-[24px] font-semibold mb-2 flex justify-between items-center">
                    Add a new delivery address
                    <img src="{{ asset('frontend/assets/images/cancel.svg') }}" alt="Close" id="closePopup"
                        class="w-[20px] h-[20px] cursor-pointer">
                </div>
                <p class="description">Please fill the required delivery information to deliver the products</p>

                <form action="{{ route('addresses.store') }}" method="POST" class="mt-4 lg:mt-6 flex flex-col gap-5">
                    @csrf

                    <div id="firstAndLastName" class="flex flex-col md:flex-row w-full gap-5">
                        <div class="flex flex-col md:w-1/2 gap-1">
                            <label for="firstName">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" id="firstName" value="{{ old('first_name') }}"
                                placeholder="Enter First Name" required
                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-[10px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('first_name') border-red-500 @enderror">
                            @error('first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col md:w-1/2 gap-1">
                            <label for="lastName">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" id="lastName" value="{{ old('last_name') }}"
                                placeholder="Enter Last Name" required
                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-[10px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('last_name') border-red-500 @enderror">
                            @error('last_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div id="companyAndStreet" class="flex flex-col md:flex-row w-full gap-5">
                        <div class="flex flex-col md:w-1/2 gap-1">
                            <label for="companyName">Company Name <span class="text-red-500">*</span></label>
                            <input type="text" name="company_name" id="companyName"
                                value="{{ old('company_name') }}" placeholder="Enter Company Name" required
                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-[10px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('company_name') border-red-500 @enderror">
                            @error('company_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col md:w-1/2 gap-1">
                            <label for="street">Street <span class="text-red-500">*</span></label>
                            <input type="text" name="street" id="street" value="{{ old('street') }}"
                                placeholder="Enter Street Name" required
                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-[10px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('street') border-red-500 @enderror">
                            @error('street')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div id="zipCodeAndCity" class="flex flex-col md:flex-row w-full gap-5">
                        <div class="flex flex-col md:w-1/2 gap-1">
                            <label for="zipCode">Zip Code <span class="text-red-500">*</span></label>
                            <input type="text" name="zip_code" id="zipCode" value="{{ old('zip_code') }}"
                                placeholder="Enter Zip Code" required
                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-[10px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('zip_code') border-red-500 @enderror">
                            @error('zip_code')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col md:w-1/2 gap-1">
                            <label for="city">City <span class="text-red-500">*</span></label>
                            <input type="text" name="city" id="city" value="{{ old('city') }}"
                                placeholder="Enter City Name" required
                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-[10px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('city') border-red-500 @enderror">
                            @error('city')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div id="countryAndPhoneNumber" class="flex flex-col md:flex-row w-full gap-5">
                        <div class="flex flex-col md:w-1/2 gap-1">
                            <label for="country">Country <span class="text-red-500">*</span></label>
                            <input type="text" name="country" id="country" value="{{ old('country') }}"
                                placeholder="Enter Country Name" required
                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-[10px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('country') border-red-500 @enderror">
                            @error('country')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col md:w-1/2 gap-1">
                            <label for="phoneNumber">Phone Number <span class="text-red-500">*</span></label>
                            <input type="text" name="phone_number" id="phoneNumber"
                                value="{{ old('phone_number') }}" placeholder="Enter Phone Number" required
                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-[10px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('phone_number') border-red-500 @enderror">
                            @error('phone_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <input type="submit" value="Add Address"
                        class="bg-[#6D28D9] text-white rounded-lg p-[10px] cursor-pointer hover:bg-purple-700 transition text-[16px] font-bold mt-5">
                </form>


            </div>
        </div>

    </main>
@endsection
