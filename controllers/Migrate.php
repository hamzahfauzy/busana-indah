<?php
namespace controllers;
use libs\Controller;
use libs\Database;

class Migrate extends Controller {

    function __construct(){
        parent::__construct();
        $this->db = new Database;
    }

    function actionIndex($fresh=false){        
        if($fresh){
            if($this->doFreshMigrate() == 0)
                echo "Migrate Success.<br>";
            else
                echo "Migrate Error. ";
            
        }else{
            if($this->doMigrate() == 0)
                echo "Migrate Success.";
            else
                echo "Migrate Error. ";
        }
        
    }

    function doMigrate(){
        $table = file_get_contents(URL."/database/table.json");
        $table = json_decode($table);
        $SQL = "CREATE TABLE {tablename} ( {field} )";
        $error = 0;
        foreach($table->table as $value){
            $current_sql = str_replace("{tablename}",$value->table_name,$SQL);
            $field = "";
            $n = count($value->table_field);
            $i = 1;
            foreach($value->table_field as $val){
                $field .= $val->field_name." ".$val->field_datatype.($val->field_length ? "(".$val->field_length.")" : "");
                $field .= ($val->field_primary ? " PRIMARY KEY" : "");
                $field .= ($val->field_ai ? " AUTO_INCREMENT" : "");
                $field .= ($val->field_timestamp ? " DEFAULT CURRENT_TIMESTAMP" : "");
                if($i < $n)
                    $field .= ",";
                $i++;
            }
            $current_sql = str_replace("{field}",$field,$current_sql);
            if($this->db->query($current_sql) === TRUE){
                echo "Create Table $value->table_name Success<br>";
            }else{
                echo $this->db->error."<br>";
                $error++;
            }
        }
        return $error;
    }

    function doSeed(){
        $table = file_get_contents(URL."/database/seeder.json");
        $table = json_decode($table);
        $SQL = "INSERT INTO {tablename} VALUES({field})";
        $error = 0;
        foreach($table as $value){
            $rec = 1;
            foreach($value->table_value as $vals){
                $current_sql = str_replace("{tablename}",$value->table_name,$SQL);
                $n = count($vals);
                $i = 1;
                $field = "";
                foreach($vals as $val){
                    if($val == "CURRENT_TIMESTAMP"){
                        $field .= "CURRENT_TIMESTAMP";
                    }else{
                        $field .= "'".$val."'";
                    }
                    if($i < $n)
                        $field .= ",";
                    $i++;
                }
                $current_sql = str_replace("{field}",$field,$current_sql);
                if($this->db->query($current_sql) === TRUE){
                    echo "Record ($rec) Success add to $value->table_name<br>";
                }else{
                    echo $this->db->error." Table $value->table_name<br>";
                    $error++;
                }
                $rec++;
            }
        }
        return $error;
    }

    function doFreshMigrate(){
        $query = $this->db->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE='BASE TABLE' AND TABLE_SCHEMA='".DBNAME."'");
        foreach($query as $value){
            $tabel = $value["TABLE_NAME"];
            if($this->db->query("DROP TABLE $tabel") === TRUE){
            }else{
                echo $this->db->error;
            }
            
        }
        return $this->doMigrate();
    }

    function actionSeed(){
        if($this->doSeed() == 0)
            echo "Seeder Success";
        else
            echo "Seeder Error";
    }
}