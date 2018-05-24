<?php
namespace models;
use libs\Model;

class Users_Model extends Model
{
	static $table = "users";
	static $lbl = ["userID","fullname","address","gender","phone","username","password","level"];
}