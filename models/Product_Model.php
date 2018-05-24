<?php
namespace models;
use libs\Model;

class Product_Model extends Model {
    static $table = "products";
    static $lbl = ["productID","product_name","product_description","product_category","product_price","stok","product_updated"];
}