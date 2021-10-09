<div class="row">
	<div class="col-lg-8">
		<form method="post" class="colorlib-form">
			<h2>Billing Details</h2>
		  <div class="row">
		   

				<div class="col-md-6">
					<div class="form-group">
						<label for="fname">First Name</label>
						<input type="text" id="fname" class="form-control" value="<?= $_SESSION['user']['first_name'] ?>" placeholder="<?= $_SESSION['user']['first_name'] ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="lname">Last Name</label>
						<input type="text" id="lname" class="form-control" value="<?= $_SESSION['user']['last_name'] ?>" placeholder="<?= $_SESSION['user']['last_name'] ?>">
					</div>
				</div>

				

		   
		
		   <div class="col-md-12">
					<div class="form-group">
						<label for="companyname">Town/City</label>
					<input type="text" id="towncity" value="<?= $_SESSION['user']['address'] ?>" class="form-control" placeholder="Town or City">
			  </div>
		   </div>
		   <div class="col-md-6">
					<div class="form-group">
						<label for="email">E-mail Address</label>
						<input type="text" id="email" class="form-control" value="<?= $_SESSION['user']['mail'] ?>" placeholder="<?= $_SESSION['user']['mail'] ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="Phone">Phone Number</label>
						<input type="text" id="zippostalcode" value="<?= $_SESSION['user']['phone'] ?>" class="form-control" placeholder="">
					</div>
				</div>

				
	   </div>
	</form>
	</div>

	<div class="col-lg-4">
		<div class="row">
			<div class="col-md-12">
				<div class="cart-detail">
					<h2>Cart Total</h2>
					<ul>
						<li>
							<span>Subtotal</span> <span>$<?php $sum = 0;  foreach($_SESSION['cart'] as $item => $key) $sum += $key['quantity'] * $key['price']; echo $sum; ?>.00</span>
						</li>
						<li><span>Shipping</span> <span>$0.00</span></li>
						<li><span>Order Total</span> <span>$<?php $sum = 0; foreach($_SESSION['cart'] as $item => $key) $sum += $key['quantity'] * $key['price']; echo $sum; ?>.00</span></li>
					</ul>
				</div>
		   </div>

		   <div class="w-100"></div>

		   
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<p><a href="#" class="btn btn-primary place_order">Place an order</a></p>
			</div>
		</div>
	</div>
</div>
<script >

	$('.place_order').on('click',function(e){
		e.preventDefault();
		$('.order').addClass('active');
		$.ajax({
			url : "?view=push_bill",
			type : "POST",
			data : {
					'key' : 'push'
				},
			success : function (result){
				$('#data_cart').html(result);
			}
      });
	  $('.colorlib-loader').css('display','block');
    setTimeout(function() { 
        $('.colorlib-loader').css('display','none');
    }, 350);
	});
</script>