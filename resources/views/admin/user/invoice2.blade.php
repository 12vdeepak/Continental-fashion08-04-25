<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .text-center {
            text-align: center;
        }

        .border {
            border: 1px solid #ccc;
        }

        .pb-4 {
            padding-bottom: 16px;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        .border-b {
            border-bottom: 1px solid #ccc;
        }

        .img-container img {
            display: block;
            max-width: 100px;
            height: auto;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="pb-4 mb-4 text-center border-b">
        <h1 style="font-size: 24px; color: #54114C;">Continental Fashion Merchandising UG (Limited Liability)</h1>
        <p>Manufacturer, Importer, Exporter & Wholesaler</p>
    </div>

    <div style="text-align: center; margin-bottom: 1rem;">
        <h2 style="font-size: 18px;">Our Brands</h2>
        <div
            style="display: flex; flex-direction: column; align-items: center; width: 100%; gap: 5rem; margin-top: 1.5rem;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('frontend/assets/images/design.png'))) }}"
                alt="Basic Wear" style="max-width: 150px; height: auto;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('frontend/assets/images/design1.png'))) }}"
                alt="Blue Pacific" style="max-width: 150px; height: auto;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('frontend/assets/images/design2.png'))) }}"
                alt="Fleet Active Wear" style="max-width: 150px; height: auto;">
        </div>
    </div>





    <div
        style="color: #374151; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; padding-top: 16px; padding-bottom: 16px; margin-bottom: 16px;">
        <p>Continental Fashion Merchandising UG (Limited Liability)</p>
        <p>Herderstr. 4 63165 Mühlheim am Main</p>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Delivery Address -->
            <td style="width: 50%; text-align: left; vertical-align: top;">
                <h3 style="font-size: 24px; font-weight: 500; margin-bottom: 16px;">Delivery Address</h3>
                <p style="font-size: 24px; font-weight: 600; margin-bottom: 16px;">{{ $userAddress }}</p>
            </td>

            <!-- Billing Address -->
            <td style="width: 50%; text-align: right; vertical-align: top;">
                <h3 style="font-size: 24px; font-weight: 500; margin-bottom: 16px;">Billing Address</h3>
                <p style="font-size: 24px; font-weight: 600; margin-bottom: 16px;">{{ $billingAddress }}</p>
            </td>

        </tr>
    </table>



    <table
        style="width: 100%; background-color: #f3f4f6; font-family: sans-serif; margin-top: 2.5rem; border-collapse: collapse; padding: 1rem;">
        <tr>
            <td style="font-size: 1.125rem; font-weight: 600; padding: 1rem;">Invoice No:
                <span style="font-weight: 700; color: #1f2937;">
                    {{ $invoiceNumber ?? now()->format('Ymd') . rand(1000, 9999) }}
                </span>
            </td>
            <td style="font-size: 1.125rem; font-weight: 600; padding: 1rem;">Date:
                <span style="font-weight: 700; color: #1f2937;">
                    {{ now()->format('d/m/Y') }}
                </span>
            </td>
        </tr>
    </table>


    <table>
        <thead>
            <tr style="background-color: #e5e7eb; padding: 10px;">
                <th>S.No</th>
                <th>Article/Description</th>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Price (per piece)</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $totalAmount = 0; @endphp
            @foreach ($orders as $index => $order)
                @php
                    $lineTotal = $order->quantity * $order->price;
                    $totalAmount += $lineTotal;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->product->article->article_name ?? 'N/A' }}</td>
                    <td>{{ $order->color->color_code ?? '-' }}</td>
                    <td>{{ $order->size->size_name ?? '-' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->price, 2) }}</td>
                    <td class="font-bold">{{ number_format($lineTotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @php
        $order = $orders->first(); // Get the first order
        $deliveryAddress = optional($order)->delivery_address;
        $billingAddress = optional($order)->billing_address;

        $country = optional($order->address)->country ?? ''; // Ensure we get the country
        $isGermany = strtolower($country) === 'germany';

        $vat = $isGermany ? $totalAmount * 0.19 : 0;
        $deliveryCharge = optional($order)->delivery_charge ?? 0; // Ensure it's not null
        $finalAmount = $totalAmount + $vat + $deliveryCharge;
    @endphp

    <div style="font-family: sans-serif; margin-top: 1.5rem;">
        <p style="font-weight: bold; margin: 5px 0;">Total net:
            <span style="float: right;">{{ number_format($totalAmount, 2) }}</span>
        </p>

        @if ($isGermany)
            <p
                style="font-weight: bold; margin: 8px 0; padding: 8px 0; border-top: 1px dashed #9CA3AF; border-bottom: 1px dashed #9CA3AF;">
                19% VAT:
                <span style="float: right;">{{ number_format($vat, 2) }}</span>
            </p>
        @endif

        <p style="font-weight: bold; margin: 8px 0;">
            Delivery Charge:
            <span style="float: right;">{{ number_format($deliveryCharge, 2) }}</span>
        </p>

        <p style="font-weight: bold; font-size: 1.125rem; padding-bottom: 8px; border-bottom: 1px dashed #9CA3AF;">
            Final amount:
            <span style="float: right;">{{ number_format($finalAmount, 2) }}</span>
        </p>
    </div>





    <div style="margin-top: 1.5rem; font-family: sans-serif;">
        <p><strong>Delivery From:</strong> 13/02/2025</p>
        @php
            $order = $orders->first(); // Get the first order of the user
        @endphp

        <p><strong>Term of payment:</strong> {{ optional($order)->payment_terms ?? 'N/A' }}</p>

    </div>


    <p class="font-bold" style="color: red;">
        Please transfer the invoice amount to the following bank account:
        <br>Continental Fashion Merchandising UG, Commerzbank Mühlheim am Main
        <br>IBAN Code: DE41 5054 0028 0453 9615 00
    </p>

    <div style="margin-top: 1.5rem; font-size: 0.875rem; color: #374151; text-align: center; font-family: sans-serif;">
        <p>
            Just like to thank you for your patience. The goods are subject to prompt payment.
            Our general terms and conditions apply exclusively. Please check the shipment.
            If there is any damage to the packaging, this is the responsibility of the seller.
        </p>
        <p>
            Person must be reported immediately and noted in writing, otherwise no claim for compensation can be derived
            from the seller.
            Please check the quantity and design immediately. Complaints about lost goods cannot be accepted.
            Reimbursement period days. Place of jurisdiction.
        </p>
    </div>


    <div
        style="margin-top: 1.5rem; border-top: 1px solid #9CA3AF; padding-top: 1rem; font-size: 0.875rem; text-align: center; font-family: sans-serif;">
        <p><strong>Address:</strong> Herderstr. 4 D-63165 Mühlheim am Main</p>
        <p><strong>Telephone:</strong> +49 (0)6108 826960 <strong>Fax:</strong> +49 (0)6108 826962
            <strong>Email:</strong> sales@continental-fashion.com
        </p>
        <p><strong>Managing Director:</strong> Bimal Roy <strong>Amtsgericht Offenbach HRB 47047</strong></p>
        <p><strong>VAT Number:</strong> DE287078499</p>
        <p><strong>Bank details:</strong> Commerzbank Mühlheim am Main</p>
        <p><strong>Account number:</strong> 0453 9615 00 <strong>Bank sort code:</strong> 5054 0028</p>
        <p><strong>IBAN:</strong> DE41 5054 0028 0453 9615 00 <strong>BIC:</strong> COBADEFFXXX</p>
    </div>

</body>

</html>
