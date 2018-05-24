<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use libs\Users_Model;

use controllers\admin\Products as Products;
use controllers\admin\Users as Users;
use controllers\admin\Promo as Promo;
use controllers\admin\Transactions as Transactions;
use controllers\admin\Members as Members;

class Admin extends Controller {

    function __construct(){
        parent::__construct();
        Session::init();
        // if(!Session::get("admin"))
        //     $this->redirect("auth");
        $this->view->layouts = "admin-layouts";
        $this->view->title = "Administration Panel";
    }

    function actionIndex(){
        return $this->view->render("index",1);
    }

    function actionProducts($action = false, $param = false){
        $controller = new Products;
        if($action == false){
            $controller->actionIndex();
        }else{
            $action = "action".ucfirst($action);
            $controller->$action($param);
        }
    }

    function actionUsers($action = false, $param = false){
        $controller = new Users;
        if($action == false){
            $controller->actionIndex();
        }else{
            $action = "action".ucfirst($action);
            $controller->$action($param);
        }
    }

    function actionPromo($action = false, $param = false){
        $controller = new Promo;
        if($action == false){
            $controller->actionIndex();
        }else{
            $action = "action".ucfirst($action);
            $controller->$action($param);
        }
    }

    function actionTransactions($action = false, $param = false){
        $controller = new Transactions;
        if($action == false){
            $controller->actionIndex();
        }else{
            $action = "action".ucfirst($action);
            $controller->$action($param);
        }
    }

    function actionMembers($action = false, $param = false){
        $controller = new Members;
        if($action == false){
            $controller->actionIndex();
        }else{
            $action = "action".ucfirst($action);
            $controller->$action($param);
        }
    }
}