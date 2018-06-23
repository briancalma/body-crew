<?php
App::uses('AppController', 'Controller');
# App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
/**
 * Users Controller
 */
class UsersController extends AppController {

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
            # Checks if the username and password is correct
            if( $this->Auth->login() ) 
            {
                # if username and password is correct
                # checks if the user did not fillup his/her basic information
                # if so then this will redirect the user to the edit_profile page
                # else redirect the user to the main_profile page
    
                if( empty($this->Auth->user('firstname')) || empty($this->Auth->user('lastname')) )
                    return $this->redirect(['action' => 'edit_profile']);
                else     
                    return $this->redirect($this->Auth->redirectUrl());
            }
            
            # display and error message
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
            # Getting of Form data
            $username = $this->request->data['User']['username'];
            $email = $this->request->data['User']['emailaddress'];
            $password = $this->request->data['User']['password'];
            
            # Validations and checking
            $emailExist = $this->_checkIfEmailExist( $email );
            $usernameExist = $this->_checkIfUsernameExist( $username );
            $isPasswordMatch = $password ===  $this->request->data['User']['passwordb'];
            $isValidRole = $this->request->data['User']['role'] == 'student' || $this->request->data['User']['role'] == 'trainer' ? true : false;
            
            if(!$isPasswordMatch)
                $this->Flash->error(__('Password field did not match!'));
            
            if(!$isValidRole)
                $this->Flash->error(__('Invalid Account type please specify a valid account type!'));
            
            if( !$emailExist && !$usernameExist && $isPasswordMatch  && $isValidRole)
            {
                # If all the validations is satisfied then save the data
                if( $this->User->save($this->request->data) )
                {
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
        # Change Password Parts
        # 1. Rendering a View that depends upon the value of the token 
        #    - if the value of token is empty this will render the change password helper
        #    - else it will render the default change_password view    
        # 2. Generation of TOKEN if token variable is empty
        #   - generate a unique id from the hash 'bodycrew' string
        #   - save the token to the reset_token field
        # 3. Change Password Form Submit
        #   - save the new password after some validations
        #   - delete the reset key
        
        if( empty($token) )
        {
            $token = $this->Auth->user('reset_token');
            
            if( empty($token) )
            {
                # RESET Token Generation
                $prefix = md5('bodycrew'); 
                $token = uniqid($prefix,true);
                
                # Saving of reset token
                $this->User->read(null,$this->Auth->user('id'));
                $this->User->set('reset_token',$token);
                $this->User->save(); 
            }
            
            # TODO : Send Email With corresponding link
            $this->set('token',$token); 
            $this->render('change_password_helper');   
        }
        else 
        {
            if( $this->request->is('post') )
            {
                # Getting of Form Data
                $newPassword = $this->request->data['User']['newPassword'];
                $confirmPassword = $this->request->data['User']['confirmPassword'];
                
                # Simple Validation Check
                if( $newPassword != $confirmPassword )
                {
                    $this->Flash->error(__('Error Your New Password and Confirmation Password Did not match!'));
                }
                else 
                {
                    # Saving of the new password and deleting the reset token
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
    
    public function change_profile_pic()
    {
        $filename = $this->User->find('first',['conditions' => ['User.id' => $this->Auth->user('id')], 'fields' => 'User.profileimgpath']);
     
        if($this->request->is('post'))
        {
            $data = $this->request->data;
            $photo_data = $data['User']['photo'];
            
            $filename = basename($photo_data['name']);
            $upload_folder = WWW_ROOT.'img';
            $filename = time()."_".$filename;
            $upload_path = $upload_folder.DS.$filename;
            
            if(move_uploaded_file( $photo_data['tmp_name'],$upload_path ))
            {
                $this->User->read(null,$this->Auth->user('id'));
                $this->User->set('profileimgpath',$filename);
                $this->User->save();
                
                $this->Flash->success(__('SUCCESS IN UPDATING PROFILE PICTURE'));
                return $this->redirect(['action' => 'my_profile']);
            }
            else 
            {
                $this->Flash->error(__('ERROR IN UPDATING PROFILE PICTURE'));
            }
        }
        
        if(!empty($filename['User']['profileimgpath']))
            $this->set('profile_pic',$filename['User']['profileimgpath']);
    }
}
