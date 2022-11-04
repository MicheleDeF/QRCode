# QRCode
generare un qr code con php e chart apis google

## Example

```sh
<?php

require 'QRcode.php';

$qr = new QR();

$code = "Hello World";

$qrGet = $qr->getQrCode($code, 177, 177, "UTF-8", "H");

$qrPost = $qr->postQrCode($code, 177, 177, "UTF-8", "H");

?>

<!-- QR Code con GET -->
<img src="<?=$qrGet;?>" />

<!-- QR Code con POST-->
<img src="<?='data:image/png;base64,' . base64_encode($qrPost)?>" />

```
