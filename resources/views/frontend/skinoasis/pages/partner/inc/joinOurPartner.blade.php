<form class="contact-form ps-4 ps-xl-0 py-8 pe-5 contact-form ps-5 ps-xl-4 py-6 pe-6"
    action="{{ route('Partner.store') }}" method="POST" >
    @csrf

    {!! RecaptchaV3::field('recaptcha_token') !!}
    <div class="row g-4">

        <input type="hidden" name="type_join" value="partner" required>

        <div class="col-sm-12">
            <div class="label-input-field">
                <label>{{ localize('Name') }}</label>
                <input type="text" name="name" placeholder="{{ localize('Your name') }}"
                    required>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="label-input-field">
                <label>{{ localize('Email') }}</label>
                <input type="email" name="email" placeholder="{{ localize('You email') }}"
                    required>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="label-input-field">
                <label>{{ localize('Phone') }}</label>
                <input type="text" name="phone" placeholder="{{ localize('You phone') }}"
                    required>
            </div>
        </div>

        <hr>

        <div class="col-sm-4">
            <div class="w-100 label-input-field">
                <label>{{ localize('Country') }}</label>
                <select class="select2Address" name="country_id2" required>
                    <option value="">{{ localize('Select Country') }}</option>
                    @foreach ($country2 as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="col-sm-4">
            <div class="w-100 label-input-field">
                <label>{{ localize('Province') }}</label>
                <select class="select2Address" required name="state_id2">
                    <option value="">{{ localize('Select Province') }}</option>
                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="w-100 label-input-field">
                <label>{{ localize('City') }}</label>
                <select class="select2Address" required name="city_id2">
                    <option value="">{{ localize('Select City') }}</option>

                </select>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="label-input-field">
                <label>{{ localize('Address') }}</label>
                <input type="text" name="address" placeholder="{{ localize('Your address') }}"
                    required>
            </div>
        </div>

        <hr>

        <div class="col-sm-4">
            <div class="label-input-field">
                <label> RT/RW</label>
                <input type="text" name="city" placeholder="{{ localize('You RT/RW') }}"
                    required>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="label-input-field">
                <label>Blok</label>
                <input type="text" name="blok" placeholder="{{ localize('You Blok') }}"
                    required>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="label-input-field">
                <label>Kode Pos</label>
                <input type="text" name="kode_pos" placeholder="{{ localize('You Kode Pos') }}"
                    required>
            </div>
        </div>

    </div>
    <button type="submit"
        class="btn btn-primary btn-md rounded-1 mt-6">{{ localize('Gabung Sekarang') }}</button>
</form>


@section('scripts')
    <script>
        "use strict";

        //  get states on country change
        $(document).on('change', '[name=country_id2]', function() {
            var country_id2 = $(this).val();
            getStates2(country_id2);
        });

        //  get states
        function getStates2(country_id2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('address.getStates') }}",
                type: 'POST',
                data: {
                    country_id: country_id2
                },
                success: function(response) {
                    $('[name="state_id2"]').html("");
                    $('[name="state_id2"]').html(JSON.parse(response));
                }
            });
        }

        ///  get cities on state change
        $(document).on('change', '[name=state_id2]', function() {
            var state_id2 = $(this).val();
            getCities2(state_id2);
        });

        //  get cities
        function getCities2(state_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('address.getCities') }}",
                type: 'POST',
                data: {
                    state_id: state_id2
                },
                success: function(response) {
                    $('[name="city_id2"]').html("");
                    $('[name="city_id2"]').html(JSON.parse(response));
                }
            });
        }
    </script>
@endsection
