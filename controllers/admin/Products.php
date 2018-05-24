<?php
namespace controllers\Admin;
use libs\Controller;
use libs\Session;
use models\Product_Model;
use models\Picture_Model;

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

    function actionCreate(){
        $model = new Product_Model;
        if($this->request("POST")){
            $model->attr($_POST);
            if($model->save())
                $this->redirect($this->view->controller);
        }
        return $this->view->render("form",1,["model"=>$model]);
    }

    function actionEdit($id){
        $model = new Product_Model;
        if($this->request("POST")){
            $model->attr($_POST);
            if($model->save())
                $this->redirect($this->view->controller);
        }
        $model->find()->where(["productID"=>$id])->one();
        return $this->view->render("form",1,["model"=>$model]);
    }

    function actionView($id){
        $model = new Product_Model;
        $picture = new Picture_Model;
        $model->find()->where(["productID"=>$id])->one();
        $picture->find()->where(["picture_forID"=>$id,"picture_for"=>1])->execute();
        return $this->view->render("view",1,["model"=>$model,"picture"=>$picture]);
    }

    function actionDelete($id){
        $model = new Product_Model;
        $model->delete(["productID"=>$id]);
        $this->redirect($this->view->controller);
    }

    function actionHapusfoto(){
        $model = new Picture_Model;
        $model->delete(["pictureID"=>$_POST['pictureID']]);
        $this->redirect($this->view->controller);
    }

    function actionUpload(){
        if(isset($_FILES["file_path"])){
            $model = new Picture_Model;
            $file = $_FILES["file_path"];
            copy($file['tmp_name'],"uploads/products/".$file['name']);
            $model->picture_for = 1;
            $model->picture_forID = $_POST["picture_forID"];
            $model->file_path = "uploads/products/".$file['name'];
            $model->save();
            return $this->redirect($this->view->controller);
        }
    }

    function actionSave(){
        if($this->request("POST")){
            print_r($_POST);
        }
        echo "<form method='post'>\n <button name='btn' value='oke'>Submit</button> </form>";
    }

}