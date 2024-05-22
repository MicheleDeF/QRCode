# QRCode
### Generate a qr code with PHP and Google Charts Infographics


## Quick Start

```sh
git clone https://github.com/MicheleDeF/QRCode.git
cd QRCode
composer dump-autoload
composer run start-example
```

## Install via Composer
```sh
composer require micheledef/qr-code-php
```

## Example of use

```sh
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
```

### Also read the related official documentation
- [QR Code Google Api][df1]

### or read the article on the blog
- [Generare un codice QR con le Api Google Chart e PHP][df2]

[df1]: <https://developers.google.com/chart/infographics/docs/qr_codes>
[df2]: <https://www.ilblogdiunprogrammatore.it/28273-generare-un-codice-qr-con-le-api-google-chart-e-php.html>
