<?php
use libs\Html;
?>

<form method="POST">
<?= Html::hidden($model,"sample_id"); ?>
Sample Name : <?= Html::text($model, "sample_name"); ?><br>
Sample Description : <?= Html::text($model, "sample_description"); ?><br>
<button>Simpan</button>
</form>