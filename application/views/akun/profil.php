    <!--content-->
	<div class="content" style="background-color:lightgrey;">
		<div class="container">
			<div class="product-agileinfo-grids w3l">
				<div class="col-md-3">
					<div class="row">
						<img class="profile" src="<?= site_url('images/men3.jpg'); ?>" alt="profile"/>
						<span class="profile"style=""><b>Nama Member</b><br><i class="fa fa-pencil"></i>&nbsp;<a>Ubah Profil</a></span></a>
					</div>
					<div class="row">
						<ul class="tree-list-pad">
						<li><input type="checkbox" id="item-01" /><label class="tree" for="item-01"><span></span>Profil Saya</label></li>
						<li><input type="checkbox" id="item-02" /><a href="<?php echo site_url('akun?p=bb'); ?>">Belanjaan Saya</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<h4>Profil Saya</h4>
					</div>
					<div class="row profile">
						<div class="col-md-8">
							<div class="row">
								<div class="col-sm-6">    
                                    <div class="form-group">
                                        <label for="firstname"><?= lang('account_first_name') ?></label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?=isset($this->data['anggota']->first_name) ? $this->data['anggota']->first_name : '';?>" placeholder="Enter first name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">    
                                    <div class="form-group">
                                        <label for="lastname"><?= lang('account_last_name') ?></label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?=isset($this->data['anggota']->last_name)? $this->data['anggota']->last_name : '';?>" placeholder="Enter last name" required>
                                    </div>
                                </div>
							</div>
                            <div class="row">
                                <div class="col-sm-12">    
                                    <div class="form-group">
                                        <label for="company"><?= lang('account_company') ?></label>
                                        <input type="text" class="form-control" id="company" name="company" value="<?=isset($this->data['anggota']->company)? $this->data['anggota']->company : '';?>" placeholder="Enter company name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">    
                                    <div class="form-group">
                                        <label for="address"><?= lang('account_address') ?></label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?=isset($_SESSION["address"])? $_SESSION["address"] : '';?>" placeholder="Enter address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">    
                                    <div class="form-group">
                                        <label for="province"><?= lang('account_province') ?></label>
                                        <select id="province" name="province" class="form-control">
                                            <option value=""<?=isset($_SESSION['province'])?'': ' selected';?>>-</option>
                                            <?php
                                                foreach ($this->data['provinsi'] as $itemx) {
                                                    if (isset($_SESSION['province']))
                                                    {
                                            ?>
                                            <option value="<?= $itemx->id ?>"<?php if( $itemx->id == $_SESSION['province'] ): ?> selected="selected"<?php endif; ?>><?= $itemx->name ?></option>
                                            <?php   } else { ?>
                                            <option value="<?= $itemx->id ?>"><?= $itemx->name ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">    
                                    <div class="form-group">
                                        <label for="regency"><?= lang('account_regency') ?></label>
                                        <select id="regency" name="regency" class="form-control">
                                        <?php
                                            if (isset($this->data['kabupaten'])) :
                                                foreach ($this->data['kabupaten'] as $item) {
                                        ?>
                                        <option value="<?= $item->id ?>"<?php if( $_SESSION["regency"] == $item->id ): ?> selected="selected"<?php endif; ?>><?= $item->name ?></option>
                                        <?php   }
                                            endif;
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">    
                                    <div class="form-group">
                                        <label for="district"><?= lang('account_district') ?></label>
                                        <select id="district" name="district" class="form-control">
                                        <?php
                                            if (isset($this->data['kecamatan'])) :
                                                foreach ($this->data['kecamatan'] as $item) {
                                        ?>
                                        <option value="<?= $item->id ?>"<?php if( $_SESSION["district"] == $item->id ): ?> selected="selected"<?php endif; ?>><?= $item->name ?></option>
                                        <?php   }
                                            endif;
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">    
                                    <div class="form-group">
                                        <label for="zip"><?= lang('account_post_code') ?></label>
                                        <input type="text" class="form-control" id="post_code" name="post_code" value="<?=isset($_SESSION["post_code"])? $_SESSION["post_code"] : '';?>" placeholder="Enter post code">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">    
                                    <div class="form-group">
                                        <label for="phone"><?= lang('account_phone') ?></label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?=isset($this->data['anggota']->phone)? $this->data['anggota']->phone : '';?>" placeholder="Enter phone number">
                                    </div>
                                </div>
                                <div class="col-sm-6">    
                                    <div class="form-group">
                                        <label for="email"><?= lang('account_email') ?></label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?=isset($this->data['anggota']->email)? $this->data['anggota']->email : '';?>" placeholder="Enter email address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3"></div>
                            </div>
						</div>
						<div class="col-md-4">
							<div class="row profile-grid"><img class="propic img-responsive img-circle" src="<?= site_url('images/men3.jpg'); ?>"></div>
							<div class="row col-md-6 col-md-offset-3 profile-grid"><a class="button-pic" href="#">Pilih Gambar</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--content-->
