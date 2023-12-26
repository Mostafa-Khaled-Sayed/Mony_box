<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Frames v2: Single Frame</title>



    <link rel="stylesheet" href="{{ asset('web\payment\normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('web\payment\style.css') }}" />
</head>

<body>
    <form id="payment-form" method="POST" action="https://merchant.com/charge-card">
        <div class="one-liner">
            <div class="card-frame"></div>

            <input type="hidden" id="price" name="price" readonly value="{{$price}}">
            <br/>
            <button id="pay-button" disabled>
                Click to pay
            </button>
        </div>
        <p class="error-message"></p>
        <p class="success-payment-message"></p>
    </form>


    <script src="https://cdn.checkout.com/js/framesv2.min.js"></script>
    @vite(['resources/js/checkout.js'])
</body>

</html>
