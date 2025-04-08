@extends('frontend.layouts.app')
@section('content')
    <main>

        <section id="registerPage" class="w-full">
            <!-- Page Navigation -->
            <div class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4 lg:px-[120px]">
                <div class="backIcon">
                    <img src="{{ asset('frontend/assets/images/backIcon.svg')}}" alt="">
                </div>
                <div class="homeIcon flex gap-2 items-center font-[500] text-[#6E6E6E] text-[16px]">
                    <img src="{{ asset('frontend/assets/images/HomeIcon.svg')}}" alt=""> Home
                </div>
                <div class="line">
                    <img src="{{ asset('frontend/assets/images/Line.svg')}}" alt="">
                </div>
                <div class="currentPage text-[#6E6E6E] font-[500] text-[16px] flex items-center gap-2">
                    <span class="text-[#E2001A]"> Manage Password </span>
                </div>
            </div>
    
            <!-- Main Content -->
            <div class="w-full flex flex-col items-center justify-center px-4 lg:px-[120px] my-[80px] gap-3">
                <div class="centralizer">
                    <div class="headingAndDescription  ">
                        <div class="heading">
                            Give New Password
                        </div>
                        <div class="description">
                            Please enter new password to access your data
    
                        </div>
    
                    </div>
    
                    <!-- New Password Input -->
                    <div class="flex flex-col gap-1 mt-5">
                        <label for="newPass">New Password <span class="text-red-500">*</span></label>
                        <input type="password" id="newPass" placeholder="Enter Your New Password" required
                            class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
    
                    <!-- Confirm Password Input -->
                    <div class="flex flex-col gap-1 mt-5">
                        <label for="confirmPass">Confirm New Password <span class="text-red-500">*</span></label>
                        <input type="password" id="confirmPass" placeholder="Confirm New Password" required
                            class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <p id="message" class="text-sm mt-1"></p>
                    </div>
    
                    <!-- Submit Button -->
                    <button id="submitBtn"
                        class="bg-[#54114C] text-white p-[16px] rounded-2xl cursor-pointer hover:bg-purple-700 transition text-[16px] font-bold mt-5 w-full">
                        Change Password
                    </button>
                </div>
            </div>
        </section>
    
        <!-- Password Changed Popup -->
        <div id="popup"
            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded-2xl shadow-lg max-w-sm text-center">
                <div class="flex justify-center">
                    <div class="bg-green-100 rounded-full p-4">
                        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <h2 class="text-xl font-semibold mt-4">Password Changed Successfully</h2>
                <p class="text-gray-600 mt-2">Now you can access your data without worry!</p>
                <button id="closePopup"
                    class="mt-4 bg-purple-800 text-white px-6 py-2 rounded-md hover:bg-purple-600">
                    Continue
                </button>
            </div>
        </div>
        
    </main>
@endsection