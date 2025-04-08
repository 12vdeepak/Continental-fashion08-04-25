@extends('backend.layouts.app')
@section('title', 'Admin - Dimensions')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Dimension List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dimension List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{ route('dimension.create') }}">
                                <button type="button" class="btn btn-primary">Add Dimension</button>
                            </a>
                        </h3>
                    </div>

                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">S.No</th>
                                    <th class="text-center" style="width: 200px;">Dimension Name</th>
                                    <th class="text-center" style="width: 150px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dimensions as $index => $dimension)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $dimension->dimension_name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('dimension.edit', $dimension->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('dimension.destroy', $dimension->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this dimension?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
