<?= $this->include('template/header'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			<?php if(session()->getFlashData("sukses-edit")): ?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					 <?=session()->getFlashData("sukses-edit")?>
				</div>
			<?php elseif(session()->getFlashData("sukses-hapus")): ?>
				<div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?=session()->getFlashData("sukses-hapus")?>
				</div>
			<?php endif; ?>
			<div class="card-header">
				<h1 style="text-align: center">User Management</h1>
			</div>
			<hr>
			<div class="card-body">
				<table class="table table-bordered zero-configuration">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Role</th>
						
						<td style="text-align: center"><i class="ft-settings spinner"></i></td>
					</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
                        <?php foreach($result as $value) : ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value->fullname;?></td>
							<td><?= $value->email;?></td>
							<td><?= $value->role_id;?></td>
							<td>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 karyawan-edit"
									data-toggle="modal" data-target="#ubah<?= $value->user_id;?>" value=""
									title="Update data karyawan"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
									data-toggle="modal" data-target="#hapus<?= $value->user_id;?>" value=""
									title="Hapus data karyawan"><i class="ft-trash"></i></button>
					
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>






<!-- Modal update -->
<?php foreach($result as $value) : ?>
<div class="modal fade text-left" id="ubah<?= $value->user_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data User</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form enctype="multipart/form-data" action="<?=base_url("/Dashboard/ManageUser/edit/". $value->user_id)?>" method="post">
            <?= csrf_field(); ?>
			<div class="modal-body">
				<div class="form-group floating-label-form-group">
					<label for="edit_nama">Nama</label>
					<input type="hidden" id="karyawan_id" name="id">
					<input type="text" class="form-control" name="fullname" id="edit_nama" placeholder="Nama Karyawan" value="<?= $value->fullname;?>"
						   autocomplete="off" required>
				</div>
				<div class="form-group floating-label-form-group">
					<label for="edit_tempat">Email</label>
					<input type="text" class="form-control" name="email" id="edit_tempat" placeholder="Email" value="<?= $value->email;?>"
						   autocomplete="off" required>
				</div>
				<div class="form-group floating-label-form-group">
					<label for="edit_tempat">Role</label>
					<input type="text" class="form-control" name="role_id" id="edit_tempat" placeholder="Email" value="<?= $value->role_id;?>"
						   autocomplete="off" required>
				</div>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="update" value="Update">
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>

<!-- Modal hapus -->
<?php foreach($result as $value) : ?>
<div class="modal fade text-left" id="hapus<?= $value->user_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url("/Dashboard/ManageUser/delete/". $value->user_id)?>" method="post">
			<?= csrf_field(); ?>
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data User ini ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<button type="submit" class="btn btn-secondary">Hapus</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
<?= $this->include('template/footer'); ?>