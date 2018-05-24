<?php
use libs\Html;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Manajemen Users
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?=URL;?>/admin"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-bar-chart-o"></i> Manajemen Users
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <?=Html::tablecrud(["class"=>"table table-bordered","label"=>$label,"value"=>$model->data],URL."/admin/products?action=",$model);?>
    </div>
</div>