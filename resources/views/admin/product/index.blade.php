@extends('backend.layouts.papp')
@section('title', 'Admin - Products')

@section('content')

    <div class="content-wrapper">

        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Success Message -->
        @if (session('success'))
            <div class="container-fluid">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                </i> Add Product
                            </a>
                        </h3>
                    </div>

                    <!-- Table -->
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">S.No</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Sub Category</th>
                                    <th class="text-center">Material</th>
                                    <th class="text-center">Sale Percentage</th>
                                    <th class="text-center">Manufacturer</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $product->product_name }}</td>
                                        <td class="text-center">{{ $product->category->category_name ?? 'N/A' }}</td>
                                        <td class="text-center">{{ $product->subCategory->subcategory_name ?? 'N/A' }}</td>
                                        <td class="text-center">{{ $product->material->material_name ?? 'N/A' }}</td>





                                        <td class="text-center">
                                            {{ $product->sale_percentage ? $product->sale_percentage . '%' : 'N/A' }}
                                        </td>

                                        <td class="text-center">{{ $product->manufacturer_name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>

    </div>
@endsection
