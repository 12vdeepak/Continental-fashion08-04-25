@extends('backend.layouts.app')

@section('title', 'Admin - Cancellation Policy')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Cancellation Policy</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Cancellation Policy</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        @if (session('success'))
            <div class="card-body">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>{{ session('success') }}</h5>
                </div>
            </div>
        @endif

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {!! optional($cancellation)->description ?? '<p class="text-muted">No cancellation policy available.</p>' !!}
                            </div>

                            <div class="card-footer">
                                @if ($cancellation)
                                    <a href="{{ route('cancellation-policy.edit', ['cancellation_policy' => $cancellation->id]) }}"
                                        class="btn btn-primary">Edit</a>
                                @else
                                    <span class="text-danger">No policy available to edit.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
