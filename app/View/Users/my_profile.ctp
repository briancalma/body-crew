<?php $this->start('header'); ?>
    <table>
        <tr>
            <td>
                <?php 
                    echo $this->Html->image($data['User']['profileimgpath'],['style' => 'width:100px;height:100px;']); 
                    echo "<br>".$this->Html->link('Change Profile Picture',['action' => 'change_profile_pic']);
                ?>
            </td>
            <td>
                <ul style="list-style-type:none;">
                    <li><b>Username</b>  : <?= ucfirst( $auth->user('username') );?></li>
                    <li><b>Firstname</b> : <?= ucfirst( $data['User']['firstname'] );?></li>
                    <li><b>Lastname</b>  : <?= ucfirst( $data['User']['lastname'] );?></li>
                    <li><b>Age</b>       : <?php 
                                                $temp = explode('-',$data['User']['birthdate']);
                                                $year = $temp[0];
                                                echo date("Y") - (int)$year;
                                           ?>
                    </li>
                    <li><b>Birthday</b>  : <?= $data['User']['birthdate'];?></li>
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
                       
           echo "||".$this->Html->link('Change Password',['action' => 'change_password']);
    ?>
<?php $this->end(); ?>

<?php $this->start('basic_information');?>
     <br><br>
     <h1><b>Basic Information</b></h1>
     <ul style="list-style-type:none;">
         <li><b>Prefecture :</b> <?= $data['Prefecture']['name'];?></li>
         <li><b>City : </b> <?= $data['User']['city'];?></li>
         <li><b>Address 1 :</b> <?= $data['User']['address1'];?></li>
         <li><b>Address 2 : </b><?= $data['User']['address2'];?></li>
         <li><b>Body Type : </b><?= $data['BodyType']['name'];?></li>
         <li><b>Blood Type :</b> <?= $data['BloodType']['name'];?></li>
         <li><b>Body Fats : </b><?= $data['User']['bodyfat'];?></li>
         <li><b>Body Weight :</b><?= $data['User']['body_weight'];?></li>
     </ul>
     <br><br>
<?php $this->end();?>

<?php $this->start('introduction');?>
     <h1><b>Introduction!</b></h1>
     <p><?= $data['User']['intro']; ?></p>
<?php $this->end();?>


<?php $this->start('rating_section');?>
     <h1><b>Trainers Rating Section</b></h1> 
<?php $this->end();?>

<?php $this->start('script_part'); ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<script>
	  // Initialize Firebase
	  var config = {
					    apiKey: "AIzaSyBKlEj6S9D1wTBfmCikEl-vCms6nDDvDNY",
					    authDomain: "bodycrew-37077.firebaseapp.com",
					    databaseURL: "https://bodycrew-37077.firebaseio.com",
					    projectId: "bodycrew-37077",
					    storageBucket: "bodycrew-37077.appspot.com",
					    messagingSenderId: "396496719414"
				   };
	  
	  firebase.initializeApp(config);

	  const messaging = firebase.messaging();
	  
	  if('serviceWorker' in navigator) 
	  {
	       var ext = Date.now();
	       
	       navigator.serviceWorker.register('/js/sw.js?v=' + ext)
	       .then(function(swReg){
	           console.log('[SERVICE WORKER] is successfully registered');
	           console.log(swReg);
	   
	           messaging.useServiceWorker(swReg);
	           
	           messaging.requestPermission()
	           .then(function(){
	               console.log('[PUSH NOTIFICATION] is granted');
	               return messaging.getToken();
	           })
	           .then(function(token){
	               console.log('[TOKEN] ' + token);
	               
	               // token = encodeURI(token);
	              dataString = 'token=' + token + "&user_id=" + "<?php echo $auth->user('id')?>";
	               
                    $.ajax({
                                type : 'POST',
                                url : "/tokens/save_token",
                                data : dataString,
                                success : function(data) {
                                   
                                    // data = JSON.parse(data);
                                    console.log(data);
                                }
                           }); 
	           })
	           .catch(function(err) {
	               console.log('[Error] ' + err);
	           })
	       })
	       
      }
      
      
      messaging.onMessage(function(payload) {
        console.log('[onMessage] : ',payload); 
        // alert('Someone send you a message!');
        
        // var notifTitle = payload.data.title;
        // var notifOptions = {
        //                         "body" : "From ONSITE " +payload.data.body,
        //                         "icon" : payload.data.icon,
        //                         "click_action" : payload.data.click_action
        //                   };
                           
        // // console.log(payload.data.click_action);
        
        // var notif = new Notification(notifTitle,notifOptions);
        
      });
	  
</script>
<?php $this->end();?>	