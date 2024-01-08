<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Receipt</title>
    <link rel="stylesheet" href="{{ asset('assets/css/ticket.css') }}">
</head>
<body>

    <div class="receipt">
        <div class="header">
            <h2>Point of Sale</h2>
            <p class="sub-header">Your Company Name</p>
        </div>

        <div class="items">
            <div class="item">
                <span class="item-name">Product 1</span>
                <span class="item-quantity">x1</span>
                <span class="item-price">$10.00</span>
            </div>

            <div class="item">
                <span class="item-name">Product 2</span>
                <span class="item-quantity">x2</span>
                <span class="item-price">$20.00</span>
            </div>
        </div>

        <div class="total">
            <span>Total:</span>
            <span class="total-amount">$30.00</span>
        </div>

        <div class="footer">
            <p>Merci pour votre visite !</p>
        </div>
    </div>

</body>
</html>
