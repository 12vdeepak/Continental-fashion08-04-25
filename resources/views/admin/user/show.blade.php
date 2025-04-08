@extends('backend.layouts.app')
@section('title', 'User Details')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">User Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Information</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Company Name</th>
                            <td>{{ $user->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Street</th>
                            <td>{{ $user->street }}</td>
                        </tr>
                        <tr>
                            <th>ZIP Code</th>
                            <td>{{ $user->zip_code }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $user->city }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $user->country }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $user->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ ucfirst($user->gender) }}</td>
                        </tr>

                        <tr>
                            <th>Supervisory</th>
                            <td>{{ $user->supervisory ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>VAT ID Number</th>
                            <td>{{ $user->vat_id_number }}</td>
                        </tr>
                        <tr>
                            <th>Business Registration File</th>
                            <td>
                                @if ($user->business_registration_file)
                                    <a href="{{ asset('storage/' . $user->business_registration_file) }}"
                                        target="_blank">View File</a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td>{{ $user->note ?? 'No Notes' }}</td>
                        </tr>
                        <tr>
                            <th>Terms Accepted</th>
                            <td>{{ $user->terms_accepted ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Approval Status</th>
                            <td>
                                <span class="badge {{ $user->is_approve ? 'badge-success' : 'badge-danger' }}">
                                    {{ $user->is_approve ? 'Approved' : 'Not Approved' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $user->created_at->format('d M Y, h:i A') }}</td>
                        </tr>


                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection
