<div class="row mt-6 justify-content-center">
    <div class="col-md-12">
        <div class="heading">
            <div class="heading subtitle-about">
                @if (url()->current() == url('pages/about-us'))
                    <span class="fw-bolder">
                        <a class="text-dark" href="{{url('pages/about-us')}}">SKINOASIS</a>
                    </span>
                @else
                    <span class="fw-normal">
                        <a class="text-dark" href="{{url('pages/about-us')}}">SKINOASIS</a>
                    </span>
                @endif

                <span class="title-separator">|</span>
                PION TECH
                <span class="title-separator">|</span>
                VEGETOLOGY
                <span class="title-separator">|</span>
                SHINSIAVIEW
                <span class="title-separator">|</span>
                LEAF & COCO
                <span class="title-separator">|</span>
                BAIN & CO
            </div>
        </div>
    </div>
</div>