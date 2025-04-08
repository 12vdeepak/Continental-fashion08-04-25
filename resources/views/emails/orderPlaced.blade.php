<!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation</title>
</head>

<body>
    <h2>Your Order Has Been Placed Successfully!</h2>
    <p>Order ID: {{ $orderDetails[0]['order_id'] }}</p>

    <h3>Order Summary:</h3>
    <ul>
        @foreach ($orderDetails as $item)
            <li>
                <strong>{{ $item['product_name'] }}</strong>
                ({{ $item['size'] }}, {{ $item['color'] }})
                - Qty: {{ $item['quantity'] }}
                - Total: {{ $item['total_price'] }}
            </li>
        @endforeach
    </ul>

    <p>Thank you for shopping with us!</p>
</body>

</html>
