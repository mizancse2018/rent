@extends('layouts.app')
@include('admin.admin_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Admin Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Post</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class=".col-12 .col-md-12 .col-lg-12">
            <table>
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Images</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Division</th>
                    <th>District</th>
                    <th>Area</th>
                    <th>Thana</th>
                    <th>Postal</th>
                    <th>Road</th>
                    <th>Price</th>
                    <th>Holding</th>
                    <th>Floor</th>
                    <th>Bed</th>
                    <th>Bath</th>
                    <th>Balcony</th>
{{--                    <th>Description</th>--}}
                </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $post->status==0? 'pending':'published' }}</td>
                        <td class="p-0">
                            @if($post->status==1)
                            <a class="btn text-danger" href="{{ route('property_status',['id'=>$post->id]) }}"><i class="fa-solid fa-ban"></i></a>
                            @else
                            <a class="btn text-success" href="{{ route('property_status',['id'=>$post->id]) }}"><i class="fa-regular fa-circle-check"></i></a>
                            @endif
                        </td>
                        <td class="d-flex justify-content-start">
                            @foreach ($post->image as $img)
                                <img src="{{ asset('assets/frontEndAsset/img/propertyImages/'.$img->image) }}" class="img-responsive" style="max-height: 80px; max-width: 80px;" alt="">
                            @endforeach
                        </td>
                        <td>{{ $post->property_title }}</td>
                        <td>{{ $post->property_type }}</td>
                        <td>{{ $post->division }}</td>
                        <td>{{ $post->district }}</td>
                        <td>{{ $post->area }}</td>
                        <td>{{ $post->thana }}</td>
                        <td>{{ $post->post_code }}</td>
                        <td>{{ $post->road }}</td>
                        <td>{{ $post->price }}</td>
                        <td>{{ $post->holding }}</td>
                        <td>{{ $post->floor }}</td>
                        <td>{{ $post->bed }}</td>
                        <td>{{ $post->bath }}</td>
                        <td>{{ $post->balcony }}</td>
{{--                        <td>{{ $post->description }}</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main><!-- End #main -->

