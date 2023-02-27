# QRCode
### Generate a qr code with php and chart apis google

## Example of use

### install via composer, run

```sh
composer require micheledef/qr-code-php
```

```sh

<?php

require 'vendor/autoload.php';

use App\QrcodePhp\QRcode;

$qr = new QRcode();

$code = "Hello World";

$qrGet = $qr->getQrCode($code, 177, 177, "UTF-8", "H");

$qrPost = $qr->postQrCode($code, 177, 177, "UTF-8", "H");

?>

<!-- QR code generated with GET request -->
<img src="<?=$qrGet;?>" />

<!-- QR code generated with POST request-->
<img src="<?='data:image/png;base64,' . base64_encode($qrPost)?>" />

```

## Also read the related official documentation
- [QR Code Google Api][df1]

[df1]: <https://developers.google.com/chart/infographics/docs/qr_codes>
