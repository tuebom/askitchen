<!DOCTYPE HTML>
<html>
<head>
<?php echo '<!--'.current_url('').'-->'; ?>
<title>Professional Food Service Supplies | Home :: ASKITCHEN</title>
<link href="<?=base_url('css/bootstrap.css');?>" rel="stylesheet" type="text/css" media="all"/>
<link href="<?=base_url('css/style.css');?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url('css/font-awesome.css');?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?=base_url('css/jquery-ui.css');?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Freezer, Cooler, Cooler Showcase, Cooler Dispenser, Ice Maker, Ice Cream, Ice Cream Machine, 
Refrigerator, Refrigeration, Stainless Steel Refrigeration, Minimarket, Minimarket Refrigeration" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="<?=base_url('js/jquery.min.js');?>"></script>
<link href='//fonts.googleapis.com/css?family=Calibri' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
<script src="<?=base_url('js/main.js');?>"></script>
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
<!-- cart -->
<script src="<?=base_url('js/simpleCart.min.js');?>"></script>
<!-- cart -->

<?php if (current_url() == site_url() || current_url() == site_url().'detail'): ?>
<!--start-rate-->
<script src="<?=base_url('js/jstarbox.js');?>"></script>
	<link rel="stylesheet" href="<?=base_url('css/jstarbox.css');?>" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!--//End-rate-->
<?php endif; ?>

<?php if (current_url() == site_url().'detail'): ?>
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

<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?=base_url('css/custombox.min.css');?>">
<script src="<?=base_url('js/custombox.min.js');?>"></script>
<script src="<?=base_url('js/custombox.legacy.min.js');?>"></script>
<style>
	/* modal */
.demo-modal {
    background-color: #FFF;
    box-shadow: 0 11px 15px -7px rgba(0, 0, 0, 0.2), 0 24px 38px 3px rgba(0, 0, 0, 0.14), 0 9px 46px 8px rgba(0, 0, 0, 0.12);
    padding: 24px;
    width: 50%;
    position: relative;
    display: none;
}

