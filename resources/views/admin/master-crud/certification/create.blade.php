@extends('backend.layouts.app')
@section('title', 'Admin - Add Certification')

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
                    <h1>Add Certification</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Certification</li>
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
                            <h3 class="card-title">Add Certification Details</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="{{ route('certification.store') }}" role="form" id="quickForm" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="certification_logo">Certification Logo</label>
                                    <input type="file" name="certification_logo"
                                        class="form-control @error('certification_logo') is-invalid @enderror"
                                        value="{{ old('certification_logo') }}>
                                    @error('certification_logo')
<div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="certification_name">Certification Name</label>
                            <input type="text" name="certification_name"
                                class="form-control @error('certification_name') is-invalid @enderror"
                                value="{{ old('certification_name') }}">
                            @error('certification_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

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
    </div>
</div>
</section>
</div>

@endsection
