<?php
namespace Micheledef\QrCodePhp;

/**
 * QRCode class
 * 
 * @author Michele De Falco <https://github.com/MicheleDeF>
 * 
 * @license https://github.com/MicheleDeF/QRCode/blob/master/LICENSE.md MIT License
 * 
 * @tutorial https://github.com/MicheleDeF/QRCode
 * 
 * @version v1.0.1
 */

class QRCode
{
    public $cht;    
    public $apiurl;

    public function __construct(){

        $this->cht = "qr";
        $this->apiurl = "https://chart.googleapis.com/chart";
    }
    

    /**
     * getQrCode function
     * 
     * @param mixed $data 
     * 
     * @param int $width
     * 
     * @param int $height
     * 
     * @param string $output_encoding is an optional parameter, it means to encode the data in QR code, UTF-8 is the default value
     * 
     * @param string $error_correction_level is an optional parameter, indicates the level of error correction to allow for recovery of missing, misread, or redacted data, default is L
     * 
     * @return string
     */ 

    public function getQrCode($data, int $width, int $height, $output_encoding = false, $error_correction_level = false)
    {
        $data = urlencode($data);
        
        $url = $this->apiurl . "?cht=" . $this->cht . "&chl=" . $data . "&chs=" . $width . "x" . $height;
        
        if ($output_encoding){
            $url .= "&choe=" . $output_encoding;
        }

        if ($error_correction_level){
            $url .= "&chld=" . $error_correction_level;
        }

        return $url;
    }

   /**
     * postQrCode function
     * 
     * @param mixed $data 
     * 
     * @param int $width
     * 
     * @param int $height
     * 
     * @param string $output_encoding is an optional parameter, it means to encode the data in QR code, UTF-8 is the default value
     * 
     * @param string $error_correction_level is an optional parameter, indicates the level of error correction to allow for recovery of missing, misread, or redacted data, default is L
     * 
     * @return string
     */ 


    public function postQrCode($data, int $width, int $height, $output_encoding = false, $error_correction_level = false)
    {
        $data = urlencode($data);
        
        $parameterList = array(
            'cht' => $this->cht,
            'chs' => $width . "x" . $height,
            'chl' => $data
        );
        
        if ($output_encoding){
            $parameterList['choe'] = $output_encoding;
        }
        
        if ($error_correction_level){
            $parameterList['chld'] = $error_correction_level;
        }
        
        $content = http_build_query($parameterList);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiurl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $content,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $url = "data:image/png;base64," . base64_encode($response);
    
        return $url;
    }


}

