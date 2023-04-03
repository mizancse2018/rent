@extends('frontEnd.master')
@section('title')
    rentbd
@endsection
@section('content')

    @include('frontEnd.include.search')

    <!--property start-->
    <section class="property">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <div class=" text-center mt-50">
                        <h2>Top Recent Property</h2>
                        <p>These can be the best deals for you.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('frontEnd.include.single_property_card')
            </div>
            <a href="{{ route('properties') }}" class="btn btn-dark float-end">See All</a>
        </div>
    </section>
    <!--property end-->

    <!--about us start-->
    <section class="about-us">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <div class=" text-center mt-50">
                        <h2>Why Choose Us?</h2>
                        <p>These can be the best deals for you.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 col-md-4 pb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-house"></i>
                            <p>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet</p>
                            <p>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet</p>
                            <a href="#" class="text-success">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 pb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-house"></i>
                            <p>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet</p>
                            <p>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet</p>
                            <a href="#" class="text-success">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 pb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-house"></i>
                            <p>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet</p>
                            <p>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet</p>
                            <a href="#" class="text-success">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about us end-->

@endsection
