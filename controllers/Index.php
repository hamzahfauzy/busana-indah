<?php
namespace controllers;
use libs\Controller;
use models\Product_Model;
use models\Picture_Model;

class Index extends Controller {

	function __construct(){
		parent::__construct();
	}

	function actionIndex(){
		$this->view->title = "Index";
		$picture = function($productID){
			$model = new Picture_Model;
			$model->find()->where(["picture_forID"=>$productID,"picture_for"=>1])->one();
			return $model;
		};
		$model = new Product_Model;
        $model->find()->execute();
		return $this->view->render("index",1,["model"=>$model,"picture"=>$picture]);
	}
	

}