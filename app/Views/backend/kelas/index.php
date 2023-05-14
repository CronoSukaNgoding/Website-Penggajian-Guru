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
                <h1 style="text-align: center">Kelas</h1>
                <button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
                    data-toggle="modal" data-target="#tambah">
                    <i class="ft-plus-circle"></i> Tambah data Kelas
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered zero-configuration" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 2%">No</th>
                            <th>Kode Kelas</th>
                            <th>Kelas</th>
                            <th style="text-align: center"><i class="ft-settings spinner"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
					$no = 1;
					foreach ($result as $value):
						?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $value->kd_kelas?></td>
                            <td><?= $value->nama_kelas?></td>
                            <td>
                                <button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 karyawan-edit"
									data-toggle="modal" data-target="#ubah<?= $value->kelas_id;?>" value=""
									title="Update data karyawan"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
									data-toggle="modal" data-target="#hapus<?= $value->kelas_id;?>" value=""
									title="Hapus data karyawan"><i class="ft-trash"></i></button>
                            </td>
                        </tr>

                        <?php
					endforeach;
					?>
                    </tbody>
                </table>
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
                <h3 class="modal-title" id="myModalLabel35"> Tambah data Kelas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url("/profil/tambahkelas/")?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group floating-label-form-group">
                        <label for="edit_nama">Kode Kelas</label>
                        <input type="hidden" id="karyawan_id" name="id">
                        <input type="text" class="form-control" name="kd_kelas" id="edit_nama"
                            placeholder="Kode Kelas" value="KL-<?=time();?>" autocomplete="off" readonly>
                    </div>
                    <div class="form-group floating-label-form-group">
                        <label for="edit_nama">Kelas</label>
                        <input type="hidden" id="karyawan_id" name="id">
                        <input type="text" class="form-control" name="nama_kelas" id="edit_nama"
                            placeholder="Nama Kelas" value="" autocomplete="off" required>
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

<!-- Modal edit -->
<?php foreach($result as $value) : ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubah<?= $value->kelas_id;?>" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Mapel</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <form action="<?=base_url("/profil/editkelas/".$value->kelas_id)?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
            <div class="modal-body">
                    <div class="form-group floating-label-form-group">
                        <label for="edit_nama">Kode Kelas</label>
                        <input type="hidden" id="karyawan_id" name="id">
                        <input type="text" class="form-control" name="kd_kelas" id="edit_nama"
                            placeholder="Kode Kelas" value="<?= $value->kd_kelas;?>" autocomplete="off" readonly>
                    </div>
                    <div class="form-group floating-label-form-group">
                        <label for="edit_nama">Kelas</label>
                        <input type="hidden" id="karyawan_id" name="id">
                        <input type="text" class="form-control" name="nama_kelas" id="edit_nama"
                            placeholder="Nama Kelas" value="<?= $value->nama_kelas;?>" autocomplete="off" required>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- Modal hapus -->
<?php foreach($result as $value) : ?>
<div class="modal fade text-left" id="hapus<?= $value->kelas_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url("/Dashboard/kelas/delete/". $value->kelas_id)?>" method="post">
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