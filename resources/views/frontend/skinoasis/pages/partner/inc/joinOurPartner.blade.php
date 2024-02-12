<form class="contact-form ps-4 ps-xl-0 py-8 pe-5 contact-form ps-5 ps-xl-4 py-6 pe-6"
    action="{{ route('contactUs.store') }}" method="POST" id="contact-form">
    @csrf

    {!! RecaptchaV3::field('recaptcha_token') !!}
    <h3 class="mb-6">{{ localize('Need Help? Send Message') }}</h3>
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

        <div class="col-12">
            <div class="checkbox-fields d-flex align-items-center gap-3 flex-wrap my-2">
                <div class="single-field d-inline-flex align-items-center gap-2">
                    <div class="theme-checkbox">
                        <input type="radio" name="support_for" value="delivery_problem" checked>
                        <span class="checkbox-field"><i class="fas fa-check"></i></span>
                    </div>
                    <label class="text-dark fw-semibold">{{ localize('Delivery Problem') }}</label>
                </div>
                <div class="single-field d-inline-flex align-items-center gap-2">
                    <div class="theme-checkbox">
                        <input type="radio" name="support_for" value="customer_service">
                        <span class="checkbox-field"><i class="fas fa-check"></i></span>
                    </div>
                    <label class="text-dark fw-semibold">{{ localize('Customer Service') }}</label>
                </div>
                <div class="single-field d-inline-flex align-items-center gap-2">
                    <div class="theme-checkbox">
                        <input type="radio" name="support_for" value="other_service">
                        <span class="checkbox-field"><i class="fas fa-check"></i></span>
                    </div>
                    <label class="text-dark fw-semibold">{{ localize('Others Service') }}</label>
                </div>
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