@extends('backend.layouts.app')
@section('title', 'Admin - News & Offers')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>News & Offers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">News & Offers</li>
                        </ol>
                    </div>
                </div>
            </div>
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route('news-offers.create') }}">
                            <button type="button" class="btn btn-block bg-gradient-primary">Add News/Offer</button>
                        </a>
                    </h3>
                </div>

                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.No</th>
                                <th class="text-center" style="width: 120px;">Image</th>
                                <th class="text-center" style="width: 150px;">Title</th>
                                <th class="text-center" style="width: 180px;">Description</th>
                                <th class="text-center" style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsOffers as $index => $newsOffer)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">
                                        @if ($newsOffer->image)
                                            <img src="{{ asset('storage/' . $newsOffer->image) }}" alt="News Image"
                                                style="width: 100px; height: 100px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $newsOffer->title }}</td>

                                    <td class="text-center">
                                        {{ Str::limit(strip_tags($newsOffer->description), 50, '...') }}
                                        @if (strlen(strip_tags($newsOffer->description)) > 50)
                                            <a href="#" data-toggle="modal"
                                                data-target="#descriptionModal{{ $newsOffer->id }}">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        @endif
                                    </td>

                                    <!-- Modal for Full Description -->
                                    <div class="modal fade" id="descriptionModal{{ $newsOffer->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Full Description</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ strip_tags($newsOffer->description) }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <td class="text-center">
                                        <form action="{{ route('news-offers.toggle-status', $newsOffer->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-sm {{ $newsOffer->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $newsOffer->status == 1 ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>

                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('news-offers.edit', $newsOffer->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('news-offers.destroy', $newsOffer->id) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this News/Offer?')">
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
