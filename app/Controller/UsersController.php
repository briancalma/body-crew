<?php
App::uses('AppController', 'Controller');
# App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
/**
 * Users Controller
 */
class UsersController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
	
    public function beforeFilter() 
    {
        parent::beforeFilter();
        
        $this->Auth->allow('signup','logout');
    }
    
    private function _checkIfAlreadyLoginned()
    {
        # Checks if the user is already loginned 
        # If so then this action will redirect the user to the
        # Dashboard / Main Page
        
        if( !empty( $this->Auth->user() ) )
        {
            return $this->redirect( $this->Auth->redirectUrl() );
        }
    }
    
    public function login()
    {
        if( $this->request->is('post') ) 
        {
            if( $this->Auth->login() ) 
            {
                # debug($this->Auth->user());   
                # debug($this->Auth->redirectUrl());
                
                if( empty($this->Auth->user('firstname')) || empty($this->Auth->user('lastname')) )
                    return $this->redirect(['action' => 'edit_profile']);
                else     
                    return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Username or Password is incorrect!'));
        }
    }
        
    public function logout()
    {
        $token = $this->Session->read('UserToken');
        
        $this->loadModel('Token');
        
        if( !empty($token) )
        {
            $this->Token->deleteAll(['Token.token' => $token],false);
        }
        
        return $this->redirect($this->Auth->logout());
    }
    
    public function signup()
    {
        $this->_checkIfAlreadyLoginned();
        
        if( $this->request->is('post') )
        {
            $username = $this->request->data['User']['username'];
            
            $email = $this->request->data['User']['emailaddress'];
            
            $password = $this->request->data['User']['password'];
            
            $emailExist = $this->_checkIfEmailExist( $email );
            
            $usernameExist = $this->_checkIfUsernameExist( $username );
            
            $isPasswordMatch = $password ===  $this->request->data['User']['passwordb'];
            
            if(!$isPasswordMatch)
                $this->Flash->error(__('Password field did not match!'));
            
            if( !$emailExist && !$usernameExist && $isPasswordMatch )
            {
                if( $this->User->save($this->request->data) )
                {
                    # TODO 
                    # 1. Send an email to the user account for account confirmation.
                    # 2. Show Email Confirmation Page.       
                    
                    $this->Flash->success(__('Account Successfully Created! You can now login'));
                    return $this->redirect(['action' => 'login']);
                }
            }
        }
    }
    
    private function _checkIfEmailExist( $email )
    {
        $count = $this->User->find( 'count', ['conditions' => ['User.emailaddress' => $email]] );
        
        if( $count > 0 )
        {
            $this->Flash->error(__('Email already exist!'));
            return true;
        }
        
        return false;
    }
    
    private function _checkIfUsernameExist( $username )
    {
        $count = $this->User->find( 'count', ['conditions' => ['User.username' => $username]] );
        
        if( $count > 0 )
        {
            $this->Flash->error(__('Username already exist!'));
            return true;
        }   
        
        return false;
    }
    
    public function my_profile() 
    {
        $this->layout = 'Users/my_profile';   

        $this->set('data', $this->User->findById($this->Auth->user('id')));
    }
    
    public function edit_profile($id = null)
    {
        if( empty($id) ) $id = $this->Auth->user('id');
        
        if( empty($this->request->data ) )
        {
            $this->request->data = $this->User->findById($id);    
        }
        else 
        {
            if( $this->request->is(['post','put']) )
            {
                $this->User->id = $id;
                
                if( $this->User->save($this->request->data) )
                {
                    # $this->Auth->login( $this->request->data );
                    
                    $this->Flash->success(__('Updating Profile Success!'));
                    
                    $this->redirect(['action' => 'my_profile']);
                }
                
                $this->Flash->error(__('Error in Updating Profile!'));
            }
        }
        
        $this->set('prefectures',$this->User->Prefecture->find('list'));
        $this->set('bodyTypes',$this->User->BodyType->find('list'));
        $this->set('bloodTypes',$this->User->BloodType->find('list'));
        
        // debug($this->User->Prefecture->find('list'));
        // debug($this->User->BodyType->find('list'));
        // debug($this->User->BloodType->find('list'));
        // exit();
    }
    
    public function change_password($token = null)
    {
        if( empty($token) )
        {
            $token = $this->Auth->user('reset_token');
            
            if( empty($token) )
            {
                $prefix = md5('bodycrew'); 
                $token = uniqid($prefix,true);
                
                $this->User->read(null,$this->Auth->user('id'));
                $this->User->set('reset_token',$token);
                
                $this->User->save(); 
               
                # echo "Inserting New Token And Is Updated";
            }
            
            # TODO : Send Email With corresponding link
            
            $this->set('token',$token); 
            $this->render('change_password_helper');   
        }
        else 
        {
            if( $this->request->is('post') )
            {
                $newPassword = $this->request->data['User']['newPassword'];
                $confirmPassword = $this->request->data['User']['confirmPassword'];
                
                if( $newPassword != $confirmPassword )
                {
                    $this->Flash->error(__('Error Your New Password and Confirmation Password Did not match!'));
                }
                else 
                {
                    $this->User->read(null,$this->Auth->user('id'));
                    $this->User->set(['reset_token' => '','password' => $newPassword]);
                     
                    if($this->User->save()) 
                    {
                        $this->Flash->success(__('Your Password is been updated!')); 
                        return $this->redirect($this->Auth->logout());
                    }
                     
                    $this->Flash->error(__('ERROR IN UPDATING PASSWOR'));   
                }
                    
            }
        }
    }
    
}
