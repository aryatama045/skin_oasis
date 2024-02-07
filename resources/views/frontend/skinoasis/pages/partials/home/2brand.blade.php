<!-- Brands -->
<h2 class="title text-center brands">“Skin Oasis product is a high-tech and newest product from Korea”</h2><!-- End .title -->
<div class="brands-border owl-carousel owl-simple mb-5" data-toggle="owl"
    data-owl-options='{
        "nav": false,
        "dots": false,
        "margin": 10,
        "loop": false,
        "responsive": {
            "0": {
                "items":2
            },
            "420": {
                "items":3
            },
            "600": {
                "items":4
            },
            "900": {
                "items":5
            },
            "1024": {
                "items":6
            }
        }
    }'>

    @foreach($brands as $brandPrd)
        <a class="brand" href="{{ route('products.index') }}?&brand_id={{ $brandPrd->id }}">
            <img src="{{ uploadedAsset($brandPrd->brand_image) }}" alt="Brand Name">
        </a>
    @endforeach
</div><!-- End .owl-carousel -->