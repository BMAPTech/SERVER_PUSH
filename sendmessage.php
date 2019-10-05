<?php
function sendPushNotification( $to = '', $data = array() ){
	$apiKey = 'AIzaSyBOzTmcqUufrXNA14N_rW2VYipW1MqVhqw';
	$fields = array( 'to' => $to, 'notification' => $data );
	
	$headers = array( 'Authorization: key='.$apiKey, 'Content-Type: application/json');
	
	$url = 'https://fcm.googleapis.com/fcm/send';
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFERS, true);
	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);
	curl_close($ch);
	return json_encode($result, true);
	
}

$to = 'AAAA2Mz0H7M:APA91bEe8jp08yEJ6R5YKaAQtaPUOx8eNDBtMJ2WN_a_8ZI4t1QVuZql0oDnYNvrt_vYLbha3khvCvOWewNMrRt8faeKIcDqdRdX83_76SwawOQHCIk1UIuybLerfibrThRtICCSZJF-';
$data = array(
	'title' => 'ini test title',
	'body' => 'New message'
);
print_r(sendPushNotification( $to, $data));
?>