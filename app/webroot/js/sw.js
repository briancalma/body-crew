importScripts("https://www.gstatic.com/firebasejs/5.0.4/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/5.0.4/firebase-messaging.js");

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

var target_url = '';

messaging.setBackgroundMessageHandler( function(payload) {
    
    console.log('[SERVICE WORKER] : ',payload);
    
    var notificationTitle = payload.data.title;
    
    var notificationOption = {
                            "body" : payload.data.body,
                            "icon" : payload.data.icon,
                            "click_action" : payload.data.click_action
                       };
    target_url = payload.data.click_action;                
                       
    return self.registration.showNotification(notificationTitle,notificationOption);
        
}); 


self.addEventListener('notificationclick',function(event) {
   console.log('CLICK EVENT OCCURED!');
   
   event.notification.close();
   
   event.waitUntil( clients.openWindow(target_url) );
});