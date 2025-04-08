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
                    Special Production
                </div>
            </div>

            <!-- mainContent -->
            <div id="mainContent" class="flex flex-col px-4 lg:px-[120px] my-[80px] w-full gap-10">
                <div class="headAndDescription flex justify-center items-center flex-col">
                    <div class="head text-[32px] lg:text-[48px] myProfileHead font-bold">
                        Custom Made For You
                    </div>
                    <p class="text-[#6E6E6E] text-center">
                        Browse our exclusive collections designed to fit every occasion and style. From bold to classic,
                        we’ve got you covered
                    </p>
                </div>

                <div class="boxContainer flex flex-col lg:flex-row justify-between items-center gap-4">
                    <div class="boxHolder w-full flex gap-4">
                        <div
                            class="box w-full flex flex-col gap-3 justify-center items-center py-4 px-4 bg-[#f4f4f4] rounded-xl">
                            <div class="iconBox bg-[#54114C] p-4 rounded-full">
                                <img src="{{ asset('frontend/assets/images/Group.svg') }}" alt="">
                            </div>
                            <div class="iconHeading text-lg font-bold">
                                Giveaways
                            </div>
                            {{--  <div class="boxButton bg-red-100 w-full flex text-[16px] justify-center items-center gap-2 text-[#E2001A] rounded-lg px-6 py-4" onclick="openCarousel()">
                                Explore
                                <img src="{{ asset('frontend/assets/images/redVector.svg')}}" alt="">
                            </div>  --}}
                        </div>
                        <div
                            class="box w-full flex flex-col gap-3 justify-center items-center py-4 px-4 bg-[#f4f4f4] rounded-xl">
                            <div class="iconBox bg-[#54114C] p-4 rounded-full">
                                <img src="{{ asset('frontend/assets/images/textiles.svg') }}" alt="">
                            </div>
                            <div class="iconHeading text-lg font-bold">
                                Textiles
                            </div>
                            {{--  <div class="boxButton bg-red-100 w-full flex text-[16px] justify-center items-center gap-2 text-[#E2001A] rounded-lg px-6 py-4" onclick="openCarousel()">
                                Explore
                                <img src="{{ asset('frontend/assets/images/redVector.svg')}}" alt="">
                            </div>  --}}
                        </div>
                    </div>
                    <div class="boxHolder w-full flex gap-4">
                        <div
                            class="box w-full flex flex-col gap-3 justify-center items-center py-4 px-4 bg-[#f4f4f4] rounded-xl">
                            <div class="iconBox bg-[#54114C] p-4 rounded-full">
                                <img src="{{ asset('frontend/assets/images/leatherGoods.svg') }}" alt="">
                            </div>
                            <div class="iconHeading text-lg font-bold">
                                Leather Goods
                            </div>
                            {{--  <div class="boxButton bg-red-100 w-full flex text-[16px] justify-center items-center gap-2 text-[#E2001A] rounded-lg px-6 py-4" onclick="openCarousel()">
                                Explore
                                <img src="{{ asset('frontend/assets/images/redVector.svg')}}" alt="">
                            </div>  --}}
                        </div>
                        <div
                            class="box w-full flex flex-col gap-3 justify-center items-center py-4 px-4 bg-[#f4f4f4] rounded-xl">
                            <div class="iconBox bg-[#54114C] p-4 rounded-full">
                                <img src="{{ asset('frontend/assets/images/corporateFashion.svg') }}" alt="">
                            </div>
                            <div class="iconHeading text-lg font-bold">
                                Corporate Fashion
                            </div>
                            {{--  <div class="boxButton bg-red-100 w-full flex text-[16px] justify-center items-center gap-2 text-[#E2001A] rounded-lg px-6 py-4" onclick="openCarousel()">
                                Explore
                                <img src="{{ asset('frontend/assets/images/redVector.svg')}}" alt="">
                            </div>  --}}
                        </div>
                    </div>
                </div>

                <div class="boxContainer flex flex-col lg:flex-row justify-between items-center gap-4">
                    <div class="boxHolder w-full flex gap-4">
                        <div
                            class="box w-full flex flex-col gap-3 justify-center items-center py-4 px-4 bg-[#f4f4f4] rounded-xl">
                            <div class="iconBox bg-[#54114C] p-4 rounded-full">
                                <img src="{{ asset('frontend/assets/images/homeTexttiles.svg') }}" alt="">
                            </div>
                            <div class="iconHeading text-lg font-bold">
                                Home Textiles
                            </div>
                            {{--  <div class="boxButton bg-red-100 w-full flex text-[16px] justify-center items-center gap-2 text-[#E2001A] rounded-lg px-6 py-4" onclick="openCarousel()">
                                Explore
                                <img src="{{ asset('frontend/assets/images/redVector.svg')}}" alt="">
                            </div>  --}}
                        </div>
                        <div
                            class="box w-full flex flex-col gap-3 justify-center items-center py-4 px-4 bg-[#f4f4f4] rounded-xl">
                            <div class="iconBox bg-[#54114C] p-4 rounded-full">
                                <img src="{{ asset('frontend/assets/images/accessories.png') }}" alt="">
                            </div>
                            <div class="iconHeading text-lg font-bold">
                                Accessories
                            </div>
                            {{--  <div class="boxButton bg-red-100 w-full flex text-[16px] justify-center items-center gap-2 text-[#E2001A] rounded-lg px-6 py-4" onclick="openCarousel()">
                                Explore
                                <img src="{{ asset('frontend/assets/images/redVector.svg')}}" alt="">
                            </div>  --}}
                        </div>
                    </div>
                    <div class="boxHolder w-full flex gap-4">
                        <div
                            class="box w-full flex flex-col gap-3 justify-center items-center py-4 px-4 bg-[#f4f4f4] rounded-xl">
                            <div class="iconBox bg-[#54114C] p-4 rounded-full">
                                <img src="{{ asset('frontend/assets/images/sportsArticles.svg') }}" alt="">
                            </div>
                            <div class="iconHeading text-lg font-bold">
                                Sports Articles
                            </div>
                            {{--  <div class="boxButton bg-red-100 w-full flex text-[16px] justify-center items-center gap-2 text-[#E2001A] rounded-lg px-6 py-4" onclick="openCarousel()">
                                Explore
                                <img src="{{ asset('frontend/assets/images/redVector.svg')}}" alt="">
                            </div>  --}}
                        </div>
                        <div
                            class="box w-full flex flex-col gap-3 justify-center items-center py-4 px-4 bg-[#f4f4f4] rounded-xl">
                            <div class="iconBox bg-[#54114C] p-4 rounded-full">
                                <img src="{{ asset('frontend/assets/images/handicraft.png') }}" alt="">
                            </div>
                            <div class="iconHeading text-lg font-bold">
                                Handicraft
                            </div>
                            {{--  <div class="boxButton bg-red-100 w-full flex text-[16px] justify-center items-center gap-2 text-[#E2001A] rounded-lg px-6 py-4" onclick="openCarousel()">
                                Explore
                                <img src="{{ asset('frontend/assets/images/redVector.svg')}}" alt="">
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection
