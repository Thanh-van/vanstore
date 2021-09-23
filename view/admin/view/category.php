<div class="catalog_admin row">
    <div class="col-md-8">
            <div class="add_new_seach row mb-2">
                <div class="col-md-3">
                    <button class="add publish-submit btn bg-secondary text-white pl-3 pr-3">add</button>
                </div>
                <!-- <div class="col-md-9">
                    <form method="POST">
                        <input type="text" class="seach">
                        <input type="submit" >
                    </form>
                </div> -->
            </div>
        
        <div class="table">
        <table class="table-view w-100">
            <thead>
                <tr>
                    <td class="tb_checkbox">ID</td>
                    <td>Name</td>
                    <td>Parent</td>
                    <td>Sort</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=0;
                    foreach($data as $item => $key){
                    ?>
                        <tr>
                            <th>
                                <p class="id_ctlg">
                                    <?= $key['id']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="name_ctlg">
                                    <?= $key['name']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="parent_ctlg">
                                    <?= $key['cat_parent'] ?>
                                </p>
                            </th>
                            <th>
                                <p class="sort_ctlg">
                                    <?= $key['sort'] ?>
                                </p>
                            </th>
                            <th>
                                <p class="status_ctlg">
                                    <?= $key['status'] ?>
                                </p>
                            </th>
                            <th>
                                <a class="edit">
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
                    <td class="tb_checkbox">ID</td>
                    <td>Name</td>
                    <td>Parent</td>
                    <td>Sort</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
    <div class="col-md-4">
        <div class="border-left rounded shadow-sm p-2 mb-5">
            <h2 class="text-center right-title mb-2 text_title">Form User</h2>
            <div class="form_body pr-3 pl-3">
                <form method="POST" action="<?= (isset($_GET['id'])) ? strstr(param, "&id", true) : param ?>">
                    <input type="text" class="input_id" value="add" name="id" hidden>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Name</label>
                        <input type="text" class="form-control col-sm-9 input_name" placeholder="Name" name="name">
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Parent</label>
                        <input type="text" class="form-control col-sm-9 input_parent" placeholder="Parent" name="cat_parent">
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Sort</label>
                        <input type="text" class="form-control col-sm-9 input_sort" placeholder="Sort" name="sort_ctlg">
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Status</label>
                        <select name="status_ctlg" class="form-control col-sm-9 input_status">
                            <option value="0">Show</option>
                            <option value="1">Hidden</option>
                        </select>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <input type="submit" name="publish" value="publish" class="publish-submit btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.catalog_admin .edit').click(function(e){
         e.preventDefault();
         table_find($(this) , '.id_ctlg' , '.input_id');
         table_find($(this) , '.name_ctlg' , '.input_name');
         table_find($(this) , '.parent_ctlg' , '.input_parent');
         table_find($(this) , '.sort_ctlg' , '.input_sort');
         table_find_option($(this) , '.status_ctlg' , '.input_status');
     });
     $('.catalog_admin .add').click(function(e){
        e.preventDefault();
        $('.input_name').val('').change();
        $('.input_parent').val('').change();
        $('.input_sort').val('').change();
        $('.input_id').val('add').change();
        $('.text_title').text("Thêm Category");
    });
</script>