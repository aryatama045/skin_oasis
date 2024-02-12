<form class="contact-form ps-4 ps-xl-0 py-8 pe-5 contact-form ps-5 ps-xl-4 py-6 pe-6"
    action="{{ route('contactUs.store') }}" method="POST" id="contact-form">
    @csrf

    {!! RecaptchaV3::field('recaptcha_token') !!}
    <div class="row g-4">

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

        <!-- Address -->
            <div class="col-sm-6">
                <div class="label-input-field">
                    <label>{{ localize('City') }}</label>
                    <input type="tesxt" name="city" placeholder="{{ localize('You city') }}"
                        required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="label-input-field">
                    <label>{{ localize('Regency') }}</label>
                    <input type="text" name="regency" placeholder="{{ localize('You regency') }}"
                        required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="label-input-field">
                    <label>{{ localize('District') }}</label>
                    <input type="text" name="district" placeholder="{{ localize('You district') }}"
                        required>
                </div>
            </div>

        <div class="col-sm-12">
            <div class="label-input-field">
                <label>{{ localize('Address') }}</label>
                <input type="text" name="address" placeholder="{{ localize('Your address') }}"
                    required>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="label-input-field">
                <label>{{ localize('Address') }}</label>
                <input type="text" name="address" placeholder="{{ localize('Your address') }}"
                    required>
            </div>
        </div>

        <div class="col-12">
            <div class="label-input-field">
                <label>{{ localize('Messages') }}</label>
                <textarea name="message" placeholder="{{ localize('Write your message') }}" rows="6" required></textarea>
            </div>
        </div>
    </div>
    <button type="submit"
        class="btn btn-primary btn-md rounded-1 mt-6">{{ localize('Send Message') }}</button>
</form>