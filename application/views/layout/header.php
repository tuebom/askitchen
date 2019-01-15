<!DOCTYPE HTML>
<html lang="<?php echo $lang; ?>">
<head>
	<?php echo '<!-- '.current_url(). ' -->'; ?>
	<meta charset="<?php echo $charset; ?>">
	<title>Professional Food Service Supplies | Home :: ASKITCHEN</title>
<?php if ($mobile === FALSE): ?>
	<!--[if IE 8]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
<?php else: ?>
	<meta name="HandheldFriendly" content="true">
<?php endif; ?>
<?php if ($mobile == TRUE && $mobile_ie == TRUE): ?>
	<meta http-equiv="cleartype" content="on">
<?php endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="google" content="notranslate">
	<meta name="robots" content="noindex, nofollow">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Freezer, Cooler, Cooler Showcase, Cooler Dispenser, Ice Maker, Ice Cream, Ice Cream Machine, 
	Refrigerator, Refrigeration, Stainless Steel Refrigeration, Minimarket, Minimarket Refrigeration" />
<?php if ($mobile == TRUE && $ios == TRUE): ?>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Professional Food Service Supplies | Home :: ASKITCHEN">
<?php endif; ?>
<?php if ($mobile == TRUE && $android == TRUE): ?>
	<meta name="mobile-web-app-capable" content="yes">
<?php endif; ?>
	<link rel="icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAzUExURQAAAMQVG8QVG8QVG8QVG8MUGcQWHMQWHMQWHMQVGsQVG8QWHMMVG8QVG8QVGsMUGcQWHBiWaGEAAAAQdFJOUwAlilPupF/5xQsYM7racUEuThiQAAAA5klEQVQ4y+WTWXLEMAhE0YJAO/c/bYxkbM3kBsn7cqm7cLewAf4fxeX9kI1PvWIfeuSGN8ZpcY0kBoDJkYw4Xj0jiciAynLQXoOPepDAq88m9PDoY+mSchPpI6TNfDKEvkcmx3K+2Ji3vg3eGTbAPcHUQL0Z6PYFoWrcaRtO/Cq4gnPQnqk0+VVzFYgh46qZ+OE6Ry2gOg0ovAzg6s3kZahagDDDGp7O3TU17FCtgBnKTGGj0TzsAg7MkH00NNkE1ftcE1m+a9IV4UoQ071O7VKQ3mVj0UuO9lVUJp+herzxIf+Vf+UH6HQR34ampwcAAAAASUVORK5CYII=">
	<link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Calibri'>
	<link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300'>
	
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css');?>" media="all"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/font-awesome.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/jquery-ui.css');?>">
	
	<!--<link rel="stylesheet" type="text/css" href="<?=base_url($frameworks_dir . '/bootstrap/css/bootstrap.min.css'); ?>">-->
    <link rel="stylesheet" type="text/css" href="<?=base_url($frameworks_dir . '/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url($frameworks_dir . '/adminlte/css/adminlte.min.css'); ?>">
	<!-- <link rel="stylesheet" type="text/css" href="<?=base_url($frameworks_dir . '/adminlte/plugins/iCheck/flat/blue.css'); ?>"> -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/style.css');?>" media="all"/>
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="<?=base_url('js/jquery.min.js');?>"></script>
	<!--search jQuery-->
	<!-- <script src="<?=base_url('js/main.js');?>"></script> -->
	<!--search jQuery-->

<?php if (current_url() == site_url()): ?>
<script src="<?=base_url('js/responsiveslides.min.js');?>"></script>
<script>
  $(function () {
   $("#slider").responsiveSlides({
   	auto: true,
   	nav: true,
   	speed: 500,
    namespace: "callbacks",
    pager: true,
   });

  });
</script>
<?php endif; ?>
<script type="text/javascript" src="<?=base_url('js/bootstrap-3.1.1.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
<!-- cart -->
<script src="<?=base_url('js/simpleCart.min.js');?>"></script>
<!-- cart -->

