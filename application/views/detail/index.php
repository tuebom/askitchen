
	<!--content-->
        <div class="content">
			<!--single-->
			<div class="single-wl3">
				<div class="container">
					<div class="single-grids">
						<div clas="single-top">
							<div class="single-left">
								<!-- <div class="thumb-image"> <img src="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>" data-imagezoom="true" class="img-responsive2"> </div> -->
								<div class="flexslider">
									<ul class="slides">
										<li data-thumb="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>">
											<div class="thumb-image"> <img src="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>" data-imagezoom="true" class="img-responsive"> </div>
										</li>
										<li data-thumb="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>">
												<div class="thumb-image"> <img src="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>" data-imagezoom="true" class="img-responsive"> </div>
										</li>
										<li data-thumb="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>">
											<div class="thumb-image"> <img src="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>" data-imagezoom="true" class="img-responsive"> </div>
										</li> 
									</ul>
								</div>
							</div>
							<div class="single-right simpleCart_shelfItem">
								
								<form id="formAdd" action="<?= site_url('cart/add'); ?>" method="post">
								<input type="hidden" name="kode" value="<?= $this->data['product']->kdbar ?>">
								<input type="hidden" id="qty" name="qty" value="1">
								
								<h4><?= $this->data['product']->nama . ' ('. $this->data['product']->kdbar .')' ?></h4>
								<div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								<span class="size"><?= $this->data['product']->pnj; ?> x <?= $this->data['product']->lbr; ?> x <?= $this->data['product']->tgi; ?> CM</span>
								<p class="price item_price">Rp <?= $this->data['product']->hjual ?></p>
								
								<!--<div class="description">
									<p><span>Fitur: </span> In cursus faucibus tortor eu vestibulum. Ut eget turpis ac justo porta varius. Donec vel felis ante, ac vehicula ipsum. Quisque sed diam metus. Quisque eget leo sit amet erat varius rutrum vitae dapibus lectus. Vivamus et sapien ante. Suspendisse potenti. Fusce in tellus est, ac consequat.</p>
								</div>-->
								<div class="color-quality">
									<h6>Quantity:</h6>
										<div class="quantity"> 
											<div class="quantity-select">                           
												<div class="entry value-minus">&nbsp;</div>
												<div class="entry value"><span>1</span></div>
												<div class="entry value-plus active">&nbsp;</div>
											</div>
										</div>
										<script>
										$('.value-plus').on('click', function(){
											var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
											divUpd.text(newVal);
											$(this).parents("#formAdd").find('#qty')[0].value = divUpd.text();
										});

										$('.value-minus').on('click', function(){
											var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
											if(newVal>=1) divUpd.text(newVal);
											$(this).parents("#formAdd").find('#qty')[0].value = divUpd.text();
										});
										</script>
								</div>
								<div class="women">
									<a href="javascript:{}" onclick="document.getElementById('formAdd').submit(); return false;" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
								</div>
								<div class="social-icon">
									<h6>Share:</h6>
									<a href="#"><i class="icon"></i></a>
									<a href="#"><i class="icon1"></i></a>
									<!-- <a href="#"><i class="icon2"></i></a>
									<a href="#"><i class="icon3"></i></a> -->
								</div>
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="tab-wl3">
									<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
										<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
											<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
											<li role="presentation" class=""><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Fitur</a></li>
										</ul>
										<div id="myTabContent" class="tab-content">
											<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab"><div class="descr">
												<!--<h4>Suspendisse laoreet, augue vel mattis </h4>-->
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
											</div></div>
											
											<div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
												<ul>
													<li> Twin button front fastening</li>
													<li> Length:65cm</li>
													<li> Regular fit</li>
													<li> Notched lapels</li>
													<li> Internal pockets</li>
													<li> Centre-back vent </li>
													<li> Material : Outer: 40% Linen &amp; 40% Polyamide; Body Lining: 100% Cotton; Lining: 100% Acetate</li>
												</ul>
												<!--<div class="descr"><div class="reviews-top"><div class="reviews-left"><img src="http://localhost/askitchen/images/men3.jpg" alt=" " class="img-responsive"></div><div class="reviews-right">
													<ul>
														<li><a href="#">Admin</a></li>
														<li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li>
													</ul>
													<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p></div>
													<div class="clearfix"></div>
												</div>
												<div class="reviews-bottom">
													<h4>Add Reviews</h4>
													<p>Your email address will not be published. Required fields are marked *</p>
													<p>Your Rating</p><div class="block">
														<div class="starbox small ghosting"><div class="positioner"><div class="stars"><div class="ghost" style="width: 42.5px; display: none;"></div><div class="colorbar" style="width: 42.5px;"></div><div class="star_holder"><div class="star star-0"></div><div class="star star-1"></div><div class="star star-2"></div><div class="star star-3"></div><div class="star star-4"></div></div></div></div></div></div>
													<form action="#" method="post">
														<label>Your Review </label><textarea type="text" name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
														<div class="row">
															<div class="col-md-6 row-grid"><label>Name</label>
																<input type="text" value="Name" name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required=""></div>
															<div class="col-md-6 row-grid"><label>Email</label>
																<input type="email" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required=""></div>
														<div class="clearfix"></div></div>
														<input type="submit" value="SEND">
													</form></div></div>-->
											</div>
											<div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab"></div>
										</div>
									</div>
								</div>
						<div clas="single-top">
						</div>
						<div class="clearfix"> </div>
					</div>
					<!--Product Description-->
						<!--<div class="product-w3agile">
							<h3 class="tittle1">Product Description</h3>
							<div class="product-grids">
								<div class="col-md-4 product-grid">
									<div id="owl-demo" class="owl-carousel">
										<div class="item">
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r.jpg');?>" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 29.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r1.jpg');?>" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 19.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r2.jpg');?>" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 19.00</span>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r3.jpg');?>" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1">$ 45.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
										</div>
										<div class="item">
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r4.jpg');?>" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 29.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r5.jpg');?>" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 19.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r2.jpg');?>" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 19.00</span>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r3.jpg');?>" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1">$ 45.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
										</div>
									</div>
									<img class="img-responsive " src="<?=base_url('images/woo2.jpg');?>" alt="">
								</div>
								<div class="col-md-8 product-grid1">
									<div class="tab-wl3">
										<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
											<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
												<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
												<li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Reviews (1)</a></li>

											</ul>
											<div id="myTabContent" class="tab-content">
												<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
													<div class="descr">
														<h4>Suspendisse laoreet, augue vel mattis </h4>
														<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
														<p class="quote">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
															<div class="video">
															<iframe src="https://player.vimeo.com/video/22158502" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
															</div>
														<ul>
															<li> Twin button front fastening</li>
															<li> Length:65cm</li>
															<li> Regular fit</li>
															<li> Notched lapels</li>
															<li> Internal pockets</li>
															<li> Centre-back vent </li>
															<li> Material : Outer: 40% Linen &amp; 40% Polyamide; Body Lining: 100% Cotton; Lining: 100% Acetate</li>
														</ul>
														<p class="quote">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>

													</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
													<div class="descr">
														<div class="reviews-top">
															<div class="reviews-left">
																<img src="<?=base_url('images/men3.jpg');?>" alt=" " class="img-responsive">
															</div>
															<div class="reviews-right">
																<ul>
																	<li><a href="#">Admin</a></li>
																	<li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li>
																</ul>
																<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="reviews-bottom">
															<h4>Add Reviews</h4>
															<p>Your email address will not be published. Required fields are marked *</p>
															<p>Your Rating</p>
															<div class="block">
																<div class="starbox small ghosting"><div class="positioner"><div class="stars"><div class="ghost" style="width: 42.5px; display: none;"></div><div class="colorbar" style="width: 42.5px;"></div><div class="star_holder"><div class="star star-0"></div><div class="star star-1"></div><div class="star star-2"></div><div class="star star-3"></div><div class="star star-4"></div></div></div></div></div>
															</div>
															<form action="#" method="post">
																<label>Your Review </label>
																<textarea type="text" Name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
																<div class="row">
																	<div class="col-md-6 row-grid">
																		<label>Name</label>
																		<input type="text" value="Name" Name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
																	</div>
																	<div class="col-md-6 row-grid">
																		<label>Email</label>
																		<input type="email" value="Email" Name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
																	</div>
																	<div class="clearfix"></div>
																</div>
																<input type="submit" value="SEND">
															</form>
														</div>
													</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab">
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>-->
					<!--Product Description-->
				</div>
			</div>
			<!--single-->
			<!--reviews-->
			<div class="reviews">
				<div class="container">
					<h3 class="tittle1">Reviews</h3>
					<div class="col-md-6">
						<div class="related-grids">
							<div class="reviews-top">
								<?php
									foreach ($this->data['reviews'] as $item) {
								?>
								<div class="comment">
									<div class="reviews-left">
										<img src="<?=site_url('images/user.jpg');?>" alt=" " class="img-responsive">
									</div>
									<div class="reviews-right">
										<ul>
											<li><a href="#"><?=$item->name?></a> <!--<?=date_format($item->timestamp, "j D Y")?>--></li>
											<li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li>
										</ul>
										<p><?=$item->comment?></p>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php }
									if($this->data['totreviews'] > 3): ?>
								<input type="button" value="Read All Reviews">
								<?php endif; ?>
							</div>
							<div class="reviews-bottom">
								<h4>Add Reviews</h4>
								<p>Your email address will not be published. Required fields are marked *</p>
								<p>Your Rating</p>
								<!-- <div class="block">
									<div class="starbox small ghosting"><div class="positioner" style=""><div class="stars"><div class="ghost" style="width: 0px; display: none;"></div><div class="colorbar" style="width: 42.5px;"></div><div class="star_holder"><div class="star star-0"></div><div class="star star-1"></div><div class="star star-2"></div><div class="star star-3"></div><div class="star star-4"></div></div></div></div></div>
								</div> -->
								<form action="<?=current_url().'?action=comment';?>" method="post">
									<input type="hidden" name="kdbar" value="<?= $this->data['product']->kdbar ?>">
									<input type="hidden" name="url" value="<?= current_url() ?>">
									<label>Your Review </label>
									<textarea type="text" name="comment" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required><?=isset($this->data['comment']) ? $this->data['comment'] : 'Message...';?></textarea>
									<div class="row">
										<div class="col-md-6 row-grid">
											<label>Name</label>
											<input type="text" value="<?=isset($this->data['name']) ? $this->data['name'] : 'Name';?>" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required>
										</div>
										<div class="col-md-6 row-grid">
											<label>Email</label>
											<input type="email" value="<?=isset($this->data['email']) ? $this->data['email'] : 'Email';?>" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="row">
										<div class="col-md-6 row-grid">
											<img class="captcha" src="<?=site_url($this->data['assets_dir'].'/captcha/captcha.php')?>">
										</div>
										<div class="col-md-6 row-grid">
											<label>Captcha</label>
											<input type="text" name="captcha" required>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="row">
										<div class="col-md-3 col-xs-4 row-grid">
											<input id="btnSend" type="submit" value="Send">
										</div>
										<div class="col-md-9 col-xs-8 row-grid">
											<label class="message"><?=isset($this->data['message']) ? $this->data['message'] : '';?></label>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--reviews-->
			<?php
				if (count($this->data['related']) > 0) :
			?>
			<!--related-products-->
			<div class="related-w3agile">
				<div class="container">
					<h3 class="tittle1">Related Products</h3>
					<div class="related-grids">
						<?php
							// for($i=0; $i<6;$i++) $this->data['related'][$i]
							$index = 0;
							foreach ($this->data['related'] as $item) {
						?>
						<div class="col-md-3 related-grid simpleCart_shelfItem">
							<div class="grid-rel">
								<div class="grid-related">
									<figure>		
										<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" class="new-gri">
											<div class="grid-img">
												<img src="<?=site_url($this->data['products_dir'].'/'.$item->gambar);?>" class="img-responsive" alt="<?= $item->kdbar?>">
											</div>
										</a>		
									</figure>	
								</div>
								<div class="women">
									<p ><em class="item_price">Rp<?= $item->hjual; ?></em></p>
									<span class="size"><?= $item->kdbar; ?></span>
									<span class="size"><?= $item->pnj; ?> x <?= $item->lbr; ?> x <?= $item->tgi; ?> CM</span>
									<span class="detail"><a href="<?php echo site_url('detail/'.$item->kdurl); ?>" data-text="See Details" class="my-cart-d item_add">See Details</a></span>
								</div>
							</div>
						</div>
						<?php 
							$index++;
							if ($index == 6) break;
							} ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!--related-products-->
			<?php
				endif;
			?>
		</div>
    <!--content-->