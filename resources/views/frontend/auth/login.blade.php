@extends('frontend.layouts.app')
@section('content')
    <main>
        <section id="loginPage" class=" w-full">
            <!-- pageNavShow -->
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
                <div class="currentPage text-[#E2001A] font-[500] text-[16px]">
                    Login
                </div>

            </div>
            <!-- mainContent -->
            <div id="mainContent"
                class="flex flex-col items-center px-4 sm:px-8 my-10 w-full gap-6 lg:flex-row lg:justify-between lg:px-[120px] lg:my-[80px] lg:gap-20">


                <!-- toLogin -->
                <div id="toLogin" class="w-full lg:w-1/2 ">
                    <div class="loginHeading text-[48px] font-bold">Login</div>
                    <div class="loginDescription text-[16px] text-[#6E6E6E] mt-[4] lg:mt-[16px]">Log in with your email
                        address
                        and password</div>
                    <form action="{{ route('post.frontend.login') }}" class="flex flex-col gap-5 mt-[30px]" method="post">
                        @csrf
                        <div class="flex flex-col">


                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter Your Email" required
                                class="border border-gray-300 rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex flex-col relative">
                            <label for="password">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="Enter Your Password"
                                    required
                                    class="border border-gray-300 rounded-2xl p-[16px] w-full focus:outline-none focus:ring-2 focus:ring-purple-500 @error('password') is-invalid @enderror">
                                <button type="button" id="togglePassword"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                    👁️
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" value="Login"
                            class="bg-[#54114C] text-white p-[16px] rounded-2xl cursor-pointer hover:bg-purple-700 transition text-[16px] font-bold ">
                    </form>
                </div>
                <!-- toRegister -->
                <div id="toRegister" class="flex flex-col gap-5 mt-10 lg:mt-0 p-7 lg:p-15 rounded-4xl w-full lg:w-1/2">
                    <div class="registerHeading  text-3xl lg:text-[48px] font-bold leading-none  lg:leading-[64px] ">To
                        Register
                        Customer <br> Account</div>
                    <div class="registerContent text-[#6E6E6E] text-[16px]">To create your account please click register
                        button
                        to <br> create your account</div>
                    <a href="{{ route('frontend.register') }}">
                        <div class="registerButton">
                            <button
                                class="bg-[#54114C] text-white p-[16px] rounded-2xl cursor-pointer hover:bg-purple-700 transition text-[16px] font-bold ">Register
                                Account</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
