var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var jwt = require('jsonwebtoken');
require('dotenv').config();

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

          socket.decoded_token = decoded;
          socket.connectedAt = new Date();

          // Disconnect listener
          socket.on('disconnect', function () {
            console.info('SOCKET [%s] DISCONNECTED', socket.id);
          });

          console.info('SOCKET [%s] CONNECTED', socket.id);
          socket.emit('authenticated');

          socket.on( 'message', function( data ) {
          	io.sockets.emit( 'message', { name: data.name, message: data.message, usuario: data.usuario } );
          });
          socket.on( 'notification', function( data ) {
          	console.log(data);
          	io.sockets.emit( 'notification', data );
          });
        }
      })
    }

    socket.on('authenticate', authenticate );
  });


