<?php

    $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
    $Amount = 1000; //Amount will be based on Toman
    $Authority = $_GET['Authority'];

    if ($_GET['Status'] == 'OK') {
        // URL also can be ir.zarinpal.com or de.zarinpal.com
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentVerification([
            'MerchantID'     => $MerchantID,
            'Authority'      => $Authority,
            'Amount'         => $Amount,
        ]);

        if ($result->Status == 100) {
            echo 'Transation success. RefID:'.$result->RefID;
        } else {
            echo 'Transation failed. Status:'.$result->Status;
        }
    } else {
        echo 'Transaction canceled by user';
    }
