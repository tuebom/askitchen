		<!--content-->
		<div class="content register-page">
			<!--login-->
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" class="active" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="<?= site_url('login') ?>" method="post" role="form" style="display: none;">
									<?php if (isset($this->data['message_login'])) echo $this->data['message_login'];?>
									<div class="form-group has-feedback">
										<input type="text" name="identity" id="email" tabindex="1" class="form-control" placeholder="<?php echo lang('auth_your_email') ?>" value="">
										<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="<?php echo lang('auth_your_password') ?>">
										<span class="glyphicon glyphicon-lock form-control-feedback"></span>
									</div>
									<div class="row">
										<div class="col-xs-8">
											<a href="<?= site_url('recover') ?>" class="forget" tabindex="5" class="forgot-password">Forgot Password?</a>
											<!-- <label class="control control--checkbox">Remember Me
											-- <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> --
											<input type="checkbox">
											<div class="control__indicator"></div>
											</label> -->
										</div>
										<!-- /.col -->
										<div class="col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
										</div>
										<!-- /.col -->
									</div>
									<!--<div class="social-auth-links text-center">
										<p>- OR -</p>
										<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
										<a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
									</div>-->
									<!-- <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="<?= site_url('recover') ?>" class="forget" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div> -->
								</form>
								<form id="register-form" action="<?= site_url('register') ?>" method="post" role="form" style="display: block;">
									<?php if (isset($this->data['message_register'])) echo $this->data['message_register'];?>
									<div class="form-group">
										<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="<?php echo lang('users_firstname') ?>" value="<?=isset($this->data['first_name']) ? $this->data['first_name']['value'] : '';?>">
									</div>
									<div class="form-group">
										<input type="text" name="last_name" id="last_name" tabindex="2" class="form-control" placeholder="<?php echo lang('users_lastname') ?>" value="<?=isset($this->data['last_name']) ? $this->data['last_name']['value'] : '';?>">
									</div>
									<div class="form-group has-feedback">
										<input type="email" name="email" id="email2" tabindex="3" class="form-control" placeholder="<?php echo lang('users_email') ?>" value="<?=isset($this->data['email']) ? $this->data['email']['value'] : '';?>">
										<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="password" name="password" id="password2" tabindex="4" class="form-control" placeholder="<?php echo lang('users_password') ?>" value="<?=isset($this->data['password']) ? $this->data['password']['value'] : '';?>">
										<span class="glyphicon glyphicon-lock form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="password" name="password_confirm" id="password_confirm" tabindex="6" class="form-control" placeholder="<?php echo lang('users_password_confirm') ?>" value="<?=isset($this->data['password_confirm']) ? $this->data['password_confirm']['value'] : '';?>">
										<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
									</div>
									<div class="row">
										<div class="col-xs-8">    
											<label>By clicking register, I agree to your <a href="<?=site_url('terms-of-use');?>" class="term">terms</a> and <a href="<?=site_url('privacy-policy');?>" class="policy">privacy policy</a></label>
											<!--<label class="control control--checkbox">I agree to the <a href="<?=site_url('terms-of-use');?>">terms</a> and <a href="<?=site_url('privacy-policy');?>">privacy policy</a></label>
												<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> I agree to the <a href="<?=site_url('term-of-use');?>">terms</a> and <a href="<?=site_url('privacy-policy');?>">privacy policy</a>
												<input type="checkbox">
												<div class="control__indicator"></div>
											-- </label> -->
										</div>
										<!-- /.col -->
										<div class="col-xs-4">
											<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
										</div>
										<!-- /.col -->
									</div>
									<!--<div class="social-auth-links text-center">
										<p>- OR -</p>
										<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
											Facebook</a>
										<a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign up using
											Google+</a>
									</div>-->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--login-->
		</div>
		<!--content-->
