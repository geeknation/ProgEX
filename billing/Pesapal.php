<?php

class Pesapal {

	// private $firstName;
	// private $secondName;
	// private $description;
	// private $ref;
	// private $eml;
	// private $phonenumber;
	// private $typ;
	// private $amount;

	function __construct($firstName, $secondName, $description, $ref, $eml, $phone, $typ, $amount) {
		
		include_once ('OAuth.php');
		$token = $params = NULL;
		
		
		$consumer_key = "KuFE5qT3x/45T4IVQJ0euruVki6d94D/";
		$consumer_secret = "zdUioLYUnGEssKyXA70ts43xi8w=";
		
		$signature_method = new OAuthSignatureMethod_HMAC_SHA1();
		
		/*
		//change to https://www.pesapal.com/API/PostPesapalDirectOrderV4 when you are ready to go live!
				$consumer_key = "hNWnMkn0GVBnyBxaH0NLc+YsbcJ9GjgF";
				$consumer_secret = "HwOgds6akQeZxgbXwulVUS3+Qt0=";*/
		
		$iframelink = 'http://demo.pesapal.com/api/PostPesapalDirectOrderV4';

		$amount = $amount;
		$amount = number_format($amount, 2);
		$desc = $description;
		$type = $typ;
		$reference = $ref;
		$first_name = $firstName;
		$last_name = $secondName;
		$email = $eml;
		$phonenumber = $phone;

		$callback_url = 'payment.php';

		$post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"" . $amount . "\" Description=\"" . $desc . "\" Type=\"" . $type . "\" Reference=\"" . $reference . "\" FirstName=\"" . $first_name . "\" LastName=\"" . $last_name . "\" Email=\"" . $email . "\" PhoneNumber=\"" . $phonenumber . "\" xmlns=\"http://www.pesapal.com\" />";
		$post_xml = htmlentities($post_xml);

		$consumer = new OAuthConsumer($consumer_key, $consumer_secret);

		//post transaction to pesapal
		$iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
		$iframe_src -> set_parameter("oauth_callback", $callback_url);
		$iframe_src -> set_parameter("pesapal_request_data", $post_xml);
		$iframe_src -> sign_request($signature_method, $consumer, $token);

		echo '
			<iframe src="'.$iframe_src.'" width="100%" height="620px"  scrolling="no" frameBorder="0"> 
				<p>Browser unable to load iFrame</p>
			</iframe>
		';

	}

}

// new Pesapal();
?>