<?php

	$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';  //Required
	$Amount = 1000; //Amount will be based on Toman  - Required
	$Description = 'توضیحات تراکنش تستی';  // Required
	$Email = 'UserEmail@Mail.Com'; // Optional
	$Mobile ='09123456789'; // Optional
	$CallbackURL = 'http://www.m0b.ir/verify.php';  // Required
	
	
	// URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl
	$client = new SoapClient('https://de.zarinpal.com/pg/services/WebGate/wsdl', array('encoding' => 'UTF-8')); 
	
	$result = $client->PaymentRequest(
						array(
								'MerchantID' 	=> $MerchantID,
								'Amount' 		=> $Amount,
								'Description' 	=> $Description,
								'Email' 		=> $Email,
								'Mobile' 		=> $Mobile,
								'CallbackURL' 	=> $CallbackURL
							)
	);
	
	//Redirect to URL You can do it also by creating a form
	if($result->Status == 100)
	{
		Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
	} else {
		echo'ERR: '.$result->Status;
	}
?>
