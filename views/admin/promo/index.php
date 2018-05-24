<?php
use libs\Html;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Manajemen Promo
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?=URL;?>/admin"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-bar-chart-o"></i> Manajemen Promo
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <button class="btn btn-success" onclick="location='<?=URL;?>/admin/promo?action=create'"><i class="fa fa-plus"></i> Tambah Promo</button>
        <p></p>
        <?=Html::tablecrud(["class"=>"table table-bordered","label"=>$label,"value"=>$model->data],URL."/admin/promo?action=",$model);?>
    </div>
</div>