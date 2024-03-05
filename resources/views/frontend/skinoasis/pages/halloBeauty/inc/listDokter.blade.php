<div class="hallo-beauty rounded bg-white pt-5 pb-5 " data-aos="fade-up">
    <div class="row">
        <div class="col-12">
            <div class="heading text-left">
                <div class="shadow-content rounded">

                    <h3 class="text-uppercase ls-2px fw-normal ff">Temukan</h3>

                    <!-- Search Key -->
                    <div class="input-group">
                        <input type="text" class="form-control search-key" placeholder="KETIK KATA KUNCI" aria-label="Ketik Kata Kunci" >
                    </div>

                </div>

            </div>

            <form action="#">

                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="dokter-content rounded">
                            <div class="posts-list">
                                <figure>
                                    <a href="#">
                                        <img src="{{ staticAsset('frontend/skinoasis/assets/images/blog/sidebar/post-2.jpg') }}" alt="post">
                                    </a>
                                </figure>

                                <div>
                                    <h4><a href="#">dr. Febby Hutomo</a></h4>
                                    <span>Dokter Kulit - Dokter Estetika</span>
                                </div>
                            </div>
                            <hr>

                            <div class="card-content">
                                <a href="javascript:void(0);" class="btn-product btn-cart mt-4"
                                    onclick="showProductDetailsModal('1')">
                                    {{ localize('Konsultasi Online') }}</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row elements">
                    <div class="col-xl-5col col-lg-3 col-md-3 col-6">
                        <a href="elements-accordions.html" class="element-type">
                            <div class="element">
                                <img class="element-icon" src="{{ staticAsset('frontend/skinoasis/assets/images/icons/hallo-icon/cari-dokter.png') }}" alt="icon">
                                <p>Cari Dokter</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-5col col-lg-3 col-md-3 col-6">
                        <a href="elements-accordions.html" class="element-type">
                            <div class="element">
                                <img class="element-icon" src="{{ staticAsset('frontend/skinoasis/assets/images/icons/hallo-icon/list-dokter.png') }}" alt="icon">
                                <p>List Dokter</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-5col col-lg-3 col-md-3 col-6">
                        <a href="elements-accordions.html" class="element-type">
                            <div class="element">
                                <img class="element-icon" src="{{ staticAsset('frontend/skinoasis/assets/images/icons/hallo-icon/list-klinik.PNG') }}" alt="icon">
                                <p>List Klinik</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-5col col-lg-3 col-md-3 col-6">
                        <a href="elements-accordions.html" class="element-type">
                            <div class="element">
                                <img class="element-icon" src="{{ staticAsset('frontend/skinoasis/assets/images/icons/hallo-icon/paket.PNG') }}" alt="icon">
                                <p>PAKET KECANTIKAN <br> & PERAWATAN</p>
                            </div>
                        </a>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>