<?= $this->include('template/header'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card profil">
            <div class="card-body">

                <h4 class="card-title">Informasi Dasar</h4>
                <p class="card-title-desc">*Diwajibkan mengisi biodata yang tertera</p>

                <form action="<?=base_url("/profil/updateprofil/". $user->user_id)?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group floating-label-form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="fullname" id="nama" placeholder="Nama"
                            value="<?= $result->fullname;?>" autocomplete="off" required>
                    </div>

                    <div class="form-group floating-label-form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="email"
                            value="<?= $result->email;?>" autocomplete="off" required>
                    </div>
                    <div class="form-group floating-label-form-group">
                        <label for="tempat"> NUPTK</label>
                        <input type="number" class="form-control" name="nuptk" id="tempat" value="" placeholder=" NUPTK"
                            autocomplete="off" required>
                    </div>
                    <div class="form-group floating-label-form-group">
                        <label for="tempat">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat" value=""
                            placeholder="Tempat Lahir" autocomplete="off" required>
                    </div>
                    <div class="form-group floating-label-form-group">
                        <label for="tl">Tanggal Lahir</label>
                        <div class='input-group'>
                            <input type="date" class="form-control" name="tgl_lahir" id="tl" value=""
                                placeholder="Tanggal Lahir" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group floating-label-form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Alamat"
                            autocomplete="off" required></textarea>
                    </div>
                    

                    <div class="form-group floating-label-form-group">
                        <label for="jabatan">Jenis Kelamin</label>
                        <select name="jenis kelamin" id="basicSelect" class="form-control">
                            <option value="" selected>Pilih Jenis Kelamin</option>
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group floating-label-form-group">
                        <label for="nohp">Nomor HP</label>
                        <input type="number" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP"
                            value="" autocomplete="off" required>
                    </div>

                    <div class="form-group floating-label-form-group">
                        <label for="avatar">Pas Foto</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Pas Foto"
                            value="" autocomplete="off" required>
                    </div>

                    <div class=" flex-wrap gap-2 ">
                        <button type="submit " class="btn btn-primary waves-effect waves-light ">Simpan</button>
                        <button type="button " class="btn btn-secondary waves-effect waves-light ">Batal</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->include('template/footer'); ?>