var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var jwt = require('jsonwebtoken');
require('dotenv').config();
var users = [];
server.listen(8181, function () {
  console.log('listening on http://<localhost:8181></localhost:8181>');
});

app.get('/', function (req, res) {
  res.sendfile(__dirname + '/index.html');
});

// io.on( 'connection', function( client ) {
// 	// console.log( "New client !" );
	
	// client.on( 'message', function( data ) {
	// 	io.sockets.emit( 'message', { name: data.name, message: data.message, usuario: data.usuario } );
	// });
	// client.on( 'notification', function( data ) {
	// 	console.log(data);
	// 	io.sockets.emit( 'notification', data );
	// });
	
// });

function ecnontrarDuplicado(data){
  for (var i = users.length - 1; i >= 0; i--) {
    if(users[i].usuario == data.usuario){
      return true
    }
  }
  return false;
}

function remove(socketId){
  var user_remove = [];
  for (var i = users.length - 1; i >= 0; i--) {
    if(users[i].socket == socketId){
      user_remove = users[i];
      users.splice(i,1);
    }
  }
  return user_remove;
}

function reasignar(data){
  posTrue = -1;
  pofFalse = -1
  for (var i = users.length - 1; i >= 0; i--) {
    if(users[i].usuario == data.usuario){
      if(!users[i].notf){
        pofFalse = i;
      }
      else{
        posTrue = i;
      }
    }
  }
  if(posTrue >= 0){
    users[posTrue].notf = true;
  }
  else if(pofFalse >= 0){
    users[pofFalse].notf = true;
  }
}

function recuperar_usuario(data){
  for (var i = users.length - 1; i >= 0; i--) {
    if(users[i].usuario == data.usuario){
      return true
    }
  }
  return false;
}
function findUsersLog(arrUsuarios){
  var users_data = [];
  for (var i = users.length - 1; i >= 0; i--) {
    for (var y = arrUsuarios.length - 1; y >= 0; y--) {
      if(users[i].usuario == arrUsuarios[y]){
        users_data.push(users[i]);
      }
    }
  }
  return users_data;
}


io.on('connect', function(socket){


	// console.log(socket);

    //temp delete socket from namespace connected map
    delete io.sockets.connected[socket.id];

    var options = {
      secret: process.env.TOKEN_SECRET,
      timeout: 60*60 // 5 seconds to send the authentication message
    }

    var auth_timeout = setTimeout(function () {
      socket.disconnect('unauthorized');
    }, options.timeout || 3600);

    var authenticate = function (data) {
    	// console.log('----',data);
      clearTimeout(auth_timeout);
      jwt.verify(data.token, options.secret, options, function(err, decoded) {
        if (err){
        	console.log('no unauthorized');
          socket.disconnect('unauthorized');
        }
        if (!err && decoded){
          //restore temporarily disabled connection
          io.sockets.connected[socket.id] = socket;

          //Guardar referencia del usuario en variable temp
          tempUser = {usuario : data.user, socket : socket.id, notf : true};
          //buscar que no este repetiada, si si desactivar notf, sino activar notf
          if(ecnontrarDuplicado(tempUser)){
            users.push({usuario : data.user, socket : socket.id, notf : false});

          }else{
            users.push({usuario : data.user, socket : socket.id, notf : true});

          }

          // if(users.indexOf(data.user) >= 0){
          //   //Usuario ya loegueado
          // }
          // else{
          //   users.push({usuario : data.user, socket : socket.id});
          // }

          socket.decoded_token = decoded;
          socket.connectedAt = new Date();

          // Disconnect listener
          socket.on('disconnect', function () {
            //Extraer del arreglo el usuario que se esta desconectado
            user_temp = remove(socket.id);
            reasignar(user_temp);
            console.info('SOCKET [%s] DISCONNECTED', socket.id);
          });

          console.info('SOCKET [%s] CONNECTED', socket.id);
          socket.emit('authenticated');

          socket.on( 'message', function( data ) {
          	io.sockets.emit( 'message', { name: data.name, message: data.message, usuario: data.usuario } );
          });
          socket.on( 'notification', function( data ) {
            var usersLog = findUsersLog(data.ids_usuario_receptor)


          	io.sockets.emit( 'notification', {users:usersLog,data:data} );
          });
        }
      })
    }

    socket.on('authenticate', authenticate );
  });


