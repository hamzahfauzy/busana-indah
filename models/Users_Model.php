<?php
namespace models;
use libs\Model;

class Users_Model extends Model
{
	static $table = "users";
	static $lbl = ["userID","sample_name","sample_description","sample_date"];
}