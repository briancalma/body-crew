<?php $this->start('header'); ?>
    <table>
        <tr>
            <td><?= $this->Html->image('default_user.png',['style' => 'width:100px;height:100px;']); ?></td>
            <td>
                <ul style="list-style-type:none;">
                    <li><b>Username</b>  : <?= ucfirst( $auth->user('username') );?></li>
                    <li><b>Firstname</b> : <?= ucfirst( $auth->user('firstname') );?></li>
                    <li><b>Lastname</b>  : <?= ucfirst( $auth->user('lastname') );?></li>
                    <li><b>Age</b>       : <?php 
                                                $temp = explode('-',$auth->user('birthdate'));
                                                $year = $temp[0];
                                                echo date("Y") - (int)$year;
                                           ?>
                    </li>
                    <li><b>Birthday</b>  : <?= $auth->user('birthdate');?></li>
                </ul>
            </td>
        </tr>
    </table>
    <?php 
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
         <li><b>Prefecture :</b> </li>
         <li><b>City : </b> <?= $auth->user('city');?></li>
         <li><b>Address 1 :</b> <?= $auth->user('address1');?></li>
         <li><b>Address 2 : </b><?= $auth->user('address2');?></li>
         <li><b>Body Type : </b></li>
         <li><b>Blood Type :</b> <?= $auth->user('bloodtype');?></li>
         <li><b>Body Fats : </b><?= $auth->user('bodyfat');?></li>
         <li><b>Body Weight : </b></li>
     </ul>
     <br><br>
<?php $this->end();?>

<?php $this->start('introduction');?>
     <h1><b>Introduction!</b></h1>
     <p><?= $auth->user('intro')?></p>
<?php $this->end();?>


<?php $this->start('rating_section');?>
     <h1><b>Trainers Rating Section</b></h1> 
<?php $this->end();?>