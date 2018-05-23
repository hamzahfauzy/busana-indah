<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use libs\Users_Model;

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
}