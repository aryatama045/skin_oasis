<form class="contact-form ps-4 ps-xl-0 py-8 pe-5 contact-form ps-5 ps-xl-4 py-6 pe-6 addAddressModal" id="addAddressModal"
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
                <select class="select2Part" name="country_id2" required>
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
                <select class="select2Part" required name="state_id2">
                    <option value="">{{ localize('Select Province') }}</option>
                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="w-100 label-input-field">
                <label>{{ localize('City') }}</label>
                <select class="select2Part" required name="city_id2">
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
                <input type="text" name="kodepos" placeholder="{{ localize('You Kode Pos') }}"
                    required>
            </div>
        </div>

    </div>
    <button type="submit"
        class="btn btn-primary btn-md rounded-1 mt-6">{{ localize('Gabung Sekarang') }}</button>
</form>
