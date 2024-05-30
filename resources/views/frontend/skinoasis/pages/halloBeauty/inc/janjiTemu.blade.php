<div class="janjitemu-content rounded bg-yellow mt-4">
    <div class="heading text-left">
        <h3 class="title text-capitalize">jadwal & buat janji temu</h3>
        <p class="subtitle text-capitalize"> klinik beauty centre</p>
    </div>

    <!-- Button Group -->
    <div class="button-group mt-3 mb-3">
        <div class="row">
            @foreach($jd as $jadwaldokter)
                @if($jadwaldokter->senin == null)
                    
                @else
                    <div class="col-sm-4 col-12 p-1">
                        <div class="btn-wrap w-100">
                            <input type="radio" name="jadwal" class="btn-check" id="senin" autocomplete="off">
                            <label class="btn btn-outline-yellow btn-rounded btn-sm ls-1px w-100" for="senin">{{ $jadwaldokter->senin }}</label>
                        </div>
                    </div>
                @endif
                @if($jadwaldokter->selasa == null)
                    
                @else
                    <div class="col-sm-4 col-12 p-1">
                        <div class="btn-wrap w-100">
                            <input type="radio" name="jadwal" class="btn-check" id="selasa" autocomplete="off">
                            <label class="btn btn-outline-yellow btn-rounded btn-sm ls-1px w-100" for="selasa">{{ $jadwaldokter->selasa }}</label>
                        </div>
                    </div>
                @endif
                @if($jadwaldokter->rabu == null)
                    
                @else
                    <div class="col-sm-4 col-12 p-1">
                        <div class="btn-wrap w-100">
                            <input type="radio" name="jadwal" class="btn-check" id="rabu" autocomplete="off">
                            <label class="btn btn-outline-yellow btn-rounded btn-sm ls-1px w-100" for="rabu">{{ $jadwaldokter->rabu }}</label>
                        </div>
                    </div>
                @endif
                @if($jadwaldokter->kamis == null)
                    
                @else
                    <div class="col-sm-4 col-12 p-1">
                        <div class="btn-wrap w-100">
                            <input type="radio" name="jadwal" class="btn-check" id="kamis" autocomplete="off">
                            <label class="btn btn-outline-yellow btn-rounded btn-sm ls-1px w-100" for="kamis">{{ $jadwaldokter->kamis }}</label>
                        </div>
                    </div>
                @endif
                @if($jadwaldokter->jumat == null)
                    
                @else
                    <div class="col-sm-4 col-12 p-1">
                        <div class="btn-wrap w-100">
                            <input type="radio" name="jadwal" class="btn-check" id="jumat" autocomplete="off">
                            <label class="btn btn-outline-yellow btn-rounded btn-sm ls-1px w-100" for="jumat">{{ $jadwaldokter->jumat }}</label>
                        </div>
                    </div>
                @endif
                @if($jadwaldokter->sabtu == null)
                    
                @else
                    <div class="col-sm-4 col-12 p-1">
                        <div class="btn-wrap w-100">
                            <input type="radio" name="jadwal" class="btn-check" id="sabtu" autocomplete="off">
                            <label class="btn btn-outline-yellow btn-rounded btn-sm ls-1px w-100" for="sabtu">{{ $jadwaldokter->sabtu }}</label>
                        </div>
                    </div>
                @endif
                @if($jadwaldokter->minggu == null)
                    
                @else
                    <div class="col-sm-4 col-12 p-1">
                        <div class="btn-wrap w-100">
                            <input type="radio" name="jadwal" class="btn-check" id="minggu" autocomplete="off">
                            <label class="btn btn-outline-yellow btn-rounded btn-sm ls-1px w-100" for="minggu">{{ $jadwaldokter->minggu }}</label>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>

    <div class="heading text-left">
        <h4 class="title text-capitalize">waktu</h4>

        <div class="input-group mt-3" id="dtJadwal">
            <input type="time" class="form-control search-key" name="waktu" placeholder="Select Time">
        </div>

        <p class="kalimat"> Waktu konsultasi dapat berubah bergantung pada konsultasi pasien sebelum anda</p>
    </div>

    <div class="separator"></div>

    <div class="heading text-left">
        <img class="element-icon" src="{{ staticAsset('frontend/skinoasis/assets/images/icons/hallo-icon/konsultasi.png') }}" alt="icon">
        <div class="title text-capitalize"> Konsultasi Online</div>
        <div class="title-two mt-9 text-capitalize">
            28 Des 2023<br>
            Klinik Beauty Centre</div>
    </div>

    <div class="btn-wrap mt-lg-4">
        <a href="#" class="btn btn-outline-yellow btn-rounded btn-sm ls-1px text-uppercase">
            Pesan
        </a>
    </div>

</div>