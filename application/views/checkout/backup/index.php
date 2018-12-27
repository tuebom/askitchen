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
                    <form action="<?= site_url('submit'); ?>" method="post">
                    <input type="hidden" name="total" value="">
                    <input type="hidden" name="shipping" value="">

                    <div class="col-md-8">    
                        <h2>Billing Details</h2>
                        <div class="row">
                            <div class="col-sm-6">    
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" name="firstname" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-sm-6">    
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Enter last name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">    
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" name="company" placeholder="Enter company name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">    
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-sm-6">    
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">    
                                <div class="form-group">
                                    <label>Province</label>
                                    <select id="province" name="province" class="form-control">
                                        <option value="" selected>-</option>
                                        <?php
                                            foreach ($this->data['provinsi'] as $itemx) {
                                        ?>
                                        <option value="<?= $itemx->id ?>"><?= $itemx->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">    
                                <div class="form-group">
                                    <label>Regency</label>
                                    <select id="regency" name="regency" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">    
                                <div class="form-group">
                                    <label>District</label>
                                    <select id="district" name="district" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">    
                                <div class="key"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                <input type="text" placeholder="Enter address 1" name="address1" required>
                                <div class="clearfix"></div></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">    
                                <div class="key"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                <input type="text" placeholder="Enter address 2" name="address2">
                                <div class="clearfix"></div></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">    
                                <div class="key"><i class="fa fa-" aria-hidden="true"></i>
                                <input type="text" placeholder="Zip" name="zip">
                                <div class="clearfix"></div></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">    
                                <div class="key"><i class="fa fa-" aria-hidden="true"></i>
                                <input type="text" placeholder="Order Notes" name="note">
                                <div class="clearfix"></div></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h2>Your Order</h2>
                        <table class="table table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $item_price = 0;
                                    $total_price = 0;
                                    foreach ($_SESSION["cart_item"] as $item) {

                                        $item_price  = (float)$item["qty"]*$item["harga"];
                                        $total_price += $item_price;
                                    ?>
                                <tr>
                                    <td><?= $item["nama"]; ?></td>
                                    <td class="text-right">Rp<?= number_format($item_price, 0, '.', ',') ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><b>Subtotal</b></td>
                                    <td class="text-right"><b>Rp<?= number_format($total_price, 0, '.', ',') ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>Shipping</b></td>
                                    <td class="text-right"><b>0</b></td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td class="text-right"><b>Rp<?= number_format($total_price, 0, '.', ',') ?></b></td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="col-sm-6 checkout-right-basket2"><a class="checkout-right-basket2" href="<?php echo site_url('cart'); ?>">Back</a></div>
                        <div class="col-sm-6 checkout-right-basket2"><a class="checkout-right-basket2" href="<?php echo site_url('submit'); ?>">Submit Order</a></div>
                    </div>
                    </form>
				</div>
			</div>
		</div>
	<!-- content -->
	<script type="text/javascript">
    $(document).ready(function() {
        
        $('#province').change(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url();?>checkout/regencies/"+$(this).val(),
                // dataType: "json",
                // data: {"id":$(this).val()},
                success:function(json){
                    var data = json.data,
                        firstid = data[0].id;

                    $('#regency').html('');
                    for (var i = 0; i < data.length; i++) {
                        $('#regency').append('<option value="'+data[i].id+'">'+data[i].name+'</option>')
                    }

                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url();?>checkout/districts/"+firstid,
                        // dataType: "json",
                        // data: {"id":$(this).val()},
                        success:function(json){
                            var data = json.data;
                            $('#district').html('');
                            for (var i = 0; i < data.length; i++) {
                                $('#district').append('<option value="'+data[i].id+'">'+data[i].name+'</option>')
                            }
                        },
                    });
                },
            });
        });
        
        $('#regency').change(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url();?>checkout/districts/"+$(this).val(),
                // dataType: "json",
                // data: {"id":$(this).val()},
                success:function(json){
                    var data = json.data;
                    $('#district').html('');
                    for (var i = 0; i < data.length; i++) {
                        $('#district').append('<option value="'+data[i].id+'">'+data[i].name+'</option>')
                    }
                },
            });
        });
    });
	</script>
