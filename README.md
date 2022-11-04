# QRCode
### Generate a qr code with php and chart apis google

## Example of use

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

## Also read the related official documentation
- [QR Code Googlw Api][df1]

[df1]: <https://developers.google.com/chart/infographics/docs/qr_codes>
