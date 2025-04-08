@extends('frontend.layouts.app')
@section('content')
    <main>
        <!-- Login Page Content -->
        <section id="loginPage" class="w-full">
            <!-- pageNavShow -->
            <div id="pageNavShow" class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4 lg:px-[120px]">
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
                    My Profile
                    <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
                    <span class="text-[#E2001A]">Orders</span>
                </div>
            </div>

            <!-- mainContent -->
            <div id="mainContent" class="flex flex-col px-4 lg:px-[120px] my-[80px] w-full gap-10">
                <div class="text-[32px] lg:text-[48px] myProfileHead font-bold flex justify-between">
                    My Orders
                    <button id="hamburger-menu" class="md:hidden p-2 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <div class="profileContainer flex flex-col md:flex-row  md:justify-between gap-10 font-medium">
                    <!-- Sidebar -->
                    @include('frontend.my-profile.sidebar')


                    <!-- Main Content -->
                    <div class="contentContainer w-full h-full  md:w-3/4 flex flex-col gap-3 justify-center">
                        <div class="shortHeading text-[24px] lg:text-[32px] font-bold">
                            Manage Account
                        </div>
                        <div class="space-y-6 font-medium">
                            @php
                                $totalOrders = count($orders);
                            @endphp

                            @foreach ($orders as $index => $order)
                                <div
                                    class="bg-[#F4F4F4] shadow-md rounded-xl p-6 order-item {{ $index >= 3 ? 'hidden' : '' }}">
                                    <div class="flex flex-col lg:flex-row justify-between lg:items-center">
                                        <div>
                                            <p class="text-gray-500">Order Id: <span>#{{ $order->id }}</span></p>
                                            <p class="text-gray-500">Tracking Id:
                                                <span>{{ $order->tracking_id ?? 'N/A' }}</span>
                                            </p>
                                            <p class="text-gray-500">Tracking Link:
                                                <span>{{ $order->link ?? 'N/A' }}</span>
                                            </p>
                                        </div>
                                        <p class="text-gray-500 mt-5 lg:mt-0">Date:
                                            {{ $order->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <p class="font-semibold mt-4">Your items</p>
                                    <div class="flex flex-col lg:flex-row gap-4 mt-4 w-full justify-between">
                                        <div
                                            class="productsShort flex flex-col lg:flex-row lg:w-[80%] justify-between gap-5">
                                            <div class="flex items-center bg-[#ffffff] p-5 rounded-xl lg:w-[50%]">
                                                @php
                                                    // Get the product image that matches the selected color
                                                    $productImage =
                                                        $order->product->images
                                                            ->where('color_id', $order->color->id)
                                                            ->first()->image_path ?? 'default.jpg';
                                                @endphp
                                                <img src="{{ asset('storage/' . $productImage) }}" alt="Product Image"
                                                    class="w-16 h-16 object-cover rounded-lg">
                                                <div class="ml-4">
                                                    <p class="font-semibold">
                                                        {{ $order->product->product_name ?? 'Unknown Product' }}</p>
                                                    <div class="text-gray-600 text-sm flex items-center gap-2 mt-1">
                                                        <span
                                                            class="font-semibold">{{ $order->product->wear->wear_name ?? 'Unisex' }}</span>
                                                        <img src="{{ asset('frontend/assets/images/genderCart.svg') }}"
                                                            alt=""> |

                                                        @php
                                                            $colorCode = $order->color->color_code ?? '#000';
                                                            $border =
                                                                $colorCode == '#ffffff' ||
                                                                strtolower($colorCode) == 'white'
                                                                    ? 'border border-gray-400'
                                                                    : '';
                                                        @endphp
                                                        <span class="w-3 h-3 inline-block rounded-full {{ $border }}"
                                                            style="background-color: {{ $colorCode }};"></span> |
                                                        {{ $order->size->size_name ?? 'N/A' }} |
                                                        ${{ $order->price ?? '0.00' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  <a href="#" class="text-blue-600 self-center">View Details →</a>  --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if ($totalOrders > 3)
                            <div class="text-center mt-4">
                                <button id="viewMoreBtn" class=" bg-[#54114C] text-white px-4 py-2 rounded-md">View
                                    More</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <div id="logoutModal" class="fixed inset-0 flex items-center justify-center backdrop-blur-sm hidden">
            <div class="bg-white p-6 rounded-lg shadow-xl w-[400px] border border-solid border-gray-900">
                <h2 class="text-lg font-semibold text-center">Logout?</h2>
                <p class="text-gray-600 text-center mt-2">Are you sure you want to log out?</p>
                <div class="mt-4 flex justify-center gap-4">
                    <button id="cancelLogout"
                        class="px-6 py-2 border rounded-md text-blue-600 font-semibold">Cancel</button>
                    <button id="confirmLogout"
                        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md">Confirm</button>
                </div>
            </div>
        </div>

    </main>
@endsection
