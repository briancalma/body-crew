<?php 
       echo $this->Html->link('Edit My Profile',['action' => 'edit_profile'])."||";
       
       if( $auth->user('role') === 'student' )
       {
         echo $this->Html->link('My Coaches',['action' => 'student']);
       }
       else if( $auth->user('role') === 'trainer' )
       {
         echo $this->Html->link('My Students',['action' => 'coach']);
       }
                   
       echo "||".$this->Html->link('Change Password',['action' => 'change_password']);
?>