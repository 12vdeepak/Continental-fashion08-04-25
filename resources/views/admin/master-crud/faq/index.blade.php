@extends('backend.layouts.app')
@section('title', 'Admin - FAQs')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>FAQs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">FAQs</li>
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

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route('faq.create') }}">
                            <button type="button" class="btn btn-block bg-gradient-primary">Add FAQ</button>
                        </a>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.No</th>
                                <th class="text-center" style="width: 250px;">Question</th>
                                <th class="text-center">Answer</th>
                                <th class="text-center" style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $index => $faq)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $faq->question }}</td>
                                    <td class="text-center">
                                        {{ Str::limit(strip_tags($faq->answer), 50, '...') }}
                                        @if (strlen(strip_tags($faq->answer)) > 50)
                                            <a href="#" data-toggle="modal"
                                                data-target="#answerModal{{ $faq->id }}">
                                                <i class="fas fa-info-circle"></i> <!-- Font Awesome icon -->
                                            </a>
                                        @endif
                                    </td>

                                    <!-- Modal for full answer -->
                                    <div class="modal fade" id="answerModal{{ $faq->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Full Answer</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ strip_tags($faq->answer) }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <td class="text-center">
                                        <form action="{{ route('faq.toggleStatus', ['faq' => $faq->id]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-sm {{ $faq->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $faq->status == 1 ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>

                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-primary btn-sm"
                                                style="margin-right: 5px;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('faq.destroy', $faq->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this FAQ?')">
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
        </section>
    </div>

@endsection
