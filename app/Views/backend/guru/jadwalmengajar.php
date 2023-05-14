<?= $this->include('template/header'); ?>
<div class="row d-print-none">
    <div class="col-md-12">
        <div class="card box-shadow-2">
            <div class="card-header">
                <h1 style="text-align: center">Mata Pelajaran</h1>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($result as $value):?>
                            <div class="col-md-4 col-xs-12">

                                <div class="alert alert-info alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>
                                        <h3 class="text-dark"><?=$value->mapel?></h3>
                                    </strong>
                                    <hr>
                                    <ul>
                                        <li>
                                            Hari : <?= $value->hari?> </li>
                                        <li>
                                            Total Jam : <?= $value->jam_kerja?> </li>
                                        <li>
                                            Waktu : Jam <?= $value->waktu_mulai?>- Jam <?= $value->waktu_selesai?> </li>
                                        <li>
                                            Kelas : <?= $value->nama_kelas?></li>
                                    </ul>
                                    <hr>

                                </div>
                            </div>
                           <?php
            endforeach;
					?>
					
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <h4 style="text-align: center">Total gaji anda bulan ini sebesar : <strong style="color: red;">Rp.<?= $gaji['total_gaji']?></strong></h4>
            </div>
             
        </div>
    </div>
</div>
<?= $this->include('template/footer'); ?>