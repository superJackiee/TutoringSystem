<?php
// Secure - this will fail when an invalid HTTPS certificate is returned.
// Such failure is not normal and most likely means there is something
// in-between you and TransferWise, intercepting communications.
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_URL, 'https://api.transferwise.com');


// Insecure - do not do this. This will not validate certificates and
// might leak your access token to an attacker.
// See https://curl.haxx.se/libcurl/c/CURLOPT_SSL_VERIFYPEER.html
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_URL, 'https://api.transferwise.com');


?>
