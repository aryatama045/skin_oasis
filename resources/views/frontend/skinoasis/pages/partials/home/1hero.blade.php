<style>
        * { box-sizing: border-box; }
        .video-background {
        background: #000;
        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        z-index: 1;
        }
        .video-foreground,
        .video-background iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        }
        #vidtop-content {
            top: 0;
            color: #fff;
        }
        .vid-info { position: absolute; top: 0; right: 0; width: 33%; background: rgba(0,0,0,0.3); color: #fff; padding: 1rem; font-family: Avenir, Helvetica, sans-serif; }
        .vid-info h1 { font-size: 2rem; font-weight: 700; margin-top: 0; line-height: 1.2; }
        .vid-info a { display: block; color: #fff; text-decoration: none; background: rgba(0,0,0,0.5); transition: .6s background; border-bottom: none; margin: 1rem auto; text-align: center; }
        @media (min-aspect-ratio: 16/9) {
        .video-foreground { height: 300%; top: -100%; }
        }
        @media (max-aspect-ratio: 16/9) {
        .video-foreground { width: 300%; left: -100%; }
        }
        @media all and (max-width: 600px) {
        .vid-info { width: 50%; padding: .5rem; }
        .vid-info h1 { margin-bottom: .2rem; }
        }
        @media all and (max-width: 500px) {
        .vid-info .acronym { display: none; }
        }
</style>

<!-- Slider -->
<div class="intro-slider-container ">
    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"dots": true, "nav": false}'>

    @foreach ($sliders as $slider)
        @if ($slider->display_on == 1)
        <div class="intro-slide " style="background-image: url({{ uploadedAsset($slider->image) }});">

            @if (!empty($slider->link))
            <div class="video-background">
                <div class="video-foreground">
                    <iframe src="https://www.youtube.com/embed/{{$slider->link}}?enablejsapi=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;autoplay=1&amp;mute=1&amp;loop=1" frameborder="0" allowfullscreen="" autoplay="true"></iframe>
                </div>
            </div>
            @endif
            <div class="container">
                <div class="intro-content text-center" data-aos="fade-up">
                    <!-- <h3 class="intro-subtitle cross-txt text-primary">{{ $slider->sub_title }}</h3> -->
                    <h1 class="intro-title text-white">{{ $slider->title }}</h1><!-- End .intro-title -->
                    <div class="intro-text text-white">{{ $slider->text }}</div><!-- End .intro-text -->


                    <div class="intro-action cross-txt">
                        <a href="{{ $slider->link }}" class="btn btn-outline-white">
                            <span>Discover More</span>
                        </a>
                    </div>
                </div>
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->
        @endif
    @endforeach
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader text-white"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->