<!--start-rate-->
<script src="<?=base_url('js/jstarbox.js');?>"></script>
<link rel="stylesheet" href="<?=base_url('css/jstarbox.css');?>" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript">
jQuery(function() {
	jQuery('.starbox').each(function() {
		var starbox = jQuery(this);
			starbox.starbox({
			average: 0, //starbox.attr('data-start-value'),
			changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
			ghosting: starbox.hasClass('ghosting'),
			autoUpdateAverage: true, //starbox.hasClass('autoupdate'),
			buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
			stars: starbox.attr('data-star-count') || 5
			}).bind('starbox-value-changed', function(event, value) {
				starbox.starbox('setOption', 'average', value);
				var el = $(this).parents("#formReview").find('#rating')[0];
				if (el) el.value = value;
			// if(starbox.hasClass('random')) {
			// var val = Math.random();
			// starbox.next().text(' '+val);
			// return val;
			// }
		})
	});
});
</script>
<!--//End-rate-->

<script defer src="<?=base_url('js/jquery.flexslider.js');?>"></script>
<link rel="stylesheet" href="<?=base_url('css/flexslider.css');?>" type="text/css" media="screen" />
<script src="<?=base_url('js/imagezoom.js');?>"></script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });

});
</script>

<link href="<?=base_url('css/owl.carousel.css');?>" rel="stylesheet">
<script src="<?=base_url('js/owl.carousel.js');?>"></script>
<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		});
	});
</script>

<style>
/*
.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
}
.control input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}
.control:hover input, .control__indicator,
.control input:focus, .control__indicator {
  background: #ccc;
}
.control input:checked, .control__indicator {
  background: #2aa1c0;
}
.control:hover input:not([disabled]):checked, .control__indicator,
.control input:checked:focus, .control__indicator {
  background: #0e647d;
}
.control input:disabled, .control__indicator {
  background: #e6e6e6;
  opacity: 0.6;
  pointer-events: none;
}
.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;
}
.control__indicator:after {
  content: '';
  position: absolute;
  display: none;
}
.control input:checked, .control__indicator:after {
  display: block;
}
.control--checkbox .control__indicator:after {
  left: 8px;
  top: 4px;
  width: 3px;
  height: 8px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}
.control--checkbox input:disabled, .control__indicator:after {
  border-color: #7b7b7b;
}*/

</style>
<?php if ($mobile === FALSE): ?>
	<!--[if lt IE 9]>
		<script src="<?php echo base_url($plugins_dir . '/html5shiv/html5shiv.min.js'); ?>"></script>
		<script src="<?php echo base_url($plugins_dir . '/respond/respond.min.js'); ?>"></script>
	<![endif]-->
