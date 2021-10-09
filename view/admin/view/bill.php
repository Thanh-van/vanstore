
<div class="ticket row">
    <div class="col-md-7">
        <div class="add_new_seach row mb-2">
        </div>
        <div class="table">
        <table class="table-view w-100">
            <thead>
                <tr>
                    <td class="tb_checkbox">STT</td>
                    <td>User</td>
                    <td>Date</td>
                    <td>Total</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=0;
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
                                <p class="name">
                                    <?= $key['id_user']  ?>
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
                            <?php if($key['status'] == 1){
                                        ?>
                                        <a href="?url=admin&view=bill&id=<?= $key['id']  ?>&key=2" class="edit btn btn-primary">
                                            Duyệt
                                        </a>
                                        <?php
                                    } ?>
                                <a data="<?= $key['id']  ?>" href="?url=admin&view=bill&id=<?= $key['id']  ?>" class="btn btn-primary" style="background: #FF7878; border-color: #FF7878;">Hủy</a>
                                <a data="<?= $key['id']  ?>" href="<?= (isset($_GET['id'])) ? strstr(param, "&id", true) : param ?>&id=<?= $key['id'] ?>" class="view_bill"> 
                                <i class="bi bi-eye"></i>
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
                    <td>User</td>
                    <td>Date</td>
                    <td>Total</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>

    <div class="col-md-5" id="load">
    
    </div>
</div>

<script>
    $('.view_bill').on('click',function(e){
        e.preventDefault();
        $.ajax({
              url : "?url=admin&view=bill_table",
              type : "POST",
              data : {
                        'id' : $(this).attr('data'),
                    },
              success : function (result){
                  $('#load').html(result);
              }
      });
    });
    
    // $('.ticket .edit').click(function(e){
    //     e.preventDefault();
    //     table_find($(this) , '.name' , '.name');
    //     table_find($(this) , '.id' , '.id');
    //     table_find($(this) , '.price' , '.price');
    //     table_find($(this) , '.delivery_date' , '.delivery_date');
    //     table_find($(this) , '.end_date' , '.end_date');
    //     table_find($(this) , '.sort' , '.sort');
        
    //     table_find_option($(this) , '.status' , '.status');
    //     table_find_option($(this) , '.id_category' , '.id_category');
    //     table_find($(this) , '.quantity' , '.quantity');
    //     $('.text_title').text("Sửa Thông Tin");
    //     $value = $(this).parent().parent().find('.description').text().trim();
    //     console.log($(this).parent().parent().find('.description').text().trim());
    //     CKEDITOR.instances['description'].setData($value);
    //     $img = $(this).parent().parent().find('.img_cl').text().trim();
    //     $("#img-banner_id").attr("src",'view/upload/'+ $img);
    //     table_find($(this) , '.img_cl' , '.img1');
        
        
    // });
    // $('.ticket .add').click(function(e){
    //     e.preventDefault();
    //     $('.name').val('').change();
    //     $('.price').val('0').change();
    //     $('.quantity').val('0').change();
    //     $('.id').val('add').change();
    //     CKEDITOR.instances['description'].setData('');
    //     $('.text_title').text("Thêm tài khoản");
    // });
    CKEDITOR.replace( 'description');
</script>