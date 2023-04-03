@extends('frontEnd.master')
@section('title')
    rentbd
@endsection
@section('content')

    <!--about start-->
    <section class="about">
        <div class="breadcrumb-area bg-img bg-overlay-3 wow fadeInUp" data-wow-delay="200ms" style="background-image: url({{ asset('assets/frontEndAsset/img/banner.jpg') }});background-size: cover;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About</li>
                                </ol>
                            </nav>
                            <h2 class="page-title">About Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about end-->


    <!--about us start-->
    <section class="about-us-area">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-title mb-40 wow fadeInUp" data-wow-delay="200ms">
                        <h2>Hello! Welcome to RentBD.</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <!-- Single Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-about-content wow fadeInUp" data-wow-delay="200ms">
                        <div class="single-about-thumb">
                            <img src="{{ asset('frontEndAssets') }}/img/bg-img/mizan.jpg" alt="">
                        </div>
                        <h4>Our Company</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <!-- Single Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-about-content wow fadeInUp" data-wow-delay="200ms">
                        <div class="single-about-thumb">
                            <img src="{{ asset('frontEndAssets') }}/img/bg-img/mizan.jpg" alt="">
                        </div>
                        <h4>Our Vision</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <!-- Single About Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-about-content wow fadeInUp" data-wow-delay="200ms">
                        <div class="single-about-thumb">
                            <img src="{{ asset('frontEndAssets') }}/img/bg-img/mizan.jpg" alt="">
                        </div>
                        <h4>Our Quality</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about us end-->
@endsection
