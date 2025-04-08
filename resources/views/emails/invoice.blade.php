<!DOCTYPE html>
<html>

<head>
    <title>Invoice from Continental Fashion Merchandising</title>
</head>

<body>
    <h1>Your Invoice is Ready</h1>

    <p>Dear Valued Customer,</p>

    <p>Please find attached the invoice for the period from {{ $startDate }} to {{ $endDate }}.</p>

    <p>Invoice Details:</p>
    <ul>
        <li>Period: {{ $startDate }} - {{ $endDate }}</li>
        <li>Attached: Detailed Invoice PDF</li>
    </ul>

    <p>If you have any questions, please contact our sales team.</p>

    <p>Best regards,<br>
        Continental Fashion Merchandising UG</p>
</body>

</html>
