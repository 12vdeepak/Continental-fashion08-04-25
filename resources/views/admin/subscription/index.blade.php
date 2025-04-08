@extends('backend.layouts.app')
@section('title', 'Admin - Subscriptions')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Subscriptions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Subscriptions</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @if (session('success'))
        <div class="card-body">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5>{{ session('success') }}</h5>
                <?php session()->forget('success'); ?>
            </div>
        </div>
    @endif

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Subscription List</h3>
            </div>
            
            <!-- Table Section -->
            <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">ID</th>
                            <th class="text-center" style="width: 250px;">Email</th>
                            <th class="text-center" style="width: 200px;">Subscribed At</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $index => $subscription)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $subscription->email }}</td>
                                <td class="text-center">{{ $subscription->created_at->format('d M Y, h:i A') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this subscription?')">
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
    </section>

</div>

@endsection
