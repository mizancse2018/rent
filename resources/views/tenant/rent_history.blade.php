@extends('layouts.app')
@include('tenant.tenant_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tenant Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
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
                    <th>Owner</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Booking</th>
                    <th>Leave</th>
                    <th>Details</th>
                    <th>Action</th>
                    <th colspan="2">Invoice</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @foreach ($rents as $key)
                    @if($key->booking_status=='booked')
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>#{{ $key->id }}</td>
                        <td>{{ $key->name }}</td>
                        <td>{{ $key->price }}</td>
                        <td><span class="text-success">paid</span></td>
                        <td>{{ $key->booking_status }}</td>
                        <td>{{ $key->leave_status }}</td>
                        <td>
                            <a href="#"><i class="btn btn-info bi bi-book"></i></a>
                        </td>
                        <td>
                            @if($today<6)
                                @if($key->booking_status=='booked'&&$key->leave_date=='')
                                    <form action="{{ route('leave.rent',['id'=>$key->id]) }}" method="post">
                                        @csrf
                                        <input class="btn btn-danger" onclick="return confirm('Are you sure?');" type="submit" value="Leave">
                                    </form>
                                @elseif($key->leave_status=='')
                                    <span disabled class="btn" style="background-color: #ff8080">Leave</span>
                                @endif
                            @else
                            <span disabled class="btn" style="background-color: #ff8080">Leave</span>
                            @endif
                        </td>
                        <td>
{{--                            <a href="{{ route('generate.invoice',['id'=>$key->id]) }}"><i class="btn btn-success bi bi-eye-fill"></i></a>--}}
                            <a href="{{ route('download.invoice',['id'=>$key->id]) }}"><i class="btn btn-dark bi bi-download"></i></a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main><!-- End #main -->

