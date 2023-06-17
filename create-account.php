<?php

$url = 'https://admin.flappyaffiliates.com/feeds.php?FEED_ID=26';

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $_POST);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERPWD, "api_flappy:^6gGygf65I");

$response = curl_exec($curl);

if (!$response) {
    echo 'Error. Please contact your affiliate manager!';
} else {
    $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);

    if ($array['INIT']['@attributes']['ERROR_COUNT'] == 0) {
        echo 'ok';
    } else {
        if (isset($array['INIT']['ERROR'][0]['MSG'])) {
            echo $array['INIT']['ERROR'][0]['MSG'];
        } else {
            echo $array['INIT']['ERROR']['MSG'];
        }
    }
}

curl_close($curl);
