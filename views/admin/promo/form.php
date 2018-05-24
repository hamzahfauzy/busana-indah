<?php
use libs\Html;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Form Promo
        </h1>
    </div>
    <div class="col-lg-12">
        <?php
        $lbl = $model->label;
        echo Html::formbegin(["method"=>"POST"]);
        foreach ($lbl as $value) {
            if($value == "promoID")
                echo Html::hidden($model,$value);
            else if($value == "date_start" || $value == "date_end"){
                echo "<label>$value</label>";
                echo Html::date($model,$value,["class"=>"form-control","placeholder"=>$value]);
            }else{
                echo "<label>$value</label>";
                echo Html::text($model,$value,["class"=>"form-control","placeholder"=>$value]);
            }
        }
        echo "<p></p>";
        $link = URL."/".$this->controller;
        echo Html::button(["class"=>"btn btn-success","label"=>"Simpan"]);
        echo Html::button(["class"=>"btn btn-warning","label"=>"Kembali","type"=>"button","onclick"=>'location="'.$link.'"']);
        echo Html::formend();
        ?>
    </div>
</div>