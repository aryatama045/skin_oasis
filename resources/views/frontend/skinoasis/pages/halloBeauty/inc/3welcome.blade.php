<div class="hallo-beauty rounded bg-white pt-5 pb-5 " data-aos="fade-up">
    <div class="row">
        <div class="col-12">
            <div class="heading text-left">
                <h4 class="heading-subtitle ls-1px ff">Selamat Datang di</h4>
                <h2 class="heading-title text-capitalize ls-1px ff"> Hallo Beauty</h2>
            </div>

            <form action="#">

                <div class="row">
                    <div class="col-lg-10 ">
                        <div class="shadow-content rounded">

                            <h3 class="text-uppercase ls-2px fw-normal ff">Temukan</h3>

                            <!-- Button Group -->
                            <div class="button-group">
                                <div class="btn-wrap ">
                                    <a href="#" class="btn btn-outline-yellow btn-rounded btn-sm ls-1px text-uppercase">
                                        <span>Semua</span>
                                    </a>
                                </div>

                                <div class="btn-wrap ">
                                    <a href="#" class="btn btn-outline-yellow btn-rounded btn-sm ls-1px text-uppercase">
                                        <span>Dokter</span>
                                    </a>
                                </div>

                                <div class="btn-wrap ">
                                    <a href="#" class="btn btn-outline-yellow btn-rounded btn-sm ls-1px text-uppercase">
                                        <span>Lokasi</span>
                                    </a>
                                </div>
                            </div>



                            <!-- Search Key -->
                            <form class="search-form d-flex" action="{{ route('halloBeauty.listdokter') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control search-key" placeholder="KETIK KATA KUNCI"
                                        @isset($searchKey)
                                        value="{{ $searchKey }}"
                                        @endisset>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

<<<<<<< HEAD
                <div class="row elements">
                    <div class="col-xl-5col col-lg-3 col-md-3 col-12">
                        <a href="{{ route('halloBeauty.listdokter')}}" class="element-type">
                            <div class="element">
                                <img class="element-icon" src="{{ staticAsset('frontend/skinoasis/assets/images/icons/hallo-icon/cari-dokter.png') }}" alt="icon">
                                <p>Cari Dokter</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-5col col-lg-3 col-md-3 col-12">
                        <a href="{{ route('halloBeauty.listdokter')}}" class="element-type">
                            <div class="element">
                                <img class="element-icon" src="{{ staticAsset('frontend/skinoasis/assets/images/icons/hallo-icon/list-dokter.png') }}" alt="icon">
                                <p>List Dokter</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-5col col-lg-3 col-md-3 col-12">
                        <a href="{{ route('halloBeauty.listdokter')}}" class="element-type">
                            <div class="element">
                                <img class="element-icon" src="{{ staticAsset('frontend/skinoasis/assets/images/icons/hallo-icon/list-klinik.PNG') }}" alt="icon">
                                <p>List Klinik</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-5col col-lg-3 col-md-3 col-12">
                        <a href="{{ route('halloBeauty.listpaket')}}" class="element-type">
                            <div class="element">
                                <img class="element-icon" src="{{ staticAsset('frontend/skinoasis/assets/images/icons/hallo-icon/paket.PNG') }}" alt="icon">
                                <p>PAKET KECANTIKAN <br> & PERAWATAN</p>
                            </div>
                        </a>
                    </div>
                </div>
=======
                @include('frontend.skinoasis.pages.halloBeauty.inc.navbarBottom')
>>>>>>> f289eaa09fc7a525644f9a47be523753dec8a3da

            </form>


        </div>
    </div>
</div>