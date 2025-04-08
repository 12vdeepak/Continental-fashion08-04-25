@extends('backend.layouts.app')
@section('title', 'Admin - Banner')

@section('content')


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Banners</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Banners</li>
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
                    <h3 class="card-title"><a href="{{ route('banners.create') }}"><button type="button"
                                class="btn btn-block bg-gradient-primary">Add Banner</button></a></h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.No</th>
                                <th class="text-center" style="width: 120px;">Image</th> <!-- Set fixed width for images -->
                                <th class="text-center" style="width: 150px;">Title</th>
                                <th class="text-center" style="width: 180px;">Description</th>
                                <th class="text-center" style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                                <!-- Set fixed width for action buttons -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $index => $banner)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image"
                                            style="width: 100px; height: 100px;">
                                    </td>
                                    <td class="text-center">{{ $banner->title }}</td>




                                    <td class="text-center">
                                        {{ Str::limit(strip_tags($banner->description), 50, '...') }}
                                        @if (strlen(strip_tags($banner->description)) > 50)
                                            <a href="#" data-toggle="modal"
                                                data-target="#descriptionModal{{ $banner->id }}">
                                                <i class="fas fa-info-circle"></i> <!-- Font Awesome icon for "info" -->
                                            </a>
                                        @endif
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="descriptionModal{{ $banner->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Full Description</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ strip_tags($banner->description) }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td class="text-center">
                                        <form id="statusForm"
                                            action="{{ route('banners.toggle-status', ['banner' => $banner->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button id="statusButton" type="submit"
                                                class="btn btn-sm {{ $banner->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $banner->status == 1 ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>



                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('banners.edit', $banner->id) }}"
                                                class="btn btn-primary btn-sm" style="margin-right: 5px;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('banners.destroy', $banner->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this Banner?')">
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