<?php endif; ?>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c2f0a6a04c7730011f604db&product=sticky-share-buttons' async='async'></script>
</head>
<body>

	<?php if (current_url() !== site_url().'cart/add' && current_url() !== site_url().'checkout'): ?>
	<a href="#menu-modal" class="float" data-toggle="modal"><img id="maskot" src="<?= site_url('images/ma2.png'); ?>" alt="maskot"><!--<i class="fa fa-question-circle my-float"></i>--></a>
	<?php
	  $sTmp = (current_url() == site_url())? "true;" : "false;";
	?>
	<script type="text/javascript">
	var bShowDlg = <?php echo $sTmp; ?>

    $(window).load(function(){
    //   if (bShowDlg) modal.open();
	});
	
	</script>
	<div class="label-container">
	<div class="label-text">Show Suggestions</div>
	<i class="fa fa-play label-arrow"></i>
	</div>
	<?php endif; ?>

	<script>
	$(document).ready(function() {
		$('.modal').on("shown.bs.modal",function(l){
			$("#menu-modal").velocity("callout.bounce");
		});
		
		$("#cart").on("click", function() {
			$(".shopping-cart").fadeToggle( "fast");
		});
	
	    $('#img-logo').hover(function(){
			$(this).attr('src','<?= site_url('images/askitchen2.png'); ?>');
		},function(){
			$(this).attr('src','<?= site_url('images/askitchen.png'); ?>');
		});
	
	    $('#maskot').hover(function(){
			$(this).attr('src','<?= site_url('images/ma1.png'); ?>');
		},function(){
			$(this).attr('src','<?= site_url('images/ma2.png'); ?>');
		});

	    $('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
			$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
			$("#register-form").delay(100).fadeIn(100);
			$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
	});
	</script>

	<!--header-->
		<div class="header">
			<div class="header-top-most">
				<div class="container2">
					<div class="top-left">
						<a href="#"><img id="img-logo" class="img-header" src="<?= site_url('images/askitchen.png'); ?>" alt="ASKITCHEN Logo" hspace="3" /></a>
						<a href="http://www.asovic.co.id/" target="_blank"><img class="img-header" src="<?= site_url('images/asovic.jpg'); ?>" alt="ASOVIC Logo" hspace="3" /></a>
						<a href="http://www.muchef.com/" target="_blank"><img class="img-header" src="<?= site_url('images/muchef.jpg'); ?>" alt="MUCHEF Logo" hspace="3" /></a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="header-top">
				<div class="container">
					<div class="top-left">
						<div>
							<a href="<?php echo site_url(); ?>"><img src="<?= site_url('images/logo.png'); ?>" alt="ASKITCHEN Logo"></a>
						</div>
						<div class="location">
							<img src="<?= site_url('images/location.png'); ?>" alt="location"/>
							<span style="display: inline-block; vertical-align: middle; color:#fff;">Deliver To<br>INDONESIA</span></a>
						</div>
					</div>
					<div class="top-left2">
						<!-- search form -->
						<form id="frmSearch" action="<?php echo site_url('search'); ?>" method="get" class="sidebar-form">
							<div class="input-group search">
								<div class="input-group-btn">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All <span class="caret"></span></button>
									<ul class="dropdown-menu">
									<?php
										foreach ($this->data['golongan'] as $item) {
									?>
										<li><a href="<?php echo site_url('categories/'.$item->kdgol); ?>"><?= $item->nama ?></a></li>
									<?php
										}
									?>
									</ul>
								</div>
								<input type="text" name="q" class="form-control" placeholder="Search for..." value="">
								<span class="input-group-btn">
									<!--<a href="javascript:void(0);" onclick="frmSearch.submit();">
									<img src="<?= site_url('images/search.png'); ?>"></a>-->
									
									<button id='search-btn' class="btn btn-default-go" type="button" onclick="frmSearch.submit();"><img class="img-go" src="<?= site_url('images/search.png'); ?>"></button>
								</span>
							</div>
						</form>
						
						<nav class="navbar navbar-default" id="nav1">
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">

									<!-- Mega Menu -->
									<?php 
										$index = 0;

										foreach ($this->data['golongan'] as $item) {
									?>
									<li class="dropdown">
										<a href="<?php echo site_url('products/'.$item->kdgol); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $item->nama ?><b class="caret"></b></a>
										<?php if($index >=4){ ?>
										<ul class="dropdown-menu multi-column columns-3 pull-right">
											<?php } else { ?>
												<ul class="dropdown-menu multi-column columns-3">
											<?php } ?>
											<div>
												<?php foreach ($this->data['item_'.$item->kdgol] as $detail) { ?>
												<div class="col-sm-3 multi-gd-img">
													<div class="row text-center"><label class="block-with-text"><?php echo $detail->nama ?></label></div>
													<div class="row">
														<div class="sample">
														<a href="<?php echo site_url('subcategories/'.$item->kdgol.'/'.$detail->kdgol2); ?>">
															<img src="<?php echo site_url($this->data['products_dir'].'/'.$detail->gambar); ?>" alt="<?php echo $detail->nama ?>"/></a>
														</div>
													</div>
													<div class="row text-center"><label class="block-with-text"><?php echo $detail->kdbar ?></label></div>
													<div class="row text-center">
														<a class="view-more btn- btn-sm" href="<?php echo site_url('subcategories/'.$item->kdgol.'/'.$detail->kdgol2); ?>">Read More</a>
													</div>
												</div>
												<?php } ?>
											</div>
										</ul>
									</li>
									<?php 
											$index++;
											// if ($index == 5) break;
										}
									?>
									<!--<li><a href="#">%BB</a></li>-->
								</ul>
							</div>
						</nav>
					</div>
					<div class="top-right">
						<ul>
							<?php if ($admin_link): ?>
							<li><a href="<?php echo site_url('admin'); ?>">Admin</a></li>
							<?php endif; ?>
							<?php if ($logout_link): ?>
							<li><a href="<?php echo site_url('auth/logout/public'); ?>">Logout</a></li>
							<?php else: ?>
							<li><a href="<?php echo site_url('register'); ?>">Register</a></li>
							<li><a href="<?php echo site_url('login'); ?>">Sign In</a></li>
							<!--<li><a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal">Sign In</a></li>-->
							<?php endif; ?>
							<li><a href="#" id="cart">Cart&nbsp;<img src="<?= site_url('images/bag.png'); ?>" alt="Cart" /></a>
							&nbsp;<span class="badge badge-primary"><?php if($this->session->userdata('totqty')): echo $this->session->userdata('totqty'); else: echo '0'; endif; ?></span></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default" id="nav2">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs2">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs2">
								
								<ul class="nav navbar-nav">

									<!-- Mega Menu -->
									<?php 
										$index = 0;

										foreach ($this->data['golongan'] as $item) {
									?>
									<li class="dropdown">
										<a href="<?php echo site_url('products/'.$item->kdgol); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $item->nama ?><b class="caret"></b></a>
										<?php if($index == 4){ ?>
										<ul class="dropdown-menu multi-column columns-3 pull-right">
											<?php } else { ?>
												<ul class="dropdown-menu multi-column columns-3">
											<?php } ?>
											<div>
												<?php foreach ($this->data['item_'.$item->kdgol] as $detail) { ?>
												<div class="col-sm-3 multi-gd-img">
													<div><label class="block-with-text"><?php echo $detail->nama ?></label></div>
													<div class="row">
														<div class="sample">
														<a href="<?php echo site_url('subcategories/'.$item->kdgol.'/'.$detail->kdgol2); ?>">
															<img src="<?php echo site_url($this->data['products_dir'].'/'.$detail->gambar); ?>" alt="<?php echo $detail->nama ?>"/></a>
														</div>
													</div>
													<div><label class="block-with-text"><?php echo $detail->kdbar ?></label></div>
													<a class="view-more btn- btn-sm" href="<?php echo site_url('subcategories/'.$item->kdgol.'/'.$detail->kdgol2); ?>">Read More</a>
												</div>
												<?php } ?>
											</div>
										</ul>
									</li>
									<?php 
											$index++;
											// if ($index == 5) break;
										}
									?>
								</ul>
							</div>
							</nav>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
	
			</div>
		</div>
	<!--header-->
	
	<!--modal-->
	<div id="menu-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog menu-modal">
			<a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true" class="menu-close"><i class="fa fa-times"></i></a>
			<div class="hello-body">
				<h3 class="tittle text-center">hello,</h3>
				<h4 class="hello-tittle text-center">Choose your restaurant type..</h4>
				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=asia'); ?>">Chinese/Asian Food</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=western'); ?>">Western Food</a></span>
					</div>
				</div>
					
				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=bakery'); ?>">Bakery &amp; Pastry</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=indonesia'); ?>">Indonesian Food</a></span>
					</div>
				</div>

				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=bbq'); ?>">BBQ/Outdoor</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=coffee'); ?>">Coffee Shop</a></span>
					</div>
				</div>
				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=bar'); ?>">Bar</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=ftruck'); ?>">Food Truck</a></span>
					</div>
				</div>
				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=minimarket'); ?>">Minimarket/Supermarket</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=other'); ?>">Others...</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--modal-->

