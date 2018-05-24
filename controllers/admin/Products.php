<?php
namespace controllers\Admin;
use libs\Controller;
use libs\Session;
use models\Product_Model;

class Products extends Controller {

    function __construct(){
        parent::__construct();
        $this->view->layouts = "admin-layouts";
        $this->view->controller = "admin/products";
        $this->view->title = "Administration Panel";
    }

    function actionIndex(){
        $model = new Product_Model;
        $model->find()->execute();
        $data["model"] = $model;
        $data["label"] = ["Produk ID","Nama Produk","Deskripsi","Kategori","Harga (Rp)","Stok","Update"];
        return $this->view->render("index",1,$data);
    }

    function actionTambah(){
        echo "Form Tambah";
    }

    function actionTampil($param){
        echo $param;
    }

    function actionSave(){
        if($this->request("POST")){
            print_r($_POST);
        }
        echo "<form method='post'>\n <button name='btn' value='oke'>Submit</button> </form>";
    }

}