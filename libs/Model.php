<?php
namespace libs;

/**
* Model libs class
*/
class Model
{
	
	public $length;
	public $last_id;
	public $tbl = "";
	public $sql = "";
	public $data = array();
	public $label = array();
	function __construct(){
		$this->db = new Database();
		if($this->db && isset($this->db->connect_error))
		{
			echo "Error!. Database not connected or not exists.<br>please check config/db-config.php file<br>";
			echo $this->db->connect_error;
			die();
		}
		$this->tbl = isset(static::$table) ? static::$table : "";
		$this->label = isset(static::$lbl) ? static::$lbl : array();
	}
	
	function showtable(){
		$this->query("SHOW TABLES FROM ".$this->db->dbname);
		return $this->data;
	}
	
	function showfield($tbl){
		$this->query("SHOW columns FROM ".$tbl);
		return $this->data;
	}
	
	function query($query,$type=false){
		$q = $this->db->query($query);
		if($q){
			$this->length = @$q->num_rows;
			$this->last_id = @$this->db->insert_id;
			if($this->length){
				if($type==1)
					$this->data = $q->fetch_object();
				else{
					while($row = $q->fetch_object()){
						$this->data[] = $row;
					}
				}
				
				$this->attr($this->data);
			}
		}
		return $q;
	}
	
	function find(){
		$this->sql = "select * from ".$this->tbl." ";
		return $this;
	}
	
	function where($clause){
		$where = "where ";
		$num = count($clause);
		$i=0;
		foreach($clause as $key => $value){
			$where .= $key."='".$value."'";
			if($i<$num-1)
				$where .= " and ";
			$i++;
		}
		$this->sql .= $where;
		return $this;
	}
	function andwhere($clause){
		$where = "where ";
		$num = count($clause);
		$i=0;
		foreach($clause as $key => $value){
			$where .= $key."='".$value."'";
			if($i<$num-1)
				$where .= " and ";
			$i++;
		}
		$this->sql .= $where;
		return $this;
	}
	
	function orwhere($clause){
		$where = "where ";
		$num = count($clause);
		$i=0;
		foreach($clause as $key => $value){
			$where .= $key."='".$value."'";
			if($i<$num-1)
				$where .= " or ";
			$i++;
		}
		$this->sql .= $where;
		return $this;
	}
	
	function orderby($clause){
		$order = "order by $clause[0] $clause[1]";
		$this->sql .= $order;
		return $this;
	}
	
	function execute(){
		$this->query($this->sql);
		return $this;
	}
	
	function one(){
		$this->query($this->sql,1);
		return $this;
	}
	
	function attr($param = array()){
		foreach($param as $key=>$value){
			$this->{$key} = $value;
		}
	}
	
	function getPK(){
		$query = "show index from ".$this->tbl." where Key_name = 'PRIMARY'";
		$this->query($query);
		return $this->data;
	}
	
	function getFieldType($fieldName){
		$query = "SELECT DATA_TYPE FROM information_schema.COLUMNS WHERE TABLE_NAME = '".$this->tbl."' AND COLUMN_NAME = '".$fieldName."'";
		$this->query($query,1);
		return $this->data;
	}
	
	function save(){
		$model = new Model;
		$query = "show index from ".$this->tbl." where Key_name = 'PRIMARY'";
		$model->query($query,1);
		if($model->length){
			$primary_key = $model->data->Column_name;
			$mdl = new Model;
			$mdl->query("select * from ".$this->tbl." where $primary_key = '".$this->{$primary_key}."'",1);
			if($mdl->length){
				$insert = "update ".$this->tbl." set ";
				$i=0;
				foreach($this->label as $rows){
					if($rows !== $primary_key){
						if($this->{$rows} == "CURRENT_TIMESTAMP")
							$insert .= $rows."=".$this->{$rows};
						else
							$insert .= $rows."='".$this->{$rows}."'";
						if($i<count($this->label)-1)
							$insert .= ",";
					}
					$i++;
				}
				
				$insert .= " where $primary_key = '".$this->{$primary_key}."'";
			}else{
				$val="";
				$values="";
				$i=0;
				foreach($this->label as $rows){
					$val .= $rows;
					if(empty($this->{$rows}))
						$values .= "''";
					else if($this->{$rows} == "CURRENT_TIMESTAMP")
						$values .= "CURRENT_TIMESTAMP";
					else
						$values .= "'".$this->{$rows}."'";
					if($i<count($this->label)-1){
						$val .= ",";
						$values .= ",";
					}
					$i++;
				}
				$insert = "insert into ".$this->tbl."($val)values($values)";
			}
			if($this->query($insert))
				return true;
			else
				return false;
		}else
			return false;
	}
	
	function delete($clause){
		$where = "where ";
		$num = count($clause);
		$i=0;
		foreach($clause as $key => $value){
			$where .= $key."='".$value."'";
			if($i<$num-1)
				$where .= " and ";
			$i++;
		}
		$sql = "delete from ".$this->tbl." ".$where;
		$this->query($sql);
		return $this;
	}
	
	function hasOne($class, $criteria=array()){
		$model = new $class;
		$model->find();
		if($criteria){
			foreach($criteria as $key => $value){
				$model->where([$key=>$this->{$value}]);
			}
		}
		$model->one();
		return $model;
	}
	
	function hasMany($class, $criteria=array()){
		$model = new $class;
		$model->find();
		if($criteria){
			foreach($criteria as $key => $value){
				$model->where([$key=>$this->{$value}]);
			}
		}
		$model->execute();
		return $model;
	}
	
}
