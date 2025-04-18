@extends('frontend.layouts.app')
@section('content')
    <main>
        <div class="container py-10 mx-auto">
            <h1 class="mb-5 text-2xl font-bold text-center">{{ $subcategory->subcategory_name }}</h1>

            @if ($subcategory->products->isNotEmpty())
                <div class="flex flex-col gap-10 mt-5 productSection">
                    @foreach ($subcategory->products->chunk(3) as $chunk)
                        <div
                            class="productRow grid
                            {{ count($chunk) == 1 ? 'grid-cols-1 place-items-center' : 'grid-cols-1 md:grid-cols-3 gap-4' }}">

                            @foreach ($chunk as $product)
                                <a href="{{ route('frontend.all.product-page', $product->id) }}">
                                    <div class="relative p-4 rounded-lg shadow-md product">
                                        <!-- Removed 'border' class -->

                                        @if ($product->sale_percentage)
                                            <div
                                                class="absolute px-3 py-1 text-sm text-white rounded-md top-5 left-2 bg-sky-500">
                                                {{ $product->sale_percentage }}% offer
                                            </div>
                                        @else
                                            <div
                                                class="absolute px-3 py-1 text-sm text-white bg-gray-400 rounded-md top-5 left-2">
                                                No Discount
                                            </div>
                                        @endif

                                        <div class="mb-4 productImage">
                                            <img src="{{ asset('storage/' . optional($product->images->first())->image_path) }}"
                                                alt="{{ $product->product_name }}"
                                                class="w-full h-[250px] object-contain rounded-xl border-0 shadow-none">
                                        </div>


                                        <h2 class="text-lg font-semibold">{{ $product->product_name }}</h2>

                                        <div class="productTag mb-2 text-[#E2001A] text-[12px]">
                                            {{ $product->brand_name }}
                                        </div>

                                        {{-- Available Sizes --}}
                                        @php
                                            $uniqueSizes = collect();

                                            foreach ($product->images as $image) {
                                                foreach ($image->sizes as $size) {
                                                    $uniqueSizes->push($size);
                                                }
                                            }

                                            $uniqueSizes = $uniqueSizes->unique('id');
                                        @endphp

                                        <div class="mb-3">
                                            <span class="block mb-1 text-sm font-medium text-gray-700">Sizes:</span>
                                            @if ($uniqueSizes->count() > 0)
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach ($uniqueSizes as $size)
                                                        <span
                                                            class="inline-block px-3 py-1 text-sm font-semibold text-blue-700 bg-blue-100 rounded-full">
                                                            {{ strtoupper($size->size_name) }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-sm text-gray-500">Not available</span>
                                            @endif
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
                <p class="text-center text-gray-500">No products found in this subcategory.</p>
            @endif
        </div>
    </main>
@endsection
