@extends('layouts.app')
@include('tenant.tenant_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tenant Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
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
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="{{ route('edit.profile') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="fatherName" class="col-md-4 col-lg-3 col-form-label">Father's Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="father_name" type="text" class="form-control" id="fatherName" value="{{ $key->father_name }}">
                                        </div>
                                    </div>
                                     <div class="row py-2">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" value="{{ $key->phone }}">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="Nid" class="col-md-4 col-lg-3 col-form-label">NID</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nid" type="text" class="form-control" id="Nid" value="{{ $key->nid }}">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="Dob" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="dob" type="date" class="form-control" id="" value="{{ $key->dob }}">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="floatingMarital" class="col-md-4 col-lg-3 col-form-label">Marital Status</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" name="marital_status" id="floatingMarital">
                                                <option class="disabled">{{ $key->marital_status }}</option>
                                                <option>Married</option>
                                                <option>Unmarried</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="Religion" class="col-md-4 col-lg-3 col-form-label">Religion</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="religion" type="text" class="form-control" id="Religion" value="{{ $key->religion }}">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="Education" class="col-md-4 col-lg-3 col-form-label">Education</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="education" type="text" class="form-control" id="Education" value="{{ $key->education }}">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="Occupation" class="col-md-4 col-lg-3 col-form-label">Occupation</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="occupation" type="text" class="form-control" id="Occupation" value="{{ $key->occupation }}">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="Institution" class="col-md-4 col-lg-3 col-form-label">Institution</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="institution" type="text" class="form-control" id="Institution" value="{{ $key->institution }}">
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
                                        <label for="emergency" class="col-md-4 col-lg-3 col-form-label">Emergency Contact</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="ec_name" class="form-control" id="emergency" placeholder="Name" value="{{ $key->ec_name }}">
                                                    <label for="emergency">Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="ec_relationship" class="form-control" id="emergency" placeholder="Relationship" value="{{ $key->ec_relationship }}">
                                                    <label for="emergency">Relationship</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="ec_phone" class="form-control" id="emergency" placeholder="Phone" value="{{ $key->ec_phone }}">
                                                    <label for="emergency">Phone</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <div class="form-floating">
                                                    <input type="text" name="ec_address" class="form-control" id="emergency" placeholder="Address" value="{{ $key->ec_address }}">
                                                    <label for="emergency">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="family" class="col-md-4 col-lg-3 col-form-label">Family Contact</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="fm_name" class="form-control" id="family" placeholder="Name" value="{{ $key->fm_name }}">
                                                    <label for="family">Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-floating">
                                                    <input type="text" name="fm_age" class="form-control" id="family" placeholder="Age" value="{{ $key->fm_age }}">
                                                    <label for="family">Age</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-floating">
                                                    <input type="text" name="fm_occupation" class="form-control" id="family" placeholder="Occupation" value="{{ $key->fm_occupation }}">
                                                    <label for="family">Occupation</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="fm_phone" class="form-control" id="family" placeholder="Phone" value="{{ $key->fm_phone }}">
                                                    <label for="family">Phone</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="family" class="col-md-4 col-lg-3 col-form-label">Home Worker Contact</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="hw_name" class="form-control" id="homeWorker" placeholder="Name" value="{{ $key->hw_name }}">
                                                    <label for="homeWorker">Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="hw_nid" class="form-control" id="homeWorker" placeholder="National ID" value="{{ $key->hw_nid }}">
                                                    <label for="homeWorker">National ID</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="hw_phone" class="form-control" id="homeWorker" placeholder="Phone" value="{{ $key->hw_phone }}">
                                                    <label for="homeWorker">Phone</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <div class="form-floating">
                                                    <input type="text" name="hw_address" class="form-control" id="homeWorker" placeholder="Address" value="{{ $key->hw_address }}">
                                                    <label for="homeWorker">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="family" class="col-md-4 col-lg-3 col-form-label">Driver Contact</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="d_name" class="form-control" id="driver" placeholder="Name" value="{{ $key->d_name }}">
                                                    <label for="driver">Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="d_nid" class="form-control" id="driver" placeholder="National Id" value="{{ $key->d_nid }}">
                                                    <label for="driver">National Id</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="d_phone" class="form-control" id="driver" placeholder="Phone" value="{{ $key->d_phone }}">
                                                    <label for="driver">Phone</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <div class="form-floating">
                                                    <input type="text" name="d_address" class="form-control" id="driver" placeholder="Address" value="{{ $key->d_address }}">
                                                    <label for="driver">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <label for="family" class="col-md-4 col-lg-3 col-form-label">Previous House Owner</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-floating">
                                                    <input type="text" name="pho_name" class="form-control" id="previousOwner" placeholder="Name" value="{{ $key->pho_name }}">
                                                    <label for="previousOwner">Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" name="pho_phone" class="form-control" id="previousOwner" placeholder="Phone" value="{{ $key->pho_phone }}">
                                                    <label for="previousOwner">Phone</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <div class="form-floating">
                                                    <input type="text" name="pho_address" class="form-control" id="previousOwner" placeholder="Address" value="{{ $key->pho_address }}">
                                                    <label for="previousOwner">Address</label>
                                                </div>
                                            </div>
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

