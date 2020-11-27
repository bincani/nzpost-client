<?php

require_once __DIR__ . '/vendor/autoload.php';
use DigitalPianism\NzPostClient\ParcelLabel;
use JsonSchema\Validator;

try {
    $parcelDetails = [
        'carrier'   =>  "COURIERPOST",
        'sender_reference_1'    =>  "Order Number 56452",
        'sender_reference_2'    =>  "Sales",
        'sender_details'    =>  (object)[
            'company_name'  =>  "XYZ Widget Company",
            "name"  =>  "Bob",
            "phone" =>  "+6425555916",
            "site_code" =>  96306,
            "email" =>  "bob@xyzwidgets.com"
        ],
        'receiver_details'    =>  (object)[
            "name"  =>  "Alice",
            "phone" =>  "+6424555105",
            "email" =>  "example@example.co.nz"
        ],
        'pickup_address'    =>  (object)[
            "street"  =>  "107 Ransom Smyth Drive",
            "suburb" =>  "Goodwood Heights",
            "city" =>  "Auckland",
            "postcode" =>  "2105",
            "country_code" =>  "NZ"
        ],
        'delivery_address'    =>  (object)[
            "street"  =>  "105 Woodberry Drive",
            "suburb" =>  "Flat Bush",
            "city" =>  "Auckland",
            "postcode" =>  "2016",
            "country_code" =>  "NZ"
        ],
        'parcel_details'    =>  [
            (object)[
                "service_code"  =>  "CPOLP",
                "add_ons" =>  [],
                "return_indicator" =>  "OUTBOUND",
                "description" =>  "Medium Box",
                "dimensions" =>  (object)[
                    'length_cm' =>  30,
                    'width_cm' =>  30,
                    'height_cm' =>  30,
                    'weight_kg' =>  2
                ]
            ]
        ]
    ];
    $clientID = 'aecb874322054b94a5ca4e6ffa5dc727';
    $secret = '8f03604d0EfB48F98417B25fcE5111D4';
    $Client = new ParcelLabel($clientID, $secret, null, true);
    $consId = $Client->createLabel($parcelDetails);
    echo sprintf("consId: %s\n", $consId);
}
catch (Exception $e) {
    print_r($e);
}

