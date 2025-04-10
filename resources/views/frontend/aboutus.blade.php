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
                    About Us
                </div>
            </div>

            <!-- mainContent -->
            <div id="mainContent" class="flex flex-col px-4 lg:px-[120px] my-[80px] w-full gap-10">
                <div class="flex headAndDescription ">
                    <div class="head text-[32px] lg:text-[48px] myProfileHead font-bold">
                        About Us
                    </div>

                </div>

                <div
                    class="flex flex-col items-center justify-between w-full gap-6 infoSectionFirst lg:flex-row lg:items-start">

                    <!-- Text Section -->
                    <div class="w-full textSection lg:w-1/2">
                        <div class="mb-4 text-2xl font-bold text-gray-900 headingSection">
                            Experience and expertise in the textile and advertising industry
                        </div>
                        <div class="paragraphSection text-[#6E6E6E] leading-relaxed">
                            Since 1991, the BASIC WEAR brand has stood for reliable product quality, an excellent
                            price-performance ratio, and ethically responsible manufacturing conditions with the import &
                            export of promotional textiles throughout Europe. Our collection includes a wide range of items
                            for leisure, work, industry, advertising, gastronomy & wellness for women, men, and children:
                            from simple T-shirts, polo shirts, and sweatshirts in popular colors to functional sports and
                            versatile outdoor clothing.
                            <br><br>
                            As a textile wholesaler, we are also involved in promotional textile finishing together with our
                            partner. In addition to our own brands: “BASIC WEAR”, “BLANKCHEQUE”, “BLUE PACIFIC”, we also
                            work with many other European brands in the advertising sector to meet the demands of our
                            customers.
                        </div>
                    </div>

                    <!-- Image Section -->
                    <div class="flex justify-center w-full photoSection lg:w-1/2 lg:justify-end">
                        <div class="relative w-full max-w-md">
                            <img src="{{ asset('frontend/assets/images/Meeting.png') }}" alt="Teamwork"
                                class="w-full h-auto rounded-lg">

                            <!-- Overlay Box -->
                            <div class="absolute bottom-0 left-0 bg-[#3CC4D5] text-white p-4 shadow-lg rounded-sm">
                                <p class="font-bold text-[20px] leading-tight">
                                    The highest <br> quality of our <br> services is <br> based on <br> experience and <br>
                                    expertise.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="seperatorHead w-full flex justify-end text-[24px] py-6 font-bold">
                    We are an importer and wholesaler and work with European brands to meet individual <br>customer
                    requirements. With us you have another important purchasing advantage:
                </div>

                <!-- section 2 -->

                <div class="flex flex-col py-10 bg-white rounded-lg md:flex-row ">
                    <!-- Image Section -->
                    <div class="w-full md:w-1/2">
                        <img src="{{ asset('frontend/assets/images/handshake.png') }}" alt="Handshake Image"
                            class="w-full h-auto rounded-lg">
                    </div>
                    <!-- Text Section -->
                    <div class="w-full mt-4 md:w-1/2 md:pl-6 md:mt-0">
                        <p class="text-[#6E6E6E]">
                            Everything from a single source. Clothing, bags, aprons, caps, hats... the complete textile
                            range also with professional embroidery and professional printing. Our production facilities in
                            Europe and the Far East also realize almost every customer request with a certificate. You
                            should take advantage of this because you can count on us.
                        </p>
                        <p class="text-[#6E6E6E]">
                            We are proud that we have been able to focus more and more on environmentally friendly materials
                            in recent years and are convinced that this change will have a lasting positive impact on the
                            textile industry. Only by acting responsibly do we have the opportunity to create a better
                            future for people and nature.
                        </p>
                    </div>
                </div>
                <!-- section 3 -->
                <div class="flex flex-col items-center justify-center headAndDescription">
                    <div class="head text-[32px] lg:text-[48px] myProfileHead font-bold">
                        Our Service
                    </div>
                    <p class="text-[#6E6E6E] text-center lg:w-1/2">
                        Our custom-made products combine precision and creativity. Whether promotional textiles, leather
                        goods, jute bags, or corporate fashion – we realize tailor-made designs, colors, and developments
                        according to customer requirements, with the highest quality and on-time delivery.
                    </p>
                </div>
                <div class="flex flex-col justify-between gap-5 image_gallery">
                    <div class="flex justify-between w-full gap-5 sectionSecond">
                        <div
                            class="relative lg:h-[320px] h-[20vh] w-1/2 rounded-3xl flex justify-center items-center items-end">
                            <img src="{{ asset('frontend/assets/images/Stock item available immediately_small text.png') }}"
                                alt="High Stock Availability"
                                class="absolute inset-0 object-cover w-full h-full rounded-3xl">
                            <div
                                class="titleHighStock mb-5 text-[#FFFFFF] text-lg font-bold text-center lg:text-[32px] z-2">
                            </div>
                        </div>
                        <div
                            class="relative lg:h-[320px] h-[20vh] w-1/2 rounded-3xl flex justify-center items-center items-end">
                            <img src="{{ asset('frontend/assets/images/Conception & Design_Small text.png') }}"
                                alt="Fast & Secure Delivery"
                                class="absolute inset-0 object-cover w-full h-full rounded-3xl">
                            <div
                                class="titleHighStock mb-5 text-[#FFFFFF] text-lg font-bold text-center lg:text-[32px] z-2">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between w-full gap-5 sectionSecond">
                        <div
                            class="relative lg:h-[320px] h-[20vh] w-1/2 rounded-3xl flex justify-center items-center items-end">
                            <img src="{{ asset('frontend/assets/images/Warehouse & Logistics_With text.png') }}"
                                alt="Affordable Prices" class="absolute inset-0 object-cover w-full h-full rounded-3xl">
                            <div
                                class="titleHighStock mb-5 text-[#FFFFFF] text-lg font-bold text-center lg:text-[32px] z-2">
                            </div>
                        </div>
                        <div
                            class="relative lg:h-[320px] h-[20vh] w-1/2 rounded-3xl flex justify-center items-center items-end">
                            <img src="{{ asset('frontend/assets/images/Sourcing & Procurement_Small text.png') }}"
                                alt="Customer Support 24/7" class="absolute inset-0 object-cover w-full h-full rounded-3xl">
                            <div
                                class="titleHighStock mb-5 text-[#FFFFFF] text-lg font-bold text-center lg:text-[32px] z-2">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </section>


    </main>
@endsection
