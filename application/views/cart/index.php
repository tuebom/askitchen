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
					<h2>My Shopping Cart (<?= $_SESSION["totqty"] ?>)</h2>
					
					<div class="table-responsive">
						<table class="timetable_sub">
							<thead>
								<tr>
									<th>SL No.</th>
									<th>Product</th>
									<th>Quantity</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody>
							<?php

								$index = 0;

								foreach ($_SESSION["cart_item"] as $item){

									// die(print_r($item));
									// echo '<!-- '. print_r($item) . ' -->';
									
									$item_price  = (float)$item["qty"]*$item["harga"];

									$item_price += $item_price;
									// count total item
									$total_qty  += $item["qty"];

									$index++;

							?>
								<tr class="rem1">
									<form id="formRem" action="<?= site_url('cart/remove'); ?>" method="post">
									<input type="hidden" name="kode" value="<?= $item["kdbar"] ?>">
									<input type="hidden" name="qty" value="<?= $item["qty"] ?>">
									</form>

									<td class="invert"><?= $index ?></td>
									<td class="invert-image">
										<a href="#">
											<img src="<?= base_url($this->data['products_dir'].'/'.$item["gambar"]); ?>" alt="<?= $item["kdbar"] ?>" class="img-responsive">
										</a>
									</td>
									<td class="invert">
										<div class="quantity">
											<div class="quantity-select">
												<div class="entry value-minus">&nbsp;</div>
												<div class="entry value">
													<span><?= $item["qty"]; ?></span>
												</div>
												<div class="entry value-plus active">&nbsp;</div>
											</div>
										</div>
									</td>
									<td class="invert"><?= $item["nama"]; ?></td>
									<td class="invert">Rp<?= $item["harga"]; ?></td>
									<td class="invert">
										<div class="rem">
											<div class="close1"> </div>
										</div>
									</td>
								</tr>
								<!--quantity-->
								<script>
									$('.value-plus').on('click', function () {
										var divUpd = $(this).parent().find('.value'),
											newVal = parseInt(divUpd.text(), 10) + 1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function () {
										var divUpd = $(this).parent().find('.value'),
											newVal = parseInt(divUpd.text(), 10) - 1;
										if (newVal >= 1) divUpd.text(newVal);
									});
								</script>
								<!--quantity-->
								<script>
									$(document).ready(function (c) {
										$('.close1').on('click', function (c) {
											$('.rem1').fadeOut('slow', function (c) {
												$('.rem1').remove();
											});
										});
									});
								</script>
							<?php } /* end foreach*/ } /* end if */ ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<!-- checkout -->
