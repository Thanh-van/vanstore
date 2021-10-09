
<div class="colorlib-product">
    <div class="container">
    <?php if(isset($data['product']) && ($data['product']) != 0){ ?>
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                <h2>Best Sellers</h2>
            </div>
        </div>
        
        <div class="row row-pb-md">
        <?php foreach($data['product'] as $item => $key){ ?>
            <div class="col-lg-3 mb-4 text-center">
                <div class="product-entry border">
                    <a href="?view=product_detail&id=<?= $key['id'] ?>">
                    <img src="<?= host . '/' . name_project ; ?>view/upload/<?= unserialize($key['img'])[0] ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
                    </a>
                    <div class="desc">
                        <h2><a href="?view=product_detail&id=<?= $key['id'] ?>"><?= $key['title'] ?></a></h2>
                        <span class="price">$<?= $key['price'] ?>.00</span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row w-100">
            <div class="col-md-12 text-center">
                <div class="block-27">
                <ul>
                        <span id="count" hidden><?= ceil($data['count']/12) ?></span>
                    <li class="page"><a href="#" page="&lt;">&lt;</a></li>
                    <?php for($i = 1 ; $i <= ceil($data['count']/12); $i++){
                        ?>
                        <li class="page <?php if($i == $data['page']) echo"active" ?>"><a href="#" page="<?= $i ?>"><?= $i ?></a></li>
                        <?php
                    } ?>
                        <li class="page"><a href="#" page="&gt;">&gt;</a></li>
                </ul>
            </div>
            </div>
        </div>
        <?php } else{ ?>
        <div class="text-center">
            <h3>Không Có dữ liệu</h3>
        </div>
        <?php } ?>
    </div>
</div>
<script>
     $('.page').on( "click", function(e){
        e.preventDefault();
        console.log("hihi");
        $page = $(this).find('a').attr('page');
        if($page === '>')
        {
            $page = $('.page.active').find('a').attr('page');
            if($("#count").text() === $page) $page = 1;
            else $page = parseInt($page) +1;
        }
        if($page === '<')
        {
            $page = $('.page.active').find('a').attr('page');
            if($page == 1) $page = $("#count").text();
            else $page = parseInt($page) - 1;
        }
        $.ajax({
            url : "?view=ajax_product_4_column",
            type : "POST",
            data : {
                        'page' : $page,
                        'key' : $('.seach_key').attr('data')
                    },
            success : function (result){
                $('#load').html(result);
            }
            
        });
        $("html, body").delay(100).animate({scrollTop: $('#load').offset().top }, 200);
    $('.colorlib-loader').css('display','block');
    setTimeout(function() { 
        $('.colorlib-loader').css('display','none');
    }, 150);
    });
</script>