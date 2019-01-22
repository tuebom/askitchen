    <!--content-->
	<div class="content" style="background: lightgrey;">
		<div class="container">
			<div class="product-agileinfo-grids w3l">
				<div class="col-md-3">
                    <div class="row">
                        <img class="profile" src="<?= site_url('images/men3.jpg'); ?>" alt="profile"/>
                        <span class="profile"style=""><b>Nama Member</b><br><i class="fa fa-pencil"></i>&nbsp;<a>Ubah Profil</a></span></a>
                    </div>
					<div class="row">
						<ul class="tree-list-pad">
						<li><input type="checkbox" id="item-01" /><a href="<?php echo site_url('akun'); ?>">Profil Saya</a></li>
						<li><input type="checkbox" id="item-02" /><label class="tree" for="item-01"><span></span>Belanjaan Saya</label></li>
						</ul>
					</div>
                </div>
				<div class="col-md-9">
                    <div class="row">
                        <ul class="nav nav-page nav-fill">
                            <li class="nav-item"><a href="#" class="nav-link">Belum Bayar</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('akun?p=bk'); ?>" class="nav-link">Belum Dikirimkan</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('akun?p=bt'); ?>" class="nav-link">Belum Diterima</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('akun?p=bs'); ?>" class="nav-link">Selesai</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <?php ?>
                        <?php ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!--content-->
