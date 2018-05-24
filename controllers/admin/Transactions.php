<?php
namespace controllers\Admin;
use libs\Controller;
use libs\Session;
use models\Transactions_Model;

class Transactions extends Controller {

    function __construct(){
        parent::__construct();
        $this->view->layouts = "admin-layouts";
        $this->view->controller = "admin/transactions";
        $this->view->title = "Administration Panel";
    }

    function actionIndex(){
        $model = new Transactions_Model;
        $model->find()->execute();
        $data["model"] = $model;
        $data["label"] = ["Transactions ID","Products ID","Users ID","Quantitys","Status","Promo Code","Points","Transaction Code"];
        return $this->view->render("index",1,$data);
    }

    function actionCreate(){
        $model = new Transactions_Model;
        if($this->request("POST")){
            $model->attr($_POST);
            if($model->save())
                $this->redirect($this->view->controller);
        }
        return $this->view->render("form",1,["model"=>$model]);
    }

    function actionEdit($id){
        $model = new Transactions_Model;
        if($this->request("POST")){
            $model->attr($_POST);
            if($model->save())
                $this->redirect($this->view->controller);
        }
        $model->find()->where(["transactionID"=>$id])->one();
        return $this->view->render("form",1,["model"=>$model]);
    }

    function actionView($id){
        $model = new Transactions_Model;
        $model->find()->where(["transactionID"=>$id])->one();
        return $this->view->render("view",1,["model"=>$model]);
    }

    function actionDelete($id){
        $model = new Transactions_Model;
        $model->delete(["transactionID"=>$id]);
        $this->redirect($this->view->controller);
    }

    function actionSave(){
        if($this->request("POST")){
            print_r($_POST);
        }
        echo "<form method='post'>\n <button name='btn' value='oke'>Submit</button> </form>";
    }

}