<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
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
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

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

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>Product Details</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="text-center" id="tb"></div>
		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg product-detail-wrap">
					<div class="col-sm-8">
						<div class="owl-carousel">
							<?php foreach(unserialize($data['product'][0]['img']) as $item => $key){
							 ?>
							<div class="item">
								<div class="product-entry border">
									<a href="<?= host . '/' . name_project . 'view/'; ?>upload/<?=  $key ?>" class="prod-img">
										<img src="<?= host . '/' . name_project . 'view/'; ?>upload/<?=  $key ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
									</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-desc">
							<p class="name_img" data="<?= unserialize($data['product'][0]['img'])[0] ?>" hidden></p>
							<h3 class="title" data="<?= $data['product'][0]['title'] ?>"><?= $data['product'][0]['title'] ?></h3>
							<p class="id_product" data="<?= $_GET['id'] ?>" hidden></p>
							<p class="price" data="<?= $data['product'][0]['price'] ?>">
								<span>$<?= $data['product'][0]['price'] ?>.00</span>
							</p>
							<p><?= $data['product'][0]['short_description'] ?></p>
							<div class="size-wrap">
								<div class="block-26 mb-2">
									<h4>Size</h4>
				               <ul>
									<?php foreach($data['size'] as $item => $key){
										if( isset($_GET['id']) && in_array($key['id'],unserialize($data['product'][0]['color']))) 
										{
											?>
												<li><a href="#" class="size" data="<?=$key['id'] ?>"><?=  $key['title'] ?></a></li>
											<?php
										}
									} ?>
				               </ul>
				            </div>
				            <div class="block-26 mb-4">
									<h4>Color</h4>
				               <ul>
									<?php foreach($data['color'] as $item => $key){
										if( isset($_GET['id']) && in_array($key['id'],unserialize($data['product'][0]['color']))) 
										{
											?>
												<li><a href="#" class="color border" data="<?=$key['id'] ?>" style="background: <?=  $key['title'] ?>;">&emsp;</a></li>
											<?php
										}
									} ?>
				               </ul>
				            </div>
							</div>
                     <div class="input-group mb-4">
                     	<span class="input-group-btn">
                        	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                           <i class="icon-minus2"></i>
                        	</button>
                    		</span>
                     	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                     	<span class="input-group-btn ml-1">
                        	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                             <i class="icon-plus2"></i>
                         </button>
                     	</span>
                  	</div>
                  	<div class="row">
	                  	<div class="col-sm-12 text-center">
									<p class="addtocart">
										<?php if(isset($_SESSION['user']))
										{
										?>
										<a href="cart.html" class="btn btn-primary btn-addtocart add_to_cart"><i class="icon-shopping-cart"></i> Add to Cart</a>
										<?php
										}else{
										?>
											<a href="?view=login" onclick="alert('Vui Lòng Đăng Nhập');" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart</a>
										<?php
										}
										?>
										
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-12 pills">
								<div class="bd-example bd-example-tabs">
								  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

								    <li class="nav-item">
								      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Description</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Manufacturer</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
								    </li>
								  </ul>

								  <div class="tab-content" id="pills-tabContent">
								    <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
								     <?php print_r($data['product'][0]['description']) ?>
								    </div>

								    <div class="tab-pane border fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
									<?php print_r($data['product'][0]['manufacturer']) ?>
								     </div>

								    <div class="tab-pane border fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
								      <div class="row">
								   		<div class="col-md-8">
								   			<h3 class="head">23 Reviews</h3>
								   			<div class="review">
										   		<div class="user-img" style="background-image: url(<?= host . '/' . name_project . view_font; ?>images/person1.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
										   	<div class="review">
										   		<div class="user-img" style="background-image: url(<?= host . '/' . name_project . view_font; ?>images/person2.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
										   	<div class="review">
										   		<div class="user-img" style="background-image: url(<?= host . '/' . name_project . view_font; ?>images/person3.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
								   		</div>
								   		<div class="col-md-4">
								   			<div class="rating-wrap">
									   			<h3 class="head">Give a Review</h3>
									   			<div class="wrap">
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					(98%)
									   					</span>
									   					<span>20 Reviews</span>
										   			</p>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					(85%)
									   					</span>
									   					<span>10 Reviews</span>
										   			</p>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					(70%)
									   					</span>
									   					<span>5 Reviews</span>
										   			</p>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					(10%)
									   					</span>
									   					<span>0 Reviews</span>
										   			</p>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					(0%)
									   					</span>
									   					<span>0 Reviews</span>
										   			</p>
										   		</div>
									   		</div>
								   		</div>
								   	</div>
								    </div>
								  </div>
								</div>
				         </div>
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
		$(document).ready(function(){
		$('.add_to_cart').on('click',function(e){
			e.preventDefault();
			$color = $('.color.border.active').attr('data');
			$size = $('.size.active').attr('data');
			$id = $('.id_product').attr('data');
			$price = $('.price').attr('data');
			$title = $('.title').attr('data');
			$img = $('.name_img').attr('data');
			$quantity = $('.input-number').val();

			
			if($size != null && $color != null)
			{
				$.ajax({
					url : "?view=cart_site",
					type : "POST",
					data : {
							'id' : $id,
							'img' : $img,
							'title' : $title,
							'size' : $size,
							'color' : $color,
							'price' : $price,
							'quantity' : $quantity,
							},
					success : function (result){
						$('#header').html(result);
						alert("Thêm Thành Công");
					}
				});
			}else{
				alert('Vui lòng chọn size và màu sắc');
			}

		});
		$(".size").on( "click", function(e){
			e.preventDefault();
			$('.size').removeClass('active');
			$(this).addClass('active');
		});

		$(".color").on( "click", function(e){
			e.preventDefault();
			$('.color').removeClass('active');
			$(this).addClass('active');
		});
		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>

<script src="<?= host . '/' . name_project . view_font; ?>js/ajax_seach.js"></script>
	</body>
</html>

