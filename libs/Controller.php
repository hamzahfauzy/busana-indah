<?php
namespace libs;
/**
* Controller class
*/
class Controller
{
	
	function __construct()
	{
		$this->view = new View();
	}

	function redirect($page=false,$msg=false){
		if($msg!=false)
			$msg = "?msg=$msg";
		else
			$msg = "";
		header("location:".URL."/".$page.$msg);
	}
	
	function request($method){
		//return 
		if($_SERVER['REQUEST_METHOD'] == $method)
			if($method == "POST")
				return $_POST;
			elseif($method == "GET")
				return $_GET;
		return false;
	}

}