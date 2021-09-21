<div class="user_admin row">
    <div class="col-md-8">
        <div class="table">
        <table class="table-view w-100">
            <thead>
                <tr>
                    <td class="tb_checkbox"><input type="checkbox" name="box_all"> </td>
                    <td>STT</td>
                    <td>Name</td>
                    <td>Pass</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=0;
                    foreach($data['user'] as $item => $key){
                    ?>
                        <tr>
                            <th>
                                <input type="checkbox" name="box[]">
                            </th>
                            <th>
                                <?= ++$stt; ?>
                                <p class="id_name" style="display: none;">
                                    <?= $key['id']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="user_name">
                                    <?= $key['user']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="pass_name">
                                    <?= $key['pass'] ?>
                                </p>
                            </th>
                            <th>
                                
                                <a href="" class="edit">
                                    <i class="bi bi-pencil-square text-warning"></i>
                                </a>
                                <a href="<?= param ?>&id=<?= $key['id'] ?>" class="">
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
                    <td class="tb_checkbox"><input type="checkbox" name="box_all"></td>
                    <td>STT</td>
                    <td>Name</td>
                    <td>Pass</td>
                    <td>Action</td>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
    <div class="col-md-4">
        <div class="border-left rounded shadow-sm p-2 mb-5">
            <h2 class="text-center right-title mb-2">Form User</h2>
            <div class="form_body pr-3 pl-3">
                <input type="text" name="id" class='input_id' hidden>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Name</label>
                    <input type="text" class="form-control col-sm-9 input_name" id="inputPassword" placeholder="Password">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Passs</label>
                    <input type="password" class="form-control col-sm-9 input_pass" id="inputPassword" placeholder="Password">
                </div>
                <div class="d-flex flex-row-reverse">
                    <input type="submit" name="publish" value="publish" class="publish-submit btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.user_admin .edit').click(function(e){
        e.preventDefault();
        table_find($(this) , '.user_name' , '.input_name');
        table_find($(this) , '.pass_name' , '.input_pass');
        table_find($(this) , '.id_name' , '.input_id');
    });
</script>