@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stripe.css')}}">
@endsection

@section('content')
<div class="stripe-content">
    <form class="stripe-form" id="payment-form">
        <div class="stripe-view" id="payment-element"></div>
        <button class="stripe-button" id="submit">決済する</button>
        <div class="stripe-error" id="error-message"></div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ config('services.stripe.pb_key') }}");

    const options = {
        clientSecret: "{{ $clientSecret }}",
    };

    const elements = stripe.elements(options);

    const paymentElement = elements.create('payment');
    paymentElement.mount('#payment-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const { error } = await stripe.confirmPayment({
            elements,
            confirmParams: {
                return_url: '{{ route('stripeSuccess', ['item_id' => $item->id]) }}',
            },
        });

        if (error) {
            document.getElementById('error-message').textContent = error.message;
        }
    });
</script>
@endsection