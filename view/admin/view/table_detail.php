<div class="table">
        <table class="table-view w-100">
            <thead>
                <tr>
                    <td class="tb_checkbox">STT</td>
                    <td>Title</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Size</td>
                    <td>Color</td>
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
                                 <?= $data['product'][$item][0]['title'] ?>
                                    
                                </p>
                            </th>
                            <th>
                                    <p class="quantity">
                                    <?= $key['quantity']  ?>
                                </p>
                            </th>
                            <th>
                                <p class="name">
                                 <?= $data['product'][$item][0]['price'] ?>
                                    
                                </p>
                            </th>
                            <th>
                                    <p class="quantity">
                                    <?php  foreach($data['size'] as $color => $cl){
                                        if($key['size'] == $cl['id'] )
                                        echo $cl['title'];
                                    } ?>
                                </p>
                            </th>
                            
                            <th>
                                <p class="status">
                                    <?php 
                                        foreach($data['color'] as $color => $cl)
                                        {
                                            if($key['color'] == $cl['id'] )
                                            echo $cl['name'];
                                        }
                                    ?>
                                </p>
                            </th>
                            
                        </tr>
                    <?php
                    }
                ?>
                
            </tbody>
            <tfoot>
                <tr>
                    
                <td class="tb_checkbox">STT</td>
                    <td>Title</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Size</td>
                    <td>Color</td>
                </tr>
            </tfoot>
        </table>
    </div>