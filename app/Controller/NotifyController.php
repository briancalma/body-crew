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
      
		$this->loadModel('Token');
		
		exit();
    }
	
}