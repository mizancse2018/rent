@extends('layouts.app')
@include('owner.owner_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Owner Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('owner') }}">Dashboard</a></li>
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
                    <th>Property type</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Leave Status</th>
                    <th>Police Form</th>
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
                        <td>{{ $rent->property_type }}</td>
                        <td>{{ $rent->price }}</td>
                        <td>{{ $rent->booking_status }}</td>
                        <td>{{ $rent->leave_status }}</td>
                        <td>
                            <a href="{{route('generate.police_form',['id'=>$rent->id])}}"><i class="btn btn-success bi bi-eye-fill"></i></a>
                            <a href="{{route('download.police_form',['id'=>$rent->id])}}"><i class="btn btn-dark bi bi-download"></i></a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main><!-- End #main -->

