<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Professional Food Service Supplies | Home :: ASKITCHEN</title>
<!--css-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<?php if (current_url() == site_url().'search' || current_url() == site_url().'products'): ?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<?php endif; ?>
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
	<script src="js/main.js"></script>
<!--search jQuery-->

<?php if (current_url() == site_url().'detail'): ?>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
 <!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/imagezoom.js"></script>
<?php endif; ?>
<?php if (current_url() == site_url()): ?>
<script src="js/responsiveslides.min.js"></script>
<?php endif; ?>
<script>
<?php if (current_url() == site_url()): ?>
  $(function () {
   $("#slider").responsiveSlides({
   	auto: true,
   	nav: true,
   	speed: 500,
    namespace: "callbacks",
    pager: true,
   });
  });
<?php endif; ?>

<?php if (current_url() == site_url().'detail'): ?>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
<?php endif; ?>
</script>

<?php if (current_url() == site_url()): ?>
 <!--mycart-->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
 <!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<?php endif; ?>

 <!--start-rate-->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
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

<?php if (current_url() == site_url().'detail'): ?>
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
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
</head>
<body>
	<!--header-->
		<div class="header">
			<div class="header-top">
				<div class="container">
					<div class="top-left">
						<a href="#"><b>ASKITCHEN</b></a>
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
							<li><a href="<?php echo site_url('checkout'); ?>"><img src="images/bag.png" alt="" /></a></li>
						</ul>
					</div>
					<!-- search form -->
					<form action="#" method="get" class="sidebar-form">
						<div class="input-group search">
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
							<h1><a href="index.html">New Shop <span>Shop anywhere</span></a></h1>
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
										foreach ($this->data['golongan'] as $item) {
									?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $item->nama ?><b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div>
												<?php foreach ($this->data['item_'.$item->kdgol] as $detail) { ?>
												<div class="col-sm-3 multi-gd-img">
													<div class="row"><label class="block-with-text"><?php echo $detail->nama ?></label></div>
													<div>
														<a href="<?php echo site_url('products/'.$detail->kdgol2); ?>"><img src="<?php echo site_url($this->data['products_dir'].'/'.$detail->gambar); ?>" alt="<?php echo $detail->nama ?>"/></a>
													</div>
													<div><label><?php echo $detail->kdbar ?></label></div>
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
