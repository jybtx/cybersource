<?php

namespace Jybtx\Cybersource;

use \SoapClient;

/**
 * CybsClient
 *
 * An implementation of PHP's SOAPClient class for making either name-value pair
 * or XML CyberSource requests.
 */

class CybsClient extends SoapClient
{
    const CLIENT_LIBRARY_VERSION = "CyberSource PHP 1.0.0";

    private $merchantId;
    private $transactionKey;
    private $referenceCode;
    private $nameSpace;

    function __construct($options=array(), $properties, $nvp = false)
    {
        $required = array('merchant_id', 'transaction_key', 'reference_code', 'name_space');

        if (!$properties) {
            throw new \Exception('Unable to read cybs.ini.');
        }

        if ($nvp === true) {
            array_push($required, 'nvp_wsdl');
            $wsdl = $properties['nvp_wsdl'];
        } else {
            array_push($required, 'wsdl');
            $wsdl = $properties['wsdl'];
        }

        foreach ($required as $req) {
            if (empty($properties[$req])) {
                throw new \Exception($req . ' not found in cybs.ini.');
            }
        }

        parent::__construct($wsdl, $options);
        $this->merchantId     = $properties['merchant_id'];
        $this->transactionKey = $properties['transaction_key'];
        $this->referenceCode  = $properties['reference_code'];
        $this->nameSpace      = $properties['name_space'];



        $soapUsername = new \SoapVar(
            $this->merchantId,
            XSD_STRING,
            NULL,
            $this->nameSpace,
            NULL,
            $this->nameSpace
        );

        $soapPassword = new \SoapVar(
            $this->transactionKey,
            XSD_STRING,
            NULL,
            $this->nameSpace,
            NULL,
            $this->nameSpace
        );

        $auth = new \stdClass();
        $auth->Username = $soapUsername;
        $auth->Password = $soapPassword;

        $soapAuth = new \SoapVar(
            $auth,
            SOAP_ENC_OBJECT,
            NULL, $this->nameSpace,
            'UsernameToken',
            $this->nameSpace
        );

        $token = new \stdClass();
        $token->UsernameToken = $soapAuth;

        $soapToken = new \SoapVar(
            $token,
            SOAP_ENC_OBJECT,
            NULL,
            $this->nameSpace,
            'UsernameToken',
            $this->nameSpace
        );

        $security =new \SoapVar(
            $soapToken,
            SOAP_ENC_OBJECT,
            NULL,
            $this->nameSpace,
            'Security',
            $this->nameSpace
        );

        $header = new \SoapHeader($this->nameSpace, 'Security', $security, true);

        $this->__setSoapHeaders(array($header));
    }

    /**
     * @return string The client's merchant ID.
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @return string The client's transaction key.
     */
    public function getTransactionKey()
    {
        return $this->transactionKey;
    }
    /**
     * [ string The client's reference code ]
     * @Author jybtx
     * @date   2021-03-26
     * @return [type]     [description]
     */
    public function getReferenceCode()
    {
        return $this->referenceCode;
    }
}