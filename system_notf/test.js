var fs = require('fs');
var https = require('https');

var express = require('express');
var app = express();
require('dotenv').config();

var options = {
   key  : fs.readFileSync(process.env.SERVER_KEY),
   cert : fs.readFileSync(process.env.SERVER_CRT)
};
var serverPort = 8181;

var server = https.createServer(options, app);
var io = require('socket.io')(server);
var jwt = require('jsonwebtoken');

app.get('/', function(req, res) {
  res.sendFile(__dirname + '/public/index.html');
});

io.on('connection', function(socket){


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

server.listen(serverPort,"0.0.0.0", function() {
  console.log('server up and running at %s port', serverPort);
});