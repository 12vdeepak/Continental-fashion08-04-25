@extends('frontend.layouts.app')
@section('content')
    <main>

        <section id="loginPage" class="w-full">
            <!-- pageNavShow -->
            <div id="pageNavShow" class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4 lg:px-[120px]">
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
                    My Profile
                    <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
                    <span class="text-[#E2001A]">Manage Address</span>
                </div>
            </div>

            <!-- mainContent -->
            <div id="mainContent" class="flex flex-col px-4 lg:px-[120px] my-[80px] w-full gap-10">
                <div class="flex justify-between items-center">
                    <div class="heading text-[32px] lg:text-[48px] font-bold">
                        My Profile
                    </div>
                    <button id="hamburger-menu" class="md:hidden p-2 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <div class="profileContainer flex flex-col md:flex-row md:justify-between gap-10 font-medium">
                    <!-- Sidebar -->
                    @include('frontend.my-profile.sidebar')


                    <!-- Main Content -->
                    <div class="contentContainer w-full md:w-3/4 h-full flex flex-col gap-3 justify-center">
                        <div class="text-[24px] lg:text-[32px]">Manage Addresses</div>
                        <div class="description">
                            Please select a delivery address to confirm your order
                        </div>

                        <div class="addresses mt-5 flex flex-col gap-5">
                            @if ($addresses->isEmpty())
                                <div class="info w-full text-center text-gray-500">
                                    No address available
                                </div>
                            @else
                                @foreach ($addresses as $index => $address)
                                    <div class="address bg-gray-100 flex p-4 gap-5 rounded-lg">
                                        <div class="selection flex justify-center items-center">
                                            @if ($index == 0 || $address->is_default)
                                                {{-- Show checked icon for the first/default address --}}
                                                <img src="{{ asset('frontend/assets/images/checked.svg') }}" alt=""
                                                    class="w-[25px] h-[25px]">
                                            @else
                                                {{-- Show empty circle for non-default addresses --}}
                                                <div class="circle w-[25px] h-[25px] bg-[#DADDDE] rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="info w-full">
                                            <div class="nameDefDel flex justify-between w-full">
                                                <div class="nameAndDef flex gap-3 items-center">
                                                    <div class="name text-[20px] font-medium">{{ $address->first_name }}
                                                    </div>
                                                    @if ($index == 0 || $address->is_default)
                                                        <div
                                                            class="defaultButton text-[#3CC4D5] bg-[#3CC4D51A] p-1 rounded-lg">
                                                            Default
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="delete">
                                                    <form action="{{ route('address.delete', $address->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">
                                                            <img class="cancelOrderBtn"
                                                                src="{{ asset('frontend/assets/images/bin.svg') }}"
                                                                alt="">
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="description mt-2">
                                                {{ $address->street }}, {{ $address->city }}, {{ $address->country }} <br>
                                                Phone number: {{ $address->phone_number }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        {{-- Add New Address Button (Only one instance) --}}
                        <div class="addAddressButton">
                            <button class="text-[#54114C] w-full bg-gray-100 p-4 rounded-lg font-bold">
                                Add New Address
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Address Popup -->
        <div id="addressPopup"
            class="fixed inset-0 bg-opacity-30 backdrop-blur-sm hidden flex justify-center items-start overflow-y-auto scrollbar-hide z-100">
            <div class="bg-white px-4 lg:px-20 py-10 mt-10 rounded-lg shadow-lg w-full max-w-2xl">
                <div class="text-[24px] font-semibold mb-2 flex justify-between items-center">
                    Add a new delivery address
                    <img src="{{ asset('frontend/assets/images/cancel.svg') }}" alt="Close" id="closePopup"
                        class="w-[20px] h-[20px] cursor-pointer">
                </div>
                <p class="description">Please fill the required delivery information to deliver the products</p>

                <form action="{{ route('manage.addresses.store') }}" method="POST"
                    class="mt-4 lg:mt-6 flex flex-col gap-5">
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
                            <input type="text" name="company_name" id="companyName" value="{{ old('company_name') }}"
                                placeholder="Enter Company Name" required
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

        <style>
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }

            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>

        <!-- Logout Confirmation Popup Modal -->
        <div id="logoutModal"
            class="fixed inset-0 backdrop-blur-sm bg-opacity-50 hidden flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-xl w-[400px] border border-solid border-gray-900">
                <h2 class="text-lg font-semibold text-center">Logout?</h2>
                <p class="text-gray-600 text-center mt-2">Are you sure you want to log out?</p>
                <div class="mt-4 flex justify-center gap-4">
                    <button id="cancelLogout"
                        class="px-6 py-2 border rounded-md text-blue-600 font-semibold">Cancel</button>
                    <button id="confirmLogout"
                        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md">Confirm</button>
                </div>
            </div>
        </div>

        <!-- Confirmation Popup Modal -->
        <div id="popupModal" class="fixed inset-0 backdrop-blur-sm bg-opacity-50 hidden flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-xl w-[400px] border border-solid border-gray-900">
                <h2 class="text-lg font-semibold text-center">Delete Address?</h2>
                <p class="text-gray-600 text-center mt-2">Are you sure you want to delete this address?</p>
                <div class="mt-4 flex justify-center gap-4">
                    <button id="cancelNo" class="px-6 py-2 border rounded-md text-blue-600 font-semibold">Cancel</button>
                    <button id="cancelYes"
                        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md">Confirm</button>
                </div>
            </div>
        </div>
    </main>
@endsection
