<?php

	$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
	$Amount = 1000; //Amount will be based on Toman
	$Authority = $_GET['Authority'];
	
	
	if($_GET['Status'] == 'OK'){
			$client = new SoapClient('http://de.zarinpal.com/pg/services/WebGate/wsdl', array('encoding' => 'UTF-8')); // URL also Can be https://de.zarinpal.com/pg/services/WebGate/wsdl
			$result = $client->PaymentVerification(
				array(
						'MerchantID'	 => $MerchantID,
						'Authority' 	 => $Authority,
						'Amount'	 	 => $Amount
					)
			);

		echo  $result->Status;  // Status of payment
		echo $transid = $result->RefID; // RefID of Payment 
	}else{
		echo 'Transaction canceled by user';
	}
	

?>