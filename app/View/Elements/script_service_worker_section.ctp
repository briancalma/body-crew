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
