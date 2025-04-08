@extends('backend.layouts.app')
@section('title', 'Assign Customer ID')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Assign Customer ID</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Assign Customer ID</li>
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


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Assign Customer ID to {{ $user->first_name }} {{ $user->last_name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.storeCustomerID', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="customer_id">Customer ID</label>
                            <input type="text" name="customer_id" id="customer_id"
                                class="form-control  @error('customer_id') is-invalid @enderror"
                                value="{{ $user->customer_id ?? '' }}" required>
                            @error('customer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Price Category Dropdown -->
                        <div class="form-group">
                            <label for="price_category_type">Price Category</label>
                            <select name="price_category_type" id="price_category_type"
                                class="form-control @error('price_category_type') is-invalid @enderror" required>
                                <option value="">Select Price Category</option>
                                <option value="1"
                                    {{ isset($user) && $user->price_category_type == 1 ? 'selected' : '' }}>Category 1
                                </option>
                                <option value="2"
                                    {{ isset($user) && $user->price_category_type == 2 ? 'selected' : '' }}>Category 2
                                </option>
                                <option value="3"
                                    {{ isset($user) && $user->price_category_type == 3 ? 'selected' : '' }}>Category 3
                                </option>
                                <option value="4"
                                    {{ isset($user) && $user->price_category_type == 4 ? 'selected' : '' }}>Category 4
                                </option>
                            </select>
                            @error('price_category_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>

        </section>
    </div>
@endsection
