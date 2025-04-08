@extends('backend.layouts.app')
@section('title', 'Admin - Price')

@section('content')


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Price</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Price</li>
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
                    <h3 class="card-title"><a href="{{ route('price.create') }}"><button type="button"
                                class="btn btn-block bg-gradient-primary">Add Price</button></a></h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.No</th>

                                <th class="text-center" style="width: 100px;">Price Level</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                                <!-- Set fixed width for action buttons -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($price as $index => $prices)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>

                                    <td class="text-center">{{ $prices->price_level }}</td>









                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('price.edit', $prices->id) }}" class="btn btn-primary btn-sm"
                                                style="margin-right: 5px;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('price.destroy', $prices->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this Price level?')">
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
