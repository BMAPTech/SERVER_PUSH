<?php 
function send_notification ($tokens, $message)
{
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
         'registration_ids' => $tokens,
         'data' => $message

        );
    $headers = array(
        'Authorization:key = AIzaSyBOzTmcqUufrXNA14N_rW2VYipW1MqVhqw',
        'Content-Type: application/json'
        );
   $ch = curl_init(); 
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
   $result = curl_exec($ch);           
   if ($result === FALSE) {
       die('Curl failed: ' . curl_error($ch));
   }
   curl_close($ch);
   return $result;
}

$tokens[] = 'AAAA2Mz0H7M:APA91bEe8jp08yEJ6R5YKaAQtaPUOx8eNDBtMJ2WN_a_8ZI4t1QVuZql0oDnYNvrt_vYLbha3khvCvOWewNMrRt8faeKIcDqdRdX83_76SwawOQHCIk1UIuybLerfibrThRtICCSZJF-';
$message = array("message" => " FCM PUSH NOTIFICATION TEST MESSAGE");
$message_status = send_notification($tokens, $message);
echo $message_status;
?>