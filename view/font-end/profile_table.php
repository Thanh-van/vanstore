
<div class="d-flex">
    <div class="container">
        <div class="row">
        <div class="col-md-7">
            
        <div class="table pt-3">
            <h3>Your order list</h3>
        <table class="table-view w-100">
            <thead>
                <tr>
                    <td class="tb_checkbox">STT</td>
                    <td>Date</td>
                    <td>Total</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=0; if (isset($data['bill']) && ($data['bill']) != 0) {
                        foreach ($data['bill'] as $item => $key) {
                            ?>
                        <tr>
                            <th>
                                <?= ++$stt; ?>
                                <p class="id_name id" style="display: none;">
                                    <?= $key['id']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="price">
                                    <?= $key['date'] ?>
                                </p>
                            </th>
                            <th>
                                <p class="quantity">
                                    $<?= $key['total'] ?>.00
                                </p>
                            </th>
                            <th>
                                
                                    <?php
                                    foreach ($data['status'] as $item2 => $key1) {
                                        if($key1['id'] == $key['status']){
                                            ?><p style="color: <?=  $key1['color'] ?>;" class="status">
                                                <?=  $key1['title'] ?>
                                                </p>
                                            <?php
                                        }
                                       
                                    }
                                    ?>
                                   
                                
                            </th>
                            <th>
                                <p class="view">
                                    <?php if($key['status'] == 1){
                                        ?>
                                        <a href="?view=profile&id=<?= $key['id']  ?>" style="color: red;">
                                            <i class="bi bi-x-circle"></i>
                                        </a>
                                        <?php
                                    } ?>
                                    
                                    <a class="view_bill" data="<?= $key['id']  ?>" href="">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                
                                </p>
                            </th>
                        </tr>
                    <?php
                        }
                    }
                ?>
                
            </tbody>
            <tfoot>
                <tr>
                <td class="tb_checkbox">STT</td>
                    <td>Date</td>
                    <td>Total</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </tfoot>
        </table>
        
        <div id="detail"></div>
    </div>
        </div>
        <div class="card-body col-md-5">
                <p class="login-card-description">Profile</p>
                <form method="POST" action="?view=profile" class="colorlib-form">
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control" name="first_name" value="<?= $_SESSION['user']['first_name'] ?>" placeholder="<?= $_SESSION['user']['first_name'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" name="last_name" id="lname" class="form-control" value="<?= $_SESSION['user']['last_name'] ?>" placeholder="<?= $_SESSION['user']['last_name'] ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="companyname">Town/City</label>
                                <input type="text" id="towncity" name="address" value="<?= $_SESSION['user']['address'] ?>" class="form-control" placeholder="Town or City">
                             </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail Address</label>
                            <input type="text" name="mail" id="email" class="form-control" value="<?= $_SESSION['user']['mail'] ?>" placeholder="<?= $_SESSION['user']['mail'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Phone">Phone Number</label>
                            <input type="text" name="phone" id="zippostalcode" value="<?= $_SESSION['user']['phone'] ?>" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="companyname">Pass</label>
                        <input type="password" name="pass" id="towncity" name="address" value="<?= $_SESSION['user']['pass'] ?>" class="form-control" placeholder="Town or City">
                        </div>
                        <input name="login" class="btn btn-block login-btn mb-4" type="submit" value="Edit">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>