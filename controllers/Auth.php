<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use models\Users_Model;

class Auth extends Controller {

    function __construct(){
        parent::__construct();
        Session::init();
    }

    function actionIndex(){
        if(!Session::get("username"))
            $this->redirect("auth/login");
    }

    function actionLogin(){
        if($this->request("POST")){
            extract($this->request("POST"));
            $model = new Users_Model;
            $model->find()->where(["username"=>$username,"password"=>$password,"level"=>2])->one();
            if($model->length){
                Session::set("level",$model->level);
                if($model->level == 1){
                    Session::set("admin",$username);
                    $this->redirect("admin");
                }else{
                    Session::set("username",$username);
                    $this->redirect();
                }
            }
        }
        return $this->view->render("login");
    }

    function actionRegister(){
        if($this->request("POST")){
            extract($this->request("POST"));
            $model = new Users_Model;
            $model->find()->where(["username"=>$username])->one();
            if(!$model->length){
                $model->attr($_POST);
                if($model->save())
                    $this->redirect();
            }else{
                $this->redirect("auth/register","error");
            }
        }
        return $this->view->render("register");
    }

    function actionLogout(){
        if($this->request("POST")){
            $post = $this->request("POST");
            if($post["doLogout"])
                Session::destroy();
        }
        $this->redirect();
    }

}