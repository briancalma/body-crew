<?php $this->start('header'); ?>
    <table>
        <tr>
            <td><?= $this->Html->image('default_user.png',['style' => 'width:100px;height:100px;']); ?></td>
            <td>
                <ul style="list-style-type:none;">
                    <li><b>Username</b>  : <?= ucfirst( $auth->user('username') );?></li>
                    <li><b>Firstname</b> : <?= ucfirst( $data['firstname'] );?></li>
                    <li><b>Lastname</b>  : <?= ucfirst( $data['lastname'] );?></li>
                    <li><b>Age</b>       : <?php 
                                                $temp = explode('-',$data['birthdate']);
                                                $year = $temp[0];
                                                echo date("Y") - (int)$year;
                                           ?>
                    </li>
                    <li><b>Birthday</b>  : <?= $data['birthdate'];?></li>
                </ul>
            </td>
        </tr>
    </table>
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
    ?>
<?php $this->end(); ?>


<?php $this->start('basic_information');?>
     <br><br>
     <h1><b>Basic Information</b></h1>
     <ul style="list-style-type:none;">
         <li><b>Prefecture :</b> <?= $data['perfecture'];?></li>
         <li><b>City : </b> <?= $data['city'];?></li>
         <li><b>Address 1 :</b> <?= $data['address1'];?></li>
         <li><b>Address 2 : </b><?= $data['address2'];?></li>
         <li><b>Body Type : </b><?= $data['body_type'];?></li>
         <li><b>Blood Type :</b> <?= $data['bloodtype'];?></li>
         <li><b>Body Fats : </b><?= $data['bodyfat'];?></li>
         <li><b>Body Weight :</b><?= $data['body_weight'];?></li>
     </ul>
     <br><br>
<?php $this->end();?>

<?php $this->start('introduction');?>
     <h1><b>Introduction!</b></h1>
     <p><?= $data['intro']; ?></p>
<?php $this->end();?>


<?php $this->start('rating_section');?>
     <h1><b>Trainers Rating Section</b></h1> 
<?php $this->end();?>
