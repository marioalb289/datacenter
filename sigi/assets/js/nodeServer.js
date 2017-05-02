var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );

var app = express();
var server = http.createServer( app );

var io = socket.listen( server );

io.sockets.on( 'connection', function( client ) {
	// console.log( "New client !" );
	
	client.on( 'message', function( data ) {
		io.sockets.emit( 'message', { name: data.name, message: data.message, usuario: data.usuario } );
	});
	client.on( 'notification', function( data ) {
		console.log(data);
		io.sockets.emit( 'notification', { 
			user: data.idUser,
			notifications: data.notification,
			tarea:data.tarea,
			comentario:data.comentario,
			nombrUser:data.nombrUser } );
	});
	
});

server.listen( 8080 );