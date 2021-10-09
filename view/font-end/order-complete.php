<div class="row">
	<div class="col-sm-10 offset-sm-1 text-center">
		<p class="icon-addcart"><span><i class="icon-check"></i></span></p>
		<h2 class="mb-4">Thank you for purchasing, Your order is complete</h2>
		<p>
			<a href="?view=home" class="btn btn-primary btn-outline-primary">Home</a>
			<a href="?view=men" class="btn btn-primary btn-outline-primary"><i class="icon-shopping-cart"></i> Continue Shopping</a>
		</p>
	</div>
</div>
<script>
        $.ajax({
            url : "?view=log_out",
            type : "POST",
			data :{
				'key' : 'all'
			},
            success : function (result){
                $('#header').html(result);
            }
      });
</script>