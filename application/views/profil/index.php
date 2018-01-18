<table class="table table-bordered">
	<tr>
		<th width="150px">Nama</th>
		<td><?php echo $nama ;?></td>
	</tr>
	<tr>
	<th width="150px">Email</th>
		<td><?php echo $email ;?></td>
	</tr>
		<tr>
		<th>Jenis Kelamin</th>
		<td><?php echo $gender ;?></td>
	</tr>
		<tr>
		<th>Alamat</th>
		<td><?php echo $alamat ;?></td>
	</tr>
		<tr>
		<th>Status</th>
		<td><?php echo 'aktif' ;?></td>
	</tr>
	<tr>
		<th colspan="2"><a href="<?php echo site_url();?>/profil/edit" class="btn btn-info">Edit Profil</a></th>
	</tr>
</table>