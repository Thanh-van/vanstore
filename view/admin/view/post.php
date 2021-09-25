
<div class="user_admin row">
    <div class="col-md-12">
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
                    <td>Title</td>
                    <td>Description</td>
                    <td>Category</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=0;
                    foreach ($data['post'] as $item => $key) {
                        ?>
                        <tr>
                            <th>
                                <?= ++$stt; ?>
                                <p class="Title" style="display: none;">
                                    <?= $key['id']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="Title">
                                    <?= $key['title']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="Description">
                                    <?= $key['description'] ?>
                                </p>
                            </th>
                            <th>
                                <p class="id_category">                                    
                                    
                                    <?php 
                                     foreach($data['category'] as $item1 => $vl)
                                        if($key['id_category'] === $vl['id'] ) 
                                        {
                                            echo $vl['name'];
                                            break;
                                        }
                                    ?>
                                </p>
                            </th>
                            <th>
                                <p class="Date">
                                    <?= $key['date'] ?>
                                </p>
                            </th>
                            <th>
                                <p class="status">
                                    <?= ($key['status'] === '0') ? "Hiden" : "Show"; ?>
                                </p>
                            </th>
                            <th>
                                
                                <a href="<?= (isset($_GET['view'])) ? strstr(param, "&v", true) : param ?>&view=post_detail&id=<?=$key['id']; ?>" class="edit">
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
                <td class="tb_checkbox">STT</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Category</td>
                        <td>Date</td>
                        <td>Status</td>
                        <td>Action</td>
            </tfoot>
        </table>
    </div>
    </div>
</div>