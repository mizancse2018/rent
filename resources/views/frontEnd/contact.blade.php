@extends('frontEnd.master')
@section('title')
    Home
@endsection
@section('content')
    <!--contact start-->
    <section class="contact">
        <div class="breadcrumb-area bg-img bg-overlay-3 wow fadeInUp" data-wow-delay="200ms" style="background-image: url({{ asset('assets/frontEndAsset/img/banner.jpg') }});background-size: cover;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                </ol>
                            </nav>
                            <h2 class="page-title">Contact Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact end-->


    <!--main contact start-->
    <section class="main-contact">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 pb-3">
                    <h1>Need Help?</h1>
                    <div class="row pt-3">
                        <div class="col-12 col-md-3 col-lg-3">
                            <img src="{{ asset('assets/frontEndAsset/img/banner.jpg') }}" alt="" class="rounded-circle" width="120px" height="120px">
                        </div>
                        <div class="col-12 col-md-9 col-lg-9">
                            <h5>Md. Mizanur Rahman</h5>
                            <span>Customer Relation</span><br>
                            <span>mizancse2018@gmail.com</span><br>
                            <span>+8801521422807</span>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-12 col-md-3 col-lg-3">
                            <img src="{{ asset('assets/frontEndAsset/img/banner.jpg') }}" alt="" class="rounded-circle" width="120px" height="120px">
                        </div>
                        <div class="col-12 col-md-9 col-lg-9">
                            <h5>Md. Mizanur Rahman</h5>
                            <span>Customer Relation</span><br>
                            <span>mizancse2018@gmail.com</span><br>
                            <span>+8801521422807</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 pb-3">
                    <h1>Get In Touch</h1>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form class="support-form" action="{{ route('contact_save') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form-control mb-20" placeholder="Your Name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control mb-20" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <input type="text" name="phone" class="form-control mb-20" placeholder="Phone">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <input type="text" name="subject" class="form-control mb-20" placeholder="Subject">
                                    @if ($errors->has('subject'))
                                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control mb-30" placeholder="Messages"></textarea>
                                    @if ($errors->has('message'))
                                        <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark">Send Messages</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--main contact end-->
@endsection
