<?php
$access_token = '7+wBpEvBpTGZvspYENGA1vUXu80YJ0gPpkktFWd1WjdNbL3KRD9V7cjNNdwxF9NH+y4HXVskptlWs75fu9mwe3BU8+NP1W8csdSUImvH+BEm6Qp3gkwfqMs6UpJCCpbyFaYPCfof1dHsmuH3gk/2pQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
