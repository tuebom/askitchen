    <!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="<?php echo site_url(); ?>">Home</a> / <span>Checkout</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="cart-items">
				<div class="container">
					<?php

					if(isset($_SESSION["cart_item"])){
						$total_qty = 0;
						$total_price = 0;

					?>
					<h2>My Shopping Bag (<?= $_SESSION["totqty"] ?>)</h2>
					<?php

						foreach ($_SESSION["cart_item"] as $item){

							// die(print_r($item));
							// echo '<!-- '. print_r($item) . ' -->';
							
							$item_price  = (float)$item["qty"]*$item["harga"];

							$item_price += $item_price;
							// count total item
							$total_qty  += $item["qty"];
					
					?>
					<script>$(document).ready(function(c) {
						$('.close1').on('click', function(c){
							$('.cart-header').fadeOut('slow', function(c){
								$('.cart-header').remove();
							});
						});	  
					});
					</script>
					<div class="cart-header">
						<form id="formAdd" action="<?= site_url('cart/remove'); ?>" method="post">
						<input type="hidden" name="kode" value="<?= $item["kdbar"] ?>">
						<input type="hidden" name="qty" value="<?= $item["qty"] ?>">
						</form>

						<div class="close1"> </div>
						<div class="cart-sec simpleCart_shelfItem">
								<div class="cart-item cyc">
									 <img src="<?= base_url($this->data['products_dir'].'/'.$item["gambar"]); ?>" class="img-responsive" alt="">
								</div>
							    <div class="cart-item-info">
									<h3><a href="#"><?= $item["nama"]; ?></a><span>Pickup time:</span></h3>
									<ul class="qty">
										<li><p>Min. order value:</p></li>
										<li><p>FREE delivery</p></li>
									</ul>
									<!--<div class="delivery">
										<p>Service Charges : $10.00</p>
										<span>Delivered in 1-1:30 hours</span>
										<div class="clearfix"></div>
									</div>-->
							   	</div>
							   <div class="clearfix"></div>
													
						</div>
					</div>
					<?php } /* end foreach*/ } /* end if */ ?>
				</div>
			</div>
		</div>
	<!-- checkout -->	
