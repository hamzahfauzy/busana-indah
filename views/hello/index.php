<div class="container" style="background-color: #FFF">
<h2>Data Sample</h2>
<a href="<?=URL;?>/hello/create"><button class="btn btn-primary">
	Tambah
</button></a>

<table class="table table-bordered">
	<tr>
		<td>No</td>
		<td>Sample Name</td>
		<td>Sample Description</td>
		<td>Sample Date</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
	$no = 1;
	foreach ($model->data as $value) {
	?>
	<tr>
		<td><?= $no; $no++; ?></td>
		<td><?= $value->sample_name;?></td>
		<td><?= $value->sample_description;?></td>
		<td><?= $value->sample_date;?></td>
		<td><a href="<?= URL; ?>/hello/edit&id=<?= $value->sample_id;?>">Edit</a></td>
		<td><a href="<?= URL; ?>/hello/delete&id=<?= $value->sample_id;?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>

</div>