<?php
namespace controllers;
use libs\Controller;
use models\Product_Model;
use models\Picture_Model;

class Products extends Controller {

    function __construct(){
        parent::__construct();
        $this->view->title = "Halaman Produk";
    }

    function actionIndex(){
        $picture = function($productID){
			$model = new Picture_Model;
			$model->find()->where(["picture_forID"=>$productID,"picture_for"=>1])->one();
			return $model;
		};
		$model = new Product_Model;
        $model->find()->execute();
		return $this->view->render("index",1,["model"=>$model,"picture"=>$picture]);
    }

    function actionDetail($productID){
        $picture = new Picture_Model;
        $picture->find()->where(["picture_forID"=>$productID,"picture_for"=>1])->execute();
		$model = new Product_Model;
        $model->find()->where(["productID"=>$productID])->one();
		return $this->view->render("single",1,["model"=>$model,"picture"=>$picture]);
    }
}