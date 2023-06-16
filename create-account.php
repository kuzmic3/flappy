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
    echo 'Error : ' . curl_error($curl);
} else {
    echo $response;
}

curl_close($curl);
