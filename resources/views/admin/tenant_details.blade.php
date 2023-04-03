@extends('layouts.app')
@include('admin.admin_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Admin Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Tenant Profile Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @foreach($user as $key)
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
                            </ul>
                            <div class="tab-content pt-2">
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
                                    <div class="row py-3">
                                        <div class="col-4 col-lg-3 col-md-4 label">Father's Name</div>
                                        <div class="col-8 col-lg-9 col-md-8">{{ $key->father_name }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-4 col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-8 col-lg-9 col-md-8">{{ $key->phone }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-4 col-lg-3 col-md-4 label">Nid</div>
                                        <div class="col-8 col-lg-9 col-md-8">{{ $key->nid }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-4 col-lg-3 col-md-4 label">Date of Birth</div>
                                        <div class="col-8 col-lg-9 col-md-8">{{ $key->dob }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-4 col-lg-3 col-md-4 label">Marital Status</div>
                                        <div class="col-8 col-lg-9 col-md-8">{{ $key->marital_status }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-4 col-lg-3 col-md-4 label">Religion</div>
                                        <div class="col-8 col-lg-9 col-md-8">{{ $key->religion }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-4 col-lg-3 col-md-4 label">Education</div>
                                        <div class="col-8 col-lg-9 col-md-8">{{ $key->education }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-4 col-lg-3 col-md-4 label">Occupation</div>
                                        <div class="col-8 col-lg-9 col-md-8">{{ $key->occupation }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-4 col-lg-3 col-md-4 label">Institution</div>
                                        <div class="col-8 col-lg-9 col-md-8">{{ $key->institution }}</div>
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
                                    <div class="row py-2">
                                        <div class="col-lg-12 col-md-12 label">Emergency Contact</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->ec_name }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->ec_relationship }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->ec_phone }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->ec_address }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-lg-12 col-md-12 label">Family Member</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->fm_name }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->fm_age }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->fm_occupation }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->fm_phone }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-lg-12 col-md-12 label">Homeworker Contact</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->hw_name }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->hw_nid }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->hw_phone }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->hw_address }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-lg-12 col-md-12 label">Driver Contact</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->d_name }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->d_nid }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->d_phone }}</div>
                                        <div class="col-lg-3 col-md-3">{{ $key->d_address }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-lg-12 col-md-12 label">Previous Home Owner</div>
                                        <div class="col-lg-4 col-md-4">{{ $key->pho_name }}</div>
                                        <div class="col-lg-4 col-md-4">{{ $key->pho_phone }}</div>
                                        <div class="col-lg-4 col-md-4">{{ $key->pho_address }}</div>
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
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
</main><!-- End #main -->

