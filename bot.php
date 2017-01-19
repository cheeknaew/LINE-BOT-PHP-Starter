<?php
$access_token = '7+wBpEvBpTGZvspYENGA1vUXu80YJ0gPpkktFWd1WjdNbL3KRD9V7cjNNdwxF9NH+y4HXVskptlWs75fu9mwe3BU8+NP1W8csdSUImvH+BEm6Qp3gkwfqMs6UpJCCpbyFaYPCfof1dHsmuH3gk/2pQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			
			if (strpos($text, 'Earth') !== false){
				$messages = [
					'type' => 'text',
					'text' => "Earth เป็นคนหล่อมากๆ"
				];
			}
			else {
				$messages = [
					'type' => 'text',
					'text' => "I can't lie, i always say the truth"
				];
			}
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
//resource newt_button ( int $left , int $top , string $text );
$form = newt_form();

$ok_button = newt_button(5, 12, "Run Tool");
    
newt_form_add_component($form, $ok_button);