<script>
	
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

	<div class="shopping-cart">
		<div class="shopping-cart-header">
		<i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?php if($this->session->userdata('totqty')): echo number_format($this->session->userdata('totqty'),0,",","."); else: echo '0'; endif; ?></span>
		<div class="shopping-cart-total">
			<span class="lighter-text">Total:&nbsp;</span>
			<span class="main-color-text">Rp<?php if($this->session->userdata('tot_price')): echo number_format($this->session->userdata('tot_price'),0,",","."); else: echo '0'; endif; ?></span>
		</div>
		</div> <!--end shopping-cart-header -->

		<ul class="shopping-cart-items">
		<?php 
			// $total_qty = 0;
			$item_price = 0;
			// $total_price = 0;
			
		foreach ($_SESSION["cart_item"] as $item) {
			$item_price  = (float)$item["qty"]*$item["harga"];
			// $total_price += $item_price;
			
			// count total item
			// $total_qty  += $item["qty"];

		?><li class="clearfix">
			<div style="display: flex; align-items: center;">
				<div class="cart-img">
					<img src="<?= site_url($this->data['products_dir'].'/'.$item["gambar"]); ?>" alt="item1" />
				</div>
				<div class="cart-desc">
					<span class="item-name"><?= $item["nama"]; ?></span>
					<span class="item-price">Rp<?= number_format($item_price, 0, ',', '.') ?></span>
					<span class="item-quantity">Qty: <?= $item["qty"]; ?></span>
				</div>
				<div class="rem2">
				<a href="<?= current_url().'?action=remove&code='.$item["kdurl"] ?>"><span class="close2"></span></a>
				</div>
			</div>
		</li>
		<?php } ?>
		</ul>

		<a href="<?php echo site_url('checkout'); ?>" class="button">Checkout</a>
	</div> <!--end shopping-cart -->
