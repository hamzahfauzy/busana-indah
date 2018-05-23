<?php
namespace controllers;

use libs\Controller;
use models\Sample_Model;
/**
* Hello Class
*/
class Hello extends Controller
{

	function __construct(){
		parent::__construct();
	}
	
	function actionIndex(){
		$this->view->title = "Hello";
		$model = new Sample_Model();
		$model->find()->execute();
		return $this->view->render("index",1,["model"=>$model]);
	}

	function actionTry(){
		echo "This is Try";
	}

	function actionWorld(){
		echo "This is World";
	}

	function actionTryThis(){
		echo "Method Try This";
		echo $_GET['param'];
	}

	function actionMethodHasParam($param){
		echo $param;
	}

	function actionMultipleParam($first, $second){
		echo $first;
		echo "<br>";
		echo $second;
	}

	function actionHai(){
		echo "hai";
	}

	function actionCreate(){
		$this->view->title = "Form Tambah";
		$model = new Sample_Model();
		$model->find()->execute();
		if($this->request("POST")){
			$model->sample_name = $_POST['sample_name'];
			$model->sample_description = $_POST['sample_description'];
			$model->sample_date = "CURRENT_TIMESTAMP";
			if($model->save())
				return $this->redirect("hello");
		}
		return $this->view->render("create",1,["model"=>$model]);
	}

	function actionEdit($id){
		$this->view->title = "Form Tambah";
		$model = new Sample_Model();
		$model->find()->where(['sample_id'=>$id])->one();
		if($this->request("POST")){
			$post = $this->request("POST");
			$model->sample_id = $post['sample_id'];
			$model->sample_name = $post['sample_name'];
			$model->sample_description = $post['sample_description'];
			$model->sample_date = "CURRENT_TIMESTAMP";
			if($model->save())
				return $this->redirect("hello");
		}
		return $this->view->render("edit",1,["model"=>$model]);
	}

	function actionDelete($id){
		$model = new Sample_Model();
		$model->delete(["sample_id"=>$id]);
		return $this->redirect("hello");
	}

	function actionTambah(){
		if($this->request("POST")){
			$model = new Sample_Model();
			$model->sample_name = $_POST['sample_name'];
			$model->sample_description = $_POST['sample_description'];
			$model->sample_date = "CURRENT_TIMESTAMP";
			if($model->save())
				return $this->redirect("hello");
		}
		return $this->view->render("form",1);
	}

}