		<!--banner-->
		<div class="banner-w3">
			<div class="demo-1">      
				<div id="example1" class="core-slider core-slider__carousel example_1">
					<div class="core-slider_viewport">
						<div class="core-slider_list">
							<div class="core-slider_item">
								<img src="<?php echo site_url('images/ban1-2.jpg'); ?>" class="img-responsive" alt="">
							</div>
							 <div class="core-slider_item">
								 <img src="<?php echo site_url('images/ban2-3.jpg'); ?>" class="img-responsive" alt="">
							 </div>
							<div class="core-slider_item">
								 <img src="<?php echo site_url('images/ban3-2.jpg'); ?>" class="img-responsive" alt="">
							</div>
						</div>
					</div>
					<div class="core-slider_nav">
						<div class="core-slider_arrow core-slider_arrow__right"></div>
						<div class="core-slider_arrow core-slider_arrow__left"></div>
					</div>
					<div class="core-slider_control-nav"></div>
				</div>
			</div>
			<link href="<?php echo site_url('css/coreSlider.css'); ?>" rel="stylesheet" type="text/css">
			<script src="<?php echo site_url('js/coreSlider.js'); ?>"></script>
			<script>
			$('#example1').coreSlider({
			 pauseOnHover: false,
			 interval: 3000,
			 controlNavEnabled: true
			});

			</script>
		<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>


		</div>
		<!--banner-->
		<!--content-->
		<div class="content">
			<!--banner-bottom-->
				<!--<div class="ban-bottom-w3l">
					<div class="container">
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="<?php echo site_url('images/p1.jpg'); ?>" class="img-responsive" alt=""/>
								<div class="ban-text">
									<h4>Men’s Clothing</h4>
								</div>
								<div class="ban-text2 hvr-sweep-to-top">
									<h4>50% <span>Off/-</span></h4>
								</div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="<?php echo site_url('images/p2.jpg'); ?>" class="img-responsive" alt=""/>
								<div class="ban-text1">
									<h4>Women's Clothing</h4>
								</div>
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="<?php echo site_url('images/p3.jpg'); ?>" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>T - Shirt</h4>
										</div>
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="<?php echo site_url('images/p4.jpg'); ?>" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>Hand Bag</h4>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>-->
			<!--banner-bottom-->

			<!--hot-products-->
			<div class="hot-w3agile">
				<div class="container">
					<!--<h4 class="tittle1">New Arrivals</h4>-->
					<div class="arrivals-grids">
						<div class="col-md-4 arrival-grid simpleCart_shelfItem">
							<div class="grid-arr-hot">
								<a href="<?php echo site_url(); ?>" class="new-gri">
									<img src="<?=site_url('images/hot-product.jpg');?>" class="img-hot" alt="">
									<div class="text">
										<h3>Hot Products</h3>
									</div>
								</a>		
							</div>
						</div>
					
						<div class="col-md-4 arrival-grid simpleCart_shelfItem">
							<div class="grid-arr-hot">
								<a href="<?php echo site_url(); ?>" class="new-gri">
									<img src="<?=site_url('images/promotion.jpg');?>" class="img-hot" alt="">
									<div class="text">
										<h3>Promotions</h3>
									</div>
								</a>		
							</div>
						</div>
						
						<div class="col-md-4 arrival-grid simpleCart_shelfItem">
							<div class="grid-arr-hot">
								<a href="<?php echo site_url(); ?>" class="new-gri">
									<img src="<?=site_url('images/best-seller.jpg');?>" class="img-hot" alt="">
									<div class="text">
										<h3>Best Seller</h3>
									</div>
								</a>		
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!--hot-products-->

			<!--new-arrivals-->
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h4 class="tittle1">New Arrivals</h4>
						<div class="arrivals-grids">
							<?php
								foreach ($this->data['rnd_products'] as $item) {
							?>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div class="grid-arrival">
										<figure>		
											<!--<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
											<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" class="new-gri">
												<div class="grid-img">
													<img src="<?=site_url($this->data['products_dir'].'/'.$item->gambar);?>" class="img-responsive" alt="<?= $item->kdbar?>">
												</div>
											</a>		
										</figure>	
									</div>
									<!--<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>-->
									<div class="women">
										<p ><em class="item_price">Rp<?= $item->hjual; ?></em></p>
										<span class="size"><?= $item->kdbar; ?></span>
										<span class="size"><?= $item->pnj; ?> x <?= $item->lbr; ?> x <?= $item->tgi; ?> CM</span>
										<span class="detail"><a href="<?= current_url().'?action=add&code='.$item->kdurl ?>" class="my-cart-d item_add"><img src="<?= site_url('images/bag.png'); ?>" alt="Cart" /></a>&nbsp;<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" class="my-cart-d item_add">Detail</a></span>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->
			<!--accessories-->
			<!--<div class="accessories-w3l">
				<div class="container">
					<h3 class="tittle">10% Discount on</h3>
					<span>TRENDING PRODUCTS</span>
					<div class="button">
						<a href="#" class="button1"> Shop Now</a>
						<a href="#" class="button1"> Quick View</a>
					</div>
				</div>
			</div>-->
			<!--accessories-->
			<!--Products-->
				<div class="product-agile">
					<div class="container">
						<h4 class="tittle1">New Products</h4>
						<div class="slider">
							<div class="callbacks_container">
								<ul class="rslides" id="slider">
									<li>	 
										<div class="caption">
											<?php
												foreach ($this->data['rnd_products2'] as $item) {
											?>
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div class="grid-arrival">
														<figure>		
															<a href="<?php echo site_url('detail/'.$item->kdurl); ?>">
																<div class="grid-img">
																	<img src="<?=site_url($this->data['products_dir'].'/'.$item->gambar);?>" class="img-responsive" alt="<?= $item->kdbar ?>">
																</div>
															</a>		
														</figure>	
													</div>
													<!--<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>-->
													<div class="women">
														<p ><em class="item_price">Rp<?= $item->hjual; ?></em></p>
														<span class="size"><?= $item->kdbar; ?></span>
														<span class="size"><?= $item->pnj; ?> x <?= $item->lbr; ?> x <?= $item->tgi; ?> CM</span>
														<span class="detail"><a href="<?= current_url().'?action=add&code='.$item->kdurl ?>" class="my-cart-d item_add"><img src="<?= site_url('images/bag.png'); ?>" alt="Cart" /></a>&nbsp;<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" class="my-cart-d item_add">Detail</a></span>
													</div>
												</div>
											</div>
											<?php } ?>
											<div class="clearfix"></div>
										</div>
									</li>
									<li>	 
										<div class="caption">
											<?php
												foreach ($this->data['rnd_products3'] as $item) {
											?>
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div class="grid-arrival">
														<figure>		
															<a href="<?php echo site_url('detail/'.$item->kdurl); ?>">
																<div class="grid-img">
																	<img src="<?=site_url($this->data['products_dir'].'/'.$item->gambar);?>" class="img-responsive" alt="<?= $item->kdbar ?>">
																</div>
															</a>		
														</figure>	
													</div>
													<!--<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>-->
													<div class="women">
														<p ><em class="item_price">Rp<?= $item->hjual; ?></em></p>
														<span class="size"><?= $item->kdbar; ?></span>
														<span class="size"><?= $item->pnj; ?> x <?= $item->lbr; ?> x <?= $item->tgi; ?> CM</span>
														<span class="detail"><a href="<?= current_url().'?action=add&code='.$item->kdurl ?>" class="my-cart-d item_add"><img src="<?= site_url('images/bag.png'); ?>" alt="Cart" /></a>&nbsp;<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" class="my-cart-d item_add">Detail</a></span>
													</div>
												</div>
											</div>
											<?php } ?>
											<div class="clearfix"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<!--Products-->
			<!--<div class="latest-w3">
				<div class="container">
					<h3 class="tittle1">Latest Fashion Trends</h3>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img src="<?php echo site_url('images/l1.jpg'); ?>" class="img-responsive" alt="">
								<div class="latest-text">
									<h4>Men</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img src="<?php echo site_url('images/l2.jpg'); ?>" class="img-responsive" alt="">
								<div class="latest-text">
									<h4>Shoes</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-20%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img src="<?php echo site_url('images/l3.jpg'); ?>" class="img-responsive" alt="">
								<div class="latest-text">
									<h4>Women</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img src="<?php echo site_url('images/l4.jpg'); ?>" class="img-responsive" alt="">
								<div class="latest-text">
									<h4>Watch</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-45%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img src="<?php echo site_url('images/l5.jpg'); ?>" class="img-responsive" alt="">
								<div class="latest-text">
									<h4>Bag</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-10%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img src="<?php echo site_url('images/l6.jpg'); ?>" class="img-responsive" alt="">
								<div class="latest-text">
									<h4>Cameras</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-30%</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>-->
			<!--new-arrivals-->
			<!--best-seller-->
			<!--<div class="new-arrivals-w3agile">
				<div class="container">
					<h3 class="tittle1">Best Sellers</h3>
					<div class="arrivals-grids">
						<div class="col-md-3 arrival-grid simpleCart_shelfItem">
							<div class="grid-arr">
								<div class="grid-arrival">
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img src="<?php echo site_url('images/p28.jpg'); ?>" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img src="<?php echo site_url('images/p27.jpg'); ?>" class="img-responsive" alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="ribben">
									<p>NEW</p>
								</div>
								<div class="ribben1">
									<p>SALE</p>
								</div>
								<div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								<div class="women">
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<span class="size">XL / XXL / S </span>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-md-3 arrival-grid simpleCart_shelfItem">
							<div class="grid-arr">
								<div class="grid-arrival">
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img src="<?php echo site_url('images/p30.jpg'); ?>" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img src="<?php echo site_url('images/p29.jpg'); ?>" class="img-responsive" alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="ribben2">
									<p>OUT OF STOCK</p>
								</div>
								<div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								<div class="women">
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<span class="size">XL / XXL / S </span>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-md-3 arrival-grid simpleCart_shelfItem">
							<div class="grid-arr">
								<div class="grid-arrival">
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img src="<?php echo site_url('images/s2.jpg'); ?>" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img src="<?php echo site_url('images/s1.jpg'); ?>" class="img-responsive" alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="ribben1">
									<p>SALE</p>
								</div>
								<div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								<div class="women">
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<span class="size">XL / XXL / S </span>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-md-3 arrival-grid simpleCart_shelfItem">
							<div class="grid-arr">
								<div class="grid-arrival">
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img src="<?php echo site_url('images/s4.jpg'); ?>" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img src="<?php echo site_url('images/s3.jpg'); ?>" class="img-responsive" alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="ribben">
									<p>NEW</p>
								</div>
								<div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								<div class="women">
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<span class="size">XL / XXL / S </span>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>-->
			<!--new-arrivals-->
		</div>
		<!--content-->
