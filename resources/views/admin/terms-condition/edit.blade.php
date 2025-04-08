@extends('backend.layouts.app')
@section('title', 'Admin - Terms&Conditions')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Edit Terms & Condition</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Terms & Condition</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>



        <div class="col-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('termscondition.update', ['termscondition' => $termscondition]) }}" method="post"
                    enctype="multipart/form-data" id="termsForm">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="summernote_terms" type="text" rows=5 id="description" name="description"
                                class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ $termscondition->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
