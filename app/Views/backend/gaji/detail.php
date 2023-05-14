<?= $this->include('template/header'); ?>
<div class="row d-print-none">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			<?php if(session()->getFlashData("sukses-tambah")): ?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					 <?=session()->getFlashData("sukses-tambah")?>
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
				<?php
				
					foreach ($guru as $value):
						?>
				<h1 style="text-align: center">Gaji <?= $value->fullname ?></h1>
				<?php
						
					endforeach;
					?>
				<p style="text-align: center"><strong>Simpan data gaji ini di awal bulan dan akhir bulan*</strong></p>

			</div>
			<div class="card-body">
				<table class="table table-bordered zero-configuration" style="width: 100%">
					<thead>
						<tr>

							<th style="width: 2%">No</th>
							<th>Nama Guru</th>
							<th>Jabatan</th>
							<th>Tanggal Bergabung</th>
							<th>Total Gaji</th>
							<th style="text-align: center"><i class="ft-settings spinner"></i></th>

						</tr>
					</thead>
					<tbody>
						<?php
					$no = 1;
					foreach ($guru as $value):
						?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $value->fullname ?></td>
							<td><?= $value->jabatan?></td>
							<td><?= $value->created_at ?></td>
							<td><?= $value->total_gaji?></td>
							<td>

								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
									data-toggle="modal" data-target="#simpan<?= $value->user_id;?>" value=""
									title="Hapus data karyawan"><i class="fa-solid fa-floppy-disk"></i></i></button>
							</td>
						</tr>

						<?php
						$no++;
					endforeach;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal update -->
<?php foreach($guru as $value) : ?>
<div class="modal fade text-left" id="simpan<?= $value->user_id;?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data User</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form enctype="multipart/form-data" action="<?=base_url("/Dashboard/gaji/guru/". $value->user_id)?>"
				method="post">
				<?= csrf_field(); ?>
				<div class="modal-body">
					<div class="form-group floating-label-form-group">

						<div class="form-group floating-label-form-group">
							<label for="edit_nama">Nama Guru</label>
							<input type="hidden" id="karyawan_id" name="fullname" value="<?= $value->user_id;?>">
							<input type="hidden" id="karyawan_id" name="gaji_id" value="<?= $value->gaji_id;?>">
							<input type="text" class="form-control" name="kd_kelas" id="edit_nama"
								placeholder="Kode Kelas" value="<?=$value->fullname;?>" autocomplete="off" readonly>
						</div>

						<div class="form-group floating-label-form-group">
							<label for="edit_nama">Jabatan</label>
							<input type="hidden" id="karyawan_id" name="jabatan" value="<?= $value->group_gaji_id;?>">
							<input type="text" class="form-control" name="kd_kelas" id="edit_nama"
								placeholder="Kode Kelas" value="<?= $value->jabatan;?>" autocomplete="off"
								readonly>
						</div>
						<div class="form-group floating-label-form-group">
							<label for="edit_nama">Total Gaji</label>
							<input type="hidden" id="karyawan_id" name="total_gaji" value="<?= $value->total_gaji;?>">
							<input type="text" class="form-control" name="kd_kelas" id="edit_nama"
								placeholder="Kode Kelas" value="<?= $value->total_gaji;?>" autocomplete="off" readonly>
						</div>

					</div>
					<div class="modal-footer">
						<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
							value="Tutup">
						<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan"
							value="Simpan">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
<?= $this->include('template/footer'); ?>