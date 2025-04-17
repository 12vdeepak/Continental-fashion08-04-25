@extends('frontend.layouts.app')
@section('content')
    <main>


        <div id="pageNavShow " class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4 lg:px-[120px] ">
            <div class="backIcon">
                <img src="{{ asset('frontend/assets/images/backIcon.svg') }}" alt="">
            </div>
            <div class="homeIcon flex gap-2 items-center font-[500] text-[#6E6E6E] text-[16px]">
                <img src="{{ asset('frontend/assets/images/HomeIcon.svg') }}"" alt=""> Home
            </div>
            <div class="line">
                <img src="{{ asset('frontend/assets/images/Line.svg') }}"" alt="">
            </div>
            <div class="currentPage text-[#E2001A] font-[500] text-[16px] flex items-center gap-2">
                Cart

            </div>

        </div>

        <!--Cancellation Page Content -->
        <section id="cartContainer" class="px-4 lg:px-[120px] py-[80px]">
            <div class="heading">
                My Cart
            </div>
            <div class="mt-4 rounded-lg">

                @if ($cartItems->isEmpty())
                    <!-- No Products Available -->
                    <div class="p-10 text-center bg-gray-100 rounded-lg">
                        <img src="{{ asset('frontend/assets/images/cart.jpeg') }}" alt="Empty Cart" class="w-32 mx-auto">
                        <h2 class="mt-4 text-lg font-bold">Your cart is empty</h2>
                        <p class="text-gray-500">Looks like you haven't added any products yet.</p>
                        <a href="{{ route('frontend.all.product') }}"
                            class="mt-4 inline-block bg-[#54114C] text-white px-6 py-2 rounded-lg">
                            Start Shopping
                        </a>
                    </div>
                @else
                    <!-- Desktop Table Layout -->
                    <div class="hidden overflow-x-auto sm:block">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="text-left bg-gray-100">
                                    <th class="p-3">S.no</th>
                                    <th class="p-3">Product </th>
                                    <th class="p-3">Product Name</th>
                                    <th class="p-3">Color</th>
                                    <th class="p-3">Size</th>
                                    <th class="p-3">Quantity</th>
                                    <th class="p-3">Price</th>
                                    <th class="p-3">Total</th>
                                    <th class="p-3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="cart-body">
                                @foreach ($cartItems as $key => $item)
                                    <tr class="border-b border-gray-300">
                                        <td class="p-3">{{ $key + 1 }}</td>

                                        <td class="flex items-center p-3">
                                            @php
                                                // Get the correct image that matches the selected color
                                                $image = $item->product->images
                                                    ->where('color_id', $item->color_id)
                                                    ->first();
                                                $imagePath = $image
                                                    ? asset('storage/' . $image->image_path)
                                                    : asset('frontend/assets/images/default-image.png');
                                            @endphp

                                            <img src="{{ $imagePath }}" class="w-12 h-12 mr-3 rounded-lg" alt="Product">
                                            <span>{{ $item->product->name }}</span>
                                        </td>
                                        <td class="p-3">{{ $item->product->product_name }}</td>

                                        <td class="p-3">{{ $item->color->color_code ?? 'N/A' }}</td>
                                        <td class="p-3">{{ $item->size->size_name ?? 'N/A' }}</td>
                                        <td class="p-3">
                                            <div class="counterQty">
                                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <div
                                                        class="flex items-center justify-between w-40 p-2 bg-gray-100 rounded-xl">
                                                        <!-- Decrease Quantity -->
                                                        <button type="submit" name="quantity"
                                                            value="{{ max(1, $item->quantity - 1) }}"
                                                            class="px-3 text-black rounded-md decrease text-md">−</button>

                                                        <span
                                                            class="font-medium text-gray-800 quantity text-md">{{ $item->quantity }}</span>

                                                        <!-- Increase Quantity -->
                                                        <button type="submit" name="quantity"
                                                            value="{{ $item->quantity + 1 }}"
                                                            class="px-3 text-black rounded-md increase text-md">+</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>

                                        <td class="p-3">€{{ $item->price }}</td>
                                        <td class="p-3 total-price">€{{ number_format($item->price * $item->quantity, 2) }}
                                        </td>
                                        <td class="p-3">
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 remove-item">
                                                    <img src="{{ asset('frontend/assets/images/bin.svg') }}"
                                                        alt="Delete">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile List View -->
                    <div class="space-y-4 sm:hidden">
                        @foreach ($cartItems as $key => $item)
                            @php
                                $image = $item->product->images->where('color_id', $item->color_id)->first();
                                $imagePath = $image
                                    ? asset('storage/' . $image->image_path)
                                    : asset('frontend/assets/images/default-image.png');
                            @endphp

                            <div class="flex flex-col gap-2 p-4 bg-white rounded-lg shadow">
                                <!-- Product Info -->
                                <div class="flex items-center">
                                    <img src="{{ $imagePath }}" class="w-16 h-16 mr-3 rounded-lg" alt="Product">
                                    <div>
                                        <h2 class="text-lg font-semibold">{{ $item->product->name }}</h2>
                                        <p class="text-sm text-gray-500">Color: {{ $item->color->color_code ?? 'N/A' }} |
                                            Size: {{ $item->size->size_name ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Quantity Control -->
                                <div class="flex items-center justify-between">
                                    <span class="font-medium text-gray-700">Quantity:</span>
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="flex items-center gap-3 p-2 bg-gray-100 rounded-xl">
                                            <button type="submit" name="quantity"
                                                value="{{ max(1, $item->quantity - 1) }}"
                                                class="px-3 text-black text-md">−</button>
                                            <span class="font-medium text-gray-800">{{ $item->quantity }}</span>
                                            <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}"
                                                class="px-3 text-black text-md">+</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Price and Action -->
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-gray-800">Total: <span
                                            class="font-semibold">€{{ number_format($item->price * $item->quantity, 2) }}</span>
                                    </p>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">
                                            <img src="{{ asset('frontend/assets/images/bin.svg') }}" alt="Delete">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Payment Summary -->
                    <div class="mt-6 bg-[#F4F4F4] p-8 rounded-xl grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-lg font-bold">Payment summary</h3>
                            <p class="text-sm text-gray-500">Total cost consists of temporary costs, not including
                                shipping.</p>
                        </div>
                        <div class="text-right sm:text-left">
                            <p class="flex justify-between text-sm text-gray-700">
                                <span>Total net:</span>
                                <span
                                    class="net-amount">€{{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2) }}</span>
                            </p>
                            <p class="flex justify-between mt-3 font-semibold border-dashed text-md border-y">
                                <span>Final amount:</span>
                                <span
                                    class="final-amount text-[#3CC4D5]">€{{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2) }}</span>
                            </p>
                            <a href="{{ route('addresses.index') }}"
                                class="mt-10 bg-[#54114C] text-white px-6 py-2 rounded-lg w-full text-center block">
                                Checkout
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </section>













        <!-- final  -->
        <section id="customerAlsoBought" class="px-4 lg:px-[120px] py-[80px]">
            <div class="flex items-center justify-between headingAndButtons">
                <h2 class="headingCus text-2xl lg:text-[48px] font-semibold">Customers Also Bought</h2>
                <div class="flex gap-4 buttons">
                    <button id="prevBtn"
                        class="bg-gray-100 h-[40px] w-[40px] lg:h-[45px] lg:w-[45px] rounded-full flex justify-center items-center">
                        <img src="{{ asset('frontend/assets/images/productBack.svg') }}" alt=""
                            class="w-1/2 h-1/2">
                    </button>
                    <button id="nextBtn"
                        class="bg-gray-100 h-[40px] w-[40px] lg:h-[45px] lg:w-[45px] rounded-full flex justify-center items-center">
                        <img src="{{ asset('frontend/assets/images/forwardArrow.svg') }}" alt=""
                            class="w-1/2 h-1/2">
                    </button>
                </div>
            </div>

            <div class="relative mt-10">
                @if ($relatedProducts->count() > 0)
                    <div id="carousel"
                        class="flex gap-10 overflow-x-scroll scroll-smooth snap-x snap-mandatory scrollbar-hide">
                        @foreach ($relatedProducts as $related)
                            <div class="relative product w-full md:w-1/2 lg:w-[25vw] flex-shrink-0 snap-start">
                                @if ($related->sale_percentage)
                                    <div
                                        class="absolute px-2 py-1 text-sm text-white rounded-md top-5 left-2 bg-sky-500 lg:px-3">
                                        {{ $related->sale_percentage }}% offer
                                    </div>
                                @endif
                                <div
                                    class="mb-4 productImage w-full h-[300px] overflow-hidden flex justify-center items-center">
                                    <img src="{{ asset('storage/' . optional($related->images->first())->image_path) }}"
                                        alt="{{ $related->name }}" class="object-cover w-full h-full rounded-xl">
                                </div>


                                <div class="flex items-center justify-between mb-3 productSubIcons">
                                    <div class="productLeft text-[#6E6E6E]">{{ $related->sku }}</div>
                                    <div class="flex items-center gap-2 productIconSet">
                                        @if ($related->gender)
                                            <img src="{{ asset('frontend/assets/images/' . $related->gender) }}"
                                                alt="{{ $related->gender }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-1 font-medium productTitle text-md lg:text-xl">{{ $related->product_name }}
                                </div>
                                <div class="productTag mb-2 text-[#E2001A] text-[12px]">
                                    @if ($related->brands->count() > 0)
                                        @foreach ($related->brands as $brand)
                                            {{ $brand->brand_name }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    @else
                                        No Brand
                                    @endif
                                </div>

                                <div class="mb-2 productColors">
                                    <div class="flex items-center space-x-2">
                                        <div class="relative flex -space-x-3">
                                            @foreach ($related->colors as $color)
                                                <div class="w-6 h-6 border-2 border-white rounded-full lg:w-8 lg:h-8"
                                                    style="background-color: {{ $color->color_code }}"></div>
                                            @endforeach
                                        </div>
                                        <span class="text-sm font-medium text-gray-500 lg:text-md">
                                            {{ count($related->colors) }}+
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-lg text-center text-gray-500">No related products available.</p>
                @endif
            </div>
        </section>


        <!-- your recent views -->
        <!-- final  -->
        <section id="customerAlsoBought" class="px-4 lg:px-[120px] py-4 lg:py-[80px]">
            <div class="flex items-center justify-between headingAndButtons">
                <h2 class="headingCus text-2xl lg:text-[48px] font-semibold">Your Recents</h2>
                <div class="flex gap-4 buttons">
                    <button id="prevBtn2"
                        class="bg-gray-100 h-[40px] w-[40px] lg:h-[45px] lg:w-[45px] text-white rounded-full flex justify-center items-center">
                        <img src="{{ asset('frontend/assets/images/productBack.svg') }}" alt=""
                            class="w-1/2 h-1/2">
                    </button>
                    <button id="nextBtn2"
                        class="bg-gray-100 h-[40px] w-[40px] lg:h-[45px] lg:w-[45px] text-white rounded-full flex justify-center items-center">
                        <img src="{{ asset('frontend/assets/images/forwardArrow.svg') }}" alt=""
                            class="w-1/2 h-1/2">
                    </button>
                </div>
            </div>

            <!-- Carousel Wrapper -->
            <div class="relative mt-10">
                @if ($recentProducts->count() > 0)
                    <div id="carousel2"
                        class="flex gap-10 overflow-x-scroll scroll-smooth snap-x snap-mandatory scrollbar-hide">

                        @foreach ($recentProducts as $product)
                            <div class="relative product w-full md:w-1/2 lg:w-[25vw] flex-shrink-0 snap-start">
                                @if ($product->sale_percentage)
                                    <div
                                        class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular px-2 text-[12px] lg:px-3 py-1 rounded-md">
                                        {{ $product->sale_percentage }}% offer
                                    </div>
                                @endif
                                <div
                                    class="mb-4 productImage w-full h-[300px] overflow-hidden flex justify-center items-center">
                                    <img src="{{ asset('storage/' . optional($product->images->first())->image_path) }}"
                                        alt="{{ $product->name }}" class="object-cover w-full h-full rounded-xl">
                                </div>

                                <div class="flex items-center justify-between mb-3 productSubIcons">
                                    <div class="productLeft text-[#6E6E6E]">{{ $product->code }}</div>
                                    {{--  <div class="flex items-center justify-between gap-2 productIconSet">
                                        @if ($product->category)
                                            <span
                                                class="font-medium text-gray-700">{{ $product->category->category_name }}</span>
                                        @endif
                                    </div>  --}}
                                </div>
                                <div class="mb-1 font-medium productTitle text-md lg:text-xl">{{ $product->product_name }}

                                </div>

                                <div class="productTag mb-2 text-[#E2001A] text-[12px]">
                                    @if ($product->brands->count() > 0)
                                        @foreach ($product->brands as $brand)
                                            {{ $brand->brand_name }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    @else
                                        No Brand
                                    @endif
                                </div>
                                <div class="mb-2 productColors">
                                    <div class="flex items-center space-x-2">
                                        <div class="relative flex -space-x-3">
                                            @foreach ($product->colors as $color)
                                                <div class="w-6 h-6 border-2 border-white rounded-full lg:w-8 lg:h-8"
                                                    style="background-color: {{ $color->color_code }};"></div>
                                            @endforeach
                                        </div>
                                        <span class="text-sm font-medium text-gray-500 lg:text-md">
                                            {{ count($product->colors) }}+
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @else
                    <p class="text-lg text-center text-gray-500">No recent products available.</p>
                @endif
            </div>
        </section>
    @endsection
