var socket = io.connect( 'http://localhost:8080' );

$( "#messageForm" ).submit( function() {
	var nameVal    = $( "#nameInput" ).val();
	var msg        = $( "#messageInput" ).val();
	var usuario    = $( "#usuario" ).val();
	var nombreUser = $("#usuario option:selected").text();
	var estado     = 1;
	
	socket.emit( 'message', { name: nameVal, message: msg, usuario:nombreUser } );
	
	// Ajax call for saving datas
	$.ajax({
		url: "./ajax/insertNewMessage.php?data=1",
		type: "POST",
		dataType:"json",
		data: { tarea: nameVal, comentario: msg, user:usuario,estado:estado,nombreUser:nombreUser },
		success: function(data) {
			// console.log(data);
		
			socket.emit( 'notification', { idUser: data[0].user, notification: data[0].estados,tarea:data[0].tarea,comentario:data[0].comentario,nombrUser:data[0].Nombre } );
		}
	});
	
	return false;
});

socket.on( 'message', function( data ) {
	var actualContent = $( "#messages" ).html();
	var newMsgContent = '<li> <strong>' + data.name + '</strong> : ' + data.message + ' <b>Para:</b> '+data.usuario+'</li>';
	var content = newMsgContent + actualContent;
	
	$( "#messages" ).html( content );
});
socket.on( 'notification', function( data ) {
	var actualuser = $( ".notification" ).attr("data-cliente");
	if(actualuser==data.user)
	{
		
		$( ".notification" ).html(data.notifications);
		notifyMe(data.comentario,'https://pickaface.net/assets/images/slides/slide2.png',data.nombrUser,data.comentario);
	}
	
	
});
function notifyMe(theBody,theIcon,theTitle,theText) {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
   notiIE(theIcon,theTitle,theText);
  }

  // Let's check whether notification permissions have already been granted
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    spawnNotification(theBody,theIcon,theTitle);
  }

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        var notification = new Notification("Hi there!");
      }
    });
  }

  // At last, if the user has denied notifications, and you 
  // want to be respectful there is no need to bother them any more.
}Notification.requestPermission().then(function(result) {
  console.log(result);
});
function spawnNotification(theBody,theIcon,theTitle) {
  var options = {
      body: theBody,
      icon: theIcon
  }
  var n = new Notification(theTitle,options);
}

function notiIE(image,theTitle,theText)
{
	   $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: theTitle,
                // (string | mandatory) the text inside the notification
                text:theText,
                // (string | optional) the image to display on the left
                image: image,
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (function) before the gritter notice is opened
                before_open: function(){
                    if($('.gritter-item-wrapper').length == 3)
                    {
                        // Returning false prevents a new gritter from opening
                        return false;
                    }
                }
		});
}