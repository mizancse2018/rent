<!--single property card start-->
@foreach($posts as $post)
{{--    @if($status->status==1&&$status->booking_status=='booked')--}}
<div class="col-12 col-lg-3 col-md-3 pb-3">
    <div class="card h-100">
        <a href="#"><img class="card-img-top" src="{{ asset('assets/frontEndAsset/img/propertyImages/'.$post->image()->first()->image) }}" alt="1"></a>
        <div class="card-body">
            <h5>{{ $post->price }} BDT/month</h5>
            <p class="card-text">{{ $post->holding }}/{{ $post->road }}, {{ $post->area }}, {{ $post->district }}</p>
            <div class="d-flex justify-content-between">
                <p>Bed: <span>{{ $post->bed }}</span></p>
                <p class="text-danger">{{ $post->property_type }}</p>
            </div>
            <div class="d-flex justify-content-between">
                <p>Bath: <span>{{ $post->bath }}</span></p>
                <p>Balcony: <span>{{ $post->balcony }}</span></p>
            </div>
        </div>
        <div class="card-footer">
            <h4 class="card-title"><a href="{{ route('property.details',['id'=>$post->id]) }}">See Details</a></h4>
        </div>
    </div>
</div>
{{--    @endif--}}
@endforeach
<!--single property card end-->
