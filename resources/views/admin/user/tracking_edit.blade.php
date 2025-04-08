@extends('backend.layouts.app')
@section('title', 'Assign Customer ID')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
            <div class="container mt-4">
                <h2 class="mb-4">Edit Tracking Information</h2>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('orders.tracking.update', $order->id) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Courier Partner</label>
                                <input type="text" name="courier_partner_name"
                                    class="form-control @error('courier_partner_name') is-invalid @enderror"
                                    value="{{ old('courier_partner_name', $order->courier_partner_name) }}" required>
                                @error('courier_partner_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tracking ID</label>
                                <input type="text" name="tracking_id"
                                    class="form-control @error('tracking_id') is-invalid @enderror"
                                    value="{{ old('tracking_id', $order->tracking_id) }}" required>
                                @error('tracking_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tracking Link</label>
                                <input type="url" name="link"
                                    class="form-control @error('link') is-invalid @enderror"
                                    value="{{ old('link', $order->link) }}" required>
                                @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Save Tracking Info</button>
                            {{--  <a href="{{ route('users.order') }}" class="btn btn-secondary">Back to Orders</a>  --}}
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
