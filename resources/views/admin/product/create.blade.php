@extends('backend.layouts.capp')
@section('title', 'Admin - Add Products')

@section('content')

@section('style')
    <style>
        .error {
            color: red;
        }
    </style>
@endsection

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product Details</h3>
                        </div>

                        <!-- Form Start -->
                        <form action="{{ route('products.store') }}" role="form" id="quickForm" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <!-- Category -->
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Sub Category -->
                                <div class="form-group">
                                    <label for="sub_category_id">Sub Category</label>
                                    <select name="sub_category_id"
                                        class="form-control @error('sub_category_id') is-invalid @enderror">
                                        <option value="">Select Sub Category</option>
                                        @foreach ($sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}">
                                                {{ $sub_category->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name"
                                        class="form-control @error('product_name') is-invalid @enderror"
                                        value="{{ old('product_name') }}" placeholder="Enter Product Name">
                                    @error('product_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Product Images -->
                                <div class="form-group">
                                    <label for="product_images">Product Images</label>
                                    <input type="file" name="product_images[]"
                                        class="form-control @error('product_images') is-invalid @enderror"
                                        id="product_images" multiple>
                                    @error('product_images')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="row" id="imagePreviewContainer"></div>

                                <!-- Product Details -->
                                <div class="form-group">
                                    <label for="product_details">Product Details</label>
                                    <textarea id="product_det" name="product_details" class="form-control @error('product_details') is-invalid @enderror">{{ old('product_details') }}</textarea>
                                    @error('product_details')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Material -->
                                <div class="form-group">
                                    <label for="material_id">Material</label>
                                    <select name="material_id"
                                        class="form-control @error('material_id') is-invalid @enderror">
                                        <option value="">Select Material</option>
                                        @foreach ($materials as $material)
                                            <option value="{{ $material->id }}">{{ $material->material_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('material_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fabric Weight -->
                                <div class="form-group">
                                    <label for="weight_id">Fabric Weight</label>
                                    <select name="weight_id"
                                        class="form-control @error('weight_id') is-invalid @enderror">
                                        <option value="">Select Fabric Weight</option>
                                        @foreach ($weights as $weight)
                                            <option value="{{ $weight->id }}">{{ $weight->weight_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('weight_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Article -->
                                <div class="form-group">
                                    <label for="article_id">Article Number</label>
                                    <select name="article_id"
                                        class="form-control @error('article_id') is-invalid @enderror">
                                        <option value="">Select Article</option>
                                        @foreach ($articles as $article)
                                            <option value="{{ $article->id }}">{{ $article->article_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('article_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Size -->
                                {{--  <div class="form-group">
                                    <label for="size_ids">Size</label>
                                    @foreach ($sizes as $size)
                                        <div class="form-check">
                                            <input type="checkbox" name="size_ids[]" value="{{ $size->id }}"
                                                class="form-check-input" id="size_{{ $size->id }}"
                                                {{ in_array($size->id, old('size_ids', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="size_{{ $size->id }}">{{ $size->size_name }}</label>
                                        </div>
                                    @endforeach
                                    @error('size_ids')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>  --}}

                                <!-- Color -->
                                {{--  <div class="form-group">
                                    <label for="color_ids">Color</label>
                                    @foreach ($colors as $color)
                                        <div class="form-check">
                                            <input type="checkbox" name="color_ids[]" value="{{ $color->id }}"
                                                class="form-check-input" id="color_{{ $color->id }}"
                                                {{ in_array($color->id, old('color_ids', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="color_{{ $color->id }}">{{ $color->color_code }}</label>
                                        </div>
                                    @endforeach
                                    @error('color_ids')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>  --}}

                                <!-- Brand -->
                                <div class="form-group">
                                    <label for="brand_ids">Brand</label>
                                    @foreach ($brands as $brand)
                                        <div class="form-check">
                                            <input type="checkbox" name="brand_ids[]" value="{{ $brand->id }}"
                                                class="form-check-input" id="brand_{{ $brand->id }}"
                                                {{ in_array($brand->id, old('brand_ids', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="brand_{{ $brand->id }}">{{ $brand->brand_name }}</label>
                                        </div>
                                    @endforeach
                                    @error('brand_ids')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fabric Quality -->
                                {{--  <div class="form-group">
                                    <label for="fabric_quality">Fabric Quality</label>
                                    <select name="fabric_id"
                                        class="form-control @error('fabric_id') is-invalid @enderror">
                                        <option value="">Select Fabric Quality</option>
                                        @foreach ($fabrics as $fabric)
                                            <option value="{{ $fabric->id }}">{{ $fabric->fabric_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('fabric_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>  --}}

                                <div class="form-group">
                                    <label for="qty_per_carton">Quantity Per Carton</label>
                                    <input type="number" name="qty_per_carton"
                                        class="form-control @error('qty_per_carton') is-invalid @enderror"
                                        value="{{ old('qty_per_carton') }}" placeholder="Enter Pack Poly">
                                    @error('qty_per_carton')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pack Poly -->
                                <div class="form-group">
                                    <label for="pack_poly">Pack Poly</label>
                                    <input type="number" name="pack_poly"
                                        class="form-control @error('pack_poly') is-invalid @enderror"
                                        value="{{ old('pack_poly') }}" placeholder="Enter Pack Poly">
                                    @error('pack_poly')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Country -->
                                <div class="form-group">
                                    <label for="country_id">Origin</label>
                                    <select name="country_id"
                                        class="form-control @error('country_id') is-invalid @enderror">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Manufacturer Name -->
                                <div class="form-group">
                                    <label for="manufacturer_name">Manufacturer Name</label>
                                    <input type="text" name="manufacturer_name"
                                        class="form-control @error('manufacturer_name') is-invalid @enderror"
                                        value="{{ old('manufacturer_name') }}" placeholder="Enter Manufacturer Name">
                                    @error('manufacturer_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <!-- Price Fields -->
                                <div class="form-group">
                                    <label for="category_1_price">Category 1 Price</label>
                                    <input type="number" name="category_1_price"
                                        class="form-control @error('category_1_price') is-invalid @enderror"
                                        value="{{ old('category_1_price') }}" step="0.01" min="0"
                                        placeholder="Enter Category 1 Price">
                                    @error('category_1_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_2_price">Category 2 Price</label>
                                    <input type="number" name="category_2_price"
                                        class="form-control @error('category_2_price') is-invalid @enderror"
                                        value="{{ old('category_2_price') }}" step="0.01" min="0"
                                        placeholder="Enter Category 2 Price">
                                    @error('category_2_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_3_price">Category 3 Price</label>
                                    <input type="number" name="category_3_price"
                                        class="form-control @error('category_3_price') is-invalid @enderror"
                                        value="{{ old('category_3_price') }}" step="0.01" min="0"
                                        placeholder="Enter Category 3 Price">
                                    @error('category_3_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_4_price">Category 4 Price</label>
                                    <input type="number" name="category_4_price"
                                        class="form-control @error('category_4_price') is-invalid @enderror"
                                        value="{{ old('category_4_price') }}" step="0.01" min="0"
                                        placeholder="Enter Category 4 Price">
                                    @error('category_4_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <!-- Sale -->
                                <div class="form-group">
                                    <label for="sale">On Sale?</label>
                                    <select name="sale" id="sale"
                                        class="form-control @error('sale') is-invalid @enderror">
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                    @error('sale')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Sale Percentage -->
                                <div class="form-group" id="salePercentageGroup" style="display: none;">
                                    <label for="sale_percentage">Sale Percentage</label>
                                    <input type="number" name="sale_percentage"
                                        class="form-control @error('sale_percentage') is-invalid @enderror"
                                        value="{{ old('sale_percentage') }}" placeholder="Enter Sale Percentage">
                                    @error('sale_percentage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Promotion -->
                                <div class="form-group">
                                    <label for="promotion_id">Promotion</label>
                                    <select name="promotion_id"
                                        class="form-control @error('promotion_id') is-invalid @enderror">
                                        <option value="">Select Promotion</option>
                                        @foreach ($promotions as $promotion)
                                            <option value="{{ $promotion->id }}">{{ $promotion->promotional_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('promotion_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Wear Type -->
                                <div class="form-group">
                                    <label for="wear_id">Wear Type</label>
                                    <select name="wear_id"
                                        class="form-control @error('wear_id') is-invalid @enderror">
                                        <option value="">Select Wear Type</option>
                                        @foreach ($wears as $wear)
                                            <option value="{{ $wear->id }}">{{ $wear->wear_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('wear_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Remarks -->
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea id="remarks" name="remarks" class="form-control @error('remarks') is-invalid @enderror">{{ old('remarks') }}</textarea>
                                    @error('remarks')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


@push('script')
@endpush
