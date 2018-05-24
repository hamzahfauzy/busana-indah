<?php
namespace controllers\Admin;
use libs\Controller;
use libs\Session;
use models\Promo_Model;

class Promo extends Controller {

    function __construct(){
        parent::__construct();
        $this->view->layouts = "admin-layouts";
        $this->view->controller = "admin/promo";
        $this->view->title = "Administration Panel";
    }

    function actionIndex(){
        $model = new Promo_Model;
        $model->find()->execute();
        $data["model"] = $model;
        $data["label"] = ["Promo ID","Kode Promo","Harga (Rp)","Mulai","Berakhir"];
        return $this->view->render("index",1,$data);
    }

    function actionCreate(){
        $model = new Promo_Model;
        if($this->request("POST")){
            $model->attr($_POST);
            if($model->save())
                $this->redirect($this->view->controller);
        }
        return $this->view->render("form",1,["model"=>$model]);
    }

    function actionEdit($id){
        $model = new Promo_Model;
        if($this->request("POST")){
            $model->attr($_POST);
            if($model->save())
                $this->redirect($this->view->controller);
        }
        $model->find()->where(["promoID"=>$id])->one();
        return $this->view->render("form",1,["model"=>$model]);
    }

    function actionView($id){
        $model = new Promo_Model;
        $model->find()->where(["promoID"=>$id])->one();
        return $this->view->render("view",1,["model"=>$model]);
    }

    function actionDelete($id){
        $model = new Promo_Model;
        $model->delete(["promoID"=>$id]);
        $this->redirect($this->view->controller);
    }

    function actionSave(){
        if($this->request("POST")){
            print_r($_POST);
        }
        echo "<form method='post'>\n <button name='btn' value='oke'>Submit</button> </form>";
    }

}