<?= $this->include('template/header'); ?>
<?php foreach($result as $value) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                <form action="<?=base_url("/profil/updateajar/".$value->ajar_id)?>" method="post">


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode">Kode Pelajaran</label>
                                <input name="kode" type="text" class="form-control" id="kode" value="MPL-<?=time();?>"
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Guru Mata Pelajaran</label>
                                <select name="guru" class="form-control">
                                    <option value="<?= $value->id_guru?>" selected><?= $value->fullname?></option>
                                    <?php foreach($cekguru as $listGuru) : ?>
                                    <option value="<?= $listGuru->user_id?>"><?= $listGuru->fullname?></option>
                                    <?php endforeach;?>


                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <select name="mapel" class="form-control">
                                    <option value="<?= $value->idmapel?>" selected><?= $value->mapel?></option>
                                    <?php foreach($cekmapel as $listMapel) : ?>
                                    <option value="<?= $listMapel->mapel_id?>"><?= $listMapel->mapel?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <label>Hari</label><br />
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="hari" value="Senin"<?php if ($value->hari === 'Senin') echo 'checked'; ?>>
                                    <span class="form-radio-sign">Senin</span>
                                </label>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="hari" value="Selasa" <?php if ($value->hari === 'Selasa') echo 'checked'; ?>>
                                    <span class="form-radio-sign">Selasa</span>
                                </label>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="hari" value="Rabu" <?php if ($value->hari === 'Rabu') echo 'checked'; ?>>
                                    <span class="form-radio-sign">Rabu</span>
                                </label>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="hari" value="Kamis" <?php if ($value->hari === 'Kamis') echo 'checked'; ?>>
                                    <span class="form-radio-sign">Kamis</span>
                                </label>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="hari" value="Jum'at" <?php if ($value->hari === 'Jumat') echo 'checked'; ?>>
                                    <span class="form-radio-sign">Jum'at</span>
                                </label>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="hari" value="Sabtu" <?php if ($value->hari === 'Sabtu') echo 'checked'; ?>>
                                    <span class="form-radio-sign">Sabtu</span>
                                </label>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Kelas</label>
                            <select name="kelas" class="form-control">
                                <option value="<?= $value->idkelas?>"><?= $value->nama_kelas?></option>

                              <?php foreach($cekkelas as $listkelas) : ?>
                                    <option value="<?= $listkelas->kelas_id?>"><?= $listkelas->nama_kelas?></option>
                                    <?php endforeach;?>
                            </select>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu">Waktu mulai (jam)</label>
                                <input name="waktu-mulai" type="text" class="form-control" id="waktumulai"
                                    placeholder="1-10"value="<?=$value->waktu_mulai?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu">Waktu selesai (jam)</label>
                                <input name="waktu-selesai" type="text" class="form-control" id="waktuselesai"
                                    placeholder="1-10" value="<?=$value->waktu_selesai?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jamke">Total Jam (Waktu Ajar)</label>
                                <input name="jamke" value="<?=$value->jam_kerja?>"type="text" class="form-control" id="jamke" placeholder="" readOnly >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="save" class="btn btn-secondary">
                                    <i class="far fa-save"></i> Simpan
                                </button>
                                <a href="javascript:history.back()" class="btn btn-danger">
                                    <i class="fas fa-angle-double-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>


<?= $this->section('javascript') ?>
<script>
    var isWaktuSelesai = document.getElementById("waktuselesai");
        isWaktuSelesai.addEventListener('change', function() {
            var waktuMulai = Number(document.getElementById("waktumulai").value);
            var iniWaktuSelesai = this.value;
            var total = iniWaktuSelesai -  waktuMulai ;
            document.getElementById("jamke").value = total;
        });
</script>
<?= $this->endSection() ?>
<?= $this->include('template/footer'); ?>