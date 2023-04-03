@extends('layouts.app')
@include('admin.admin_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Admin Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Rent History</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class=".col-12 .col-md-12 .col-lg-12">
            <table>
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Booking Id</th>
                    <th>Tenant Name</th>
                    <th>Owner Email</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Leave Status</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @foreach ($rents as $rent)
                    @if($rent->booking_status=='booked')
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>#{{ $rent->id }}</td>
                        <td>{{ $rent->name }}</td>
                        <td>{{ $rent->email }}</td>
                        <td>{{ $rent->price }}</td>
                        <td>Paid</td>
                        <td>{{ $rent->leave_status }}</td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main><!-- End #main -->

