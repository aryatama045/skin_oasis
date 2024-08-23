<div class="hallo-beauty rounded bg-white pt-5 pb-5 " data-aos="fade-up">
    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-12 col-lg-7 mb-5">
                    <div class="heading text-left">
                        <h3 class="text-uppercase ls-2px fw-normal ff">Cari Dokter</h3>

                        <!-- Search Key -->
                        <form class="search-form d-flex align-items-center mt-4" action="{{ route('halloBeauty.listdokter') }}">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-key" placeholder="KETIK NAMA DOKTER"
                                    @isset($searchKey)
                                    value="{{ $searchKey }}"
                                    @endisset>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($dokter as $dokters) 
                    <?php $nmd = str_replace(' ', '-', $dokters->name); ?>
                <div class="col-lg-4 col-sm-6 p-5">
                    <div class="dokter-content rounded">
                        <div class="posts-list">
                            <figure>
                                <a href="{{ route('halloBeauty.dokter', $nmd ) }}">
                                    <img class="rounded-circle" src="{{ uploadedAsset($dokters->avatar) }}" alt="post">
                                </a>
                            </figure>

                            <div>
                                <h3 class="font-weight-bold ff">{{ $dokters->name }}</h3>
                                <span class="text-black">Dokter Kulit - Dokter Estetika</span>
                            </div>
                        </div>
                        <div class="separator mt-2 mb-2"></div>

                        <div class="text-left mt-4 mb-4">
                            <h3 class="font-weight-bold ff">{{ $dokters->klinik_name }}</h3>
                            <span>Tersedia pada hari <br>
                                @if($dokters->senin == null)

                                @else
                                    <span class="text-black">{{ $dokters->senin }}</span><br>
                                @endif
                                @if($dokters->selasa == null)

                                @else
                                    <span class="text-black">{{ $dokters->selasa }}</span><br>
                                @endif
                                @if($dokters->rabu == null)

                                @else
                                    <span class="text-black">{{ $dokters->rabu }}</span><br>
                                @endif
                                @if($dokters->kamis == null)

                                @else
                                    <span class="text-black">{{ $dokters->kamis }}</span><br>
                                @endif
                                @if($dokters->jumat == null)

                                @else
                                    <span class="text-black">{{ $dokters->jumat }}</span><br>
                                @endif
                                @if($dokters->sabtu == null)

                                @else
                                    <span class="text-black">{{ $dokters->sabtu }}</span><br>
                                @endif
                                @if($dokters->minggu == null)

                                @else
                                    <span class="text-black">{{ $dokters->minggu }}</span><br>
                                @endif
                            </span>

                            <h2 class="mt-8 font-weight-bolder ff">{{ formatPrice($dokters->tarif) }}</h2>
                        </div>

                        <div class="card-content text-center">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Add Employee
                            </button><br>
                            <a href="" class="btn btn-outline-yellow btn-rounded btn-sm ls-1px text-uppercase mt-4 w-75">
                                {{ localize('Konsultasi Online') }}</a> <br>
                            <a href="{{ route('halloBeauty.dokter', $nmd) }}" class="btn btn-outline-yellow btn-rounded btn-sm ls-1px text-uppercase mt-4 w-75">
                                {{ localize('Pesan Janji Temu') }}</a>
                        </div>

                    </div>
                </div>
                @endforeach

                <div class="mt-5">
                    {{ $dokter->appends(request()->input())->links() }}
                </div>
            </div>

            @include('frontend.skinoasis.pages.halloBeauty.inc.navbarBottom')


        </div>
    </div>
</div>

{{-- model start here  --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Employee Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
                {{ csrf_field() }}
            <div class="modal-body">
                
                    <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Enter first name">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter last name">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter address">
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Enter mobile">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </form>
    </div>
    </div>
</div>
{{-- model end here  --}}
