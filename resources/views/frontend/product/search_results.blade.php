@extends('frontend.layouts.app')
@section('content')
    <main>
        <div class="container mx-auto py-10">
            @if (isset($query))
                <h2 class="text-2xl font-bold mb-6 text-center">Search Results for "{{ $query }}"</h2>

                @if ($results->isEmpty())
                    <p class="text-gray-500 text-center">No results found.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 place-items-center">
                        @foreach ($results as $product)
                            <div class="bg-white p-4 rounded-lg shadow-lg text-center">
                                <img src="{{ asset('storage/' . optional($product->images->first())->image_path) }}"
                                    alt="{{ $product->product_name }}" class="w-full h-48 object-contain mx-auto rounded-lg">

                                <div class="mt-4">
                                    <a href="{{ route('frontend.all.product-page', $product->id) }}"
                                        class="text-gray-700 font-semibold block text-lg">
                                        {{ $product->product_name }}
                                    </a>
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
                                        <span class="block text-sm font-medium text-gray-700 mb-1">Sizes:</span>
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
                                    <!-- Added category display -->
                                    <p class="text-gray-500 mb-2">
                                        Category: {{ $product->category->category_name ?? 'N/A' }}
                                    </p>
                                    <div class="productTag mb-2 text-[#E2001A] text-lg font-bold uppercase">
                                        @foreach ($product->brands as $brand)
                                            <span class="mr-2">{{ $brand->brand_name }}</span>
                                        @endforeach
                                    </div>

                                    <p class="text-gray-600">{{ $product->manufacturer_name }}</p>

                                    @php
                                        $priceToShow = null;
                                        if (session()->has('company_user_id')) {
                                            $user = \App\Models\CompanyRegistration::find(session('company_user_id'));
                                            if ($user && $user->price_category_type) {
                                                $priceCategory = 'category_' . $user->price_category_type . '_price';
                                                $priceToShow = $product->$priceCategory ?? $product->price;
                                            }
                                        }
                                    @endphp

                                    @if ($priceToShow && $priceToShow > 0)
                                        <p class="text-gray-900 font-bold mt-2 text-xl">
                                            €{{ number_format($priceToShow, 2) }}</p>
                                    @else
                                        <p class="text-gray-500 font-bold mt-2">
                                            <a href="{{ route('frontend.login') }}" class="text-blue-600 hover:underline">
                                                Please login to see price
                                            </a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>

    </main>
@endsection
