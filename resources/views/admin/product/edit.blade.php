@extends('backend.layouts.papp')
@section('title', 'Admin - Edit Product')

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
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                            <h3 class="card-title">Edit Product Details</h3>
                        </div>

                        <!-- Form Start -->
                        <form action="{{ route('products.update', $product->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <!-- Category -->
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}</option>
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
                                            <option value="{{ $sub_category->id }}"
                                                {{ $sub_category->id == $product->sub_category_id ? 'selected' : '' }}>
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
                                        value="{{ old('product_name', $product->product_name) }}"
                                        placeholder="Enter Product Name">
                                    @error('product_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Product Images -->
                                <div class="form-group">
                                    <label for="product_images">Product Images</label>
                                    <input type="file" name="product_images[]" id="product_images"
                                        class="form-control @error('product_images') is-invalid @enderror" multiple
                                        accept="image/*">
                                    @error('product_images')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <!-- Display Newly Selected Images -->
                                    <div class="row mt-3" id="imagePreviewContainer"></div>

                                    <!-- Display Existing Images -->
                                    @if (!empty($product->images) && $product->images->isNotEmpty())
                                        <div class="mt-2">
                                            <strong>Current Images:</strong>
                                            <div class="d-flex flex-wrap" style="gap: 15px;">
                                                @foreach ($product->images as $image)
                                                    <div
                                                        style="padding: 5px; border: 1px solid #ddd; border-radius: 5px;">
                                                        <!-- Existing Image Preview -->
                                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                                            width="100" alt="Product Image">

                                                        <!-- Change Image -->
                                                        <div class="mt-2">
                                                            <label for="updated_image_{{ $image->id }}">Change
                                                                Image:</label>
                                                            <input type="file"
                                                                id="updated_image_{{ $image->id }}"
                                                                name="updated_images[{{ $image->id }}]"
                                                                class="form-control" accept="image/*">
                                                        </div>

                                                        <!-- Assign Color -->
                                                        <div class="mt-2">
                                                            <label for="color_{{ $image->id }}">Assigned
                                                                Color:</label>
                                                            <select name="existing_image_colors[{{ $image->id }}]"
                                                                id="color_{{ $image->id }}" class="form-control">
                                                                <option value="">Default (All Colors)</option>
                                                                @foreach ($colors as $color)
                                                                    <option value="{{ $color->id }}"
                                                                        {{ $image->color_id == $color->id ? 'selected' : '' }}>
                                                                        {{ $color->color_name }}
                                                                        ({{ $color->color_code }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Assign Sizes & Quantities -->
                                                        <div class="mt-2">
                                                            <label>Assigned Sizes & Quantities:</label>
                                                            @foreach ($sizes as $size)
                                                                @php
                                                                    // Fetch the quantity for this size if it exists
                                                                    $quantity =
                                                                        optional(
                                                                            $image->sizes
                                                                                ->where('id', $size->id)
                                                                                ->first(),
                                                                        )->pivot->quantity ?? 0;
                                                                @endphp
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <!-- Checkbox for selecting the size -->
                                                                    <input type="checkbox"
                                                                        name="existing_image_sizes[{{ $image->id }}][]"
                                                                        value="{{ $size->id }}" class="mr-2"
                                                                        {{ in_array($size->id, $image->sizes->pluck('id')->toArray()) ? 'checked' : '' }}>

                                                                    <span class="mr-2">{{ $size->size_name }}</span>

                                                                    <!-- Quantity input for the selected size -->
                                                                    <input type="number"
                                                                        name="existing_image_quantities[{{ $image->id }}][{{ $size->id }}]"
                                                                        class="form-control ml-2" style="width: 80px;"
                                                                        min="0" value="{{ $quantity }}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>











                                <!-- Product Details -->
                                <div class="form-group">
                                    <label for="product_details">Product Details</label>
                                    <textarea id="product_det" name="product_details" class="form-control @error('product_details') is-invalid @enderror">{{ old('product_details', $product->product_details) }}</textarea>
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
                                            <option value="{{ $material->id }}"
                                                {{ $material->id == $product->material_id ? 'selected' : '' }}>
                                                {{ $material->material_name }}</option>
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
                                            <option value="{{ $weight->id }}"
                                                {{ $weight->id == $product->weight_id ? 'selected' : '' }}>
                                                {{ $weight->weight_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('weight_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Article -->
                                <div class="form-group">
                                    <label for="article_id">Article</label>
                                    <select name="article_id"
                                        class="form-control @error('article_id') is-invalid @enderror">
                                        <option value="">Select Article</option>
                                        @foreach ($articles as $article)
                                            <option value="{{ $article->id }}"
                                                {{ $article->id == $product->article_id ? 'selected' : '' }}>
                                                {{ $article->article_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('article_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Size -->
                                {{--  <div class="form-group">
                                    <label for="size_ids">Size</label>
                                    <div>
                                        @foreach ($sizes as $size)
                                            <div class="form-check">
                                                <input type="checkbox" name="size_ids[]" value="{{ $size->id }}"
                                                    class="form-check-input @error('size_ids') is-invalid @enderror"
                                                    {{ in_array($size->id, old('size_ids', $product->sizes->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ $size->size_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('size_ids')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>  --}}






                                <!-- Brand -->
                                <div class="form-group">
                                    <label for="brand_ids">Brand</label>
                                    <div>
                                        @foreach ($brands as $brand)
                                            <div class="form-check">
                                                <input type="checkbox" name="brand_ids[]"
                                                    value="{{ $brand->id }}"
                                                    class="form-check-input @error('brand_ids') is-invalid @enderror"
                                                    {{ in_array($brand->id, old('brand_ids', $product->brands->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ $brand->brand_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('brand_ids')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Fabric Quality -->
                                {{--  <div class="form-group">
                                    <label for="fabric_id">Fabric Quality</label>
                                    <select name="fabric_id"
                                        class="form-control @error('fabric_id') is-invalid @enderror">
                                        @foreach ($fabrics as $fabric)
                                            <option value="{{ $fabric->id }}"
                                                {{ old('fabric_id', $product->fabric_id) == $fabric->id ? 'selected' : '' }}>
                                                {{ $fabric->fabric_name }}
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
                                        value="{{ old('qty_per_carton', $product->qty_per_carton) }}"
                                        placeholder="Enter Quantity">
                                    @error('qty_per_carton')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <!-- Pack Poly -->
                                <div class="form-group">
                                    <label for="pack_poly">Pack Poly</label>
                                    <input type="number" name="pack_poly"
                                        class="form-control @error('pack_poly') is-invalid @enderror"
                                        value="{{ old('pack_poly', $product->pack_poly) }}"
                                        placeholder="Enter Pack Poly">
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
                                            <option value="{{ $country->id }}"
                                                {{ $country->id == $product->country_id ? 'selected' : '' }}>
                                                {{ $country->country_name }}</option>
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
                                        value="{{ old('manufacturer_name', $product->manufacturer_name) }}"
                                        placeholder="Enter Manufacturer Name">
                                    @error('manufacturer_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <!-- Price Fields -->
                                <div class="form-group">
                                    <label for="category_1_price">Category 1 Price</label>
                                    <input type="number" name="category_1_price"
                                        class="form-control @error('category_1_price') is-invalid @enderror"
                                        value="{{ old('category_1_price', $product->category_1_price) }}"
                                        placeholder="Enter Category 1 Price" step="0.01" min="0">
                                    @error('category_1_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_2_price">Category 2 Price</label>
                                    <input type="number" name="category_2_price"
                                        class="form-control @error('category_2_price') is-invalid @enderror"
                                        value="{{ old('category_2_price', $product->category_2_price) }}"
                                        placeholder="Enter Category 2 Price" step="0.01" min="0">
                                    @error('category_2_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_3_price">Category 3 Price</label>
                                    <input type="number" name="category_3_price"
                                        class="form-control @error('category_3_price') is-invalid @enderror"
                                        value="{{ old('category_3_price', $product->category_3_price) }}"
                                        placeholder="Enter Category 3 Price" step="0.01" min="0">
                                    @error('category_3_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_4_price">Category 4 Price</label>
                                    <input type="number" name="category_4_price"
                                        class="form-control @error('category_4_price') is-invalid @enderror"
                                        value="{{ old('category_4_price', $product->category_4_price) }}"
                                        placeholder="Enter Category 4 Price" step="0.01" min="0">
                                    @error('category_4_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Sale -->
                                <div class="form-group">
                                    <label for="sale">On Sale?</label>
                                    <select name="sale" class="form-control @error('sale') is-invalid @enderror">
                                        <option value="no" {{ $product->sale == 'no' ? 'selected' : '' }}>No
                                        </option>
                                        <option value="yes" {{ $product->sale == 'yes' ? 'selected' : '' }}>Yes
                                        </option>
                                    </select>
                                    @error('sale')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Sale Percentage -->
                                <div class="form-group">
                                    <label for="sale_percentage">Sale Percentage</label>
                                    <input type="number" name="sale_percentage"
                                        class="form-control @error('sale_percentage') is-invalid @enderror"
                                        value="{{ old('sale_percentage', $product->sale_percentage) }}"
                                        placeholder="Enter Sale Percentage">
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
                                            <option value="{{ $promotion->id }}"
                                                {{ $promotion->id == $product->promotion_id ? 'selected' : '' }}>
                                                {{ $promotion->promotional_name }}</option>
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
                                            <option value="{{ $wear->id }}"
                                                {{ $wear->id == $product->wear_id ? 'selected' : '' }}>
                                                {{ $wear->wear_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('wear_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Remarks -->
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea id="remarks" name="remarks" class="form-control @error('remarks') is-invalid @enderror">{{ old('remarks', $product->remarks) }}</textarea>
                                    @error('remarks')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
