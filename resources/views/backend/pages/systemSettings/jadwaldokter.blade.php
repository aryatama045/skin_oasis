@extends('backend.layouts.master')

@section('title')
    {{ localize('Social Login Configurations') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Jadwal Dokter</h2>
                                <p>Silahkan atur jadwal dokter dibawah ini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!--left sidebar-->
                <div class="col-xl-12 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.settings.updateJadwalDokter') }}" method="POST" enctype="multipart/form-data"
                        class="pb-650">
                        @csrf

                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <div class="row align-items-center g-3">
                                    <div class="col-auto col-sm-2">
                                        <div class="input-group">
                                            <b>Hari</b>
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <b>Jam Buka</b>
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <b>Jam Tutup</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center g-3">
                                    <div class="col-auto col-sm-2">
                                        <div class="input-group">
                                            <p>Senin</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="seninbuka"
                                            placeholder="Masukan Jam Buka">
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="senintutup"
                                            placeholder="Masukan Jam Tutup">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row align-items-center g-3">
                                    <div class="col-auto col-sm-2">
                                        <div class="input-group">
                                            <p>Selasa</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="selasabuka"
                                            placeholder="Masukan Jam Buka">
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="selasatutup"
                                            placeholder="Masukan Jam Tutup">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row align-items-center g-3">
                                    <div class="col-auto col-sm-2">
                                        <div class="input-group">
                                            <p>Rabu</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="rabubuka"
                                            placeholder="Masukan Jam Buka">
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="rabututup"
                                            placeholder="Masukan Jam Tutup">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row align-items-center g-3">
                                    <div class="col-auto col-sm-2">
                                        <div class="input-group">
                                            <p>Kamis</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="kamisbuka"
                                            placeholder="Masukan Jam Buka">
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="kamistutup"
                                            placeholder="Masukan Jam Tutup">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row align-items-center g-3">
                                    <div class="col-auto col-sm-2">
                                        <div class="input-group">
                                            <p>Jumat</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="jumatbuka"
                                            placeholder="Masukan Jam Buka">
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="jumattutup"
                                            placeholder="Masukan Jam Tutup">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row align-items-center g-3">
                                    <div class="col-auto col-sm-2">
                                        <div class="input-group">
                                            <p>Sabtu</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="sabtubuka"
                                            placeholder="Masukan Jam Buka">
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="sabtututup"
                                            placeholder="Masukan Jam Tutup">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row align-items-center g-3">
                                    <div class="col-auto col-sm-2">
                                        <div class="input-group">
                                            <p>Minggu</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="minggubuka"
                                            placeholder="Masukan Jam Buka">
                                        </div>
                                    </div>
                                    <div class="col-auto col-sm-3">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="minggututup"
                                            placeholder="Masukan Jam Tutup">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> Simpan Jadwal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
