<?php
namespace libs;

class Html {
	
	static function text($model = false, $name=false, $attr = false){
		$return = "<input type='text'";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				$return .= " $key='$val'";
			}
		}
		if($model==true && $name==true && !empty($model->{$name})){
			$val = " value='";
			$val .= $model->{$name};
			$val .= "' name='$name'";
		}else{
			$val = " name='$name'";
		}
		$return .= $val.">\n";
		return $return;
	}
	
	static function password($attr = false){
		$return = "<input type='password'";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				$return .= " $key='$val'";
			}
		}
		$return .= ">\n";
		return $return;
	}
	
	static function hidden($model = false, $name=false,$attr = false){
		$return = "<input type='hidden'";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				$return .= " $key='$val'";
			}
		}
		if($model==true && $name==true && !empty($model->{$name})){
			$val = " value='";
			$val .= $model->{$name};
			$val .= "' name='$name'";
		}else{
			$val = " name='$name'";
		}
		$return .= $val.">\n";
		return $return;
	}
	
	static function textArea($attr = false){
		$return = "<textarea";
		$vals = "";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				if($key=="value")
					$vals = $val;
				else
					$return .= " $key='$val'";
			}
		}
		$return .= ">$vals</textarea>";
		return $return;
	}
	
	static function comboBox($attr = false){
		$select = "<select ";
		$option = "";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				if($key!="value")
					$select .= " $key='$val'";
				else{
					if(is_array($val))
						foreach($val as $k => $v){
							$option .= "<option value='$k'>$v</option>";
						}
					}
			}
		}
		$select .= ">".$option."</select>";
		return $select;
	}
	
	static function fileupload($attr = false){
		$return = "<input type='file'";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				$return .= " $key='$val'";
			}
		}
		$return .= ">";
		return $return;
	}
	
	static function formbegin($attr = false){
		$return = "<form";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				$return .= " $key='$val'";
			}
		}
		$return .= ">";
		return $return;
	}
	
	static function formend(){
		return "</form>";
	}
	
	static function button($attr = false){
		$return = "<button";
		$label = "";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				if($key == "label")
					$label = $val;
				else
					$return .= " $key='$val'";
			}
		}
		$return .= ">$label</button>";
		return $return;
	}
	
	static function table($attr = false, $model){
		$return = "<table ";
		$row = "";
		$label = "";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				if($key!="value" && $key!="label")
					$return .= " $key='$val'";
				else if($key=="value"){
					if(is_array($val)){
						if(count($val) > 0){
							foreach($val as $rows){
								if(is_array($rows)){
									$row .= "<tr>";
									$pk = $model->getPK();
									$pk = $pk[0]['Column_name'];
									$id = $rows[$pk];
									foreach($rows as $col){
										$row .= "<td>".$col."</td>";
									}
									$row .= "</tr>";
								}else{
									$row .= "<tr><td>Data Source Invalid</td></tr>";
								}
								
							}
						}else{
							$row .= "<tr><td colspan='".count($attr['label'])."'><center>Data Kosong</center></td></tr>";
						}
					}
				}else if($key == "label"){
					if(is_array($val)){
						$label .= "<tr>";
						foreach($val as $rows){
							$label .= "<th>".$rows."</th>";
						}
						$label .= "</tr>";
					}else{
						$label .= "<tr><th>Data Source Invalid</th></tr>";
					}
							
				}
			}			
		}
		$return .= ">".$label.$row."</table>";
		return $return;
	}
	
	static function tablecrud($attr = false, $base, $model){
		$return = "<table ";
		$row = "";
		$label = "";
		if($attr != false && is_array($attr)){
			foreach($attr as $key => $val){
				if($key!="value" && $key!="label")
					$return .= " $key='$val'";
				else if($key=="value"){
					if(is_array($val)){
						if(count($val) > 0){
							foreach($val as $rows){
								if(is_array($rows)){
									$row .= "<tr>";
									$pk = $model->getPK();
									$pk = $pk[0]['Column_name'];
									$id = $rows[$pk];
									foreach($rows as $col){
										$row .= "<td>".$col."</td>";
									}
									$row .= "<td>
												<a href='".$base."/view/".$id."'>Lihat</a> |
												<a href='".$base."/edit/".$id."'>Edit</a> |
												<a href='".$base."/delete/".$id."'>Hapus</a>
											</td></tr>";
								}else{
									$row .= "<tr><td>Data Source Invalid</td></tr>";
								}
								
							}
						}else{
							$row .= "<tr><td colspan='".(count($attr['label'])+1)."'><center>Data Kosong</center></td></tr>";
						}
					}
				}else if($key == "label"){
					if(is_array($val)){
						$label .= "<tr>";
						foreach($val as $rows){
							$label .= "<th>".$rows."</th>";
						}
						$label .= "<th>Aksi</th></tr>";
					}else{
						$label .= "<tr><th>Data Source Invalid</th></tr>";
					}
							
				}
			}			
		}
		$return .= ">".$label.$row."</table>";
		return $return;
	}
}