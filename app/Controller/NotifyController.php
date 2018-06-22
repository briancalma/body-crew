<?php
App::uses('AppController', 'Controller');

class NotifyController extends AppController 
{
                            
    public function beforeFilter() 
    {
        $this->Auth->allow('push');
        
        # $this->set('auth',$this->Auth);
    }
    
    public function push($title = null,$body = null,$reciever_id = null)
    {
        # CURL COMMAND 
	
		// define('SERVER_API_KEY', 'AAAAXFELzjY:APA91bFhUDAJCHXPA7ayb0Y9xSyOe6K6uZbOwg4zbOeeMvkn3DQXnhfyn2Ja1s7VGIIMj9spSb8krkkDaj8Fi5xLauH0jtzIQcGQ3giDIFCTUuSnjJgMg1ppQorMx6pHLgxW3li1qhnuTm4mIuWzACJ-JGj3N-a_Fg');

		$this->loadModel('Token');
		
		
		$tokens= $this->Token->find('list',['fields' => ['Token.token']],['conditions' => ['Token.user_id' => $reciever_id]]);
		
		$token_list = [];
	    
		foreach($tokens as $token)
		{
		   array_push($token_list,$token);
		}
		
		$data = [
					'title' => 'Title :)',
					'body'  => 'This is a content right here!',
					'icon'  => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToe-PSAektDgBsXLsdybQW6F1wGDdpw2mbm3SaReRPuQ0ec0ns',
					'click_action' => 'https://bodycrew.blobby.xyz/my_profile'
			    ]; 
		
		$this->Push->send('Brian',$token_list,$data);
	
		// $headers = [
		// 			'Authorization : Key='.SERVER_API_KEY,
		// 			'Content-Type: application/json'
		// 	   	   ];	
 		
		// $msg = [
		// 		"title" => $title,
		// 	    "body" =>  $body,
		// 	    "icon" => "https://push.blobby.xyz/pushpanda/img/arguslogo1.png",
		// 	    "image" => "https://push.blobby.xyz/pushpanda/img/arguslogo1.png",
		// 	    "click_action" => 'https://bodycrew.blobby.xyz/users/my_profile'
	 //  		   ];

	 //  	$payload = [
		// 			   'registration_ids' => $token_list,
		// 			   //'to' => $token,
		// 			   'data' => $msg
		//   		   ];

		
		// # CURL COMMANDS
		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		//   CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
		//   CURLOPT_RETURNTRANSFER => true,
		//   CURLOPT_CUSTOMREQUEST => "POST",
		//   CURLOPT_POSTFIELDS => json_encode($payload),
		//   CURLOPT_HTTPHEADER => $headers,
		// ));

		// $response = curl_exec($curl);
		// $err = curl_error($curl);

		// curl_close($curl);

		// if ($err) {
		//   echo "cURL Error #:" . $err;
		// } else {
		//   echo $response;
		//   // header("location:notifier.php");
		// }


		exit();
    }
	
}