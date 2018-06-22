<?php 
App::uses('Component', 'Controller');

class PushComponent extends Component 
{
   public function send($sender = null,$recievers = [], $data = []) 
   {
       define('SERVER_API_KEY', 'AAAAXFELzjY:APA91bFhUDAJCHXPA7ayb0Y9xSyOe6K6uZbOwg4zbOeeMvkn3DQXnhfyn2Ja1s7VGIIMj9spSb8krkkDaj8Fi5xLauH0jtzIQcGQ3giDIFCTUuSnjJgMg1ppQorMx6pHLgxW3li1qhnuTm4mIuWzACJ-JGj3N-a_Fg');
       
       $headers = [
					'Authorization : Key='.SERVER_API_KEY,
					'Content-Type: application/json'
			   	   ];	
 		
	   $msg = [
        			"title" => $data['title'],
        		    "body" =>  $data['body'],
        		    "icon" => $data['icon'],
        		    // "image" => $dat['image'],
        		    "click_action" => $data['click_action']
   		      ];

	   $payload = [
					   'registration_ids' => $recievers,
					   //'to' => $token,
					   'data' => $msg
		  		  ];
	   
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


		// exit();
   }
}