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
                    <!-- Login
                    <img src="{{ asset('frontend/assets/images/forwardIcon.svg')}}" alt=""> -->
                    <span class="text-[#E2001A]"> Manage Password</span>
                </div>
    
            </div>
            <!-- mainContent -->
           
    
            <div  class="w-full  flex flex-col items-center justify-center  px-4  lg:px-[120px] my-[80px] w-full gap-3  ">
    
    
                <div class="centeralizer  ">
                    <div class="headingAndDescription  ">
                        <div class="heading">
                            Enter Email To Verify
                        </div>
                        <div class="description">
                            Don't we are here to help you please Verify your OTP to change password    
                        </div>
        
                    </div>
    
                    <div class="flex flex-col w-full   gap-1 mt-5">
    
    
                        <label for="OTP">Enter OTP <span class="text-red-500">*</span></label>
                        <div class="flex gap-4 ">
                            <div class="w-16 h-16 flex items-center justify-center text-2xl font-bold text-purple-800 bg-purple-100 border-2 border-purple-800 rounded-lg">
                                2
                            </div>
                            <div class="w-16 h-16 flex items-center justify-center text-2xl font-bold text-purple-800 bg-gray-300 rounded-lg">
                                2
                            </div>
                            <div class="w-16 h-16 flex items-center justify-center text-2xl font-bold text-gray-700 border-2 border-gray-300 rounded-lg">
                                -
                            </div>
                            <div class="w-16 h-16 flex items-center justify-center text-2xl font-bold text-gray-700 border-2 border-gray-300 rounded-lg">
                                -
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Verify OTP"
                        class="bg-[#54114C] text-white p-[16px] rounded-2xl cursor-pointer hover:bg-purple-700 transition text-[16px] font-bold mt-5 w-full ">
                    
                </div>
    
             
               
    
                
                
              
            </div>
    
        </section>
    </main>
@endsection