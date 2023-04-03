@extends('layouts.app')
@include('admin.admin_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Admin Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Owner</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container">
        <div class="row">
            <div class=".col-12 .col-md-12 .col-lg-12">
                <table>
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $i=1 @endphp
                    @foreach($owners as $owner)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $owner->name }}</td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->profile_status==0? 'pending':'active' }}</td>
                            <td class="p-0">
                                <a class="btn text-success" href="{{ route('owner.details',['id'=>$owner->id]) }}"><i class="fa-regular fa-eye"></i></a>
                                @if($owner->profile_status==1)
                                    <a class="btn text-danger" href="{{ route('owner.profile_status',['id'=>$owner->id]) }}"><i class="fa-solid fa-ban"></i></a>
                                @else
                                    <a class="btn text-success" href="{{ route('owner.profile_status',['id'=>$owner->id]) }}"><i class="fa-regular fa-circle-check"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main><!-- End #main -->

