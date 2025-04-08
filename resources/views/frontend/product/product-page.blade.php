@extends('frontend.layouts.app')
@section('content')
    <main>


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
            <div class="currentPage text-[#6E6E6E] font-[500] text-[16px] flex items-center gap-2">
                All Products
                <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
                <span class="text-[#E2001A]">
                    {{ $product->category->category_name ?? 'Category not available' }}
                </span>
            </div>


        </div>

        <!--Cancellation Page Content -->
        <section id="productPage" class="flex flex-col lg:flex-row gap-20  px-4 lg:px-[120px] py-[80px] ">

            <!-- Container -->
            <!-- Container -->
            <!-- Container -->
            <div class="w-full lg:w-[50%] bg-white">

                <!-- Product Display -->
                <div class="flex flex-col flex-col-reverse gap-10 md:gap-0 md:flex-row md:space-x-8">

                    <div class="flex flex-col md:flex-row md:space-x-8">
                        <!-- Thumbnails (Left Side) -->
                        <div class="flex items-center gap-2 md:flex md:flex-col" id="thumbnailContainer">
                            @if ($product->images->count() > 0)
                                @foreach ($product->images as $image)
                                    <div class="p-1 border border-gray-200 rounded cursor-pointer"
                                        onclick="changeImage('{{ asset('storage/' . $image->image_path) }}', this)">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image"
                                            class="object-cover w-16 h-16">
                                    </div>
                                @endforeach
                            @else
                                <!-- Default Image if No Images Available -->
                                <div class="p-1 border border-gray-200 rounded">
                                    <img src="{{ asset('frontend/assets/images/default-image.png') }}"
                                        alt="No Image Available" class="object-cover w-16 h-16" />
                                </div>
                            @endif
                        </div>

                        <!-- Main Image with Arrows & Dots -->
                        <div class="flex items-center justify-center arrowImageDots">
                            <!-- Left Arrow -->
                            <div onclick="prevImage()"
                                class="leftArrow rounded-full lg:bg-[#F4F4F4] flex justify-center items-center p-4 h-[48px] w-[48px] cursor-pointer">
                                <img src="{{ asset('frontend/assets/images/productBack.svg') }}" alt="Previous">
                            </div>

                            <div class="flex flex-col items-center justify-between imageContainerAndDots">
                                <!-- Main Product Image -->
                                <div class="activeProductImage">
                                    <img id="mainImage"
                                        src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : asset('frontend/assets/images/default-image.png') }}"
                                        class="object-cover w-64 h-64">
                                </div>

                                <!-- Thumbnail Dots -->
                                <div class="flex items-center justify-between gap-1 mt-4 dots">
                                    @foreach ($product->images as $index => $image)
                                        <div class="dot h-2 w-2 bg-[#6E6E6E] rounded-full cursor-pointer"
                                            onclick="changeImage('{{ asset('storage/' . $image->image_path) }}', this)">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Right Arrow -->
                            <div onclick="nextImage()"
                                class="rightArrow rounded-full lg:bg-[#F4F4F4] flex justify-center items-center p-4 h-[48px] w-[48px] cursor-pointer">
                                <img src="{{ asset('frontend/assets/images/productArrowAhead.svg') }}" alt="Next">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colors Options -->
                <div class="mt-6">
                    <h3 class="mb-2 text-lg font-semibold">Select Color Options:</h3>
                    <div class="flex flex-wrap gap-2">
                        @if ($product->images->pluck('color_id')->unique()->count() > 0)
                            @foreach ($product->images->pluck('color_id')->unique() as $colorId)
                                @php
                                    $color = \App\Models\Color::find($colorId);
                                    $image = $product->images->where('color_id', $colorId)->first();
                                @endphp
                                @if ($color && $image)
                                    <button class="colorButton w-8 h-8 rounded-full border border-gray-300"
                                        style="background-color: {{ $color->color_code }};"
                                        onclick="changeColors('{{ $color->id }}', '{{ asset('storage/' . $image->image_path) }}')">
                                    </button>
                                @endif
                            @endforeach
                        @else
                            <p class="text-gray-500">No colors available</p>
                        @endif
                    </div>
                </div>


                <!-- Size Options -->
                <!-- Size Options -->
                {{--  <div class="mt-6">
                    <h3 class="mb-2 text-lg font-semibold">Size:</h3>
                    <div class="flex flex-wrap gap-2" id="sizeContainer">
                        @foreach ($product->images as $image)
                            @foreach ($image->sizes as $size)
                                <button class="px-4 py-2 border rounded-md hover:bg-gray-100 sizeButton"
                                    data-color="{{ $image->color_id }}" data-size-id="{{ $size->id }}"
                                    data-image="{{ asset('storage/' . $image->image_path) }}" style="display: none;">
                                    {{ strtoupper($size->size_name) }}
                                </button>
                            @endforeach
                        @endforeach
                    </div>
                </div>  --}}


                <!-- Size Options -->
                <div class="mt-6">
                    <h3 class="mb-2 text-lg font-semibold">Select Size:</h3>
                    <div class="flex flex-wrap gap-2" id="sizeContainer">
                        @foreach ($product->images as $image)
                            @foreach ($image->sizes as $size)
                                @php
                                    $quantity = $size->pivot->quantity;
                                    $outOfStock = $quantity == 0;
                                @endphp
                                <button
                                    class="px-4 py-2 border rounded-md hover:bg-gray-100 sizeButton flex items-center justify-between
                    {{ $outOfStock ? 'bg-red-100 text-red-600 cursor-not-allowed' : '' }}"
                                    data-color="{{ $image->color_id }}" data-size-id="{{ $size->id }}"
                                    data-quantity="{{ $quantity }}"
                                    data-image="{{ asset('storage/' . $image->image_path) }}" style="display: none;"
                                    {{ $outOfStock ? 'disabled' : '' }}>
                                    {{ strtoupper($size->size_name) }}
                                    <span class="ml-2 text-sm {{ $outOfStock ? 'text-red-600' : 'text-gray-500' }}">
                                        ({{ $quantity }} {{ $outOfStock ? 'Out of Stock' : 'available' }})
                                    </span>
                                </button>
                            @endforeach
                        @endforeach
                    </div>
                </div>



                <!-- Quantity Display -->
                {{--  <div class="mt-4">
                    <h3 class="mb-2 text-lg font-semibold">Quantity:</h3>
                    <p id="quantityDisplay" class="text-lg font-medium text-gray-700">Select a size to see quantity</p>
                </div>  --}}


            </div>



            <div class="productSelection  w-full lg:w-[50%]   flex flex-col  ">
                <div class="productName text-[26px] font-bold mt-2">
                    {{ $product->product_name }}
                </div>
                <div class="productCompany">
                    By <span class="text-[#E2001A]">{{ $product->manufacturer_name }}</span>
                </div>
                <div class="productDetails text-[#6E6E6E] mt-5">
                    <div class="productDetailsHeading text-[16px] font-medium   ">Product Details:</div>
                    <div class="articleNumber text-[14px] mt-2 ">
                        Article number: <span class="text-[#000000]">{{ $product->articles->article_name }}</span>
                    </div>
                    <div class="GSM text-[14px]">
                        GSM: <span class="text-[#000000]">{{ $product->weight->weight_name }}</span>

                    </div>
                </div>
                <div class="w-full mt-5 combinationAssociated">
                    <div class="associatedHeading text-[16px] text-[#6E6E6E] font-medium">
                        Associated Combination Products:
                    </div>
                    <div class="flex gap-2 mt-2 combButtons">


                        <div class="combButtonOne ">
                            <button
                                class="flex items-center border border-gray-200 border-solid p-[12px] gap-20 rounded-md ">
                                <div class="flex items-center gap-2 iconAndName">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/images/womenIconCol.svg') }}" alt="">
                                    </div>
                                    <div class="text-sm name">{{ $product->wear->wear_name }}</div>
                                </div>
                                <div class="info">
                                    <img src="{{ asset('frontend/assets/images/infoCol.svg') }}" alt="">
                                </div>

                            </button>
                        </div>

                    </div>

                </div>
                @if ($product->promotion)
                    <div class="mt-5 promotionalInfo">
                        <div class="promotionalHeading text-[16px] text-[#6E6E6E] font-medium">
                            Promotional Finishing Information:
                        </div>
                        <div class="flex gap-2 mt-2 buttonSection">
                            <div class="button border border-gray-200 border-solid p-[8px] rounded-md text-sm">
                                {{ $product->promotion->promotional_name }}
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-gray-500">No promotional finishing information available.</p>
                @endif

                {{-- Price Section --}}
                <div class="mt-5 priceInfo">
                    <div class="priceHeading text-[16px] text-[#6E6E6E] font-medium">
                        Product Price:
                    </div>
                    <div class="mt-2">
                        @if (session()->has('company_user_id'))
                            @php
                                $user = \App\Models\CompanyRegistration::find(session('company_user_id'));
                            @endphp

                            @if ($user && $user->price_category_type)
                                @php
                                    // Get the price category type from the user
                                    $priceCategory = 'category_' . $user->price_category_type . '_price';

                                    // Check if the price column exists in the product and is not null, otherwise fallback to default price
                                    $priceToShow = !empty($product->$priceCategory)
                                        ? $product->$priceCategory
                                        : $product->price;
                                @endphp

                                <span class="text-lg font-bold text-black">
                                    €{{ number_format($priceToShow, 2) }}
                                </span>
                            @else
                                <p class="text-gray-500">
                                    <a href="{{ route('frontend.login') }}" class="text-blue-500 underline">
                                        Please login to see the price
                                    </a>
                                </p>
                            @endif
                        @else
                            <p class="text-gray-500">
                                <a href="{{ route('frontend.login') }}" class="text-blue-500 underline">
                                    Please login to see the price
                                </a>
                            </p>
                        @endif
                    </div>
                </div>



                {{-- Quantity and Add to Cart --}}
                <div class="w-full mt-5 flex items-center gap-3">
                    <div class="flex items-center border border-gray-400 rounded-md px-3 py-2">
                        <button id="decreaseQty" class="text-black text-lg px-3">-</button>
                        <span id="quantity" class="text-black mx-3 text-lg">1</span>
                        <button id="increaseQty" class="text-black text-lg px-3">+</button>
                    </div>

                    @if (session()->has('company_user_id'))
                        <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="color_id" id="selectedColor" value="">
                            <input type="hidden" name="size_id" id="selectedSize" value="">
                            <input type="hidden" name="quantity" id="productQuantity" value="1">
                            <button type="submit"
                                class="bg-[#54114C] text-[#ffffff] text-[16px] font-medium w-full p-4 rounded-xl hover:bg-[#6A1B61] transition">
                                Add to Cart
                            </button>
                        </form>
                    @else
                        <button
                            class="bg-gray-400 text-white text-[16px] font-medium w-full p-4 rounded-xl cursor-not-allowed"
                            disabled>
                            Please login to add to cart
                        </button>
                    @endif
                </div>
            </div>
            </div>





            </div>


        </section>


        <section id="productDescriptionAndRest" class=" px-4 lg:px-[120px] py-[80px] bg-[#F4F4F4]">

            <div class="descriptionHeading font-bold text-[24px]  ">
                <button class="border-b-3 border-[#E2001A]">
                    Description

                </button>

            </div>
            <div class="productInformation mt-5 font-bold text-[18px]">
                Product Information: <span class=" text-[#3CC4D5] font-medium">{{ $product->product_name }}</span>

            </div>
            <div class="productInfo mt-2 text-[16px] text-[#4A4A4A]">
                <p>
                    {!! $product->product_details !!}

                </p>

            </div>

            {{--  <div
                class="productInfoTable w-full lg:w-[70%] bg-[#E7E6E7] flex flex-col gap-4 p-6 rounded-xl mt-10 border border-dashed border-gray-500 font-medium ">
                <div class="flex justify-between w-full rowOne ">
                    <div class="columnOneRowOne text-[#6E6E6E] w-1/2">
                        Label:
                    </div>
                    <div class="w-1/2 columnTwoRowOne ">
                        Classic Hooded Sweat
                    </div>
                </div>
                <div class="flex justify-between w-full rowOne">
                    <div class="columnOneRowOne text-[#6E6E6E] w-1/2">
                        Label:
                    </div>
                    <div class="w-1/2 columnTwoRowOne ">
                        Classic Hooded Sweat
                    </div>
                </div>
                <div class="flex justify-between w-full rowOne">
                    <div class="columnOneRowOne text-[#6E6E6E] w-1/2">
                        Label:
                    </div>
                    <div class="w-1/2 columnTwoRowOne ">
                        Classic Hooded Sweat
                    </div>
                </div>
                <div class="flex justify-between w-full rowOne">
                    <div class="columnOneRowOne text-[#6E6E6E] w-1/2">
                        Label:
                    </div>
                    <div class="w-1/2 columnTwoRowOne ">
                        Classic Hooded Sweat
                    </div>
                </div>
            </div>  --}}

            <div class="manufactureInfo mt-7 ">
                <div class="manufactureHeading font-bold text-[18px]">
                    Manufacturer Information
                </div>
                <div class="manufacturerDetails font-medium text-[16px] text-[#6E6E6E] mt-2">
                    <p>
                        {{ $product->manufacturer_name }}
                    </p>
                </div>
            </div>

        </section>









        <!-- final  -->
        <section id="customerAlsoBought" class="px-4 lg:px-[120px] py-[80px]">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl lg:text-[48px] font-semibold">Customers Also Bought</h2>
                <div class="flex gap-4">
                    <button id="prevBtn"
                        class="bg-gray-200 hover:bg-gray-300 transition-all duration-300 h-10 w-10 lg:h-12 lg:w-12 rounded-full flex justify-center items-center">
                        <img src="{{ asset('frontend/assets/images/productBack.svg') }}" alt="" class="w-5 h-5">
                    </button>
                    <button id="nextBtn"
                        class="bg-gray-200 hover:bg-gray-300 transition-all duration-300 h-10 w-10 lg:h-12 lg:w-12 rounded-full flex justify-center items-center">
                        <img src="{{ asset('frontend/assets/images/forwardArrow.svg') }}" alt=""
                            class="w-5 h-5">
                    </button>
                </div>
            </div>

            <div class="relative mt-10">
                @if ($relatedProducts->count() > 0)
                    <div id="carousel"
                        class="flex gap-6 lg:gap-10 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-hide py-2 px-2">
                        @foreach ($relatedProducts as $related)
                            <div class="relative flex-shrink-0 snap-start w-[85vw] sm:w-[45vw] md:w-[30vw] lg:w-[25vw]">
                                @if ($related->sale_percentage)
                                    <div class="absolute top-4 left-4 bg-sky-500 text-white text-xs px-2 py-1 rounded-md">
                                        {{ $related->sale_percentage }}% OFF
                                    </div>
                                @endif
                                <div class="w-full h-[300px] overflow-hidden flex justify-center items-center rounded-xl">
                                    <img src="{{ asset('storage/' . optional($related->images->first())->image_path) }}"
                                        alt="{{ $related->name }}"
                                        class="w-full h-full object-cover rounded-xl transition-transform duration-300 hover:scale-105">
                                </div>

                                <div class="flex justify-between items-center mt-3 text-sm text-gray-600">
                                    <span>{{ $related->sku }}</span>
                                    <div class="flex items-center gap-2">
                                        @if ($related->gender)
                                            <img src="{{ asset('frontend/assets/images/' . strtolower($related->gender) . '.svg') }}"
                                                alt="{{ $related->gender }}" class="w-6 h-6">
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-2 text-lg font-medium text-gray-800">
                                    {{ $related->product_name }}
                                </div>

                                <div class="text-red-600 text-sm font-semibold mt-1">
                                    @if ($related->brands->count() > 0)
                                        @foreach ($related->brands as $brand)
                                            {{ $brand->brand_name }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    @else
                                        No Brand
                                    @endif
                                </div>

                                <div class="flex items-center space-x-2 mt-2">
                                    <div class="relative flex -space-x-2">
                                        @foreach ($product->imageColors as $color)
                                            <div class="w-6 h-6 border border-gray-300 rounded-full"
                                                style="background-color: {{ $color->color_code }}"></div>
                                        @endforeach
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium">
                                        {{ count($product->imageColors) }}+ Colors
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-lg text-gray-500">No related products available.</p>
                @endif
            </div>
        </section>



        <!-- your recent views -->
        <!-- final  -->
        <section id="customerAlsoBought" class="px-4 lg:px-[120px] py-4 lg:py-[80px]">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl lg:text-[48px] font-semibold">Your Recents</h2>
                <div class="flex gap-4">
                    <button id="prevBtn2"
                        class="bg-gray-200 hover:bg-gray-300 transition-all duration-300 h-10 w-10 lg:h-12 lg:w-12 rounded-full flex justify-center items-center">
                        <img src="{{ asset('frontend/assets/images/productBack.svg') }}" alt="" class="w-5 h-5">
                    </button>
                    <button id="nextBtn2"
                        class="bg-gray-200 hover:bg-gray-300 transition-all duration-300 h-10 w-10 lg:h-12 lg:w-12 rounded-full flex justify-center items-center">
                        <img src="{{ asset('frontend/assets/images/forwardArrow.svg') }}" alt=""
                            class="w-5 h-5">
                    </button>
                </div>
            </div>

            <!-- Carousel Wrapper -->
            <div class="relative mt-10">
                @if ($recentProducts->count() > 0)
                    <div id="carousel2"
                        class="flex gap-6 lg:gap-10 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-hide py-2 px-2">

                        @foreach ($recentProducts as $product)
                            <div class="relative flex-shrink-0 snap-start w-[85vw] sm:w-[45vw] md:w-[30vw] lg:w-[25vw]">
                                @if ($product->sale_percentage)
                                    <div class="absolute top-4 left-4 bg-sky-500 text-white text-xs px-2 py-1 rounded-md">
                                        {{ $product->sale_percentage }}% OFF
                                    </div>
                                @endif
                                <div class="w-full h-[300px] overflow-hidden flex justify-center items-center rounded-xl">
                                    <img src="{{ asset('storage/' . optional($product->images->first())->image_path) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover rounded-xl transition-transform duration-300 hover:scale-105">
                                </div>

                                <div class="flex justify-between items-center mt-3 text-sm text-gray-600">
                                    <span>{{ $product->color_code }}</span>
                                </div>

                                <div class="mt-2 text-lg font-medium text-gray-800">
                                    {{ $product->product_name }}
                                </div>

                                <div class="text-red-600 text-sm font-semibold mt-1">
                                    @if ($product->brands->count() > 0)
                                        @foreach ($product->brands as $brand)
                                            {{ $brand->brand_name }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    @else
                                        No Brand
                                    @endif
                                </div>

                                <div class="flex items-center space-x-2 mt-2">
                                    <div class="relative flex -space-x-2">
                                        @foreach ($product->imageColors as $color)
                                            <div class="w-6 h-6 border border-gray-300 rounded-full"
                                                style="background-color: {{ $color->color_code }}"></div>
                                        @endforeach
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium">
                                        {{ count($product->imageColors) }}+ Colors
                                    </span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @else
                    <p class="text-center text-lg text-gray-500">No recent products available.</p>
                @endif
            </div>
        </section>



    </main>
@endsection
