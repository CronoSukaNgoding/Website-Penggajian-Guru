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
				<h1 style="text-align: center">Mata Pelajaran</h1>
				 <button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
                    data-toggle="modal" data-target="#tambah">
                    <i class="ft-plus-circle"></i> Tambah data mapel
                </button>
			</div>
			<div class="card-body">
				<table class="table table-bordered zero-configuration" style="width: 100%">
					<thead>
					<tr>
						<th style="width: 2%">No</th>
						<th>Kode</th>
						<th>Nama Mapel</th>
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
							<td><?= $value->kode_mapel?></td>
							<td><?= $value->mapel?></td>
							<td>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 karyawan-edit"
									data-toggle="modal" data-target="#ubah<?= $value->mapel_id;?>" value=""
									title="Update data karyawan"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus"
									data-toggle="modal" data-target="#hapus<?= $value->mapel_id;?>" value=""
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Mapel</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="<?=base_url("/profil/tambahmapel/")?>" method="post" class="form-horizontal">
                     <div class="form-group">
                        <label>Kode mapel</label>
                        <input name="kode_mapel" type="text" value="MP-<?=time() ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama mapel</label>
                        <input name="mapel" type="text" placeholder="Nama mapel .." class="form-control">
                    </div>

                   
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
               

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal edit -->
<?php foreach($result as $value) : ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubah<?= $value->mapel_id;?>" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Mapel</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="<?=base_url("/profil/editmapel/". $value->mapel_id)?>" method="post" class="form-horizontal">
                     <div class="form-group">
                        <label>Kode mapel</label>
                        <input name="kode_mapel" type="text" value="<?= $value->kode_mapel?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama mapel</label>
                        <input name="mapel" type="text" value="<?= $value->mapel?>"placeholder="Nama mapel .." class="form-control">
                    </div>

                   
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Save</button>
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
<div class="modal fade text-left" id="hapus<?= $value->mapel_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url("/Dashboard/mapel/delete/". $value->mapel_id)?>" method="post">
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