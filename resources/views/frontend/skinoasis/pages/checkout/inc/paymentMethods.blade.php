<!--COD-->
@if (getSetting('enable_cod') == 1)
    <!-- <div class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-3">
        <div class="radio-left d-inline-flex align-items-center">
            <div class="theme-radio">
                <input type="radio" name="payment_method" id="cod" value="cod" required>
                <span class="custom-radio"></span>
            </div>
            <label for="cod" class="ms-2 h6 mb-0">{{ localize('Cash on delivery') }}
                ({{ localize('COD') }})</label>
        </div>
        <div class="radio-right text-end">
            <img src="{{ staticAsset('frontend/pg/cod.svg') }}" alt="cod" class="img-fluid">
        </div>
    </div> -->

    <div class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-3">
        <div class="radio-left d-inline-flex align-items-center">
            <div class="theme-radio">
                <input type="radio" name="payment_method" id="cod" value="cod" required="">
                <span class="custom-radio"></span>
            </div>
            <label for="wallet" class="ms-2 h6 mb-0">
                Bank Transfer <br>
                <b>
                    BANK MANDIRI <br>
                    No. Rek : 1660003456803 <br>
                    Atas Nama : MORITA MITRA BERSAMA
                </b>
            </label>
        </div>
        <div class="radio-right text-end">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/2560px-Bank_Mandiri_logo_2016.svg.png" alt="wallet" class="img-fluid" style="width: 150px">
        </div>
    </div>
@endif

<!--wallet-->
<!-- @if (getSetting('enable_wallet_checkout') == 1)
    <div class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-3">
        <div class="radio-left d-inline-flex align-items-center">
            <div class="theme-radio">
                <input type="radio" name="payment_method" id="wallet" value="wallet" required>
                <span class="custom-radio"></span>
            </div>
            <label for="wallet" class="ms-2 h6 mb-0">{{ localize('Wallet Payment') }}
                <small>({{ localize('Balance') }}:
                    {{ formatPrice(auth()->user()->user_balance) }})</small></label>
        </div>
        <div class="radio-right text-end">
            <img src="{{ staticAsset('frontend/pg/wallet.svg') }}" alt="wallet" class="img-fluid">
        </div>
    </div>
@endif -->