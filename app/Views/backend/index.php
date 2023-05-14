<?= $this->include('template/header'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<?php if(session()->getFlashData("sukses")): ?>
				<div class="alert alert-success alert-dismissible animated fadeInDown"
					 style="position: absolute; width: 100%; z-index: 2" id="feedback"
					 role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Berhasil Login <?=session()->getFlashData("sukses")?>
				</div>
			<?php
			elseif (session()->getFlashData("sukses") == 'logged_in'): ?>
				<div class="alert alert-warning alert-dismissible animated fadeInDown"
					 style="position: absolute; width: 100%; z-index: 2" id="feedback"
					 role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Sudah Login
				</div>
			 <?php endif;?>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-12">
				<div class="row">
					<div class="col-12">
						<div class="card pull-up bg-gradient-directional-danger">
							<div class="card-header bg-hexagons-danger">
								<h4 class="card-title white">Profil</h4>
								<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li>
											<a class="btn btn-sm btn-white danger box-shadow-1 round pull-right"
											   href="/profil/<?= $user->user_id;  ?>">Lihat<i
													class="ft-arrow-right pl-1"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show bg-hexagons-danger">
								<div class="card-body">
									<div class="media d-flex">
										<div class="align-self-center width-100">
											<div><i class="fa-solid fa-user-gear" style="color: white;font-size: 700%"></i></div>
										</div>
										<div class="media-body text-right mt-1">
											<h3 class="font-large-2 white"></h3>
											<h6 class="mt-1"><span class="text-muted white"><?= $user->fullname;  ?></h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if ($_SESSION['role'] == 1) : ?>
			<div class="col-lg-4 col-md-12">
				<div class="row">
					<div class="col-12">
						<div class="card pull-up bg-gradient-directional-danger">
							<div class="card-header bg-hexagons-danger">
								<h4 class="card-title white">Jumlah Guru</h4>
								<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li>
											<a class="btn btn-sm btn-white danger box-shadow-1 round pull-right"
											   href="">Lihat<i
													class="ft-arrow-right pl-1"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show bg-hexagons-danger">
								<div class="card-body">
									<div class="media d-flex">
										<div class="align-self-center width-100">
											<div><i class="ft-users" style="color: white;font-size: 700%"></i></div>
										</div>
										<div class="media-body text-right mt-1">
											<h3 class="font-large-2 white"><?= $jmlguru;?></h3>
											<h6 class="mt-1"><span class="text-muted white">Jumlah Semua Guru</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="row">
					<div class="col-12">
						<div class="card pull-up bg-gradient-directional-danger">
							<div class="card-header bg-hexagons-danger">
								<h4 class="card-title white">Admin</h4>
								<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li>
											<a class="btn btn-sm btn-white danger box-shadow-1 round pull-right"
											   href="">Lihat<i
													class="ft-arrow-right pl-1"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show bg-hexagons-danger">
								<div class="card-body">
									<div class="media d-flex">
										<div class="align-self-center width-100">
											<div><i class="ft-user-check" style="color: white;font-size: 700%"></i>
											</div>
										</div>
										<div class="media-body text-right mt-1">
											<h3 class="font-large-2 white"><?= $jmlAdmin;?></h3>
											<h6 class="mt-1"><span class="text-muted white">Jumlah Semua Admin
											</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif?>
		</div>
	</div>
</div>
<?= $this->include('template/footer'); ?>
