<address class="fs-sm mb-0">
    <strong>{{ $address->address?? None }}</strong>
</address>

<strong> {{ localize('City') }}: </strong>{{ $address->city->name?? None }}
<br>

<strong>{{ localize('State') }}: </strong>{{ $address->state->name?? None }}

<br>
<strong>{{ localize('Country') }}: </strong> {{ $address->country->name?? None }}
