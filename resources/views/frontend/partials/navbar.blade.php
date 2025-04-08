<!-- Navbar -->
<div
    class="white_nav_bottom z-100 text-gray-900 px-4 md:px-[120px] py-4 lg:py-8 flex justify-between items-center relative">
    <!-- Hamburger Button (Mobile) -->
    <button id="menu-btn" class="md:hidden text-3xl focus:outline-none">
        ☰
    </button>

    <!-- Navigation Menu -->
    <ul id="nav-menu"
        class="HeadernavItems z-300 fixed inset-0 bg-white md:bg-transparent md:static  h-screen md:h-auto flex flex-col md:flex-row md:space-x-12 items-center justify-center transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">

        <!-- Close Button -->
        <button id="close-menu" class="absolute top-5 right-5 text-3xl md:hidden">
            ✖
        </button>

        <li><a href="{{ route('frontend.home') }}">Home</a></li>
        <li class="relative group">
            <span class="cursor-pointer" id="collection-toggle">Collection</span>

            <!-- Dropdown Menu -->
            <div id="collection-dropdown"
                class="lg:absolute lg:top-full lg:left-0 lg:w-auto lg:min-w-[700px] lg:max-w-[90vw]
                lg:max-h-[80vh] lg:overflow-y-auto lg:mt-2 lg:bg-white lg:z-50 lg:hidden
                lg:group-hover:flex lg:flex-col lg:shadow-lg border border-gray-200 rounded-lg
                hidden md:absolute md:left-0 md:hidden">

                <div
                    class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4
                    gap-4 bg-white p-5">

                    @php
                        $firstSixCategories = $categories->take(6);
                    @endphp

                    @foreach ($firstSixCategories as $category)
                        <div class="space-y-2">
                            <h3 class="font-bold text-black text-lg whitespace-nowrap">{{ $category->category_name }}
                            </h3>
                            <ul class="text-gray-600 space-y-1">
                                @foreach ($category->subcategories->take(6) as $subcategory)
                                    <li>
                                        <a href="{{ route('frontend.subcategory.products', $subcategory->id) }}"
                                            class="hover:text-black hover:underline block whitespace-nowrap">
                                            {{ $subcategory->subcategory_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>




        <li>
            <a href="{{ session()->has('company_user_id') ? route('frontend.aboutus') : route('frontend.login') }}"
                class="transition hover:text-purple-400">
                About Us
            </a>
        </li>


        <li>
            <a href="{{ session()->has('company_user_id') ? route('frontend.specialproduct') : route('frontend.login') }}"
                class="transition hover:text-purple-400">
                Special Production
            </a>
        </li>

    </ul>

    <!-- Download Button -->
    @if (session()->has('company_user_id'))
        <div class="downloadPricelist_button">
            <a href="{{ asset('frontend/assets/pdf/my_catalog.pdf') }}" target="_blank"
                class="bg-[#F4F4F4] px-[13px] py-[12px] text-[#E2001A] flex justify-between items-center gap-2 text-[12px] rounded-xl">
                Download Catalog
                <img src="{{ asset('frontend/assets/images/basil_download-outline.svg') }}" alt="">
            </a>
        </div>
    @endif


</div>
