<?php 
     $this->start('header'); 
     echo $this->element('user_personal_information');     
     echo $this->element('user_action_links');
     $this->end();
    
     $this->start('basic_information');
     echo $this->element('user_basic_information');   
     $this->end();
    
     $this->start('introduction');
     echo $this->element('user_introduction');
     $this->end();
    
     $this->start('rating_section');
     echo $this->element('user_trainer_rating_section');         
     $this->end();
     
     $this->start('script_part');
     echo $this->element('script_service_worker_section');
     $this->end();
?>	