.demo-close {
    display: block;
    position: absolute;
    top: -35px;
    right: 0;
    z-index: 10000;
    outline: none;
    font-size: 30px;
    line-height: 30px;
    transition: transform .3s ease-in-out;
    color: #FFF;
}
</style>
</head>
<body>

	<?php if (current_url() !== site_url().'cart/add'): ?>
	<a href="#" class="float" onclick="theFunction();">
	<i class="fa fa-question-circle my-float"></i>
	
	<script type="text/javascript">
    function theFunction () {
		var modal = new Custombox.modal({
		content: {
			effect: 'corner',
			target: '#demo-modal'
			}
		});

		// Open
		modal.open();
		// return true or false, depending on whether you want to allow the `href` property to follow through or not
    }
	</script>
	</a>
	<div class="label-container">
	<div class="label-text">Show Suggestions</div>
	<i class="fa fa-play label-arrow"></i>
	</div>
	<?php endif; ?>

	<!--header-->
		<div class="header">
			<div class="header-top-most">
				<div class="container">
					<div class="top-left">
						<a href="#"><img src="<?= site_url('images/askitchen.png'); ?>" alt="ASKITCHEN Logo"></a>
						<a href="http://www.asovic.co.id/" target="_blank"><img src="<?= site_url('images/asovic.png'); ?>" alt="ASOVIC Logo"></a>
						<a href="http://www.muchef.com/" target="_blank"><img src="<?= site_url('images/muchef.png'); ?>" alt="MUCHEF Logo"></a>
					</div>
				</div>
			</div>
			<div class="header-top">
				<div class="container">
					<div class="top-left">
						<a href="<?php echo site_url(); ?>"><img src="<?= site_url('images/logo.png'); ?>" alt="ASKITCHEN Logo"></a>
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
							<li><a href="<?php echo site_url('auth/login'); ?>">Sign In</a></li>
							<?php endif; ?>
							<li><a href="<?php echo site_url('cart'); ?>">Cart&nbsp;<img src="<?= site_url('images/bag.png'); ?>" alt="Cart" /></a>
							&nbsp;<span class="badge badge-primary"><?= $_SESSION["totqty"] ?></span></li><??>
						</ul>
					</div>
					<!-- search form -->
					<form action="<?php echo site_url('search'); ?>" method="get" class="sidebar-form">
						<div class="input-group search">
							<div class="input-group-btn">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All <span class="caret"></span></button>
								<ul class="dropdown-menu">
								<?php
									foreach ($this->data['golongan'] as $item) { 
								?>
									<li><a href="<?php echo site_url('products/'.$item->kdgol); ?>"><?= $item->nama ?></a></li>
								<?php
									}
								?>
								</ul>
							</div>
							<input type="text" name="q" class="form-control" placeholder="Search for...">
							<span class="input-group-btn">
								<button id='search-btn' class="btn btn-default" type="button">Go!</button>
							</span>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<!--<div class="logo-nav-left">
							<div class="location">
								<ul style="display: inline;">
									<li><img src="<?= site_url('images/location.png'); ?>" alt="Location"></i>
									<li><p>Deliver To<BR>INDONESIA</p></li>
								</ul>
								<div class="clearfix"> </div>
							</div>	
						</div>-->
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								
								<ul class="nav navbar-nav">
									<!-- Mega Menu -->
									<?php 
										// print_r($this->data);
										echo "<!-- " . site_url($this->data['products_dir']) . " -->";
										foreach ($this->data['golongan'] as $item) {
									?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $item->nama ?><b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div>
												<?php foreach ($this->data['item_'.$item->kdgol] as $detail) { ?>
												<div class="col-sm-3 multi-gd-img">
													<div><label class="block-with-text"><?php echo $detail->nama ?></label></div>
													<div class="row">
														<div class="sample">
														<a href="<?php echo site_url('products/'.$detail->kdgol2); ?>">
															<img src="<?php echo site_url($this->data['products_dir'].'/'.$detail->gambar); ?>" alt="<?php echo $detail->nama ?>"/></a>
														</div>
													</div>
													<div><label class="block-with-text"><?php echo $detail->kdbar ?></label></div>
													<a class="view-more btn- btn-sm" href="<?php echo site_url('products/'.$detail->kdgol2); ?>">Read More</a>
												</div>
												<?php } ?>
												<div class="clearfix"></div>
											</div>
										</ul>
									</li>
									<?php } ?>
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
	<div id="demo-modal" class="demo-modal" style="display: none;">
      <a href="javascript:void(0);" onclick="Custombox.modal.close();" class="demo-close"><i class="fa fa-times"></i></a>
	  <div class="categories">
		<h3>Food Categories</h3>
		<ul class="tree-list-pad">
			<li><input type="checkbox" id="item-00" /><span></span><a href="<?php echo site_url('searchtag?tag=western'); ?>">Western Food</a></li>
			<li><input type="checkbox" id="item-01" /><span></span><a href="<?php echo site_url('searchtag?tag=asia'); ?>">Asian Food</a></li>
			<li><input type="checkbox" id="item-02" /><span></span><a href="<?php echo site_url('searchtag?tag=bbq'); ?>">Barbeque</a></li>
			<li><input type="checkbox" id="item-03" /><span></span><a href="<?php echo site_url('searchtag?tag=coffee'); ?>">Coffee Shop</a></li>
			<li><input type="checkbox" id="item-04" /><span></span><a href="<?php echo site_url('searchtag?tag=bar'); ?>">Bar</a></li>
			<li><input type="checkbox" id="item-05" /><span></span><a href="<?php echo site_url('searchtag?tag=catering'); ?>">Catering</a></li>
		</ul>
	  </div>
	</div>
