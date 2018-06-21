<?php
App::uses('AppController', 'Controller');

class NotifyController extends AppController 
{
                            
    public function beforeFilter() 
    {
        $this->Auth->allow('push');
        
        # $this->set('auth',$this->Auth);
    }
    
    public function push($title = null,$body = null)
    {
    
		define('SERVER_API_KEY', 'AAAAXFELzjY:APA91bFhUDAJCHXPA7ayb0Y9xSyOe6K6uZbOwg4zbOeeMvkn3DQXnhfyn2Ja1s7VGIIMj9spSb8krkkDaj8Fi5xLauH0jtzIQcGQ3giDIFCTUuSnjJgMg1ppQorMx6pHLgxW3li1qhnuTm4mIuWzACJ-JGj3N-a_Fg');

		# $title = $title;
        
        $token_list = ['dWU9cirOa_0:APA91bHGTlVnd42890A8QGWd1LT6jhqskSt4ycTQe7DZ3TsQTj3gx1jWXWjXxac2UhSvaaeeJulygfLTiO8_V_7-d6jmI0zslnD9IT9aBxTyhWW6RTKnRJroShG2T_uczEFJaK-EOjel'];
        
		# $body = $body;

		$headers = [
					'Authorization : Key='.SERVER_API_KEY,
					'Content-Type: application/json'
			   	   ];	
 		
		$msg = [
				"title" => $title,
			    "body" =>  $body,
			    "icon" => "https://push.blobby.xyz/pushpanda/img/arguslogo1.png",
			    "image" => "https://push.blobby.xyz/pushpanda/img/arguslogo1.png",
			    "click_action" => 'https://bodycrew.blobby.xyz/users/my_profile'
	   		   ];

	   	$payload = [
					   'registration_ids' => $token_list,
					   //'to' => $token,
					   'data' => $msg
		   		   ];

		
		# CURL COMMANDS
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($payload),
		  CURLOPT_HTTPHEADER => $headers,
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		  // header("location:notifier.php");
		}


		exit();
    }
	
}