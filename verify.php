<?php

	$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
	$Amount = 1000; //Amount will be based on Toman
	$Authority = $_GET['Authority'];
	
	if($_GET['Status'] == 'OK'){
		// URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl
		$client = new SoapClient('https://de.zarinpal.com/pg/services/WebGate/wsdl', array('encoding' => 'UTF-8')); 
		
		$result = $client->PaymentVerification(
						  	array(
									'MerchantID'	 => $MerchantID,
									'Authority' 	 => $Authority,
									'Amount'	 => $Amount
								)
		);

		echo $result->Status;  // Status of payment
		echo $result->RefID; // RefID of Payment 
	} else {
		echo 'Transaction canceled by user';
	}
	

?>
