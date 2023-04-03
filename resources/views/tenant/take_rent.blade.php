<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>RentBD (checkout) | SSLCommerz</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container min-vh-100">
    <div class="py-5 text-center">
        <img src="{{ asset('assets/frontEndAsset/img/logo.jpg') }}" width="120px">
        <h2>(booking checkout)</h2>
    </div>
    <a  class="btn btn-dark" href="{{ route('home') }}">back to dashboard</a>
    <form method="POST" class="needs-validation" novalidate>
        <input type="hidden" value="{{ $post->id }}" name="post_id" id="post_id" required/>
        <input type="hidden" value="{{ Auth::user()->id }}" name="tenant_id" id="tenant_id" required/>
        <input type="hidden" value="{{ $post->owner_id }}" name="owner_id" id="owner_id" required/>
        <input type="hidden" value="{{ $post->price }}" name="amount" id="total_amount" required/>
        <div class="row">
            <div class="col-md-6 order-md-1">
                <h4 class="mb-3">Tenant Information</h4>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Name</label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{ Auth::user()->name }}" required>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="customer_mobile" class="form-control" id="mobile" value="{{ Auth::user()->phone }}" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" name="customer_email" class="form-control" id="email" value="{{ Auth::user()->email }}" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" value="{{ Auth::user()->address }}" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span>Booking Information</span>
                </h4>
                <label for="firstName">Property Details</label>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Property Title</h6>
                            <small class="text-muted">{{ $post->property_title }}</small>
                        </div>
                        <div>
                            <h6 class="my-0">Bed</h6>
                            <small class="text-muted d-flex justify-content-end">{{ $post->bed }}</small>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Property Type</h6>
                            <small class="text-muted">{{ $post->property_type }}</small>
                        </div>
                        <div>
                            <h6 class="my-0">Bath</h6>
                            <small class="text-muted d-flex justify-content-end">{{ $post->bath }}</small>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Address</h6>
                            <small class="text-muted">{{ $post->holding }}/{{ $post->road }},{{ $post->area }},{{ $post->thana }},{{ $post->district }},{{ $post->division }}</small>
                        </div>
                        <div>
                            <h6 class="my-0">Balcony</h6>
                            <small class="text-muted d-flex justify-content-end">{{ $post->balcony }}</small>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Booking Money (BDT)</span>
                        <strong>{{ $post->price }} TK</strong>
                    </li>
                </ul>
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata=""
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </div>
        </div>
    </form>
</div>
<footer>
    <div class="copywrite-content bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <!-- Copywrite Text -->
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="text-light text-center">
                        <span>Copyright &copy;All rights reserved | RentBD</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();
    obj.post_id = $('#post_id').val();
    obj.tenant_id = $('#tenant_id').val();
    obj.owner_id = $('#owner_id').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
</body>
</html>

