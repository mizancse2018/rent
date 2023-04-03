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
                        <h2>All Available Properties</h2>
                        <p>These can be the best deals for you.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('frontEnd.include.single_property_card')
            </div>
        </div>
    </section>
    <!--property end-->
@endsection
