<!DOCTYPE HTML>
<html>
	<head>
	<title>Vstore - Profile</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
	<!-- Animate.css -->
	
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?= host . '/' . name_project . view_font; ?>css/style.css">

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		
		<nav class="colorlib-nav" role="navigation">
			<?php include_once 'template/header.php' ?> 
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div id="result">
		<?php include_once 'profile_table.php' ?>
		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="<?= host . '/' . name_project . view_font; ?>images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="<?= host . '/' . name_project . view_font; ?>images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="<?= host . '/' . name_project . view_font; ?>images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="<?= host . '/' . name_project . view_font; ?>images/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="<?= host . '/' . name_project . view_font; ?>images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div>
		</div>
		<?php include_once 'template/footer.php' ?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?= host . '/' . name_project . view_font; ?>js/jquery.min.js"></script>
   <!-- popper -->
   <script src="<?= host . '/' . name_project . view_font; ?>js/popper.min.js"></script>
   <!-- bootstrap 4.1 -->
   <script src="<?= host . '/' . name_project . view_font; ?>js/bootstrap.min.js"></script>
   <!-- jQuery easing -->
   <script src="<?= host . '/' . name_project . view_font; ?>js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="<?= host . '/' . name_project . view_font; ?>js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="<?= host . '/' . name_project . view_font; ?>js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="<?= host . '/' . name_project . view_font; ?>js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="<?= host . '/' . name_project . view_font; ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?= host . '/' . name_project . view_font; ?>js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="<?= host . '/' . name_project . view_font; ?>js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="<?= host . '/' . name_project . view_font; ?>js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="<?= host . '/' . name_project . view_font; ?>js/main.js"></script>
	<script>
  $( document ).ready(function() {
    $.ajax({
              url : "?view=ajax_product_4_column",
              type : "POST",
              data : {
                        'page' : 1,
                    },
              success : function (result){
                  $('#load').html(result);
              }
      });
	  
	
  });
  $('.view_bill').on('click',function(e){
        e.preventDefault();
        $.ajax({
              url : "?view=bill_view",
              type : "POST",
              data : {
                        'id' : $(this).attr('data'),
                    },
              success : function (result){
                  $('#detail').html(result);
              }
      });
    });

</script>
<script src="<?= host . '/' . name_project . view_font; ?>js/ajax_seach.js"></script>

	</body>
</html>

