<?php
namespace models;
use libs\Model;

class Picture_Model extends Model {
    static $table = "pictures";
    static $lbl = ["pictureID","picture_for","picture_forID","file_path"];
}