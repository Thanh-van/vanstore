
<div id="header">
<div class="top-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-9">
                <div id="colorlib-logo"><a href="?view=home">Vstore</a></div>
            </div>
            <div class="col-sm-5 col-md-3">
            <form action="?view=seach&s=" class="search-wrap">
            <div class="form-group">
                <input type="search" name="s" class="form-control search" placeholder="Search">
                <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
            </div>
            </form>
        </div>
    </div>
        <div class="row">
            <div class="col-sm-12 text-left menu-1">
                <ul>
                    <li <?php if(isset($_GET['view']) && $_GET['view'] === 'home')  echo 'class="active"'?> ><a href="?view=home">Home</a></li>
                    <li class="<?php if(isset($_GET['view']) && $_GET['view'] === 'men')  echo 'active'?>"  >
                        <a href="?view=men">Men</a>
                        
                    </li>
                    <li <?php if(isset($_GET['view']) && $_GET['view'] === 'women')  echo 'class="active"'?> ><a href="?view=women">Women</a></li>
                    <li <?php if(isset($_GET['view']) && $_GET['view'] === 'about')  echo 'class="active"'?> ><a href="?view=about">About</a></li>
                    <li <?php if(isset($_GET['view']) && $_GET['view'] === 'contact')  echo 'class="active"'?> ><a href="?view=contact">Contact</a></li>
                    <li class="has-dropdown"><a href="?view=login"><i class="bi bi-person-circle"></i></a>
                        <?php if(isset($_SESSION['user'])){
                            ?>
                            <ul class="dropdown">
                                <li><a href="?view=profile">Profile</a></li>
                                <li ><a class="logout" href="cart.html">Logout</a></li>
                            </ul>
                            
                            <?php
                        } ?>
                      
                     </li>
                    <li class="cart"><a href="?view=cart"><i class="icon-shopping-cart"></i> Cart [<?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart']);else echo '0'; ?>]</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
</div></div>
<script>
    
</script>