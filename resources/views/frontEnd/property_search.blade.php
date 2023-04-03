@extends('frontEnd.master')
@section('title')
    rentbd
@endsection
@section('content')

    <section class="property">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <div class=" text-center mt-50">
                        <h2>Search Result</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('frontEnd.include.single_property_card')
            </div>
        </div>
    </section>
@endsection
