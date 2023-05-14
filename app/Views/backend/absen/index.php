<?= $this->include('template/header'); ?>
<div class="row">
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
			<!-- <div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				Karyawan sudah absen hari ini
			</div> -->

			<div class="card-header">
				<h1 style="text-align: center">Absen Karyawan</h1>
				<p style="text-align: center">Jika sudah mencapai batas waktu seminggu, silahkan reset data absen dengan
					cara menggunakan checkbox*</p>

				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
					data-toggle="modal" data-target="#tambah">
					<i class="ft-plus-circle"></i> Tambah data Absen
				</button>

			</div>
			<hr>
			<div class="card-body">
				<form method="post" action="<?= base_url('/totalabsen/hapus') ?>" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<table class="table table-bordered zero-configuration" style="width: 100%">
						<thead>
							<tr>
								<th><input type="checkbox" id="check_all"></th>
								<th>No</th>
								<th>Nama guru</th>
								<th>Hari</th>
								<th>Tanggal</th>
								<th>Jam Masuk Mengajar</th>
								<th>Jam KeluarMengajar</th>
								<th>Status</th>
								<th style="text-align: center"><i class="ft-settings spinner"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;?>
							<?php foreach($result as $listAbsen):?>
							<tr>
								<td><input type="checkbox" name="absen_id[]" value="<?= $listAbsen->absen_id ?>"></td>
								<td><?= $no++ ?></td>
								<td><?= $listAbsen->fullname?></td>
								<td><?= $listAbsen->absen_hari?></td>
								<td><?= $listAbsen->tanggal_absensi?></td>
								<td>Jam <?= $listAbsen->jam_masuk_ngajar?></td>
								<td>Jam <?= $listAbsen->jam_keluar_ngajar?></td>
								<td><?= $listAbsen->status?></td>
								<td>
									<button
										class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 karyawan-edit"
										data-toggle="modal" data-target="#ubah<?= $listAbsen->absen_id;?>" value=""
										title="Update data karyawan"><i class="ft-edit"></i></button>
									<!-- <button
										class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
										data-toggle="modal" data-target="#hapus<?= $listAbsen->absen_id;?>" value=""
										title="Hapus data karyawan"><i class="ft-trash"></i></button> -->
								</td>
							</tr>
							<?php endforeach;?>
							<?php
						$no++;
					?>
						</tbody>
					</table>
					<button class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
						type="submit"
						onclick="return confirm('Apakah anda yakin ingin menghapus data yang telah dipilih?')"
						title="Hapus data karyawan"><i class="ft-trash"></i>Hapus Data Absen</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal tambah -->

<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Tambah data Absen</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?=base_url("/profil/tambahabsen/")?>" method="post" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="modal-body">
					<div class="form-group floating-label-form-group">
						<label for="jabatan">Nama Guru</label>
						<select name="guru" id="basicSelect" class="form-control">
							<option value="" selected>Pilih Nama Guru</option>
							<?php foreach($namaguru as $listGuru) : ?>
							<option value="<?= $listGuru->user_id?>"><?= $listGuru->fullname?></option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group floating-label-form-group">
						<label for="tl">Tanggal Absensi</label>
						<div class='input-group'>
							<input type="date" class="form-control" name="tanggal_absensi" id="tl" value=""
								placeholder="Tanggal Absensi" autocomplete="off" required>
						</div>
					</div>
					<div class="form-group floating-label-form-group">
						<div class="form-group">
							<label for="hari">Hari</label>
							<input name="hari" type="text" class="form-control" id="hari" placeholder="" readOnly>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="waktu">Waktu mulai (jam mengajar)</label>
								<input name="waktu-mulai" type="text" class="form-control" id="waktumulai"
									placeholder="1-10">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="waktu">Waktu selesai (jam mengajar)</label>
								<input name="waktu-selesai" type="text" class="form-control" id="waktuselesai"
									placeholder="1-10">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="hari">Total Jam (Waktu mengajar)</label>
								<input name="jamke" type="text" class="form-control" id="jamke" placeholder="" readOnly>
							</div>
						</div>
					</div>



					<div class="form-group floating-label-form-group">
						<label for="jabatan">Status</label>
						<select name="status" id="basicSelect" class="form-control">
							<option value="" selected>Pilih Status</option>
							<option value="1">Hadir</option>
							<option value="2">Tidak Hadir</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
						value="Tutup">
					<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan"
						value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal update -->
