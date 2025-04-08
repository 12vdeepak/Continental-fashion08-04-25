@extends('backend.layouts.app')
@section('title', 'Admin - Brand')

@section('content')


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Brand</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Brand</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if (session('success'))
            <div class="card-body">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>{{ Session::get('success') }}</h5>
                    <?php Session::forget('success'); ?>
                </div>
            </div>
        @endif



        <section class="content">
            {{-- <div class="container-fluid">
        <div class="row">
          <div class="col-12"> --}}


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="{{ route('brand.create') }}"><button type="button"
                                class="btn btn-block bg-gradient-primary">Add Brand</button></a></h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.No</th>
                                <th class="text-center" style="width: 120px;">Image</th> <!-- Set fixed width for images -->
                                <th class="text-center" style="width: 150px;">Brand Name</th>

                                <th class="text-center" style="width: 150px;">Action</th>
                                <!-- Set fixed width for action buttons -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $index => $brands)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/' . $brands->brand_logo) }}" alt="Brand Image"
                                            style="width: 100px; height: 100px;">
                                    </td>
                                    <td class="text-center">{{ $brands->brand_name }}</td>










                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('brand.edit', $brands->id) }}" class="btn btn-primary btn-sm"
                                                style="margin-right: 5px;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('brand.destroy', $brands->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this Brands?')">
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

            {{-- </div>
        </div>
      </div> --}}
        </section>
    </div>

@endsection
