<?php
namespace libs;
/**
* Bootloader Class
*/
class Bootloader
{
	
	function __construct()
	{
		$url = (isset($_GET['r'])) ? $_GET['r'] : "";
		$url = rtrim($url,"/");
		$url = explode("/", $url);

		if(isset($url[0]) && !empty($url[0]) && $url[0] != "index.php"){
			$className = ucfirst($url[0]);				
			$className = "controllers\\$className";
			if(class_exists($className)){
				$controller = new $className;
				$controller->view->controller = strtolower($url[0]);
			}else{
				return $this->error404();
			}
		}else{
			$className = "controllers\\Index";
			$controller = new $className;
			$controller->view->controller = "index";
		}
		if(isset($url[1]) && !empty($url[1])){
			$str = "";
			if(strchr($url[1],"-")){
				$chr = explode("-",$url[1]);
				for($i=0;$i<count($chr);$i++){
					$str .= ucfirst($chr[$i]);
				}
			}else{
				$str = ucfirst($url[1]);
			}
			$method = "action".$str;
			if(method_exists($controller, $method)){
				$parameter = false;
				if(isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == "GET")){
					$className = ucfirst($url[0]);				
					$className = "controllers\\$className";
					$r = new \ReflectionMethod($className, $method);
					$params = $r->getParameters();
					foreach ($params as $param) {
					    if(isset($_GET[$param->getName()]))
						    $parameter[] = $_GET[$param->getName()];
						else{
							echo "<h2>Parameter ".$param->getName()." Not Found</h2>";
							return;
						}
					}
				}
			//if(method_exists($controller, $method))
				if($parameter==false)
					$controller->$method(false);
				else
					call_user_func_array(array($controller, $method), $parameter);
			}else
				return $this->errorMethodNotExist($url[0], $url[1]);
		}else{
			$controller->actionIndex();
		}
	}

	function error404(){
		echo "<h2>File Not Found</h2>";
	}

	function error500(){
		echo "<h2>Kok Error</h2>";
	}

	function errorMethodNotExist($controller, $name){
		echo "<h2>Method $name doesn't Exist at $controller Controller</h2>";
	}
}
