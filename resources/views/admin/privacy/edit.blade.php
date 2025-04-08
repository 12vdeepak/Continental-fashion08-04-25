@extends('backend.layouts.app')
@section('title', 'Admin - Privacy-Policy')
@section('content')
@section('style')
    <style>
        .error {
            color: red;
        }
    </style>
@endsection
<div class="content-wrapper">




    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Edit Privacy Policy</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Privacy Policy</li>
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
            <form action="{{ route('privacy-policy.update', ['privacy' => $privacy]) }}" method="post"
                enctype="multipart/form-data" id="privacyForm">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="summernote_privacy" type="text" rows=5 id="description" name="description"
                            class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description', $privacy->description) }}</textarea>
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
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('post_content', {
        height: '440px'
    });
</script>
@endsection
