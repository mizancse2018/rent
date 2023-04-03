@extends('layouts.app')
@include('owner.owner_sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Owner Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Property</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">Add New Property</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('save.property') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-lg-12">
                                <div class=" shadow-none bg-light border">
                                    <div class="card-body row g-3">
                                        <div class="col-12 col-lg-8">
                                            <label class="form-label" for="">Property Title</label>
                                            <input type="text" class="form-control" name="property_title" placeholder="property_title">
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label class="form-label" for="">Property Type</label>
                                            <select class="form-select" name="property_type" id="">
                                                <option>Family House</option>
                                                <option>Bachelor House</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label class="form-label" for="">Division</label>
                                            <select  id="division-dropdown" class="form-control" name="division">
                                                <option value="">-- Select Division --</option>
                                                @foreach ($divisions as $data)
                                                    <option value="{{$data->id}}">
                                                        {{$data->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label class="form-label" for="">District</label>
                                            <select id="district-dropdown" class="form-control" name="district">

                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label class="form-label" for="">Area</label>
                                            <select id="area-dropdown" class="form-control" name="area">

                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label class="form-label" for="">Thana</label>
                                            <input type="text" class="form-control" name="thana" placeholder="Thana">
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label class="form-label" for="">Post Code</label>
                                            <input type="text" class="form-control" name="post_code" placeholder="Post Code">
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label class="form-label" for="">Road</label>
                                            <input type="text" class="form-control" name="road" placeholder="Road">
                                        </div>
                                        <div class="col-12 col-lg-2">
                                            <label class="form-label" for="">Price</label>
                                            <input type="text" class="form-control" name="price" placeholder="Per Month">
                                        </div>
                                        <div class="col-12 col-lg-2">
                                            <label class="form-label" for="">Holding</label>
                                            <input type="text" class="form-control" name="holding" placeholder="Holding">
                                        </div>
                                        <div class="col-12 col-lg-2">
                                            <label class="form-label" for="">Floor</label>
                                            <select class="form-select" name="floor" id="">
                                                <option>1st</option>
                                                <option>2nd</option>
                                                <option>3rd</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-2">
                                            <label class="form-label" for="">Bed</label>
                                            <select class="form-select" name="bed" id="">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-2">
                                            <label class="form-label" for="">Bath</label>
                                            <select class="form-select" name="bath" id="">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-2">
                                            <label class="form-label" for="">Balcony</label>
                                            <select class="form-select" name="balcony" id="">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <label for="">Multiple property image</label><br>
                                            <div id="dvPreview"></div>
                                            <input type="file" name="images[]" class="form-control" id="fuUpload" multiple="multiple"/>
                                            <div class="col-12 col-lg-12 py-3">
                                                <label class="form-label" for="">Description</label>
                                                <textarea class="form-control" name="description" placeholder="Description" rows="4" cols="4"></textarea>
                                            </div>
                                            <div class="text-center py-3">
                                                <button type="submit" class="btn btn-dark">Add Property</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("[id*=fuUpload]").change(function () {
            if (typeof (FileReader) != "undefined") {
                var dvPreview = $("[id*=dvPreview]");
                dvPreview.html("");
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                $($(this)[0].files).each(function () {
                    var file = $(this);
                    if (regex.test(file[0].name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = $("<img />");
                            img.attr("style", "height:100px;width: 100px");
                            img.attr("src", e.target.result);
                            dvPreview.append(img);
                        }
                        reader.readAsDataURL(file[0]);
                    } else {
                        alert(file[0].name + " is not a valid image file.");
                        dvPreview.html("");
                        return false;
                    }
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        /*Division Dropdown Change Event*/
        $('#division-dropdown').on('change', function () {
            var idDivision = this.value;
            $("#district-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-districts')}}",
                type: "POST",
                data: {
                    division_id: idDivision,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#district-dropdown').html('<option value="">-- Select District --</option>');
                    $.each(result.districts, function (key, value) {
                        $("#district-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#area-dropdown').html('<option value="">-- Select Area --</option>');
                }
            });
        });
        /*District Dropdown Change Event*/
        $('#district-dropdown').on('change', function () {
            var idDistrict = this.value;
            $("#area-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-areas')}}",
                type: "POST",
                data: {
                    district_id: idDistrict,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#area-dropdown').html('<option value="">-- Select Area --</option>');
                    $.each(res.areas, function (key, value) {
                        $("#area-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
