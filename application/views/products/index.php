    <!--content-->
        <div class="content">
				<div class="products-agileinfo">
                    <h2 class="tittle"><?php echo $this->data['title']; ?></h2>
					<div class="container">
						<div class="product-agileinfo-grids w3l">
							<div class="col-md-3 product-agileinfo-grid">
								<!--<div class="categories">
									<h3>Refine By</h3>
									<ul class="tree-list-pad">
										<li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><span></span>Women's Wear</label>
											<ul>
												<li><input type="checkbox" id="item-0-0" /><label for="item-0-0">Ethnic Wear</label>
													<ul>
														<li><a href="products.html">Shirts</a></li>
														<li><a href="products.html">Caps</a></li>
														<li><a href="products.html">Shoes</a></li>
														<li><a href="products.html">Pants</a></li>
														<li><a href="products.html">SunGlasses</a></li>
														<li><a href="products.html">Trousers</a></li>
													</ul>
												</li>
												<li><input type="checkbox"  id="item-0-1" /><label for="item-0-1">Party Wear</label>
													<ul>
														<li><a href="products.html">Shirts</a></li>
														<li><a href="products.html">Caps</a></li>
														<li><a href="products.html">Shoes</a></li>
														<li><a href="products.html">Pants</a></li>
														<li><a href="products.html">SunGlasses</a></li>
														<li><a href="products.html">Trousers</a></li>
													</ul>
												</li>
												<li><input type="checkbox"  id="item-0-2" /><label for="item-0-2">Casual Wear</label>
													<ul>
														<li><a href="products.html">Shirts</a></li>
														<li><a href="products.html">Caps</a></li>
														<li><a href="products.html">Shoes</a></li>
														<li><a href="products.html">Pants</a></li>
														<li><a href="products.html">SunGlasses</a></li>
														<li><a href="products.html">Trousers</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li><input type="checkbox" id="item-1" checked="checked" /><label for="item-1">Best Collections</label>
											<ul>
												<li><input type="checkbox" checked="checked" id="item-1-0" /><label for="item-1-0">New Arrivals</label>
													<ul>
														<li><a href="products.html">Shirts</a></li>
														<li><a href="products.html">Shoes</a></li>
														<li><a href="products.html">Pants</a></li>
														<li><a href="products.html">SunGlasses</a></li>
													</ul>
												</li>
												
											</ul>
										</li>
										<li><input type="checkbox" checked="checked" id="item-2" /><label for="item-2">Best Offers</label>
											<ul>
												<li><input type="checkbox"  id="item-2-0" /><label for="item-2-0">Summer Discount Sales</label>
													<ul>
														<li><a href="products.html">Shirts</a></li>
														<li><a href="products.html">Shoes</a></li>
														<li><a href="products.html">Pants</a></li>
														<li><a href="products.html">SunGlasses</a></li>
													</ul>
												</li>
												<li><input type="checkbox" id="item-2-1" /><label for="item-2-1">Exciting Offers</label>
													<ul>
														<li><a href="products.html">Shirts</a></li>
														<li><a href="products.html">Shoes</a></li>
														<li><a href="products.html">Pants</a></li>
														<li><a href="products.html">SunGlasses</a></li>
													</ul>
												</li>
												<li><input type="checkbox" id="item-2-2" /><label for="item-2-2">Flat Discounts</label>
													<ul>
														<li><a href="products.html">Shirts</a></li>
														<li><a href="products.html">Shoes</a></li>
														<li><a href="products.html">Pants</a></li>
														<li><a href="products.html">SunGlasses</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</div>-->
								<div class="price">
									<h3>Price Range</h3>
									<ul class="dropdown-menu6">
										<li>                
											<div id="slider-range"></div>							
											<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
										</li>			
									</ul>
									<script type='text/javascript'>//<![CDATA[ 
									$(window).load(function(){
									 $( "#slider-range" ).slider({
												range: true,
												min: 0,
												max: <?php echo $this->data['price_range'][0]->hmax ?>,
												values: [ <?php echo $this->data['price_range'][0]->hmin ?>, <?php echo $this->data['price_range'][0]->hmax ?> ],
												slide: function( event, ui ) {  $( "#amount" ).val( "Rp" + ui.values[ 0 ] + " - Rp" + ui.values[ 1 ] );
												}
									 });
									$( "#amount" ).val( "Rp" + $( "#slider-range" ).slider( "values", 0 ) + " - Rp" + $( "#slider-range" ).slider( "values", 1 ) );

									});//]]>  

									</script>
									<script type="text/javascript" src="<?=base_url('js/jquery-ui.js');?>"></script>
								</div>
								<!--<div class="top-rates">
									<h3>Top Rates products</h3>
									<div class="recent-grids">
										<div class="recent-left">
											<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r.jpg');?>" alt=""></a>	
										</div>
										<div class="recent-right">
											<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
											<p><del>$100.00</del> <em class="item_price">$09.00</em></p>
										</div>	
										<div class="clearfix"> </div>
									</div>
									<div class="recent-grids">
										<div class="recent-left">
											<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r1.jpg');?>" alt=""></a>	
										</div>
										<div class="recent-right">
											<h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
											<p><del>$100.00</del> <em class="item_price">$19.00</em></p>
										</div>	
										<div class="clearfix"> </div>
									</div>
									<div class="recent-grids">
										<div class="recent-left">
											<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r2.jpg');?>" alt=""></a>	
										</div>
										<div class="recent-right">
											<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
											<p><del>$100.00</del> <em class="item_price">$39.00</em></p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="recent-grids">
										<div class="recent-left">
											<a href="single.html"><img class="img-responsive " src="<?=base_url('images/r3.jpg');?>" alt=""></a>	
										</div>
										<div class="recent-right">
											<h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
											<p><em class="item_price">$39.00</em></p>
										</div>	
										<div class="clearfix"> </div>
									</div>
								</div>-->
								<div class="brand-w3l">
									<h3>Brands Filter</h3>
									<ul>
										<li><a href="<?php echo site_url('products/'.$this->data['kode'].'/GEA'); ?>">GEA</a></li>
										<li><a href="<?php echo site_url('products/'.$this->data['kode'].'/GETRA'); ?>">GETRA</a></li>
										<li><a href="<?php echo site_url('products/'.$this->data['kode'].'/GEA'); ?>">SANDEN</a></li>
										<li><a href="<?php echo site_url('products/'.$this->data['kode'].'/GETRA'); ?>">MADIN</a></li>
										<!--<li><a href="<?php echo site_url('products/GEA'); ?>">OTHER</a></li>-->
									</ul>
								</div>
								<!--<div class="cat-img">
									<img class="img-responsive " src="<?=base_url('images/45.jpg');?>" alt="">
								</div>-->
							</div>
							<div class="col-md-9 product-agileinfon-grid1 w3l">
								<!--<div class="product-agileinfon-top">
									<div class="col-md-6 product-agileinfon-top-left">
										<img class="img-responsive " src="<?=base_url('images/img1.jpg');?>" alt="">
									</div>
									<div class="col-md-6 product-agileinfon-top-left">
										<img class="img-responsive " src="<?=base_url('images/img2.jpg');?>" alt="">
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="mens-toolbar">
									<p >Showing 1–9 of 21 results</p>
									 <p class="showing">Sorting By
										<select>
											  <option value=""> Name</option>
											  <option value="">  Rate</option>
												<option value=""> Color </option>
												<option value=""> Price </option>
										</select>
									  </p> 
									  <p>Show
										<select>
											  <option value=""> 9</option>
											  <option value="">  10</option>
												<option value=""> 11 </option>
												<option value=""> 12 </option>
										</select>
									  </p>
									<div class="clearfix"></div>		
								</div>-->
								<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
										<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="<?=base_url('images/menu1.png');?>"></a></li>
									<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="<?=base_url('images/menu.png');?>"></a></li>
									</ul>
									<div id="myTabContent" class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
											<?php
												
												echo '<!-- rec. count: '. count($this->data['products']) . ' -->'; 

												$index = 0;
												$icount = 0;
												$iloop = 1;

												foreach ($this->data['products'] as $item) {

													if ($index == 4) { $index = 0; }

													if ($index == 0) { // buat tab product baru

											?>
											<div class="product-tab">
											<?php echo '<!-- prod-tab-'.$iloop. ' -->'; ?>
											<?php
													}

													if ($index < 4) {
											?>
												<div class="col-md-3 product-tab-grid simpleCart_shelfItem">
													<div class="grid-arr">
														<div class="grid-arrival">
															<figure>		
																<a href="<?php echo site_url('detail/'.$item->kdbar); ?>" class="new-gri">
																	<div class="grid-img">
																		<img src="<?=base_url($this->data['products_dir'].'/'.$item->gambar);?>" class="img-responsive" alt="<?= $item->kdbar; ?>">
																	</div>
																	<!--<div class="grid-img">
																		<img src="<?=base_url('images/p5.jpg');?>" class="img-responsive"  alt="">
																	</div>-->
																</a>		
															</figure>	
														</div>
														<div class="block">
															<div class="starbox small ghosting"> </div>
														</div>
														<div class="women">
															<h6><a href="<?php echo site_url('detail/'.$item->kdbar); ?>"><?= $item->kdbar; ?></a></h6>
															<span class="size"><?= $item->pnj; ?> x <?= $item->lbr; ?> x <?= $item->tgi; ?> CM</span>
															<p ><!--<del><?= $item->hjual; ?></del>--><em class="item_price">Rp<?= $item->hjual; ?></em></p>
															<a href="<?php echo site_url('detail/'.$item->kdbar); ?>" data-text="Show Details" class="my-cart-d item_add">Show Details</a>
														</div>
													</div>
												</div>
											<?php 
													$index++;
													$icount++;
												}
												
												if ($index == 4 || $icount == count($this->data['products'])) :
													$iloop++;
											?>
												<div class="clearfix"></div>
											</div>
											<?php
												endif;
											}
											?>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
											<?php
												foreach ($this->data['products'] as $item) {
											?>
											<div class="product-tab1">
												<div class="col-md-3 product-tab1-grid">
													<div class="grid-arr">
														<div class="grid-arrival">
															<figure>		
																<a href="<?php echo site_url('detail/'.$item->kdbar); ?>" class="new-gri">
																	<div class="grid-img">
																		<img src="<?=base_url($this->data['products_dir'].'/'.$item->gambar);?>" class="img-responsive" alt="<?= $item->kdbar; ?>">
																	</div>
																	<!--<div class="grid-img">
																		<img src="<?=base_url('images/p5.jpg');?>" class="img-responsive"  alt="">
																	</div>-->
																</a>		
															</figure>	
														</div>
													</div>
												</div>
												<div class="col-md-9 product-tab1-grid1 simpleCart_shelfItem">
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="<?php echo site_url('detail/'.$item->kdbar); ?>"><?= $item->kdbar; ?></a></h6>
														<span class="size"><?= $item->pnj; ?> x <?= $item->lbr; ?> x <?= $item->tgi; ?> CM</span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
														<p><!--<del>$100.00</del>--><em class="item_price"><?= $item->hjual; ?></em></p>
														<a href="<?php echo site_url('detail/'.$item->kdbar); ?>" data-text="Show Details" class="my-cart-d item_add">Show Details</a>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<?php } ?>
											
										</div>
									</div>
								</div>
								<!--<div class="box-footer" align="center">
									<ul class="pagination">
										<li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
										<li><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
									</ul>
								</div>-->
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		<!--content-->
