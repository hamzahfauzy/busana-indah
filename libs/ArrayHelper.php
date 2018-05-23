<?php
namespace libs;

class ArrayHelper {
	
	static function map($srcArray, $srcMap){
		$return = [];
		if(is_array($srcMap) && is_array($srcArray)){
			$no=0;
			foreach($srcArray as $src){
				if($srcMap[0] == "")
					$return[$src[$srcMap[1]]] = $src[$srcMap[1]];
				else
					$return[$src[$srcMap[0]]] = $src[$srcMap[1]];
				$no++;
			}
			return $return;
		}else{
			return false;
		}
	}
	
}