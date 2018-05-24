<?php
namespace models;
use libs\Model;

class Members_Model extends Model {
    static $table = "members";
    static $lbl = ["memberID","userID","member_points","member_update"];
}