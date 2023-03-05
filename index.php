<?php 
require 'vendor/autoload.php';

use Micheledef\QrCodePhp\QRCode;

$qr = new QRCode();

$code = "Hello World";

$qrGet = $qr->getQrCode($code, 177, 177, "UTF-8", "H");

$qrPost = $qr->postQrCode($code, 177, 177, "UTF-8", "H");

?>

<!-- QR code generated with GET request -->
<img src="<?=$qrGet;?>" />

<!-- QR code generated with POST request-->
<img src="<?=$qrPost?>" />

