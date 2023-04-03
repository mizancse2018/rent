<!--search start-->
<section class="search">
    <div style="background-image: url({{ asset('assets/frontEndAsset/img/banner.jpg') }}); background-repeat:no-repeat;background-size:cover;min-height: 300px;">
        <div class="container py-5">
            <form action="{{ route('search') }}" method="get" class="d-flex">
                <input class="form-control me-2" type="search" name="search" placeholder="search with any keyword e.g.(title/type/division/district/thana/area/price)" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</section>
<!--search end-->
