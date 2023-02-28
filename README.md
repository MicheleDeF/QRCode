# QRCode
### Generate a qr code with php and Google Charts Infographics


## Quick Start

```sh
git clone https://github.com/MicheleDeF/QRCode.git
cd QRCode
composer dump-autoload
php -S localhost:8000
```

## Install via Composer
```sh
composer require micheledef/qr-code-php
```

## Example of use

```sh
<?php

require 'vendor/autoload.php';

use QRCode\QRCode;

$qr = new QRCode();

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
