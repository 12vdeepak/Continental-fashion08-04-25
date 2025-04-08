@extends('frontend.layouts.app')
@section('content')
    <main>
        <div class="container mx-auto py-10">
            <h1 class="text-2xl font-bold mb-5 text-center">{{ $subcategory->subcategory_name }}</h1>

            @if ($subcategory->products->isNotEmpty())
                <div class="productSection mt-5 flex flex-col gap-10">
                    @foreach ($subcategory->products->chunk(3) as $chunk)
                        <div
                            class="productRow grid
                            {{ count($chunk) == 1 ? 'grid-cols-1 place-items-center' : 'grid-cols-1 md:grid-cols-3 gap-4' }}">

                            @foreach ($chunk as $product)
                                <a href="{{ route('frontend.all.product-page', $product->id) }}">
                                    <div class="relative product p-4 rounded-lg shadow-md">
                                        <!-- Removed 'border' class -->

                                        @if ($product->sale_percentage)
                                            <div
                                                class="absolute top-5 left-2 bg-sky-500 text-white text-sm px-3 py-1 rounded-md">
                                                {{ $product->sale_percentage }}% offer
                                            </div>
                                        @else
                                            <div
                                                class="absolute top-5 left-2 bg-gray-400 text-white text-sm px-3 py-1 rounded-md">
                                                No Discount
                                            </div>
                                        @endif

                                        <div class="productImage mb-4">
                                            <img src="{{ asset('storage/' . optional($product->images->first())->image_path) }}"
                                                alt="{{ $product->product_name }}"
                                                class="w-full h-[250px] object-cover rounded-xl border-0 shadow-none">
                                        </div>


                                        <h2 class="text-lg font-semibold">{{ $product->product_name }}</h2>

                                        <div class="productTag mb-2 text-[#E2001A] text-[12px]">
                                            {{ $product->brand_name }}
                                        </div>

                                        @php
                                            $priceToShow = $product->price;
                                            if (session()->has('company_user_id')) {
                                                $user = \App\Models\CompanyRegistration::find(
                                                    session('company_user_id'),
                                                );
                                                if ($user && $user->price_category_type) {
                                                    $priceCategory =
                                                        'category_' . $user->price_category_type . '_price';
                                                    $priceToShow = $product->$priceCategory ?? $product->price;
                                                }
                                            }
                                        @endphp

                                        <p class="text-gray-600">€{{ number_format($priceToShow, 2) }}</p>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center">No products found in this subcategory.</p>
            @endif
        </div>
    </main>
@endsection
