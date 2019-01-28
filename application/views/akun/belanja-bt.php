				<div class="col-md-9">
                    <div class="row">
                        <ul class="nav nav-page nav-fill">
                            <li class="nav-item"><a href="<?php echo site_url('akun?p=bb'); ?>" class="nav-link">Belum Bayar</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('akun?p=bk'); ?>" class="nav-link">Belum Dikirimkan</a></li>
                            <li class="nav-item"><a href="#" class="nav-link active">Belum Diterima</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('akun?p=bs'); ?>" class="nav-link">Selesai</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        
                        <ul class="cart-items">
                        <?php 
                        foreach ($this->data['detil'] as $item) {
                        ?>
                            <li class="clearfix">
                                <div style="display: flex; align-items: center;">
                                    <div class="cart-img">
                                        <img class="cart-item-img" src="<?= site_url($this->data['products_dir'].'/'.$item->gambar); ?>" alt="<?=$item->kdbar?>" />
                                    </div>
                                    <div class="cart-desc">
                                        <div class="item-name"><?= $item->nama; ?></div>
                                        <span class="item-quantity">Qty: <?= $item->qty; ?></span>
                                    </div>
                                    <div class="cart-price">
                                        <span class="item-price">Rp<?= number_format($item->jumlah, 0, ',', '.') ?></span>&nbsp;
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>

                    </div>
				</div>
			</div>
		</div>
	</div>
	<!--content-->
