@extends('backend.layouts.master')

@section('title')
    {{ localize('Customers') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Testimoni</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <form class="app-search" action="{{ Request::fullUrl() }}" method="GET">
                            <div class="card-header border-bottom-0">
                                <div class="row justify-content-between g-3">
                                    <div class="col-auto flex-grow-1">
                                        <div class="tt-search-box">
                                            <div class="input-group">
                                                <span class="position-absolute top-50 start-0 translate-middle-y ms-2"> <i
                                                        data-feather="search"></i></span>
                                                <input class="form-control rounded-start w-100" type="text"
                                                    id="search" name="search" placeholder="{{ localize('Search') }}"
                                                    @isset($searchKey)
                                        value="{{ $searchKey }}"
                                        @endisset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <select class="form-select select2" name="is_banned"
                                                data-minimum-results-for-search="Infinity">
                                                <option value="">{{ localize('Select status') }}</option>

                                                <option value="0"
                                                    @isset($is_banned)
                                                     @if ($is_banned == 0) selected @endif
                                                    @endisset>
                                                    {{ localize('Active') }}</option>

                                                <option value="1"
                                                    @isset($is_banned)
                                                     @if ($is_banned == 1) selected @endif
                                                    @endisset>
                                                    {{ localize('Banned') }}</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">
                                            <i data-feather="search" width="18"></i>
                                            {{ localize('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table tt-footable border-top" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>{{ localize('Name') }}</th>
                                    <th data-breakpoints="xs sm">Product</th>
                                    <th data-breakpoints="xs sm">Title & Comment</th>
                                    <th data-breakpoints="xs sm" class="text-end">{{ localize('Banned') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($testimoni as $key => $testimoni)
                                    <tr>
                                        <td class="text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td>
                                            <h6>{{ $testimoni->name }}</h6>
                                            <span>Tgl Review : {{ $testimoni->tgl_komen }}</span><br>
                                            
                                            @if($testimoni->rating == 1)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            @elseif($testimoni->rating == 2)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            @elseif($testimoni->rating == 3)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            @elseif($testimoni->rating == 4)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                            @elseif($testimoni->rating == 5)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            {{ $testimoni->namaproduk }}
                                        </td>
                                        <td>
                                            <b>Title : {{ $testimoni->title }}</b><br>
                                            <span>{{ $testimoni->comment }}</span>
                                        </td>
                                        <td class="text-end">
                                            @can('ban_customers')
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input type="checkbox" onchange="updateBanTestiStatus(this)"
                                                        class="form-check-input"
                                                        @if ($testimoni->is_banned) checked @endif
                                                        value="{{ $testimoni->testi_id }}">
                                                </div>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        "use strict";

        function updateBanTestiStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.customers.updateBanTestiStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', '{{ localize('Status updated successfully') }}');

                    } else {
                        notifyMe('danger', '{{ localize('Something went wrong') }}');
                    }
                });
        }
    </script>
@endsection