<?php foreach($result as $value) : ?>
<div class="modal fade text-left" id="ubah<?= $value->absen_id;?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data User</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form enctype="multipart/form-data" action="<?=base_url("/Dashboard/AbsenGuru/edit/". $value->absen_id)?>"
				method="post">
				<?= csrf_field(); ?>
				<div class="modal-body">
					<div class="form-group floating-label-form-group">
						<label for="jabatan">Nama Guru</label>
						<select name="guru" id="basicSelect" class="form-control">
							<option value=" <?= $value->user_id?>" selected><?= $value->fullname?></option>
							<?php foreach($namaguru as $listGuru) : ?>
							<option value="<?= $listGuru->user_id?>"><?= $listGuru->fullname?></option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group floating-label-form-group">
						<label for="tl">Tanggal Absensi</label>
						<div class='input-group'>
							<input type="date" class="form-control" name="tanggal_absensi" id="tl"
								value="<?= $value->tanggal_absensi?>" placeholder="Tanggal Absensi" autocomplete="off"
								required>
						</div>
					</div>
					<div class="form-group floating-label-form-group">
						<div class="form-group">
							<label for="hari">Hari</label>
							<input name="hari" type="text" value="<?= $value->absen_hari?>" class="form-control" id="hari" placeholder="" readOnly>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="waktu">Waktu mulai (jam mengajar)</label>
								<input name="waktu-mulai" type="text" class="form-control" id="waktumulai"
									value="<?= $listAbsen->jam_masuk_ngajar?>" placeholder="1-10">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="waktu">Waktu selesai (jam mengajar)</label>
								<input name="waktu-selesai" type="text" class="form-control" id="waktuselesai"
									value="<?= $listAbsen->jam_keluar_ngajar?>" placeholder="1-10">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="jamke">Total Jam (Waktu mengajar)</label>
								<input name="jamke" type="text" class="form-control" id="jamke" placeholder=""
									value="<?= $listAbsen->total_jam?>" readOnly>
							</div>
						</div>
					</div>
					<div class="form-group floating-label-form-group">
						<label for="jabatan">Status</label>
						<select name="status" id="basicSelect" class="form-control">
							<option value="<?= $value->status?>" selected><?= $value->status?></option>
							<option value="1">Hadir</option>
							<option value="2">Tidak Hadir</option>
						</select>
					</div>
					<!-- <div class="form-group floating-label-form-group">
						<label for="jabatan">Status</label>
						<select name="status" id="basicSelect" class="form-control">
							<option value="" selected></option>
							<option value="1">Hadir</option>
							<option value="2">Sakit</option>
							<option value="3">Izin</option>
							<option value="4">Terlambat</option>
							<option value="5">Tidak Hadir</option>
						</select>
					</div> -->
				</div>
				<div class="modal-footer">
					<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
						value="Tutup">
					<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan"
						value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>

<!-- Modal hapus -->
<?php foreach($result as $value) : ?>
<div class="modal fade text-left" id="hapus<?= $value->absen_id;?>" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url("/Dashboard/AbsenGuru/delete/". $value->absen_id)?>" method="post">
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
		var checkboxes = document.getElementsByName('absen_id[]');
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = this.checked;
		}
	});
</script>
<script>
	var isWaktuSelesai = document.getElementById("waktuselesai");
	isWaktuSelesai.addEventListener('change', function () {
		var waktuMulai = Number(document.getElementById("waktumulai").value);
		var iniWaktuSelesai = this.value;
		var total = iniWaktuSelesai - waktuMulai;
		document.getElementById("jamke").value = total;
	});
</script>

<script>
	// Get the date input element
	const dateInput = document.getElementById('tl');

	// Add event listener to the date input element
	dateInput.addEventListener('change', () => {
		// Get the date value from the input
		const dateValue = dateInput.value;

		// Create a new Date object from the date value
		const date = new Date(dateValue);

		// Get the day of the week (0 = Sunday, 1 = Monday, etc.)
		const dayOfWeek = date.getDay();

		// Array of weekdays
		const weekdays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

		// Get the weekday string from the array
		const weekdayString = weekdays[dayOfWeek];

		// Log the weekday string
		console.log(weekdayString);
		document.getElementById('hari').value = weekdayString;
	});
</script>
<?= $this->endSection() ?>
<?= $this->include('template/footer'); ?>