
<a href="<?php echo site_url();?>/user/register" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah User</a>
<br>
<br>

<table class="table table-bordered table-striped table-hover table-condensed" >
	<tr>
		<th>No</th>
		<th>Email</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<?php 
	$no = 1;
	foreach ($user ->result() as $users) { ?>
		<?php

		if($users->gender =="L")
		{
			$g = "Laki - laki";
		}
		else
		{
			$g = "Perempuan";
		}
		?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $users->email ;?></td>
			<td><?php echo $users->nama ;?></td>
			<td><?php echo $g ;?></td>
			<td><?php echo $users->alamat ;?></td>
			<?php
			if($users->status==0)
			{
				$st = "<div style='color:red'> Belum Di setujui</div>";
			}			else			{
				$st = "<div style='color:blue'>  Di setujui</div>";
			}

			?>
			<td><a href="<?php echo  site_url();?>/user/edit/<?php echo $users->id_user ;?>" > <?php echo $st ;?></a></td>
			<td><a class="btn btn-xs btn-danger" href="<?php echo site_url();?>/user/delete/<?php echo $users->id_user ;?>">Delete</a></td
			</tr>
	<?php } ?>
			
			
	
</table>