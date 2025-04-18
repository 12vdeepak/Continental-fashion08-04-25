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
            <div class="currentPage text-[#E2001A] font-[500] text-[16px] flex items-center gap-2">
                Cart

            </div>

        </div>

        <!--Cancellation Page Content -->
        <section id="cartContainer" class="px-4 lg:px-[120px] py-[80px]">
            <div class="heading">
                Confirm Your Order
            </div>
            <p class="text-[#6E6E6E]">
                Please check and confirm your order details to place order
            </p>
            <div class=" mt-4  rounded-lg ">

                <div class="productHead text-xl text-bold mb-3">
                    Product Details
                </div>

                <!-- Desktop Table Layout (Hidden on Small Screens) -->
                <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="text-left bg-gray-100">
                                <th class="p-3">S.no</th>
                                <th class="p-3">Product Name</th>

                                <th class="p-3">Product</th>
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
                                    <td class="p-3">{{ $item->product->product_name }}</td>

                                    <td class="p-3 flex items-center">
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
                                                        class="decrease text-black rounded-md text-md px-3">−</button>

                                                    <span
                                                        class="quantity text-gray-800 font-medium text-md">{{ $item->quantity }}</span>

                                                    <!-- Increase Quantity -->
                                                    <button type="submit" name="quantity"
                                                        value="{{ $item->quantity + 1 }}"
                                                        class="increase text-black rounded-md text-md px-3">+</button>
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
                                                <img src="{{ asset('frontend/assets/images/bin.svg') }}" alt="Delete">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile List View -->
                <div class="sm:hidden space-y-4">
                    @foreach ($cartItems as $key => $item)
                        @php
                            $image = $item->product->images->where('color_id', $item->color_id)->first();
                            $imagePath = $image
                                ? asset('storage/' . $image->image_path)
                                : asset('frontend/assets/images/default-image.png');
                        @endphp

                        <div class="bg-white p-4 shadow rounded-lg flex flex-col gap-2">
                            <!-- Product Info -->
                            <div class="flex items-center">
                                <img src="{{ $imagePath }}" class="w-16 h-16 mr-3 rounded-lg" alt="Product">
                                <div>
                                    <h2 class="text-lg font-semibold">{{ $item->product->name }}</h2>
                                    <p class="text-sm text-gray-500">Color: {{ $item->color->color_code ?? 'N/A' }} | Size:
                                        {{ $item->size->size_name ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Quantity Control -->
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 font-medium">Quantity:</span>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="flex items-center gap-3 bg-gray-100 p-2 rounded-xl">
                                        <button type="submit" name="quantity" value="{{ max(1, $item->quantity - 1) }}"
                                            class="text-black text-md px-3">−</button>
                                        <span class="text-gray-800 font-medium">{{ $item->quantity }}</span>
                                        <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}"
                                            class="text-black text-md px-3">+</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Price and Action -->
                            <div class="flex justify-between items-center">
                                <p class="text-gray-800 font-medium">Total: <span
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

                @if (!$cartItems->isEmpty())
                    <div class="flex rounded-xl mt-5">
                        <div class="addressDiv w-full">
                            <div class="address bg-[#F4F4F4] flex p-4 gap-5 rounded-lg">
                                <div class="info w-full">
                                    <div class="nameAndDef flex gap-3 items-center w-full">
                                        <div
                                            class="nameAndChange flex items-center justify-between text-[20px] font-medium w-full">
                                            <div class="name">
                                                @if ($selectedAddress)
                                                    {{ $selectedAddress->first_name . ' ' . $selectedAddress->last_name }}
                                                @else
                                                    No Address Selected
                                                @endif
                                            </div>
                                            <a href="{{ route('addresses.index') }}">
                                                <div class="changeButton text-[14px] font-bold text-[#2468ce]">
                                                    Change
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="description mt-2">
                                        {{ $selectedAddress->street ?? '' }}, {{ $selectedAddress->city ?? '' }},
                                        {{ $selectedAddress->state ?? '' }} <br>
                                        Phone number: {{ $selectedAddress->phone_number ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif



                <!-- Payment Summary -->
                <div class="mt-6 bg-[#F4F4F4] p-4 lg:p-8 rounded-xl grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-lg font-bold">Payment summary</h3>
                        <p class="text-gray-500 text-sm">Total cost consists of temporary costs, not including shipping.
                        </p>
                    </div>
                    <div class="text-right sm:text-left">
                        @php
                            use App\Models\Address;

                            $totalNet = $cartItems->sum(fn($item) => $item->price * $item->quantity);

                            // Fetch full address object using the stored ID
                            $address = Address::find(session('selected_address_id'));
                            $country = optional($address)->country; // Get country from address

                            $isGermany = strtolower($country) === 'germany';
                            $vatAmount = $isGermany ? $totalNet * 0.19 : 0;
                            $finalAmount = $totalNet + $vatAmount;
                        @endphp


                        <p class="flex justify-between text-sm text-gray-700">
                            <span>Total net:</span>
                            <span class="net-amount">€{{ number_format($totalNet, 2) }}</span>
                        </p>

                        @if ($isGermany)
                            <p class="flex justify-between text-sm my-2 text-gray-700">
                                <span>VAT (19%):</span>
                                <span class="vat-amount">€{{ number_format($vatAmount, 2) }}</span>
                            </p>
                        @endif

                        <p class="flex justify-between text-md font-semibold mt-3 border-y border-dashed">
                            <span>Final amount:</span>
                            <span class="final-amount text-[#3CC4D5]">€{{ number_format($finalAmount, 2) }}</span>
                        </p>

                        <form id="" action="{{ route('order.store') }}" method="POST">
                            @csrf <!-- CSRF token for Laravel security -->

                            <!-- Hidden field to store selected address ID -->
                            <input type="hidden" name="address_id" id="selected_address_id"
                                value="{{ session('selected_address_id') }}">

                            <!-- Hidden field to store selected billing address ID -->
                            <input type="hidden" name="billing_address_id" id="selected_billing_address_id"
                                value="{{ session('selected_billing_address_id') }}">

                            <button type="submit" class="mt-10 bg-[#54114C] text-white px-6 py-2 rounded-lg w-full">
                                Place Order
                            </button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- Order Success Popup (Initially Hidden) -->
            <!-- Order Success Popup (Initially Hidden) -->
            @if (session()->has('orderDetails') && !empty(session('orderDetails')))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById("orderSuccessPopup").classList.remove("hidden");
                    });
                </script>
            @endif

            <div id="orderSuccessPopup"
                class="fixed inset-0 bg-opacity-30 backdrop-blur-sm flex items-center justify-center z-50 {{ session()->has('orderDetails') && !empty(session('orderDetails')) ? '' : 'hidden' }}">
                <div id="popupContent" class="bg-white rounded-xl shadow-lg w-[500px] p-6 relative">
                    <!-- Close Button -->
                    <a href="{{ route('frontend.confirm-order') }}"
                        class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">
                        &times;
                    </a>



                    <!-- Success Icon -->
                    <div class="flex justify-center">
                        <div class="bg-[#2AD15640] text-white rounded-full p-3">
                            <img src="{{ asset('frontend/assets/images/success-svgrepo-com (1).svg') }}" alt=""
                                class="w-[80px] h-[80px]">
                        </div>
                    </div>

                    <!-- Order Success Message -->
                    @if (session('orderDetails') && is_array(session('orderDetails')) && count(session('orderDetails')) > 0)
                        <h2 class="text-center text-2xl font-bold mt-4">Your order has been placed successfully</h2>
                        <p class="text-gray-600 text-center my-2">
                            Your order <span
                                class="font-semibold">#{{ session('orderDetails')[0]['order_id'] ?? 'N/A' }}</span> has
                            been placed successfully.
                            You will receive an order confirmation email soon.
                        </p>

                        <!-- Product Details -->
                        <div class="mt-6 space-y-4">
                            @foreach (session('orderDetails') as $item)
                                <div class="flex items-center bg-gray-100 p-4 rounded-lg">
                                    <img src="{{ $item['product_image'] }}" alt="{{ $item['product_name'] }}"
                                        class="w-16 h-16 object-cover rounded-lg">
                                    <div class="ml-4">
                                        <p class="text-lg font-semibold">{{ $item['product_name'] ?? 'N/A' }}</p>
                                        <div class="text-gray-600 text-sm flex gap-2 mt-1">
                                            <span>Color: <span class="w-3 h-3 inline-block rounded-full"
                                                    style="background: {{ $item['color'] ?? '#000' }}"></span></span> |
                                            <span>Size: {{ $item['size'] ?? 'N/A' }}</span> |
                                            <span>Qty: {{ $item['quantity'] ?? 0 }}</span>
                                        </div>
                                        <div class="mt-2 text-sm flex gap-4">
                                            <span class="text-gray-600">Unit Price: <span
                                                    class="font-semibold">€{{ $item['unit_price'] ?? 0 }}</span></span>
                                            <span class="text-gray-600">Total Price: <span
                                                    class="font-semibold text-blue-600">€{{ $item['total_price'] ?? 0 }}</span></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-red-600">No order details found.</p>
                    @endif

                    <div class="mt-6 text-center">
                        <a href="{{ route('frontend.all.product') }}">
                            <button class="bg-[#54114C] text-white px-6 py-3 rounded-lg text-lg w-full">
                                Continue Shopping
                            </button>
                        </a>
                    </div>

                </div>
            </div>




        </section>











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
                                        class="absolute top-5 left-2 bg-sky-500 text-white text-sm px-2 lg:px-3 py-1 rounded-md">
                                        {{ $related->sale_percentage }}% offer
                                    </div>
                                @endif
                                <div
                                    class="mb-4 productImage w-full h-[300px] overflow-hidden flex justify-center items-center">
                                    <img src="{{ asset('storage/' . optional($related->images->first())->image_path) }}"
                                        alt="{{ $related->name }}" class="w-full h-full object-cover rounded-xl">
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
                    <p class="text-center text-lg text-gray-500">No related products available.</p>
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
                                        alt="{{ $product->name }}" class="w-full h-full object-cover rounded-xl">
                                </div>

                                <div class="flex items-center justify-between mb-3 productSubIcons">
                                    <div class="productLeft text-[#6E6E6E]">{{ $product->code }}</div>
                                    {{--  <div class="flex items-center justify-between gap-2 productIconSet">
                                        @if ($product->category)
                                            <span
                                                class="text-gray-700 font-medium">{{ $product->category->category_name }}</span>
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
                    <p class="text-center text-lg text-gray-500">No recent products available.</p>
                @endif
            </div>
        </section>
    @endsection
