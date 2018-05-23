<?php
namespace libs;
/**
* View Class
*/
class View 
{

	public $layouts = "layouts";
	
	function __construct()
	{
		$vendor = require_once("config/vendor.php");
		$this->vendor = $vendor;
	}

	function render($file, $layout = false, $data = false){
		if($data==true){
			if(is_array($data)){
				extract($data);
			}else{
				return Bootloader::error500();
			}
		}
		if($layout==true){
			require 'views/'.$this->layouts.'/header.php';
			require 'views/'.$this->controller.'/'.$file.'.php';
			require 'views/'.$this->layouts.'/footer.php';
		}else{
			require 'views/'.$this->controller.'/'.$file.'.php';
		}
	}
}