<?php
use libs\Html;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Manajemen Transactions
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?=URL;?>/admin"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-bar-chart-o"></i> Manajemen Transactions
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <button class="btn btn-success" onclick="location='<?=URL;?>/admin/transactions?action=create'"><i class="fa fa-plus"></i> Tambah Transactions</button>
        <p></p>
        <?=Html::tablecrud(["class"=>"table table-bordered","label"=>$label,"value"=>$model->data],URL."/admin/transactions?action=",$model);?>
    </div>
</div>