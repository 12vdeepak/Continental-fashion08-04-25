@extends('frontend.layouts.app')
@section('content')
    <main>


        <section id="carouselSection" class="flex items-center justify-center h-[70vh]">
            <div class="relative w-full h-[70vh] overflow-hidden rounded-lg" id="carousel">
                <!-- Background Image -->
                <div class="absolute inset-0 transition-all duration-500 bg-top bg-cover" id="bannerContainer"></div>
                <div class="absolute inset-0 bg-black/50"></div>

                <!-- Static Content -->
                <div
                    class="relative z-10 flex flex-col justify-end items-end w-full h-full px-6 sm:px-12 md:px-16 lg:px-[100px] py-8 text-white">
                    <div class="contentCarousel w-full sm:max-w-[80%] md:max-w-[50%] lg:max-w-[30vw]">
                        <h2 id="title" class="text-2xl font-bold leading-tight sm:text-3xl md:text-4xl">
                            <!-- Dynamic title will be inserted here -->
                        </h2>
                        <p id="description" class="w-full mt-4 text-base sm:text-lg md:text-xl">
                            <!-- Dynamic description will be inserted here -->
                        </p>
                        <a href="{{ route('frontend.all.product') }}">
                            <button id="shopBtn"
                                class="mt-6 px-4 sm:px-6 py-2 sm:py-3 bg-[#54114C] hover:bg-purple-700 text-white text-base sm:text-lg font-semibold rounded-lg transition duration-300">
                                Shop Now →
                            </button>
                        </a>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button id="prevSlide"
                    class="absolute z-10 flex items-center justify-center w-8 h-8 p-3 text-white transform -translate-y-1/2 bg-gray-100 rounded-full left-4 top-1/2 hover:bg-gray-300 lg:h-12 lg:w-12">
                    <img src="{{ asset('frontend/assets/images/productBack.svg') }}" alt="Previous">
                </button>
                <button id="nextSlide"
                    class="absolute z-10 flex items-center justify-center w-8 h-8 p-3 text-white transform -translate-y-1/2 bg-gray-100 rounded-full right-4 top-1/2 hover:bg-gray-300 lg:h-12 lg:w-12">
                    <img src="{{ asset('frontend/assets/images/forwardArrow.svg') }}" alt="Next">
                </button>
            </div>
        </section>


        <br><br>
        <section id="brandLogos" class="w-full py-10 bg-gray-100">
            <div class="container mx-auto">
                <h2 class="mb-6 text-3xl font-bold text-center">Our Trusted Brands</h2>
                <div class="relative overflow-hidden">
                    <div class="flex gap-10 animate-scroll whitespace-nowrap"
                        onmouseover="this.style.animationPlayState='paused'"
                        onmouseout="this.style.animationPlayState='running'">

                        @foreach ($brands as $brand)
                            @if ($brand->brand_logo)
                                <a href="{{ route('search', ['query' => $brand->brand_name]) }}">
                                    <img src="{{ asset('storage/' . $brand->brand_logo) }}" alt="{{ $brand->brand_name }}"
                                        class="object-contain h-20 max-w-none">
                                </a>
                            @endif
                        @endforeach

                        <!-- Repeat for smooth scrolling -->
                        @foreach ($brands as $brand)
                            @if ($brand->brand_logo)
                                <a href="{{ route('search', ['query' => $brand->brand_name]) }}">
                                    <img src="{{ asset('storage/' . $brand->brand_logo) }}" alt="{{ $brand->brand_name }}"
                                        class="object-contain h-20 max-w-none">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>




        <br><br>
        <section id="singleImage" class="w-full py-2 bg-white md:py-8">
            <div class="container mx-auto text-center">
                <h2 class="mb-2 text-xl font-bold md:text-3xl">Stock items - available immediate delivery</h2>
                <img src="{{ asset('frontend/assets/images/featured_brand.png') }}"
                    class="object-contain mx-auto h-80 md:h-[500px] lg:h-[600px] w-auto">
            </div>
        </section>





        <!-- === Benifits of purchasing from us ==== -->

        <section id="benifits_of_purchasing" class="flex flex-col gap-10 px-4 lg:px-[120px] my-[80px]">

            <div class="flex flex-col items-center justify-center gap-3 heading_description">
                <div class="title text-[58px] font-bold text-center leading-[75px]">
                    Our Services
                </div>
                <div class="description text-md text-[#6E6E6E] text-center">
                    Browse our exclusive collections designed to fit every occasion and style. <br>
                    From bold to classic, we’ve got you covered
                </div>
            </div>

            <div class="flex flex-col justify-between gap-5 image_gallery">
                <div class="flex justify-between w-full gap-5 sectionSecond">
                    <div
                        class="relative lg:h-[320px] h-[20vh] w-1/2 rounded-3xl flex justify-center items-center items-end">
                        <img src="{{ asset('frontend/assets/images/high4.jpeg') }}" alt="High Stock Availability"
                            class="absolute inset-0 object-cover w-full h-full rounded-3xl">
                        <div class="titleHighStock mb-5 text-[#FFFFFF] text-lg font-bold text-center lg:text-[32px] z-2">
                        </div>
                    </div>
                    <div
                        class="relative lg:h-[320px] h-[20vh] w-1/2 rounded-3xl flex justify-center items-center items-end">
                        <img src="{{ asset('frontend/assets/images/high3.jpeg') }}" alt="Fast & Secure Delivery"
                            class="absolute inset-0 object-cover w-full h-full rounded-3xl">
                        <div class="titleHighStock mb-5 text-[#FFFFFF] text-lg font-bold text-center lg:text-[32px] z-2">
                        </div>
                    </div>
                </div>
                <div class="flex justify-between w-full gap-5 sectionSecond">
                    <div
                        class="relative lg:h-[320px] h-[20vh] w-1/2 rounded-3xl flex justify-center items-center items-end">
                        <img src="{{ asset('frontend/assets/images/Warehouse & Logistics_With text.png') }}"
                            alt="Affordable Prices" class="absolute inset-0 object-cover w-full h-full rounded-3xl">
                        <div class="titleHighStock mb-5 text-[#FFFFFF] text-lg font-bold text-center lg:text-[32px] z-2">
                        </div>
                    </div>
                    <div
                        class="relative lg:h-[320px] h-[20vh] w-1/2 rounded-3xl flex justify-center items-center items-end">
                        <img src="{{ asset('frontend/assets/images/high1.jpeg') }}" alt="Customer Support 24/7"
                            class="absolute inset-0 object-cover w-full h-full rounded-3xl">
                        <div class="titleHighStock mb-5 text-[#FFFFFF] text-lg font-bold text-center lg:text-[32px] z-2">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ===== Our Popular Category ====== -->

        <section id="popularCategory" class="px-4 lg:px-[120px] my-[80px] w-full ">

            <!-- ============ heading description and button ====================== -->

            <div id="heading_Button" class="flex flex-col justify-between lg:flex-row lg:items-end ">
                <div class="flex flex-col heading_description ">
                    <div class="heading_news_offer text-[32px] lg:text-[58px] font-bold  ">
                        Our Popular Category
                    </div>
                    <div class="description_popular_category my-3 text-[16px] text-[#6E6E6E] ">
                        Browse our exclusive collections designed to fit every occasion and style. From bold to classic,
                        we’ve got you covered </div>

                </div>
                <a href="{{ route('frontend.all.product') }}">
                    <div class="viewAllButton">
                        <button class="px-[24px] py-[14px] font-medium bg-[#54114C] text-[#FFFFFF] rounded-2xl ">
                            View All
                        </button>
                    </div>
                </a>
            </div>

            <!-- ============== product showcase ============= -->
            <div id="product_showcase" class="my-[50px] flex flex-col gap-10 w-full">
                @if ($products->isEmpty())
                    <!-- No Products Message -->
                    <div class="text-lg font-semibold text-center text-gray-500">
                        No products available.
                    </div>
                @else
                    @foreach ($products->chunk(3) as $productRow)
                        <!-- Each Row -->
                        <div class="grid w-full grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($productRow as $product)
                                <a href="{{ route('frontend.all.product-page', $product->id) }}" class="w-full">
                                    <div
                                        class="flex flex-col w-full transition-shadow duration-300 bg-white shadow-md productCard rounded-2xl hover:shadow-lg">
                                        <div
                                            class="w-full h-[300px] overflow-hidden flex justify-center items-center bg-gray-100 rounded-t-2xl">
                                            @if ($product->images->isNotEmpty())
                                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                                    class="object-cover w-full h-full transition-transform duration-300 hover:scale-105 rounded-t-2xl"
                                                    alt="{{ $product->product_name }}">
                                            @else
                                                <img src="{{ asset('frontend/assets/images/default-placeholder.jpg') }}"
                                                    class="object-cover w-full h-full rounded-t-2xl"
                                                    alt="No Image Available">
                                            @endif
                                        </div>

                                        <div class="p-4">
                                            <p class="text-sm text-gray-500">
                                                @if ($product->brands->count() > 0)
                                                    @foreach ($product->brands as $brand)
                                                        {{ $brand->brand_name }}{{ !$loop->last ? ', ' : '' }}
                                                    @endforeach
                                                @else
                                                    No Brand
                                                @endif
                                            </p>

                                            <h3 class="text-[20px] lg:text-[24px] font-medium mb-3">
                                                {{ $product->product_name }}</h3>

                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>





        </section>

        <!-- ===== News And Offer ====== -->
        <section id="newsAndOffer" class="px-4 w-full lg:px-[120px] my-[80px]">
            <div class="flex flex-col justify-between lg:flex-row lg:items-end">
                <div>
                    <h2 class="text-[32px] lg:text-[58px] font-bold">News & Offer</h2>
                    <p class="mt-2 text-[16px] text-gray-600 max-w-2xl">
                        Browse our exclusive collections designed to fit every occasion and style. From bold to classic,
                        we’ve got you covered.
                    </p>
                </div>
            </div>

            <div class="mt-[50px] space-y-10">
                @foreach ($newsOffers->chunk(3) as $chunk)
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($chunk as $newsOffer)
                            <div class="transition-shadow duration-300 bg-white shadow-md rounded-2xl hover:shadow-lg">
                                <div class="w-full h-[250px] overflow-hidden rounded-t-2xl bg-gray-200">
                                    <img src="{{ asset('storage/' . $newsOffer->image) }}" alt="{{ $newsOffer->title }}"
                                        class="object-cover object-top w-full h-full transition-transform duration-300 hover:scale-105">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-[20px] sm:text-[22px] lg:text-[24px] font-medium">
                                        {!! Str::words(strip_tags($newsOffer->title), 10, '...') !!}
                                    </h3>
                                    <p class="mt-2 text-[14px] sm:text-[16px] text-gray-600">
                                        {!! Str::words(strip_tags($newsOffer->description), 20, '...') !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>



        <!-- ===== Why people trust us ====  -->

        <section id="benifits_of_purchasing" class="flex flex-col gap-10 px-4 lg:px-[120px] my-[80px]">

            <div class="flex flex-col items-center justify-center gap-3 heading_description">

                <div class="title text-[32px] text-[58px] font-bold text-center leading-[75px] ">Why people trust us?</div>
                <div class="description text-md text-[#6E6E6E] text-center ">Browse our exclusive collections designed to
                    fit every occasion and style. <br> From bold to classic, we’ve got you covered</div>

            </div>
            <div class="flex flex-col justify-between gap-10 image_gallery lg:flex-row ">
                <div class="sectionFirst flex flex-col bg-[#F4F4F4] rounded-3xl p-10 ">
                    <div class="mb-2 bigRoundSvg">
                        <img src="{{ asset('frontend/assets/images/rocket.svg') }}" alt="">
                    </div>
                    <div class="headingShort text-[24px] font-medium mt-5 mb-3  ">More than 35 years of experience </div>
                    <div class="content text-[16px] text-[#6E6E6E] w-[90%]">
                        <p>


                            We have been in the textile and advertising industry for over 30 years, providing high-quality
                            products since 1991. Our textiles are durable, comfortable, and available in many styles. We
                            ensure ethical production by working with certified factories in Europe and the Far East.
                            <br>
                        <p class="mt-5">

                            As a one-stop supplier, we offer a wide range of products, including clothing, bags, aprons, and
                            caps, along with professional embroidery and printing services. In addition to our own brands
                            (BASIC WEAR, BLANKCHEQUE, BLUE PACIFIC), we work with top European brands to meet customer
                            needs. We also handle custom orders with high-quality, certified production.

                        </p>

                        <p class="mt-5">

                            Sustainability is important to us, and we are using more eco-friendly materials to reduce our
                            impact on the environment. Our focus on quality, reliability, and customer satisfaction has
                            helped us build long-term trust. Whether you need bulk orders or customized textiles, we are
                            here to help—all in one place!

                        </p>

                        </p>
                    </div>

                </div>
                <div class="sectionSecond flex flex-col bg-[#F4F4F4] rounded-3xl p-10  ">
                    <div class="mb-2 bigRoundSvg">
                        <img src="{{ asset('frontend/assets/images/rocket.svg') }}" alt="">
                    </div>
                    <div class="headingShort text-[24px] font-medium mt-5 mb-3  ">Serving You for More Than 35 Years </div>
                    <div class="content text-[16px] text-[#6E6E6E] w-[90%]">
                        <p>


                            People trust us because we have been in the textile and advertising industry for over 30 years,
                            which means we have a lot of experience and knowledge. Since 1991, we have been providing
                            high-quality textiles that are durable, comfortable, and available in different styles and
                            colors to meet various needs.
                            <br>
                        <p class="mt-5">

                            We make sure our products are made under fair and ethical conditions. Our manufacturing partners
                            in Europe and the Far East follow strict quality and labor standards, ensuring safe and
                            responsible production.

                        </p>

                        <p class="mt-5">
                            Customers choose us because we offer everything in one place. We supply clothing, bags, aprons,
                            caps, and more, and we also provide embroidery and printing services to customize products. In
                            addition to our own brands (BASIC WEAR, BLANKCHEQUE, BLUE PACIFIC), we work with well-known
                            European brands to give our customers more options. We also handle custom orders, making sure
                            they meet high-quality standards and certifications.
                        </p>

                        <p class="mt-5">
                            We care about the environment and are using more eco-friendly materials to reduce our impact on
                            the planet. Our focus is on providing great products, reliable service, and flexible solutions.
                            That’s why customers continue to trust us—whether they need large orders or customized textiles,
                            we make the process easy and efficient.
                        </p>

                        </p>
                    </div>

                </div>


            </div>

        </section>

    </main>
@endsection
