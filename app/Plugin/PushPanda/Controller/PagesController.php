<?php
App::uses('PushPandaAppController', 'PushPanda.Controller');
/**
 * Pages Controller
 */
class PagesController extends PushPandaAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	# public $scaffold;
    
    public function index()
    {
        $this->layout = 'Pages/main_layout';
        
        $this->loadModel('Token');
        $this->loadModel('User');
        
        $subscribers = $this->User->find('list',['fields' => ['User.username']]);
        
        # debug($users);
        
        if( $this->request->is('post') )
        {
            # debug( $this->request->data );
            
            $title = $this->request->data['Push']['title'];
            $body = $this->request->data['Push']['content'];
            $landing_url = $this->request->data['Push']['landingPage'];
            $subscribers = $this->request->data['Push']['subscribers'];
            $token_list = [];
            
            $icon = $this->request->data['Push']['icon'];
            $image = $this->request->data['Push']['image'];
            
            # debug($icon);
            # debug($image);
            
            $icon = $this->store_image( $icon );
            $image = $this->store_image( $image );
            
            # echo $icon;
    
            # Retrieving of the Tokens
            foreach ($subscribers as $id) 
            {
                # Get all possible tokens 
                $tokens = $this->Token->find('list',['conditions' => ['user_id' => $id],'fields' => ['Token.token']]);
                
                if(!empty($tokens))
                {
                    foreach($tokens as $token) 
                    { 
                        array_push($token_list,$token); 
                    }
                }
            }
            
             $data = [
            			"title" => $title,
            		    "body" => $body,
            		    "icon" => $icon,
            		    "image" => $image,
            		    "click_action" => $landing_url
   	                 ];
            
            # $data = $this->Push->generate_data($title,$body,$icon,$landing_url);
            
            $this->Push->send($token_list,$data);
        }
        
        $this->set(compact('subscribers'));
    }
    
    public function store_image( $photo_data )
    {
        # Image Type Validation
        if( $photo_data['type'] == 'image/gif' || $photo_data['type'] == 'image/png' || $photo_data['type'] == 'image/jpg' || $photo_data['type'] == 'image/jpeg')
        {
            $filename = basename($photo_data['name']);
            $upload_folder = WWW_ROOT.'img';
            $filename = time()."_".$filename;
            $upload_path = $upload_folder.DS.$filename;
            
            # Uploading the image
            if( move_uploaded_file( $photo_data['tmp_name'],$upload_path ) )
                return "https://bodycrew.blobby.xyz/img/".$filename;
            else 
                return "Error!";
        }
    }
}
