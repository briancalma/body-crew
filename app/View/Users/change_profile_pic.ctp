<h3>Current Profile Picture</h3>
<?php
    if(empty($profile_pic)) $profile_pic = 'default_user.png';
    
    
    echo $this->Html->image($profile_pic,['style' => 'width:100px;height:100px;']); 
?>
<?php 
    echo $this->Form->create('User', ['type' => 'file']);
    echo $this->Form->input('photo',[
        'between' => '<br />',
        'type' => 'file'
    ]);
    
    echo $this->Form->end('Submit');
    echo $this->Html->link('Back',['action' => 'my_profile']);
?>