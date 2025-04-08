@extends('frontend.layouts.app')
@section('content')
    <main>

        <section id="registerPage" class="w-full">
            <!-- pageNavShow -->
            <div id="pageNavShow" class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4 lg:px-[120px]">
                <div class="backIcon">
                    <img src="/assets/images/backIcon.svg" alt="">
                </div>
                <div class="homeIcon flex gap-2 items-center font-[500] text-[#6E6E6E] text-[16px]">
                    <img src="/assets/images/HomeIcon.svg" alt=""> Home
                </div>
                <div class="line">
                    <img src="/assets/images/Line.svg" alt="">
                </div>
                <div class="currentPage text-[#6E6E6E] font-[500] text-[16px] flex items-center gap-2">

                    Settings
                    <img src="/assets/images/forwardIcon.svg" alt="">
                    <span class="text-[#E2001A]">Languages</span>
                </div>
            </div>

            <!-- mainContent -->
            <div class="w-full flex flex-col md:flex-row px-4 md:px-[120px] my-[80px] gap-20">
                <!-- Sidebar -->
                @include('frontend.my-profile.sidebar')


                <!-- Main Content -->
                <div class="mainContentLang w-full md:w-3/4">
                    <div class="registerFormHeading text-[48px] font-bold">Languages</div>

                    <div class="settingsContainer mt-5 w-full flex flex-col gap-2">
                        <div class="setting flex justify-between items-center px-4 py-8 bg-[#F4F4F4] rounded-xl">
                            <div class="settingIconAndheading flex items-center">
                                <div class="name text-[18px] font-medium">
                                    English
                                </div>
                            </div>
                            <div
                                class="forwardDiv w-8 h-8 flex items-center gap-2 bg-[#ffffff] border border-dashed border-[#000000] p-1">
                                <img src="/assets/images/check.svg" alt="">
                            </div>
                        </div>
                        <div class="setting flex justify-between items-center px-4 py-8 bg-[#F4F4F4] rounded-xl">
                            <div class="settingIconAndheading flex items-center">
                                <div class="name text-[18px] font-medium">
                                    German
                                </div>
                            </div>
                            <div
                                class="forwardDiv flex items-center gap-2 bg-[#ffffff] w-8 h-8 border border-dashed border-[#000000] p-1">
                            </div>
                        </div>
                    </div>

                    <div class="saveButton flex justify-end mt-5">
                        <button class="px-8 py-4 rounded-xl font-medium bg-[#54114C] text-[#ffffff]">Save</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Success Modal -->
        <div id="successModal" class="fixed inset-0 flex items-center justify-center backdrop-blur-sm hidden">
            <div class="bg-white p-10 rounded-2xl shadow-lg w-120 flex flex-col text-center relative">
                <div class="flex justify-center">
                    <div class="bg-green-100 rounded-full p-4">
                        <svg class="w-10 h-10 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M2.25 12a9.75 9.75 0 1117.026 6.489.75.75 0 01-1.133-.975A8.25 8.25 0 104.977 8.877a.75.75 0 01.95-.976A9.733 9.733 0 0112 2.25zm14.78-3.53a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06 0l-3.5-3.5a.75.75 0 111.06-1.06l2.97 2.97 6.97-6.97a.75.75 0 011.06 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <h2 class="text-xl font-semibold mt-4">Your changes have been saved successfully</h2>
                <p class="mt-2 text-gray-600">Your language settings have been updated successfully.</p>
                <a href="/index.html">
                    <button onclick="closeModal()"
                        class="mt-4 px-6 py-2 bg-[#54114C] text-white rounded-2xl hover:bg-purple-800">
                        Continue
                    </button>
                </a>
            </div>
        </div>

    </main>
@endsection
