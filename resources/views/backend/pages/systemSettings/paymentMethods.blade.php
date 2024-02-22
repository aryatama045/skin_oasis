@extends('backend.layouts.master')

@section('title')
    {{ localize('Payment Methods Settings') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Payment Methods Settings') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <table class="table tt-footable border-top" data-use-parent-width="true">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Nama Bank</th>
                        <th data-breakpoints="xs sm">No. Rek</th>
                        <th data-breakpoints="xs sm">Jenis</th>
                        <th data-breakpoints="xs sm">Aktif</th>
                        <!-- <th data-breakpoints="xs sm" class="text-end">{{ localize('Action') }}</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paymenthod as $key => $listbank)
                        <tr>
                            <td class="text-center">
                                #
                            </td>
                            <td>
                                <span class="fw-semibold">
                                    {{ $listbank->account_name }}
                                </span>
                            </td>
                            <td>
                                @if ($listbank->account_number != '')
                                    <span class="badge rounded-pill bg-secondary">
                                        {{ $listbank->account_number }}
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-secondary">
                                        N/A
                                    </span>
                                @endif
                            </td>
                            <td>
                                {{ $listbank->remark }}
                            </td>
                            <td>
                                @if ($listbank->active == 0)
                                    <span class="badge rounded-pill bg-secondary" style="color: red">
                                        Tidak Aktif
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-secondary" style="color: green">
                                        Aktif
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- <div class="row g-2">
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.settings.updatePaymentMethods') }}" method="POST"
                        enctype="multipart/form-data" class="pb-650">
                        @csrf

                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Enable COD') }}</label>
                                    <select id="enable_cod" class="form-control select2" name="enable_cod"
                                        data-toggle="select2">
                                        <option value="0" {{ getSetting('enable_cod') == '0' ? 'selected' : '' }}>
                                            {{ localize('Disable') }}</option>
                                        <option value="1" {{ getSetting('enable_cod') == '1' ? 'selected' : '' }}>
                                            {{ localize('Enable') }}</option>
                                    </select>
                                </div>

                            </div>
                        </div>


                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> {{ localize('Save Configuration') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div> -->
        </div>
    </section>
@endsection
