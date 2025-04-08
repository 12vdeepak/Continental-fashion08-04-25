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
                    <h1>Add Color</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Color</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('colors.store') }}" role="form" id="quickForm" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="color_code">Color Name</label>
                                    <div class="input-group">
                                        <input type="text" id="color_code" name="color_code"
                                            class="form-control @error('color_code') is-invalid @enderror"
                                            value="{{ old('color_code') }}"
                                            placeholder="Enter color code (e.g. #FF5733)" oninput="updateColor()">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="color_preview"
                                                style="width: 40px; height: 38px;"></span>
                                        </div>
                                    </div>
                                    <small id="color_name_display" class="form-text text-muted"></small>
                                    @error('color_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>





                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
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
