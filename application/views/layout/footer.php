		<!---footer--->
					<div class="footer-w3l">
						<div class="container">
							<div class="footer-grids">
								<div class="col-md-3 footer-grid">
									<h4><a class="about" href="<?= site_url('about-us'); ?>">About Us</a></h4>
									<p class="about">PT. ASOVIC PERSADA or known as AS KITCHEN is as well-established company specialized in vast range of vast range of kitchen equipment includes refrigeration, cutlery, utensils, custom working tables and many more.</p>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>Main Office</h4>
									<ul>
										<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a>Jl. Dewi Sri 189, Kuta<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bali, Indonesia</a></li>
										<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a>0851 0662 2255</a></li>
										<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a>(0361) 4727857</a></li>
										<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a>(0361) 4727855</a></li>
									</ul>
								</div>  
								<div class="col-md-3 footer-grid">
									<h4>Branch Office</h4>
									<ul>
										<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a>Jl. Sungai Saddang Lama<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Komplek Ruko Latanete Plaza<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blok B No. 11<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Makassar - Indonesia</a></li>
										<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a>0851 0511 5557</a></li>
										<!-- <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a>0851 0813 3577</a></li>
										<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a>(0411) 822 4090</a></li> -->
									</ul>
								</div>
								<div class="col-md-3 footer-grid foot">
									<h4>Follow Us</h4>
									<div class="social-icon">
										<a href="http://www.facebook.com/askitchen" target="_blank"><i class="icon"></i></a>
										<a href="http://www.instagram.com/askitchen" target="_blank"><i class="icon1"></i></a>
										<!-- <a href="#"><i class="icon2"></i></a>
										<a href="#"><i class="icon3"></i></a> -->
									</div>
									<h4><a class="about" href="<?= site_url('contact'); ?>">Contact Us</a></h4>
									<div class="contact-icon">
										<a href="<?php echo site_url('contact-us'); ?>"><i class="icon"></i></a>
										<!-- <a href="http://www.facebook.com/askitchen" target="_blank"><i class="icon"></i></a> -->
										<a href="https://wa.me/6281807727857" target="_blank"><i class="icon1"></i></a>
										<!-- <a href="#"><i class="icon2"></i></a>
										<a href="#"><i class="icon3"></i></a> -->
									</div>
								</div>
								
							<div class="clearfix"> </div>
							</div>
							
						</div>
					</div>
					<!---footer--->
					<div class="footer-bawah">
					<div class="hr"></div>
						<div class="container">
							<div class="footer-grid-bawah">
								<ul>
									<!-- <div class="logo-bawah"> -->
									
									<a href="http://www.askitchen.com/" target="_blank"><img class="img-footer" src="<?= site_url('images/askitchen_btm.png'); ?>" alt="ASkitchen Logo" hspace="5" /></a>
									<a href="http://www.asovic.co.id/" target="_blank"><img class="img-footer-2" src="<?= site_url('images/asovic_btm.png'); ?>" alt="ASovic Logo" hspace="5" /></a>
									<a href="http://www.muchef.com/" target="_blank"><img class="img-footer-2" src="<?= site_url('images/muchef_btm.png'); ?>" alt="Muchef Logo" hspace="5" /></a>
									<!-- </div> -->
								</ul>
							</div>
							
							<!-- <div class="copy-left">
								<p>&copy; 2016 New Shop . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
							</div>
							<div class="copy-right"> -->
							<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!--copy-->
					<div class="copy-section">
						<div class="container">
							<!-- <div class="copy-left">
								<p>&copy; 2016 New Shop . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
							</div>
							<div class="copy-right"> -->
								<!-- <img src="<?php echo site_url('images/card.png'); ?>" alt=""/> -->
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				<!--copy-->

	<script>
		$('ul.nav li.dropdown').hover(function() {
			var menu = $(this).attr('data-menu');
			// $('#'+menu).stop(true, true).delay(100).fadeIn(300);
			$('#'+menu).stop(true, true).delay(100).fadeIn(300);
			// console.log(menu)
			// $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
		}, function() {
			var menu = $(this).attr('data-menu');
			// $('#'+menu).stop(true, true).delay(100).fadeOut(300);
			$('#'+menu).stop(true, true).delay(100).fadeOut(300);
			// $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
		});
		
		$('.dropdown-menu').hover(function() {
			$(this).stop(true, true).delay(100).fadeIn(300);
		}, function() {
			$(this).stop(true, true).delay(100).fadeOut(300);
		});

		$('.grid-arr-cat').hover(function() {
			$(this).find('div.opacity-container').css("visibility", "visible");
		}, function() {
			$(this).find('div.opacity-container').css("visibility", "hidden");
		});

	</script>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.ui.min.js'></script>

	<!-- <script src="<?php echo base_url($frameworks_dir . '/jquery/jquery.min.js'); ?>"></script> -->
	<!-- <script src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.min.js'); ?>"></script> -->
	<!-- <script src="<?php echo base_url($plugins_dir . '/icheck/js/icheck.min.js'); ?>"></script> -->
	<script>
		$(function(){
			// $('input').iCheck({
			// 	checkboxClass: 'icheckbox_square-blue',
			// 	radioClass: 'iradio_square-blue',
			// 	increaseArea: '20%'
			// });
		});

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="<?= site_url('images/simple-red-top-button.png'); ?>" width="40" height="40" /></button>
	<div class="sharethis-inline-share-buttons"></div>
</body>
</html>
