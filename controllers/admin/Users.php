<?php
namespace controllers\admin;

use libs\Controller;
use libs\Session;
use models\Users_Model;

class Users extends Controller {

    function __construct(){
        parent::__construct();
        $this->view->layouts = "admin-layouts";
        $this->view->controller = "admin/users";
        $this->view->title = "Administration Panel";
    }

    function actionIndex(){
        $model = new Users_Model;
        $model->find()->execute();
        $data["model"] = $model;
        $data["label"] = ["User ID","Nama Lengkap","Alamat","Jenis Kelamin","Phone","Username","Password","Level"];
        return $this->view->render("index",1,$data);
    }

    function actionView($id){
        $model = new Users_Model;
        $model->find()->where(["userID"=>$id])->one();
        return $this->view->render("view",1,["model"=>$model]);
    }

    function actionDelete($id){
        $model = new Users_Model;
        $model->delete(["userID"=>$id]);
        $this->redirect($this->view->controller);
    }
}