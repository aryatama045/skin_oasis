<div class="hallo-beauty rounded bg-white pt-5 pb-5 " data-aos="fade-up">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="heading text-left">
                    <div class="posts-list">
                        <figure>
                            <a href="#">
                                <img class="rounded-circle" src="{{ staticAsset('frontend/skinoasis/assets/images/dokter.png') }}" alt="post">
                            </a>
                        </figure>

                        <div>
                            <h1 class="font-weight-bold ff">{{ $dokter->name }}</h1>
                            <span class="text-black">Dokter Kulit - Dokter Estetika</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="resume-dokter">

                    {!! $dokter->infolain !!}

                </div>
            </div>

            <div class="col-lg-5">

            </div>

        </div>


    </div>
</div>