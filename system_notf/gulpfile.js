var gulp = require('gulp'),
concat = require('gulp-concat'),
uglify = require('gulp-uglify'),
//jshint = require('gulp-jshint'),
insert = require('gulp-insert'),
fs = require('fs'),
path = require('path'),
//sass = require('gulp-sass'),
watch = require('gulp-watch');
var cssmin = require('gulp-cssmin');
var minify = require('gulp-minify');
var rename = require('gulp-rename');


gulp.task('default', [], function() {
	var root = path.resolve("../");
	console.log(root);
  console.log("Concating and moving all the css files in styles folder");
  gulp.src("../sigi/assets/js/**.controller.js")
      .pipe(concat('main.min.js'))
      .pipe(uglify().on('error', function(e) { console.log('\x07',e.message); return this.end(); }))
      .pipe(gulp.dest(root+"/sigi/assets/js"));
});

gulp.task('watch', function() {

	var root = path.resolve("../");
	var files = fs.readdirSync( root );

	files.forEach(function(vendor, idx){
		
		var pathVendor = root+'/'+vendor;
		var objVendor = fs.statSync(pathVendor);
			if( vendor != '.DS_Store' && vendor != 'node_modules' && objVendor.isDirectory() ){
				console.log("watch on "+vendor);
				compressJs(root, pathVendor, vendor);
				watch(pathVendor+'/**/*.js', function(objChanged){
					console.log('change on '+vendor+' '+objChanged.path);
					compressJs(root, pathVendor, vendor);
				});//gulp.watch
			}// if( vendor
	});//files.forEach

	// watch app
	var appFileDir = path.resolve(__dirname)+'/js/';
	var appFile = appFileDir+'__app.js';
	watch(appFile, function(objChanged){
		console.log('change on '+appFile);
		gulp.src([ appFile ])
		// .pipe(jshint.reporter('fail'))
		// junta los archivos
		.pipe(concat('app.js'))
		// .pipe(insert.wrap("define([], function (angularAMD){'use strict';", "  return App;});"))
		// comprime
		.pipe(uglify().on('error', function(e) { console.log('\x07',e.message); return this.end(); }))
		.pipe(gulp.dest( appFileDir ));
		});//gulp.watch

});

