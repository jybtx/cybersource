<?php

return [

    "merchant_id" => env('MERCHANT_ID',''),

    "transaction_key" => env('TRANSACTION_KEY',''),

    "reference_code" => env('REFERENCE_CODE',''),

    //Modify the URL to point to either a live or test WSDL file with the desired API version.
    "wsdl" => "https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.120.wsdl",

    // Modify the URL to point to either a live or test WSDL file with the desired API version for the name-value pairs transaction API.
    "nvp_wsdl" => "https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_NVP_1.120.wsdl"

];
