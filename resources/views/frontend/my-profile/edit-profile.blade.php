@extends('frontend.layouts.app')
@section('content')
    <main>
        <section id="registerPage" class=" w-full">
            <!-- pageNavShow -->
            <div id="pageNavShow " class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-[120px] ">
                <div class="backIcon">
                    <img src="{{ asset('frontend/assets/images/backIcon.svg') }}" alt="">
                </div>
                <div class="homeIcon flex gap-2 items-center font-[500] text-[#6E6E6E] text-[16px]">
                    <img src="{{ asset('frontend/assets/images/HomeIcon.svg') }}" alt=""> Home
                </div>
                <div class="line">
                    <img src="{{ asset('frontend/assets/images/Line.svg') }}" alt="">
                </div>
                <div class="currentPage text-[#6E6E6E]  font-[500] text-[16px] flex items-center gap-2">
                    My Profile
                    <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
                    <span class="text-[#E2001A]"> Edit Profile </span>
                </div>

            </div>

            <div class="mainContent px-[120px] py-[80px]">
                <div class="contentContainer flex flex-col gap-3 justify-center">
                    <div class="shortHeading text-[32px] font-bold">
                        Edit Profile
                    </div>

                    <!-- Profile Image and Name -->
                    <div class="profileDiv flex w-full justify-between items-center my-7">
                        <div class="profileAndName flex items-center gap-5">
                            <!-- Profile Image -->
                            <div class="profileImg rounded-full relative">
                                <img id="profilePreview"
                                    src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('frontend/assets/images/profileImg.jpeg') }}"
                                    alt="Profile Image" class="w-[120px] h-[120px] rounded-full object-cover">

                                <!-- Hidden File Input - placed right after the label that references it -->

                                <!-- Edit Icon (Trigger File Input) -->
                                <label for="profileImageInput"
                                    class="absolute bottom-2 right-2 cursor-pointer bg-white p-1 rounded-full shadow-md">
                                    <img src="{{ asset('frontend/assets/images/editIcon.svg') }}" alt="Edit"
                                        class="w-5 h-5">
                                </label>
                            </div>

                            <div class="nameAndemail">
                                <div class="name text-[12px] text-blue-500 flex items-center gap-2">
                                    Change Profile Picture
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Profile Form -->
                    <form action="{{ route('frontend.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="profileInfo flex flex-col gap-3">
                            <!-- First Name & Last Name -->
                            <div class="flex w-full gap-10">
                                <div class="flex flex-col w-1/2 gap-1">
                                    <label for="firstName">First Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="first_name" id="firstName"
                                        value="{{ $user->first_name ?? '' }}" required
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                                <div class="flex flex-col w-1/2 gap-1">
                                    <label for="lastName">Last Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="last_name" id="lastName"
                                        value="{{ $user->last_name ?? '' }}" required
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>
                            <input type="file" id="profileImageInput" name="profile_image" class="hidden">



                            <!-- Email & Phone -->
                            <div class="flex w-full gap-10">
                                <div class="flex flex-col w-1/2 gap-1">
                                    <label for="emailAddress">Email Address</label>
                                    <input type="email" id="emailAddress" name="email" value="{{ $user->email ?? '' }}"
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                                <div class="flex flex-col w-1/2 gap-1">
                                    <label for="phoneNumber">Phone Number <span class="text-red-500">*</span></label>
                                    <input type="text" name="phone_number" id="phoneNumber"
                                        value="{{ $user->phone_number ?? '' }}"
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>

                            <!-- Company & Street -->
                            <div class="flex w-full gap-10">
                                <div class="flex flex-col w-1/2 gap-1">
                                    <label for="companyName">Company Name</label>
                                    <input type="text" name="company_name" id="companyName"
                                        value="{{ $user->company_name ?? '' }}"
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                                <div class="flex flex-col w-1/2 gap-1">
                                    <label for="street">Street</label>
                                    <input type="text" name="street" id="street" value="{{ $user->street ?? '' }}"
                                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="buttonsDiv flex justify-end font-bold items-center gap-5 mt-5">
                                <div
                                    class="button w-[150px] bg-gray-100 flex justify-center items-center rounded-2xl px-6 py-4 text-[#000000]">
                                    Cancel
                                </div>
                                <button type="submit"
                                    class="button p-6 bg-[#54114C] text-[#ffffff] w-[150px] flex justify-center items-center rounded-2xl px-6 py-4">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




        </section>

    </main>
@endsection
