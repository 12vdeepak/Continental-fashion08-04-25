@extends('backend.layouts.app')
@section('title', 'Admin - Subcategory')

@section('content')

<div class="content-wrapper">

    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Subcategory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Subcategory</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Message -->
    @if (session('success'))
        <div class="container-fluid">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
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
                        <a href="{{ route('subcategory.create') }}">
                            <button type="button" class="btn btn-block bg-gradient-primary">Add Subcategory</button>
                        </a>
                    </h3>
                </div>

                <!-- Table -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.No</th>
                                <th class="text-center" style="width: 150px;">Category Name</th>
                                <th class="text-center" style="width: 150px;">Subcategory Name</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $index => $subcategory)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $subcategory->category->category_name }}</td>
                                    <td class="text-center">{{ $subcategory->subcategory_name }}</td>
                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-primary btn-sm" style="margin-right: 5px;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Subcategory?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
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
