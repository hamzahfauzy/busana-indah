<?php
require 'config/path.php';
require 'config/db-config.php';
spl_autoload_register( function( $class_name ) {
	
	$file = $class_name .'.php';
	$file = str_replace("\\", "/", $file);
	if(file_exists($file))
		require $file;
	else
		die("File $file Doesn't Exists");
} );

new libs\Bootloader();