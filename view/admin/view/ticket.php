
<div class="ticket row">
    <div class="col-md-8">
        <div class="add_new_seach row mb-2">
            <div class="col-md-2">
                <button class="add publish-submit btn bg-secondary text-white">add</button>
            </div>
        </div>
        <div class="table">
        <table class="table-view w-100">
            <thead>
                <tr>
                    <td class="tb_checkbox">STT</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=0;
                    foreach ($data['ticket'] as $item => $key) {
                        ?>
                        <tr>
                            <th>
                                <?= ++$stt; ?>
                                <p class="id_name" style="display: none;">
                                    <?= $key['id']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="name">
                                    <?= $key['name']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="price">
                                    <?= $key['price'] ?>
                                </p>
                            </th>
                            <th>
                                <p class="quantity">
                                    <?= $key['quantity'] ?>
                                </p>
                            </th>
                            <th>
                                <p class="status">
                                    <?= $key['status'] ?>
                                </p>
                                <div style="display: none; ">
                                    <p class="id_category">
                                        <?= $key['id_category'] ?>
                                    </p>
                                    <p class="img">
                                        <?= $key['img'] ?>
                                    </p>
                                    <p class="description">
                                        <?= $key['description'] ?>
                                    </p>
                                    <p class="sort">
                                        <?= $key['sort'] ?>
                                    </p>
                                    <p class="status">
                                        <?= $key['status'] ?>
                                    </p>
                                </div>
                            </th>
                            <th>
                                
                                <a href="" class="edit">
                                    <i class="bi bi-pencil-square text-warning"></i>
                                </a>
                                <a href="<?= (isset($_GET['id'])) ? strstr(param, "&id", true) : param ?>&id=<?= $key['id'] ?>" class="" onclick="return confirm('Are you sure you want to delete this item?') "> 
                                    <i class="bi bi-trash text-danger"></i>
                                </a>
                            </th>
                        </tr>
                    <?php
                    }
                ?>
                
            </tbody>
            <tfoot>
                <tr>
                    <td class="tb_checkbox">STT</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>

    <div class="col-md-4">
        <form action="<?= (isset($_GET['id'])) ? strstr(param, "&id", true) : param ?>" method="POST">
            <div class="border-left rounded shadow-sm p-2 mb-5 overflow-auto add_form">
                    <h2 class="text-center right-title mb-2 text_title">Thêm tài khoản</h2>
                    <div class="form_body pr-3 pl-3">
                        <input type="text" name="id" value="add" class='id_category' >
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Name</label>
                            <input type="text" name="name" class="form-control col-sm-9 name" id="inputPassword" required placeholder="Name">
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Price</label>
                            <input type="number" name="price" class="form-control col-sm-9 price" id="inputPassword" required placeholder="Price">
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control col-sm-9 quantity" id="inputPassword" required placeholder="Quantity">
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Sort</label>
                            <input type="number" name="sort" class="form-control col-sm-9 sort" id="inputPassword" required placeholder="Sort">
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Delivery date</label>
                            <input type="date" name="delivery_date" class="form-control col-sm-9 delivery_date" id="inputPassword" required placeholder="Price">
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">End date</label>
                            <input type="date" name="end_date" class="form-control col-sm-9 end_date" id="inputPassword" required placeholder="Price">
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Category</label>
                            <select name="id_category" class="form-control col-sm-9 id_category">
                            <?php
                                foreach ($data['category'] as $item => $key) {
                                    ?>
                                        <option><?= $key['name'] ?> </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Status</label>
                            <select name="status" class="form-control col-sm-9 status" id="">
                                <option value="0">Show</option>
                                <option value="1">Hidden</option>
                            </select>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <input type="submit" name="publish" value="publish" class="publish-submit btn btn-primary">
                        </div>
                    </div>
            </div>
            <div class="border-left rounded shadow-sm p-2 mb-5">
                    <h2 class="text-center right-title mb-2 text_title">Content</h2>
                    <textarea name="description" class="description">
                    </textarea>
            </div>
            <div class="postbox-content">
                <img class="img-banner" id="img-banner_id" alt="">
                <input type="file" id="avatar" name="img" accept="image/png, image/jpeg"  onchange="readURL(this);" />
            </div>
            
        </form>
    </div>
</div>

<script>
    $('.ticket .edit').click(function(e){
        e.preventDefault();
        table_find($(this) , '.name' , '.name');
        table_find($(this) , '.id_category' , '.id_category');
        table_find($(this) , '.price' , '.price');
        table_find($(this) , '.description' , '.description');
        table_find($(this) , '.delivery_date' , '.delivery_date');
        table_find($(this) , '.end_date' , '.end_date');
        table_find($(this) , '.sort' , '.sort');
        table_find($(this) , '.status' , '.status');
        table_find($(this) , '.quantity' , '.quantity');
        $('.text_title').text("Sửa Thông Tin");
        $value = $(this).parent().parent().find('.description').text().trim();
        // console.log($value);
        CKEDITOR.instances['description'].setData($value);
        // $('.description').val('description').change();
        $("#img-banner_id").attr("src","second.jpg");
        
    });
    $('.ticket .add').click(function(e){
        e.preventDefault();
        $('.name').val('').change();
        $('.id_category').val('add').change();
        CKEDITOR.instances['description'].setData('');
        $('.text_title').text("Thêm tài khoản");
    });
    CKEDITOR.replace( 'description');
</script>