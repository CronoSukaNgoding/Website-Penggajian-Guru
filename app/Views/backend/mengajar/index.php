<?= $this->include('template/header'); ?>
<div class="row d-print-none">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			<?php if(session()->getFlashData("sukses-tambah")): ?>
			<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				Data Berhasil ditambah
			</div>
			<?php elseif(session()->getFlashData("sukses-edit")): ?>
			<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				Data berhasil diupdate
			</div>
			<?php elseif(session()->getFlashData("sukses-hapus")): ?>
			<div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				Data berhasil dihapus
			</div>
			<?php endif; ?>
			<div class="card-header">
				<h1 style="text-align: center">Data Mengajar</h1>
				<p style="text-align: center">Jika sudah mencapai batas waktu semester, silahkan reset data ajar dengan
					cara menggunakan checkbox</p>
				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2">
					<i class="ft-plus-circle"></i> <a href="/tambahajar"> Tambah data mapel</a>
				</button>
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('/totalajar/hapus') ?>" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<table class="table table-bordered zero-configuration" style="width: 100%">
						<thead>
							<tr>
								<th><input type="checkbox" id="check_all"></th>
								<th style="width: 2%">No</th>
								<th>Nama Guru</th>
								<th>Hari</th>
								<th>Mapel</th>
								<th>Kelas</th>
								<th>Mulai Jam</th>
								<th>Sampai Jam</th>
								<th>Jam Kerja</th>
								<th style="text-align: center"><i class="ft-settings spinner"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php
					$no = 1;
					foreach ($result as $value):
						?>
							<tr>
								<td><input type="checkbox" name="ajar_id[]" value="<?= $value->ajar_id ?>"></td>
								<td><?= $no++?></td>
								<td><?= $value->fullname?></td>
								<td><?=$value->hari?></td>
								<td><?= $value->mapel?></td>
								<td><?= $value->nama_kelas?></td>
								<td><?= $value->waktu_mulai?></td>
								<td><?= $value->waktu_selesai?></td>
								<td><?= $value->jam_kerja?></td>
								<td>
									<a href="/editajar/<?=$value->ajar_id?>"
										class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2"
										data-toggle="tooltip" data-placement="top" title="edit"><i
											class="ft-edit"></i></a>
									<!-- <button
										class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
										data-toggle="modal" data-target="#hapus<?= $value->ajar_id;?>" value=""
										title="Hapus data karyawan"><i class="ft-trash"></i></button> -->

								</td>
							</tr>

							<?php
					endforeach;
					?>
						</tbody>
					</table>
					<button class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
						type="submit"
						onclick="return confirm('Apakah anda yakin ingin menghapus data yang telah dipilih?')"
						title="Hapus data karyawan"><i class="ft-trash"></i>Hapus Data Ajar</button>
					<!-- <button type="submit"
						onclick="return confirm('Apakah anda yakin ingin menghapus data yang telah dipilih?')">Hapus
						Data</button> -->
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h1 style="text-align: center">Senin</h1>
			</div>
			<div class="card-body">
					<table class="table table-bordered zero-configuration" style="width: 100%">
						<thead>
							<tr>
								<td>Nama Guru</td>
								<th>Mata Pelajaran</th>
								<th>Kelas</th>
							</tr>
						</thead>
						<tbody>
							<?php
					foreach ($senin as $value):
						?>
							<tr>
								<td><?= $value->fullname?></td>
								<td><?= $value->mapel?></td>
								<td><?= $value->nama_kelas?></td>
							</tr>

							<?php
					endforeach;
					?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h1 style="text-align: center">Selasa</h1>
			</div>
			<div class="card-body">
					<table class="table table-bordered zero-configuration" style="width: 100%">
						<thead>
							<tr>
								<td>Nama Guru</td>
								<th>Mata Pelajaran</th>
								<th>Kelas</th>
							</tr>
						</thead>
						<tbody>
							<?php
					foreach ($selasa as $value):
						?>
							<tr>
								<td><?= $value->fullname?></td>
								<td><?= $value->mapel?></td>
								<td><?= $value->nama_kelas?></td>
							</tr>

							<?php
					endforeach;
					?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h1 style="text-align: center">Rabu</h1>
			</div>
			<div class="card-body">
					<table class="table table-bordered zero-configuration" style="width: 100%">
						<thead>
							<tr>
								<td>Nama Guru</td>
								<th>Mata Pelajaran</th>
								<th>Kelas</th>
							</tr>
						</thead>
						<tbody>
							<?php
					foreach ($rabu as $value):
						?>
							<tr>
								<td><?= $value->fullname?></td>
								<td><?= $value->mapel?></td>
								<td><?= $value->nama_kelas?></td>
							</tr>

							<?php
					endforeach;
					?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h1 style="text-align: center">Kamis</h1>
			</div>
			<div class="card-body">
					<table class="table table-bordered zero-configuration" style="width: 100%">
						<thead>
							<tr>
								<td>Nama Guru</td>
								<th>Mata Pelajaran</th>
								<th>Kelas</th>
							</tr>
						</thead>
						<tbody>
							<?php
					foreach ($kamis as $value):
						?>
							<tr>
								<td><?= $value->fullname?></td>
								<td><?= $value->mapel?></td>
								<td><?= $value->nama_kelas?></td>
							</tr>

							<?php
					endforeach;
					?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h1 style="text-align: center">Jumat</h1>
			</div>
			<div class="card-body">
					<table class="table table-bordered zero-configuration" style="width: 100%">
						<thead>
							<tr>
								<td>Nama Guru</td>
								<th>Mata Pelajaran</th>
								<th>Kelas</th>
							</tr>
						</thead>
						<tbody>
							<?php
					foreach ($jumat as $value):
						?>
							<tr>
								<td><?= $value->fullname?></td>
								<td><?= $value->mapel?></td>
								<td><?= $value->nama_kelas?></td>
							</tr>

							<?php
					endforeach;
					?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h1 style="text-align: center">Sabtu</h1>
			</div>
			<div class="card-body">
					<table class="table table-bordered zero-configuration" style="width: 100%">
						<thead>
							<tr>
								<td>Nama Guru</td>
								<th>Mata Pelajaran</th>
								<th>Kelas</th>
							</tr>
						</thead>
						<tbody>
							<?php
					foreach ($sabtu as $value):
						?>
							<tr>
								<td><?= $value->fullname?></td>
								<td><?= $value->mapel?></td>
								<td><?= $value->nama_kelas?></td>
							</tr>

							<?php
					endforeach;
					?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal hapus -->
<?php foreach($result as $value) : ?>
<div class="modal fade text-left" id="hapus<?= $value->ajar_id;?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url("/Dashboard/ajar/delete/". $value->ajar_id)?>" method="post">
				<?= csrf_field(); ?>
				<div class="modal-header">
					<h3 class="modal-title" id="myModalLabel35"> Hapus Data User ini ?</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal"
						value="Tutup">
					<button type="submit" class="btn btn-secondary">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
<?= $this->section('javascript') ?>
<script>
	document.getElementById('check_all').addEventListener('change', function () {
		var checkboxes = document.getElementsByName('ajar_id[]');
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = this.checked;
		}
	});
</script>
<?= $this->endSection() ?>
<?= $this->include('template/footer'); ?>