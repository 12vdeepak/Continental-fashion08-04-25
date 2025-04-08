@extends('backend.layouts.app')
@section('title', 'Admin - Banner')

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
                    <h1>Edit banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Banner</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!--@if ($errors->any())
-->
    <!--<div class="card-body">-->
    <!--<div class="alert alert-danger alert-dismissible">-->
    <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->

    <!--@foreach ($errors->all() as $error)
-->
    <!--<p>{{ $error }}</p>-->
    <!--
@endforeach-->

    <!--</div>-->

    <!--</div>-->

    <!--
@endif-->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('banners.update', $banner->id) }}" role="form" id="quickForm"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">{{ __('Image') }}</label>
                                    <input id="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" name="image"
                                        accept="image/*">
                                    <div id="imagePreview" style="width: 150px; height: 150px; overflow: hidden;">
                                        <br><br>
                                        @if ($banner->image)
                                            <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        @else
                                            <p>No image available</p>
                                        @endif
                                    </div>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <textarea name="title" class="form-control @error('title') is-invalid @enderror">{{ $banner->title }}</textarea>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror">{{ $banner->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>






                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <a href="{{ route('banners.index') }}"
                                    class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
