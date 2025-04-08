<!DOCTYPE html>
<html>

<head>
    <title>Registration Approved</title>
</head>

<body>
    <h2>Dear {{ $userName }},</h2>

    <p>We are pleased to inform you that your registration has been approved.</p>
    <p><strong>Customer ID:</strong> {{ $customerId }}</p>
    <p><strong>Price Category:</strong> {{ $priceCategory }}</p>

    <p>You can now log in and start using our services.</p>

    <p>Best Regards,</p>
    <p><strong>Continental Fashion</strong></p>
</body>

</html>
