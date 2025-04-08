@extends('backend.layouts.papp')
@section('title', 'Admin - Show Product')

@section('content')

@section('style')
    <style>
        .error {
            color: red;
        }

        .product-image {
            width: 100px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
    </style>
@endsection

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Product Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Details Section -->
    <section class="content">
        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <th>Product Name:</th>
                    <td>{{ $product->product_name }}</td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td>{{ $product->category->category_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Sub Category:</th>
                    <td>{{ $product->subCategory->subcategory_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Material:</th>
                    <td>{{ $product->material->material_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Fabric Weight:</th>
                    <td>{{ $product->weight->weight_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Article:</th>
                    <td>{{ $product->article->article_name ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th>Brand:</th>
                    <td>
                        @if ($product->brands->count() > 0)
                            {{ $product->brands->pluck('brand_name')->implode(', ') }}
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Quantity Per Carton:</th>
                    <td>{{ $product->qty_per_carton ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Product Details:</th>
                    <td> {!! $product->product_details !!}</td>

                </tr>
                <tr>
                    <th>Wear By:</th>
                    <td>{{ $product->wear->wear_name }}</td>
                </tr>
                <tr>
                    <th>Pack/Poly:</th>
                    <td>{{ $product->pack_poly }}</td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td>{{ $product->country->country_name }}</td>
                </tr>
                <tr>
                    <th>Sale:</th>
                    <td>
                        <span class="badge {{ $product->sale == 'yes' ? 'badge-success' : 'badge-danger' }}">
                            {{ $product->sale == 'yes' ? 'On Sale' : 'Not on Sale' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Sale Percentage:</th>
                    <td>{{ $product->sale_percentage }}%</td>
                </tr>
                <tr>
                    <th>Promotional:</th>
                    <td>{{ $product->promotion->promotional_name  ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Manufacturer:</th>
                    <td>{{ $product->manufacturer_name }}</td>
                </tr>
                <tr>
                    <th>Remark:</th>
                    <td>{!! $product->remarks !!}</td>

                </tr>
                <tr>
                    <th>Prices:</th>
                    <td>
                        <ul>
                            <li>Category 1: €{{ number_format($product->category_1_price, 2) }}</li>
                            <li>Category 2: €{{ number_format($product->category_2_price, 2) }}</li>
                            <li>Category 3: €{{ number_format($product->category_3_price, 2) }}</li>
                            <li>Category 4: €{{ number_format($product->category_4_price, 2) }}</li>
                            {{--  <li>Actual Price: €{{ number_format($product->actual_product_price, 2) }}</li>  --}}
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>Product Images:</th>

                    <td>
                        @if ($product->images->isNotEmpty())
                            <div style="display: flex; flex-wrap: wrap;">
                                @foreach ($product->images as $image)
                                    <div style="margin: 5px; text-align: center;">
                                        <!-- Product Image -->
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                            style="width: 80px; height: 80px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 5px;"
                                            alt="Product Image">

                                        <!-- Color Display (Fixed) -->
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            <span
                                                style="
                                display: inline-block;
                                width: 20px;
                                height: 20px;
                                background-color: {{ $image->colors ? $image->colors->color_code : '#555' }};
                                border: 1px solid #000;
                                border-radius: 3px;
                                margin-right: 5px;">
                                            </span>
                                            <p style="font-size: 14px; color: #555; margin: 0;">
                                                {{ $image->colors ? $image->colors->color_name : 'N/A' }}
                                            </p>
                                        </div>

                                        <!-- Assigned Sizes & Quantities -->
                                        <div style="margin-top: 5px;">
                                            <strong style="font-size: 12px; color: #333;">Sizes & Quantities:</strong>
                                            <p style="font-size: 12px; color: #555; margin: 0;">
                                                @if ($image->sizes->isNotEmpty())
                                                    @foreach ($image->sizes as $size)
                                                        {{ $size->size_name }} ({{ $size->pivot->quantity ?? 0 }})
                                                        @if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                @else
                                                    N/A
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            No Images Available
                        @endif
                    </td>






                </tr>
            </table>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </div>
    </section>
</div>

@endsection
