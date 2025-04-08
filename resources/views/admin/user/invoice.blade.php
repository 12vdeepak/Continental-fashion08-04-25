<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-8">
    <div class="text-center border-b pb-4 mb-4">
        <h1 class="text-2xl font-bold text-[#54114C]">Continental Fashion Merchandising UG (Limited Liability)</h1>
        <p class="text-gray-600">Manufacturer, Importer, Exporter & Wholesaler</p>
    </div>

    <!-- Brands Section -->
    <div class="text-center mb-4">
        <h2 class="text-lg font-semibold text-gray-700">Our Brands</h2>
        <div class="flex justify-evenly w-full gap-6 mt-2">
            <img src="/assets/images/bluepacific.svg" alt="Blue Pacific" class="h-12">
            <img src="/assets/images/bluewear.svg" alt="Basic Wear" class="h-12">
            <img src="/assets/images/fleetActiveWear.svg" alt="Fleet Active Wear" class="h-12">
        </div>
    </div>

    <!-- Company Address -->
    <div class="text-gray-700  border-y py-4 mb-4">
        <p>Continental fashion merchandising UG(limited liability)</p>
        <p>Herderstr. 4 ▪ 63165 Mühlheim am Main</p>
    </div>

    <!-- Invoice Content -->
    <div class="addressSection flex justify-between items-center">
        <div class="text-left">
            <div class="div text-[24px] font-medium mb-4">Delivery Address</div>
            <p class="font-semibold">Stiftung Bethel - Brockensammlung</p>
            <p>Kostenstelle 1053241</p>
            <p>Königsweg 1</p>
            <p>D-33617 Bielefeld</p>
        </div>
        <div class="textPart-right">
            <div class="div text-[24px] font-medium mb-4">Billing Address</div>
            <p class="font-semibold">Stiftung Bethel - Brockensammlung</p>
            <p>Kostenstelle 1053241</p>
            <p>Königsweg 1</p>
            <p>D-33617 Bielefeld</p>
        </div>

    </div>

    <!-- Invoice Header -->
    <div class="bg-gray-100 p-4 flex justify-between items-center font-sans mt-10">
        <h1 class="text-lg font-semibold">Invoice no: <span class="font-bold text-gray-800">2540001</span></h1>
        <h1 class="text-lg font-semibold">Date: <span class="font-bold text-gray-800">12/02/2025</span></h1>
    </div>

    <!-- Customer Details -->
    <div class="mt-4 grid grid-cols-2 text-gray-600 text-sm">
        <p>Your customer number: <span class="text-gray-800 font-medium">11588</span></p>
        <p class="text-right">Order dated <span class="text-gray-800 font-medium">25/02/2025</span></p>
        <p>Delivery note no: <span class="text-gray-800 font-medium">2520001</span></p>
        <p class="text-right">Order confirmation number: <span class="text-gray-800 font-medium">2520001</span></p>
    </div>

    <!-- Invoice Table -->
    <div class="mt-6 overflow-x-auto">
        <table class="w-full border-collapse border border-gray-400 text-sm">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-400 px-3 py-2">S.No</th>
                    <th class="border border-gray-400 px-3 py-2">Article/Description</th>
                    <th class="border border-gray-400 px-3 py-2">Color</th>
                    <th class="border border-gray-400 px-3 py-2">Size</th>
                    <th class="border border-gray-400 px-3 py-2">Quantity</th>
                    <th class="border border-gray-400 px-3 py-2">Price (per piece)</th>
                    <th class="border border-gray-400 px-3 py-2">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border border-gray-400">
                    <td class="border px-3 py-2">01</td>
                    <td class="border px-3 py-2">DLIBERTY TS 200</td>
                    <td class="border px-3 py-2">Black Black</td>
                    <td class="border px-3 py-2">S M L XL XXL 3XL 5XL</td>
                    <td class="border px-3 py-2">40</td>
                    <td class="border px-3 py-2">3,00</td>
                    <td class="border px-3 py-2 font-bold">120,00</td>
                </tr>
                <tr class="border border-gray-400">
                    <td class="border px-3 py-2">02</td>
                    <td class="border px-3 py-2">Victor TS 220</td>
                    <td class="border px-3 py-2">Black</td>
                    <td class="border px-3 py-2">S M L XL XXL 3XL 5XL</td>
                    <td class="border px-3 py-2">40</td>
                    <td class="border px-3 py-2">3,00</td>
                    <td class="border px-3 py-2 font-bold">120,00</td>
                </tr>
                <tr class="border border-gray-400">
                    <td class="border px-3 py-2">06</td>
                    <td class="border px-3 py-2">DPD Standard Packet bis 20 kg</td>
                    <td class="border px-3 py-2">-</td>
                    <td class="border px-3 py-2">-</td>
                    <td class="border px-3 py-2">401</td>
                    <td class="border px-3 py-2">13,50</td>
                    <td class="border px-3 py-2 font-bold">5413,50</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6">
            <p class="font-bold">Total net: <span class="float-right">892,00</span></p>
            <p class="font-bold border-y border-dashed border-gray-400 my-2 py-2">19% VAT: <span
                    class="float-right">169,48</span></p>
            <p class="font-bold text-lg border-b border-dashed border-gray-400 pb-2">Final amount: <span
                    class="float-right">1061,48</span></p>
        </div>

        <div class="mt-6">
            <p><strong>Delivery From:</strong> 13/02/2025</p>
            <p><strong>Term of payment:</strong> 5 Take net</p>
        </div>

        <p class="mt-6 text-red-600 font-bold">
            Please transfer the invoice amount to the following bank account:
            <br>
            Continental Fashion Merchandising UG Commerzbank Mühlheim am Main
            <br>
            IBAN Code: DE41 5054 0028 0453 9615 00
        </p>

        <div class="mt-6 text-sm text-gray-700 text-center">
            <p>Just like to thank you for your patience. The goods are subject to prompt payment. Our general terms and
                conditions apply exclusively. Please check the shipment. If there is any damage to the packaging, this
                is the responsibility of the seller.</p>
            <p>Person must be reported immediately and noted in writing, otherwise no claim for compensation can be
                derived from the seller. Please check the quantity and design immediately. Complaints about lost goods
                cannot be accepted. Reimbursement period days. Place of jurisdiction.</p>
        </div>

        <div class="mt-6 border-t border-gray-400 pt-4 text-sm text-center">
            <p><strong>Address:</strong> Herderstr. 4 ▪ D-63165 Mühlheim am Main</p>
            <p><strong>Telephone:</strong> +49 (0)6108 826960 ▪ <strong>Fax:</strong> +49 (0)6108 826962 ▪
                <strong>Email:</strong> sales@continental-fashion.com</p>
            <p><strong>Managing Director:</strong> Bimal Roy ▪ <strong>Amtsgericht Offenbach HRB 47047</strong></p>
            <p><strong>VAT Number:</strong> DE287078499</p>
            <p><strong>Bank details:</strong> Commerzbank Mühlheim am Main</p>
            <p><strong>Account number:</strong> 0453 9615 00 ▪ <strong>Bank sort code:</strong> 5054 0028</p>
            <p><strong>IBAN:</strong> DE41 5054 0028 0453 9615 00 ▪ <strong>BIC:</strong> COBADEFFXXX</p>
        </div>
    </div>

    <!-- Invoice Summary -->
    <!-- <div class="mt-6 flex justify-end">
        <table class="text-right text-sm w-1/3">
            <tr>
                <td class="p-2">Total net</td>
                <td class="p-2 font-bold">892,00</td>
            </tr>
            <tr>
                <td class="p-2">19% VAT</td>
                <td class="p-2 font-bold">169,48</td>
            </tr>
            <tr class="border-t">
                <td class="p-2 font-bold">Final amount</td>
                <td class="p-2 font-bold text-lg">1061,48</td>
            </tr>
        </table>
    </div> -->
</body>

</html>
