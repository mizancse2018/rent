@extends('layouts.app')
@include('owner.owner_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Owner Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class="col-lg-3">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Tenants</p>
                            <h4 class="my-1">{{ $tenants }}</h4>
                        </div>
                        <div class="text-danger ms-auto"><i class="bi bi-people"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Posts</p>
                            <h4 class="my-1">{{ $posts }}</h4>
                        </div>
                        <div class="text-danger ms-auto"><i class="bi bi-file-post"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Booking</p>
                            <h4 class="my-1">{{ $rents }}</h4>
                        </div>
                        <div class="text-danger ms-auto"><i class="bi bi-pin-angle-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Income</p>
                            <h4 class="my-1">... BDT</h4>
                        </div>
                        <div class="text-danger ms-auto"><i class="bi bi-currency-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
</main><!-- End #main -->
