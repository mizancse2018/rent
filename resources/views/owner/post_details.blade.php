@extends('layouts.app')
@include('owner.owner_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Owner Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Post Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="main-contact">
        <div class="container py-5">
            @foreach ($posts as $post)
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 pb-3">
                    <!-- Carousel -->
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @php $i = 1; @endphp
                            @foreach($post->image as $key)
                            <div class="carousel-item {{ $i == '1'? 'active':'' }}">
                                @php $i++; @endphp
                                <img src="{{ asset('assets/frontEndAsset/img/propertyImages/'.$key->image) }}" class="d-block w-100 img-fluid" style="width: 100%;height: 250px;" alt="property">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 pb-3">
                    <div class="properties-content-info">
                        <h3>{{ $post->property_title }}</h3>
                        <div class="properties-location">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $post->holding }}, {{ $post->road }}, {{ $post->area }}, {{ $post->district }}</p>
                            <p class="text-danger">{{ $post->property_type }}</p>
                        </div>
                        <h4 class="properties-rate">{{ $post->price }}<span>/ month</span></h4>
                        <!-- Properties Info -->
                        <div class="properties-info">
                            <span>Floor: <span>{{ $post->floor }}</span></span><br>
                            <span>Bed: <span>{{ $post->bed }}</span></span><br>
                            <span>Bath: <span>{{ $post->bath }}</span></span><br>
                            <span>Balcony: <span>{{ $post->balcony }}</span></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 pb-3">
                    <h3>Description</h3>
                    <p>{{ $post->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main><!-- End #main -->

