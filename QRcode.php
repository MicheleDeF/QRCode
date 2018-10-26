<?php

class QRCode {

	
	private static $cht = "qr";

	
	private static $apiurl = "http://chart.apis.google.com/chart";
	
	public function getQrCodeUrl($data,$width,$height,$encoding=false,$correctionLevel=false) {
	
		 $data = urlencode($data);
	
		$url = QRCode::$apiurl . "?cht=". QRCode::$cht
		. "&chl=" . $data
		. "&chs=" . $width . "x" . $height;
	
		if($encoding){
			$url .= "&choe=" . $encoding;
		}
	
		if($correctionLevel){
			$url .= "&chld=" . $correctionLevel;
		}
	
		return $url;
	}
	

	public function getQrCodeData($data,$width,$height,$encoding=false,$correctionLevel=false){
		
		$data = urlencode($data);
	
		
		$parameterList = array(
				'cht' => QRCode::$cht,
				'chs' => $width . "x" . $height,
				'chl' => $data);
	
		
		if($encoding){
			$parameterList['choe'] = $encoding;
		}
	
		if($correctionLevel){
			$parameterList['chld'] = $correctionLevel;
		}
	
		
		$content = http_build_query($parameterList);
	
		
		$context = stream_context_create(array(
				                                'http' => array(
				                                		'method' => 'POST', 
				                                		'header' => "Connection: close\r\n".
                                                                    "Content-Type: application/x-www-form-urlencoded\r\n".
                                                                    "Content-Length: ".strlen($content)."\r\n",
				                                		'content' => $content
				                                           )
				
				                                )
				                       );
	
		
		$fp = fopen(QRCode::$apiurl, 'r', false, $context);
	
		
		$response = stream_get_contents($fp);
	
		return $response;
	}
	
}



$qrcode = new QRCode();


$imgQRCode = '<img src="' . $qrcode->getQrCodeUrl("https://example.com/",177,177,"UTF-8","H") . '" />';
$imgQRCode = htmlentities($imgQRCode);
echo html_entity_decode($imgQRCode);










?>
