@extends('backend.layouts.app')
@section('title', 'Admin - Discount')

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
                    <h1>Edit Discount</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Discount</li>
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
                        <form action="{{ route('discount.update', $discount->id) }}" role="form" id="quickForm"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">



                                <div class="form-group">
                                    <label for="discount_percentage">Discount Percentage (%)</label>
                                    <div class="input-group">
                                        <input type="number" id="discount_percentage" name="discount_percentage"
                                            class="form-control @error('discount_percentage') is-invalid @enderror"
                                            value="{{ $discount->discount_percentage }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('discount_percentage')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>








                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <a href="{{ route('discount.index') }}"
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
