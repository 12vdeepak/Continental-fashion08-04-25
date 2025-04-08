@extends('frontend.layouts.app')
@section('content')
    <main>
        <section id="registerPage" class=" w-full">
            <!-- pageNavShow -->
            <div id="pageNavShow " class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4 lg:px-[120px] ">
                <div class="backIcon">
                    <img src="{{ asset('frontend/assets/images/backIcon.svg')}}" alt="">
                </div>
                <div class="homeIcon flex gap-2 items-center font-[500] text-[#6E6E6E] text-[16px]">
                    <img src="{{ asset('frontend/assets/images/HomeIcon.svg')}}" alt=""> Home
                </div>
                <div class="line">
                    <img src="{{ asset('frontend/assets/images/Line.svg')}}" alt="">
                </div>
                <div class="currentPage text-[#6E6E6E]  font-[500] text-[16px] flex items-center gap-2">
                    <!-- My Profile
                    <img src="{{ asset('frontend/assets/images/forwardIcon.svg')}}" alt="">
                    Settings -->
                    <!-- <img src="/assets/images/forwardIcon.svg" alt=""> -->
                    <span class="text-[#E2001A]"> Manage Password </span>
                </div>
    
            </div>
            <!-- mainContent -->
           
    
            <div  class="w-full  flex flex-col items-center justify-center  px-4  lg:px-[120px] my-[80px] w-full gap-3  ">
    
                <div class="centralizer">
                    <div class="headingAndDescription  ">
                        <div class="heading">
                            Enter Email To Verify
                        </div>
                        <div class="description">
                            please enter your Email to send OTP
            
                        </div>
        
                    </div>
                    <div class="flex flex-col   gap-1 mt-5">
    
    
                        <label for="emailAddress">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="emailAddress" placeholder="Enter Your Email" required
                            class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
        
                    <input type="submit" value="Send OTP"
                            class="bg-[#54114C] text-white p-[16px] rounded-2xl cursor-pointer hover:bg-purple-700 transition text-[16px] font-bold mt-5 w-full  ">
    
                </div>
                
               
                
              
            </div>
    
        </section>
        
    </main>
@endsection