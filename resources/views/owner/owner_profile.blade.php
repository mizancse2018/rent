@extends('layouts.app')
@include('owner.owner_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Owner Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @foreach($owner as $key)
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <span class="card-title"><b>Profile Image</b></span>
                                <div class="py-3">
                                    <img src="{{ asset($key->image) }}" width="100px" height="100px" alt="profile-img" class="rounded-circle border border-danger">
                                </div>
                                <span class="card-title"><b>Profile Details</b></span>
                                <div class="row py-3">
                                    <div class="col-4 col-lg-3 col-md-4 label">Name</div>
                                    <div class="col-8 col-lg-9 col-md-8">{{ $key->name }}</div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-4 col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-8 col-lg-9 col-md-8">{{ $key->phone }}</div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-4 col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-8 col-lg-9 col-md-8">{{ $key->email }}</div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-4 col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-8 col-lg-9 col-md-8">{{ $key->address }}</div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-4 col-lg-3 col-md-4 label">About</div>
                                    <div class="col-8 col-lg-9 col-md-8">
                                        <p>{{ $key->about }}</p>
                                    </div>
                                </div>
                                <span class="card-title"><b>National Id(front)</b></span>
                                <div class="py-3">
                                    <img src="{{ asset($key->nid_front) }}" width="300px" height="180px" alt="nid_front" class="rounded border border-danger">
                                </div>
                                <span class="card-title"><b>National Id(back)</b></span>
                                <div class="py-3">
                                    <img src="{{ asset($key->nid_back) }}" width="300px" height="180px" alt="nid_back" class="rounded border border-danger">
                                </div>
                                <span class="card-title"><b>Signature</b></span>
                                <div class="py-3">
                                    <img src="{{ asset($key->sign) }}" width="200px" height="50px" alt="sign" class="border border-danger">
                                </div>
                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="{{ route('edit.owner_profile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $key->id }}">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ asset($key->image) }}" id="image" width="100px" height="100px" alt="profile-img" class="border border-danger" >
                                            <div class="pt-2">
                                                <input name="image" type="file" class="form-control" id="image" onchange="loadFile1(event)">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row py-2">
                                        <label for="Name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="Name" value="{{ $key->name }}">
                                        </div>
                                    </div>

                                     <div class="row py-2">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" value="{{ $key->phone }}">
                                        </div>
                                    </div>

                                     <div class="row py-2">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="{{ $key->email }}">
                                        </div>
                                    </div>

                                     <div class="row py-2">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address" value="{{ $key->address }}">
                                        </div>
                                    </div>

                                     <div class="row py-2">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $key->about }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="nidFront" class="col-md-4 col-lg-3 col-form-label">National Id(front)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ asset($key->nid_front) }}" id="nid_front" width="300px" height="180px" alt="nid-front" class="rounded border border-danger" >
                                            <div class="pt-2">
                                                <input name="nid_front" type="file" class="form-control" id="nid_front"  onchange="loadFile2(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="nidBack" class="col-md-4 col-lg-3 col-form-label">National Id(back)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ asset($key->nid_back) }}" id="nid_back" width="300px" height="180px" alt="nid_back" class="rounded border border-danger">
                                            <div class="pt-2">
                                                <input name="nid_back" type="file" class="form-control" id="nid_back" onchange="loadFile3(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="tenantSign" class="col-md-4 col-lg-3 col-form-label">Signature</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ asset($key->sign) }}" id="sign" width="200px" height="50px" alt="sign" class="border border-danger">
                                            <div class="pt-2">
                                                <input name="sign" type="file" class="form-control" id="sign" onchange="loadFile4(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</main><!-- End #main -->

