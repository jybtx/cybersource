<?php

return [
    /**
     * -------------------------------
     *          *** 账号id ***
     * -------------------------------
     */
    "merchant_id" => env('MERCHANT_ID',''),

    /**
     * -------------------------------
     *    *** transaction key ***
     * -------------------------------
     */
    "transaction_key" => env('TRANSACTION_KEY',''),

    /**
     * -------------------------------
     *       *** 账户识别码 ***
     * -------------------------------
     */
    "reference_code" => env('REFERENCE_CODE',''),

    /**
     * -------------------------------
     *       *** 是否测试环境 ***
     * -------------------------------
     * false：测试环境
     * true：正式环境
     */
    "test_environment" => env('TEST_ENVIRONMENT','false'),

    //Modify the URL to point to either a live or test WSDL file with the desired API version.
    // "wsdl" => "https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.120.wsdl",
    "wsdl" => "https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.177.wsdl",

    // Modify the URL to point to either a live or test WSDL file with the desired API version for the name-value pairs transaction API.
    "nvp_wsdl" => "https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_NVP_1.120.wsdl",

    "name_space" => "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd",

];
