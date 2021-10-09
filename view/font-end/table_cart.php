<?php if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $item => $key) { ?>
    <div class="product-cart d-flex">
        <div class="one-forth">
            <div class="product-img" style="background-image: url(<?= host . '/' . name_project . view_font; ?>images/item-7.jpg);">
            </div>
            <div class="display-tc">
                <h3> <?= $key['title'] ?> </h3>
            </div>
        </div>
        <div class="one-eight text-center">
            <div class="display-tc">
                <span class="price">$ <?= $key['price'] ?>.00</span>
            </div>
        </div>
        <div class="one-eight text-center">
            <div class="display-tc">
                <form action="#">
                    <input type="text" name="quantity" data="<?= $item ?>" class="form-control input-number text-center" value=" <?= $key['quantity'] ?>" min="1" max="100">
                </form>
            </div>
        </div>
        <div class="one-eight text-center">
            <div class="display-tc">
                <span class="price">$ <?= $key['price']*$key['quantity'] ?>.00</span>
            </div>
        </div>
        <div class="one-eight text-center">
            <div class="display-tc">
                <a href="#" class="closed remove" data="<?= $item ?>"></a>
            </div>
        </div>
</div>
<?php }
}else{
    ?>
        <p class="text-center"> Không Có sản Phẩm nào</p>
    <?php
} ?>

<script>
    $(".input-number").on("change", function(e) {
        e.preventDefault();
        if($(this).val() > 0){
            $.ajax({
            url : "?view=cart_table",
            type : "POST",
            data : {
                'id' : $(this).attr('data'),
                'quantity': $(this).val()
            },
            success : function (result){
                $('#table_cart').html(result);
            }
            });
        }else{
            alert("Vui lòng nhập lại");
            $.ajax({
              url : "?view=cart_table",
              type : "GET",
              success : function (result){
                  $('#table_cart').html(result);
              }
      });
        }
        
    });
    $('.remove').on('click',function(e){
        e.preventDefault();
        alert("Xóa sản phẩm");
        $.ajax({
            url : "?view=log_out",
            type : "POST",
            data : {
                'key': $(this).attr('data')
            },
            success : function (result){
                $('#header').html(result);
            }
      });
      $.ajax({
              url : "?view=cart_table",
              type : "GET",
              success : function (result){
                  $('#table_cart').html(result);
              }
      });
    });
</script>