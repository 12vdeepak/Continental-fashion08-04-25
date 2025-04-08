@extends('backend.layouts.app')
@section('title', 'Admin - VAT')

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
                    <h1>Add VAT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add VAT</li>
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
                    <!-- jQuery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add VAT Details</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Form Start -->
                        <form action="{{ route('vat.store') }}" role="form" id="quickForm" method="post">
                            @csrf
                            <div class="card-body">

                                <!-- Country Dropdown -->
                                <div class="form-group">
                                    <label for="country_id">Select Country</label>
                                    <select id="country_id" name="country_id"
                                        class="form-control select2 @error('country_id') is-invalid @enderror">
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                {{ $country->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- VAT Percentage Input -->
                                <div class="form-group">
                                    <label for="vat_percentage">VAT Percentage (%)</label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" id="vat_percentage" name="vat_percentage"
                                            class="form-control @error('vat_percentage') is-invalid @enderror"
                                            value="{{ old('vat_percentage') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    @error('vat_percentage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <!-- Submit Button -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
