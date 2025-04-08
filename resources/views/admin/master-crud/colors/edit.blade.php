@extends('backend.layouts.app')
@section('title', 'Admin - Color')

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
                    <h1>Edit Color</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Color</li>
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
                        <form action="{{ route('colors.update', $color->id) }}" role="form" id="quickForm"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="color_code">Color Name</label>
                                    <div class="input-group">
                                        <input type="text" id="color_code" name="color_code"
                                            class="form-control @error('color_code') is-invalid @enderror"
                                            value="{{ old('color_code', $color->color_code) }}"
                                            placeholder="Enter color code (e.g. #FF5733)">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="color_preview"
                                                style="width: 40px;"></span>
                                        </div>
                                    </div>
                                    <small id="color_name" class="form-text"></small>
                                    @error('color_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Color Preview -->
                                <div style="margin-top: 10px;">
                                    <span
                                        style="display: inline-block; width: 20px; height: 20px; background-color: {{ $color->color_code }};
                                    border: 1px solid #000; border-radius: 3px; margin-right: 5px;"></span>

                                </div>









                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <a href="{{ route('colors.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
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
