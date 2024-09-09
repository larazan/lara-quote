@extends('frontend.layout')

@section('content')

    <section class="container pt-16 mx-auto mb-32">

        {{-- Header --}}
        <header class="flex flex-col py-8 mt-8 mb-12 space-y-6 text-center">
            <h2 class="font-serif text-5xl font-bold">Checkout</h2>
            <hr class="self-center w-40 border-b-4 border-theme-blue-200">
        </header>

        <div class="flex flex-col items-center max-w-4xl mx-auto">
            <div class="w-full p-10 m-4 leading-loose border border-gray-200 shadow-lg bg-gray-50">
                <form id="payment-form" class="space-y-8" action="{{ route('payments.store') }}" method="POST">
                    @csrf
                    <h2 class="relative font-serif text-xl font-bold">
                        <span class="side-title">
                            Customer information
                        </span>
                    </h2>

                    <!-- plan -->
                     <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}" />
                    <!-- payment method -->
                     <input type="hidden" name="payment-method" id="payment-method" />
                     {{-- Name --}}
                    <div class="space-y-2">
                        <label for="name" >{{ __('Name') }}</label>
                        <input id="card-holder-name" class="block w-full mt-1" type="text" name="name" :value="auth()->user()->fullName() ?? old('name')" autocomplete="name" />
                    </div>
                    {{-- Email --}}
                    <div class="space-y-2">
                        <label for="email" >{{ __('Email') }}</label>
                        <input id="email" class="block w-full mt-1" type="text" name="email" :value="auth()->user()->emailAddress() ?? old('email') " autocomplete="email" disabled />
                    </div>

                    {{-- Address --}}
                    <div class="space-y-2">
                        <label for="line1" >{{ __('Street, Po Box, or Company name') }}</label>
                        <input id="line1" class="block w-full mt-1" type="text" name="line1" :value="auth()->user()->lineOne() ?? old('line1')" required />
                    </div>

                    <div class="space-y-2">
                        <label for="line2" >{{ __('Apartment, Suite, Unit, or Building') }}</label>
                        <input id="line2" class="block w-full mt-1" type="text" name="line2" :value="auth()->user()->lineTwo() ?? old('line2')" required />
                    </div>
                    {{-- City --}}
                    <div class="space-y-2">
                        <label for="city" >{{ __('City') }}</label>
                        <input id="city" class="block w-full mt-1" type="text" name="city" :value="auth()->user()->city() ?? old('city')" autocomplete="city" required />
                    </div>
                    {{-- State --}}
                    <div class="space-y-2">
                        <label for="state" >{{ __('State') }}</label>
                        <input id="state" class="block w-full mt-1" type="text" name="state" :value="auth()->user()->state() ?? old('state')" autocomplete="state" required />
                    </div>
                    {{-- Country --}}
                    <div class="inline-block w-1/2 pr-2 ">
                        <label for="country" >{{ __('Country') }}</label>
                        <input id="country" class="block w-full mt-1" type="text" name="country" :value="auth()->user()->country() ?? old('country')" autocomplete="country" required />
                    </div>
                    {{-- Postal Code --}}
                    <div class="inline-block w-1/2 pl-2 -mx-1">
                        <label for="postal_code">{{ __('Postal Code / Zip') }}</label>
                        <input id="postal_code" class="block w-full mt-1" type="text" name="postal_code" :value="auth()->user()->postalCode() ?? old('postal_code')" autocomplete="postal_code" required />
                    </div>

                    <h2 class="relative font-serif text-xl font-bold">
                        <span class="side-title">
                            Payment information
                        </span>
                    </h2>

                    <div class="space-y-2">
                        <label for="card-name" >{{ __('Name on Card') }}</label>
                        <input id="card-holder-name" class="block w-full mt-1" type="text" name="card-name" :value="auth()->user()->fullName() ?? old('card-name')" autocomplete="card-name" />
                    </div>

                    <div class="space-y-2">
                        <label for="card_no" >{{ __('Card Information') }}</label>
                        <div id="card-element" class="p-3 bg-white border border-gray-300 rounded"></div>
                    </div>

                    <div id="card-errors" class="space-y-2 text-red-500"></div>

                    <div class="space-y-2">
                        <button id="card-button" data-secret="{{ $intent->client_secret }}" class="px-4 py-1 font-light tracking-wider text-white bg-gray-900 rounded" type="submit">
                            Pay Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@push('js')
<script src="https://js.stripe.com/v3/"></script>
<script>
 const stripe = Stripe('{{ env("STRIPE_KEY") }}');

 const elements = stripe.elements();
 const cardElement = elements.create('card');

 const cardHoldername = document.getElementById('card-holder-name');
 const cardButton = document.getElementById('card-button');
 const clientSecret = cardButton.dataset.secret;

 cardElement.mount('#card-element');

 cardElement.addEventListener('change', function(event) {
    const displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
    
});

// Handle Form submission
const paymentForm = document.getElementById('payment-form');

paymentForm.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.handleCardSetup(clientSecret, cardElement, {
        payment_method_data: {
            billing_details: {
                name: cardHoldername.value
            }
        }
    })
    .then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            const paymentMethodInput = document.getElementById('payment-method');
            paymentMethodInput.value = result.setupIntent.payment_method;
            paymentForm.submit();
        }
    });
})

</script>
@endpush