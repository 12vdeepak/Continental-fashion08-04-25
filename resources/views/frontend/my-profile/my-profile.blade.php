@extends('frontend.layouts.app')
@section('content')
    <main>

        <section id="loginPage" class="w-full">
            <!-- pageNavShow -->
            <div id="pageNavShow" class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4 lg:px-[120px]">
                <!-- Hamburger Menu Button -->


                <div class="backIcon">
                    <img src="{{ asset('frontend/assets/images/backIcon.svg') }}" alt="">
                </div>
                <div class="homeIcon flex gap-2 items-center font-[500] text-[#6E6E6E] text-[16px]">
                    <img src="{{ asset('frontend/assets/images/HomeIcon.svg') }}" alt=""> Home
                </div>
                <div class="line">
                    <img src="{{ asset('frontend/assets/images/Line.svg') }}" alt="">
                </div>
                <div class="currentPage text-[#E2001A] font-[500] text-[16px]">
                    My Profile

                </div>
            </div>

            <!-- mainContent -->
            <div id="mainContent" class="flex flex-col px-4 lg:px-[120px] my-[80px] w-full gap-10">
                <div class="text-[32px] lg:text-[48px] myProfileHead font-bold flex justify-between">
                    My Profile
                    <button id="hamburger-menu" class="md:hidden p-2 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <div class="profileContainer flex flex-col md:flex-row md:justify-between gap-10 font-medium">
                    <!-- sidebar -->
                    @include('frontend.my-profile.sidebar')

                    <!-- main cont -->
                    <div class="contentContainer w-full md:w-3/4 flex flex-col gap-3 justify-center">
                        <div class="shortHeading text-[24px] lg:[32px]  font-medium">
                            Manage Account
                        </div>
                        <div class="profileDiv flex w-full justify-between items-center my-7">
                            <div class="profileAndName flex items-center gap-5">
                                <div class="profileImg rounded-full">
                                    <img src="{{ $user->profile_image ? asset('storage/'.$user->profile_image) : asset('frontend/assets/images/profileImg.jpeg') }}" 
                                        alt="Profile Image" 
                                        class="w-[60px] h-[60px] md:w-[90px] md:h-[90px] lg:w-[120px] lg:h-[120px] rounded-full object-cover">
                                </div>
                                
                                <div class="nameAndemail">
                                    <div class="name text-[20px] font-bold">{{ $user->first_name ?? '' }}</div>
                                    <div class="email text-[14px] text-[#6E6E6E]">{{ $user->email ?? '' }}</div>
                                </div>
                            </div>
                            <div class="editButton text-blue-500 font-medium text-sm">
                                <a href="{{ route('frontend.editprofile') }}">
                                    <button class="cursor-pointer">Edit Profile</button>
                                </a>
                            </div>
                        </div>
                        <div class="profileInfo flex flex-col gap-3">
                            <!-- First Name & Last Name -->
                            <div id="nameAndlastName" class="flex flex-col lg:flex-row w-full gap-3 lg:gap-10">
                                <div class="flex flex-col lg:w-1/2 gap-1">
                                    <label for="firstName">First Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="first_name" id="firstName" placeholder="Enter First Name"
                                        value="{{ $user->first_name ?? '' }}" required
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                                <div class="flex flex-col lg:w-1/2 gap-1">
                                    <label for="lastName">Last Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="last_name" id="lastName" placeholder="Enter Your Last Name"
                                        value="{{ $user->last_name ?? '' }}" required
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>
                        
                            <!-- Email (Readonly) & Phone -->
                            <div id="email_PhoneNumber" class="flex flex-col lg:flex-row w-full gap-3 lg:gap-10">
                                <div class="flex flex-col lg:w-1/2 gap-1">
                                    <label for="emailAddress">Email Address</label>
                                    <input type="email" id="emailAddress" value="{{ $user->email ?? '' }}" readonly
                                        class="border border-gray-300 bg-gray-200 rounded-2xl p-[16px] cursor-not-allowed">
                                </div>
                                <div class="flex flex-col lg:w-1/2 gap-1">
                                    <label for="phoneNumber">Phone Number <span class="text-red-500">*</span></label>
                                    <input type="text" name="phone_number" id="phoneNumber" placeholder="Enter Your Phone Number"
                                        value="{{ $user->phone_number ?? '' }}"
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>
                        
                            <!-- Company & Street -->
                            <div id="companyAndStreet" class="flex flex-col lg:flex-row w-full gap-3 lg:gap-10">
                                <div class="flex flex-col lg:w-1/2 gap-1">
                                    <label for="companyName">Company Name</label>
                                    <input type="text" name="company_name" id="companyName" placeholder="Enter Company Name"
                                        value="{{ $user->company_name ?? '' }}"
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                                <div class="flex flex-col lg:w-1/2 gap-1">
                                    <label for="street">Street</label>
                                    <input type="text" name="street" id="street" placeholder="Enter Street Name"
                                        value="{{ $user->street ?? '' }}"
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </section>

        <div id="logoutModal" class="fixed inset-0 flex items-center justify-center backdrop-blur-sm hidden">
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
    </main>
@endsection
