<?php
namespace models;
use libs\Model;

class Transactions_Model extends Model {
    static $table = "transactions";
    static $lbl = ["transactionID","productID","userID","quantitys","status","promo_code","points","transaction_date"];
}