<?php
use libs\Html;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Form Product
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
        echo "<h2>Upload Gambar</h2>";
        echo Html::formbegin(["enctype"=>"multipart/form-data","method"=>"POST","action"=>URL."/".$this->controller."?action=upload"]);
        echo Html::hidden(false,"picture_forID",["value"=>$model->productID]);
        echo Html::fileupload(["name"=>"file_path"]);
        echo Html::button(["class"=>"btn btn-success","label"=>"Upload"]);
        echo Html::formend();

        echo "<h2>Gambar</h2>";
        echo "<div class='container'>";
        ?>
                <div class="row">
                    <?php foreach ($picture->data as $key => $value): ?>
                    <div class="col-sm-3">
                        <img src="<?=URL;?>/<?=$value->file_path;?>" width="100%" height="250">
                        <form method="post" action="<?= URL;?>/admin/products?action=hapusfoto">
                            <?= Html::hidden(false,"pictureID",["value"=>$value->pictureID])?>
                            <?= Html::button(["class"=>"btn btn-danger btn-block ","label"=>"Hapus"]) ?>
                        </form>
                    </div>

                    <?php endforeach;?>
                </div>
        <?php
        echo "</div>";

        echo "<br><br>";
        echo Html::button(["class"=>"btn btn-warning","label"=>"Kembali","type"=>"button","onclick"=>'location="'.$link.'"']);
        ?>
    </div>
    <div class="col-lg-12">

    </div>
</div>