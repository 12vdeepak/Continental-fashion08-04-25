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
                    <img src="/assets/images/forwardIcon.svg" alt="">
                    <span class="text-[#E2001A]">Settings</span>
                </div>
            </div>

            <!-- mainContent -->
            <div id="mainContent" class="flex flex-col px-4 lg:px-[120px] my-[80px] w-full gap-10">
                <div class="flex items-center justify-between">
                    <div class="heading text-[32px] lg:text-[48px] font-bold">
                        My Profile
                    </div>
                    <button id="hamburger-menu" class="p-2 md:hidden focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <div class="flex flex-col gap-10 font-medium profileContainer md:flex-row md:justify-between">
                    <!-- Sidebar -->
                    @include('frontend.my-profile.sidebar')


                    <!-- Main Content -->
                    <div class="flex flex-col w-full h-full gap-3 contentContainer md:w-3/4">
                        <div class="text-[24px] font-bold lg:text-[32px]">Settings</div>

                        <div class="flex flex-col w-full gap-2 mt-5 settingsContainer">
                            {{--  <a href="/pages/languages.html">
                                <div class="setting flex justify-between items-center px-4 py-8 bg-[#F4F4F4] rounded-xl">
                                    <div class="flex items-center settingIconAndheading">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/assets/images/languageIcon.svg') }}"
                                                alt="">
                                        </div>
                                        <div class="name">
                                            Language
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 forwardDiv">
                                        <span class="text-xs text-[#6E6E6E]">English</span>
                                        <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
                                    </div>
                                </div>
                            </a>  --}}
                            <div class="setting flex justify-between items-center px-4 py-8 bg-[#F4F4F4] rounded-xl cursor-pointer"
                                id="openPasswordPopup">
                                <div class="flex items-center settingIconAndheading">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/images/password.svg') }}" alt="">
                                    </div>
                                    <div class="name">
                                        Password
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 forwardDiv">
                                    <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
                                </div>
                            </div>
                            <div id="passwordPopup"
                                class="fixed inset-0 flex items-start justify-center hidden overflow-y-auto bg-opacity-30 backdrop-blur-sm scrollbar-hide z-100">
                                <div class="w-full max-w-md px-4 py-8 mt-10 bg-white rounded-lg shadow-lg lg:px-10">
                                    <div class="text-[24px] font-semibold mb-2 flex justify-between items-center">
                                        Change Password
                                        <img src="{{ asset('frontend/assets/images/cancel.svg') }}" alt="Close"
                                            id="closePasswordPopup" class="w-[20px] h-[20px] cursor-pointer">
                                    </div>

                                    <form action="{{ route('frontend.update-password') }}" method="POST"
                                        class="flex flex-col gap-5 mt-4">
                                        @csrf
                                        @method('PATCH')

                                        <!-- Old Password -->
                                        <div class="relative flex flex-col gap-1">
                                            <label for="old_password">Old Password <span
                                                    class="text-red-500">*</span></label>
                                            <input type="password" name="old_password" id="old_password" required
                                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-2 pr-10 focus:outline-none focus:ring-2 focus:ring-purple-500 @error('old_password') border-red-500 @enderror">
                                            <span class="absolute cursor-pointer right-3 top-9"
                                                onclick="togglePassword('old_password', 'eyeOld')">
                                                <img src="{{ asset('frontend/assets/images/eye.svg') }}" id="eyeOld"
                                                    class="w-5 h-5">
                                            </span>
                                            @error('old_password')
                                                <span class="text-sm text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- New Password -->
                                        <div class="relative flex flex-col gap-1">
                                            <label for="new_password">New Password <span
                                                    class="text-red-500">*</span></label>
                                            <input type="password" name="new_password" id="new_password" required
                                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-2 pr-10 focus:outline-none focus:ring-2 focus:ring-purple-500 @error('new_password') border-red-500 @enderror">
                                            <span class="absolute cursor-pointer right-3 top-9"
                                                onclick="togglePassword('new_password', 'eyeNew')">
                                                <img src="{{ asset('frontend/assets/images/eye.svg') }}" id="eyeNew"
                                                    class="w-5 h-5">
                                            </span>
                                            @error('new_password')
                                                <span class="text-sm text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="relative flex flex-col gap-1">
                                            <label for="confirm_password">Confirm Password <span
                                                    class="text-red-500">*</span></label>
                                            <input type="password" name="new_password_confirmation" id="confirm_password"
                                                required
                                                class="border border-gray-300 bg-[#F4F4F4] rounded-lg p-2 pr-10 focus:outline-none focus:ring-2 focus:ring-purple-500 @error('new_password_confirmation') border-red-500 @enderror">
                                            <span class="absolute cursor-pointer right-3 top-9"
                                                onclick="togglePassword('confirm_password', 'eyeConfirm')">
                                                <img src="{{ asset('frontend/assets/images/eye.svg') }}" id="eyeConfirm"
                                                    class="w-5 h-5">
                                            </span>
                                            @error('new_password_confirmation')
                                                <span class="text-sm text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Submit & Cancel -->
                                        <div class="flex justify-between mt-4">
                                            <button type="button" id="closePasswordPopupBtn"
                                                class="px-4 py-2 text-white bg-gray-400 rounded-lg">Cancel</button>
                                            <button type="submit"
                                                class="px-4 py-2 text-white bg-purple-600 rounded-lg">Update
                                                Password</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div
                                class="setting cancelOrderBtn flex justify-between items-center px-4 py-8 bg-[#F4F4F4] rounded-xl">
                                <div class="flex items-center settingIconAndheading cancelOrderBtn">
                                    <div class="icon cancelOrderBtn">
                                        <img src="{{ asset('frontend/assets/images/redBin.svg') }}" alt="">
                                    </div>
                                    <div id="openPopup" class="name cancelOrderBtn">
                                        Delete Account
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 forwardDiv cancelOrderBtn">
                                    <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Logout Confirmation Popup Modal -->
        <div id="logoutModal"
            class="fixed inset-0 flex items-center justify-center hidden bg-opacity-50 backdrop-blur-sm">
            <div class="bg-white p-6 rounded-lg shadow-xl w-[400px] border border-solid border-gray-900">
                <h2 class="text-lg font-semibold text-center">Logout?</h2>
                <p class="mt-2 text-center text-gray-600">Are you sure you want to log out?</p>
                <div class="flex justify-center gap-4 mt-4">
                    <button id="cancelLogout"
                        class="px-6 py-2 font-semibold text-blue-600 border rounded-md">Cancel</button>
                    <button id="confirmLogout"
                        class="px-6 py-2 font-semibold text-white bg-blue-600 rounded-md">Confirm</button>
                </div>
            </div>
        </div>

        <!-- Confirmation Popup Modal -->
        <!-- Button in Settings Page -->
        {{--  <button  class="px-6 py-2 font-semibold text-white bg-red-600 rounded-md">
            Delete Account
        </button>  --}}

        <!-- Delete Account Popup (Initially Hidden) -->
        <div id="deletePopup"
            class="fixed inset-0 flex items-center justify-center hidden bg-opacity-50 backdrop-blur-sm">
            <div class="bg-white p-6 rounded-lg shadow-xl w-[400px] border border-solid border-gray-900">
                <div class="flex items-center justify-center imageHolder">
                    <div
                        class="imageContainer flex justify-center items-center bg-red-300 w-[80px] h-[80px] rounded-full my-3">
                        <div class="logImg bg-red-500 flex justify-center items-center p-4 w-[60px] h-[60px] rounded-full">
                            <img src="{{ asset('frontend/assets/images/logout.svg') }}" alt=""
                                class="w-[50px] h-[50px]">
                        </div>
                    </div>
                </div>
                <h2 class="text-lg font-semibold text-center">Delete Account?</h2>
                <p class="mt-2 text-center text-gray-600">Are you sure you want to delete your account?</p>
                <div class="flex justify-center gap-4 mt-4">
                    <button id="cancelNo" class="px-6 py-2 font-semibold border rounded-md">Cancel</button>
                    <a href="{{ route('delete.account') }}"
                        onclick="return confirm('Are you sure you want to delete your account?')"
                        class="px-6 py-2 font-semibold text-white bg-red-600 rounded-md">
                        Confirm
                    </a>
                </div>
            </div>
        </div>



    </main>
@endsection
