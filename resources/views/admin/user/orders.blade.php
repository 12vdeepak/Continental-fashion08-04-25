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
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Filter Orders by Date</h3>
                    </div>

                    <!-- Date Filter Form -->
                    <div class="card-body">
                        <form method="GET" action="{{ route('users.order', $user->id) }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" name="start_date" class="form-control"
                                        value="{{ request('start_date') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" name="end_date" class="form-control"
                                        value="{{ request('end_date') }}">
                                </div>
                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="{{ route('users.order', $user->id) }}" class="btn btn-secondary ml-2">Reset</a>

                                </div>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('users.add.delivery.payment', $user->id) }}">
                            @csrf

                            @php
                                $latestOrder = $user->orders()->latest()->first(); // Get the latest order
                            @endphp
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="delivery_charge">Delivery Charge:</label>
                                    <input type="number" step="0.01" name="delivery_charge"
                                        class="form-control @error('delivery_charge') is-invalid @enderror"
                                        value="{{ old('delivery_charge', optional($latestOrder)->delivery_charge) }}"
                                        required>
                                    @error('delivery_charge')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="payment_terms">Payment Terms:</label>
                                    <input type="text" name="payment_terms"
                                        class="form-control @error('payment_terms') is-invalid @enderror"
                                        placeholder="Enter Payment Terms"
                                        value="{{ old('payment_terms', optional($latestOrder)->payment_terms) }}" required>
                                    @error('payment_terms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-success">Add Details</button>
                                </div>
                            </div>
                        </form>

                        <form method="GET" action="{{ route('users.download.invoice', $user->id) }}">
                            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                            <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                            <button type="submit" class="btn btn-danger mt-3">Download Invoice</button>
                        </form>
                    </div>


                    <div class="card-header">
                        <h3 class="card-title">Order List</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Order ID</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Size </th>
                                    <th class="text-center">Color </th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Tracking Information</th>
                                    <th class="text-center">Order Date </th>


                                    <th>Address </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td class="text-center">{{ $order->id }}</td>
                                        <td class="text-center">{{ $order->product->product_name ?? 'N/A' }}</td>
                                        <td class="text-center">{{ $order->size->size_name ?? 'N/A' }}</td>
                                        <td class="text-center">{{ $order->color->color_code ?? 'N/A' }}</td>
                                        <td class="text-center">{{ $order->quantity }}</td>
                                        <td class="text-center">€{{ number_format($order->price, 2) }}</td>
                                        <td class="text-center">€{{ number_format($order->amount, 2) }}</td>
                                        <td class="text-center"> <a href="{{ route('orders.tracking.edit', $order->id) }}"
                                                class="btn btn-success btn-sm">
                                                Add
                                            </a></td>

                                        <td class="text-center">{{ $order->created_at->format('d F Y') }}</td>

                                        <td>
                                            @php
                                                $fullAddress = $order->address->full_address ?? 'N/A';
                                            @endphp

                                            @if (strlen($fullAddress) > 20)
                                                <span>{{ substr($fullAddress, 0, 20) }}...</span>
                                                <button class="btn btn-link p-0 m-0 text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#addressModal{{ $order->id }}">
                                                    Show More
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="addressModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="addressModalLabel{{ $order->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="addressModalLabel{{ $order->id }}">Full
                                                                    Address</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ $fullAddress }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                {{ $fullAddress }}
                                            @endif
                                        </td>




                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No orders found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>



    </div>
@endsection
