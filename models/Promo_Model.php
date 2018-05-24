<?php
namespace models;
use libs\Model;

class Promo_Model extends Model {
    static $table = "promo";
    static $lbl = ["promoID","promo_code","costs","date_start","date_end"];
}