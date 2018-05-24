<?php
use libs\Html;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Form Users
        </h1>
    </div>
    <div class="col-lg-12">
        <?php
        $lbl = $model->label;
        foreach ($lbl as $value) {
            echo "<label>$value </label> : ".$model->{$value}."<br>";
        }
        echo "<p></p>";
        $link = URL."/".$this->controller;
        echo Html::button(["class"=>"btn btn-warning","label"=>"Kembali","type"=>"button","onclick"=>'location="'.$link.'"']);
        ?>
    </div>
</div>