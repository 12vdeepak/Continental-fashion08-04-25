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
            <div class="currentPage text-[#54114C] font-[500] text-[16px]">
                All Products
            </div>

        </div>

        <!--all product Page Content -->

        <section id="allProducts" class=" px-4 lg:px-[120px] my-[40px]  lg:my-[80px]  flex flex-col gap-5  ">

            <div class="heading mb-5 text-[#171B1E]  ">
                All Products
            </div>

            <div class="flex flex-col gap-5 mainContent lg:flex-row ">
                <!-- === filter section ===== -->
                <div class="filterDropDown lg:w-[25%]    ">


                    <!-- Category Filter -->
                    <!-- Hamburger Menu Button -->
                    <button id="menuToggle"
                        class="lg:block flex items-center justify-between w-full  space-x-2 text-[#283138] font-[500] text-[18px]">
                        <span class="lg:hidden">Categories</span>
                        <img src="{{ asset('frontend/assets/images/burger-menu-svgrepo-com.svg') }}" alt="Menu"
                            class="w-6 h-6 lg:hidden">
                    </button>

                    <!-- Filter Section (Hidden by Default on Mobile) -->
                    {{--  <div id="filterMenu"
                        class="hidden lg:block absolute top-0 left-0 w-full h-screen bg-white p-4 shadow-lg z-50 sm:relative sm:w-[25%] sm:h-auto sm:bg-transparent sm:p-0 sm:shadow-none lg:w-[100%] ">

                        <!-- Close Button for Mobile -->
                        <button id="closeMenu" class="absolute top-4 right-4 sm:hidden ">
                            <img src="{{ asset('frontend/assets/images/cross-small-svgrepo-com.svg') }}" alt="Close"
                                class="w-6 h-6">
                        </button>

                        <!-- Category Filters -->
                        <div class="space-y-2 category_filter_dropDown ">
                            <div class="pb-2">
                                <button
                                    class="flex   gap-2 items-center w-full text-left font-[500] text-[18px] text-[#283138]"
                                    onclick="toggleFilter('categories')">
                                    Categories
                                    <span><img src="{{ asset('frontend/assets/images/arrowDown.png') }}"
                                            alt="img"></span>
                                </button>
                                <div id="categories" class="flex flex-col hidden gap-1 mt-4 ml-2 space-y-2">
                                    <button class="flex items-center justify-between w-full text-left"
                                        onclick="toggleFilter('bags')">
                                        Bags
                                        <span><img src="{{ asset('frontend/assets/images/arrowDown.png') }}"
                                                alt=""></span>
                                    </button>
                                    <div id="bags" class="hidden ml-4 space-y-1">
                                        <label class="block cursor-pointer"><input type="checkbox"> Cotton Bags</label>
                                        <label class="block cursor-pointer"><input type="checkbox"> Leather Bags</label>
                                    </div>

                                    <button class="flex items-center justify-between w-full text-left"
                                        onclick="toggleFilter('jackets')">
                                        Jackets
                                        <span><img src="{{ asset('frontend/assets/images/arrowDown.png') }}"
                                                alt=""></span>
                                    </button>
                                    <div id="jackets" class="hidden ml-4 space-y-1">
                                        <label class="block cursor-pointer"><input type="checkbox"> Denim Jackets</label>
                                        <label class="block cursor-pointer"><input type="checkbox"> Leather Jackets</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Clear Filter Button -->
                        <button class="mt-5 text-[#427CD4] underline" onclick="clearFilters()">Clear All Filters</button>
                    </div>  --}}

                    <!-- JavaScript for Toggle -->
                    <script>
                        document.getElementById('menuToggle').addEventListener('click', function() {
                            document.getElementById('filterMenu').classList.remove('hidden');
                        });

                        document.getElementById('closeMenu').addEventListener('click', function() {
                            document.getElementById('filterMenu').classList.add('hidden');
                        });
                    </script>



                </div>
                <!-- === content section ==== -->
                <div class="productGalleryShowcase w-full lg:w-[85%] flex flex-col ">

                    <div class="relative flex items-end justify-end poster rounded-xl lg:rounded-3xl">





                        <div class="absolute inset-0 rounded-xl lg:rounded-3xl redGradient"></div>

                        <div
                            class="textAndButton   lg:flex   lg:flex-col items-end justify-end  h-full w-full text-[#ffffff] ">

                            <div
                                class="descAndButton z-1 w-[45%] flex mb-10 mr-5 justify-end w-full pr-5 gap-[26px] items-end ">
                                <div class="posterDescription z-1 text-[#ffffff] hidden lg:show ">Lorem ipsum dolor sit amet
                                    consectetur.<br> At
                                    ultrices libero et congue mauris sed nisl. </div>
                                <div class="posterButton z-2 ">
                                    <a href="{{ route('frontend.all.product') }}">
                                        <button
                                            class="bg-[#FFFFFF] text-[#000000] rounded-2xl px-[16px] py-[10px] flex justify-between gap-[16px]">
                                            Shop Now
                                            <img src="{{ asset('frontend/assets/images/forwardArrow.svg') }}"
                                                alt="">
                                        </button>
                                    </a>

                                </div>

                            </div>




                        </div>
                    </div>
                    <div
                        class="flex items-center justify-between w-full gap-2 py-3 mt-5 border-gray-300 border-dashed showingAndSort border-y">
                        <div class="text-sm showing">
                            Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }}
                            <span class="hidden">results</span>.
                        </div>

                        <div class="sort">
                            <div class="relative inline-block text-left">
                                {{--  <div class="flex items-center space-x-2 cursor-pointer" onclick="toggleDropdown()">
                                    <span class="text-sm text-gray-500">Sort by</span>
                                    <span class="h-5 border-l-2 border-red-600"></span>
                                    <span class="text-sm lg:font-medium font-regular">Popularity</span>
                                    <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>  --}}
                                <!-- Dropdown Menu -->
                                <div id="dropdownMenu"
                                    class="absolute right-0 hidden w-40 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-5">
                                    <ul class="py-2 text-gray-700">
                                        <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">Popularity</li>
                                        <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">Newest</li>
                                        <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">Price: Low to High</li>
                                        <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">Price: High to Low</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-6 mt-5 productSection">
                        @foreach ($products->chunk(3) as $chunk)
                            <div class="grid grid-cols-1 gap-6 productRow sm:grid-cols-2 md:grid-cols-3">
                                @foreach ($chunk as $product)
                                    <a href="{{ route('frontend.all.product-page', $product->id) }}" class="block">
                                        <div
                                            class="relative p-3 transition-transform transform bg-white rounded-lg shadow-md product hover:scale-105">
                                            <!-- Sale Offer -->
                                            <div
                                                class="absolute top-2 left-2 text-white text-xs px-2 py-1 rounded-md
                                                {{ $product->sale_percentage ? 'bg-sky-500' : 'bg-gray-400' }}">
                                                {{ $product->sale_percentage ? $product->sale_percentage . '% off' : 'No Discount' }}
                                            </div>

                                            <!-- Product Image -->
                                            <div class="mb-3 productImage">
                                                <img src="{{ asset('storage/' . optional($product->images->first())->image_path) }}"
                                                    alt="{{ $product->product_name }}"
                                                    class="w-full h-[180px] object-contain rounded-md bg-gray-100">
                                            </div>

                                            <!-- Product Code & Gender Icons -->
                                            <div
                                                class="flex items-center justify-between mb-2 text-xs text-gray-600 productSubIcons">
                                                <div>{{ $product->code }}</div>
                                                <div class="flex items-center gap-1 productIconSet">
                                                    @if ($product->wear->wear_name === 'Male')
                                                        <img src="{{ asset('frontend/assets/images/male.svg') }}"
                                                            alt="Male" class="w-3 h-3">
                                                    @elseif ($product->wear->wear_name === 'Female')
                                                        <img src="{{ asset('frontend/assets/images/female.svg') }}"
                                                            alt="Female" class="w-3 h-3">
                                                    @elseif ($product->wear->wear_name === 'Kid')
                                                        <img src="{{ asset('frontend/assets/images/kid.svg') }}"
                                                            alt="Kid" class="w-3 h-3">
                                                    @elseif ($product->wear->wear_name === 'Unisex')
                                                        <img src="{{ asset('frontend/assets/images/unisex.svg') }}"
                                                            alt="Unisex" class="w-3 h-3">
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Product Title -->
                                            <div class="mb-1 text-sm font-semibold text-center text-gray-700 productTitle">
                                                {{ $product->product_name }}
                                            </div>

                                            <!-- Brand Name -->
                                            <div class="productTag mb-2 text-[#E2001A] text-xs font-bold text-center">
                                                @foreach ($product->brands as $brand)
                                                    <span class="mr-2">{{ $brand->brand_name }}</span>
                                                @endforeach
                                            </div>

                                            <!-- Product Colors -->
                                            <div class="flex items-center justify-center mb-2 space-x-2 productColors">
                                                <div class="relative flex -space-x-1">
                                                    @foreach ($product->imageColors as $color)
                                                        <div class="w-4 h-4 border border-white rounded-full"
                                                            style="background-color: {{ $color->color_code }};">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    {{ count($product->imageColors) }}+ Colors
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>






                    <div class="flex items-center justify-center mt-10 pages">
                        @if ($products->lastPage() > 1)
                            <div class="flex flex-wrap items-center gap-2 sm:gap-4">
                                <!-- Previous Page Button -->
                                @if ($products->onFirstPage())
                                    <button class="px-3 py-2 text-gray-400 cursor-not-allowed">&lt;</button>
                                @else
                                    <a href="{{ $products->previousPageUrl() }}"
                                        class="px-3 py-2 text-gray-500 hover:text-black">&lt;</a>
                                @endif

                                <!-- Page Numbers -->
                                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                    @if ($page == $products->currentPage())
                                        <button
                                            class="px-4 py-3 font-medium text-white bg-red-600 rounded-md">{{ $page }}</button>
                                    @else
                                        <a href="{{ $url }}"
                                            class="px-3 py-2 text-gray-700 rounded-md hover:bg-gray-200">{{ $page }}</a>
                                    @endif
                                @endforeach

                                <!-- Next Page Button -->
                                @if ($products->hasMorePages())
                                    <a href="{{ $products->nextPageUrl() }}"
                                        class="px-3 py-2 text-gray-500 hover:text-black">&gt;</a>
                                @else
                                    <button class="px-3 py-2 text-gray-400 cursor-not-allowed">&gt;</button>
                                @endif
                            </div>
                        @endif
                    </div>


                </div>

            </div>


        </section>



    </main>
@endsection
