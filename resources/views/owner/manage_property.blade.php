@extends('layouts.app')
@include('owner.owner_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Owner Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Property</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class=".col-12 .col-md-12 .col-lg-12">
            <table>
                <thead>
                <tr>
                    <th>Sl</th>
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
                        <td>
                            <a class="btn text-success" href="{{ route('post.details',['id'=>$post->id]) }}"><i class="fa-regular fa-eye"></i></a>
                            <a class="btn text-dark" href="{{ route('edit.property',['id'=>$post->id]) }}"><i class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('delete.property',['id'=>$post->id]) }}" method="post">
                                <button class="btn text-danger" onclick="return confirm('Are you sure?');" type="submit"><i class="bi bi-trash-fill"></i></button>
                                @csrf
                                @method('delete')
                            </form>
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

