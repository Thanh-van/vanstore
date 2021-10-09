<form method="POST" enctype="multipart/form-data">
<section class="post_detail row">
    <div class="col-md-9">
        <h1 class="text-center">Product detail</h1>
        <div class="border-left rounded shadow-sm p-3 mb-5">
            <div class="input_title mb-3">
                <?php if(isset($_GET['id'])) {
                    ?>
                    <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden>
                    <?php
                } ?>
                <label for="" class="text_title">Title</label>
                <input type="text" value="<?= $data['product'][0]['title'] ?>" name="title" class="w-100 p-1" required>
            </div>
            <div class="input_title mb-3">
                <label for="" class="text_title">Short Description</label>
                <textarea required name="short_description" class="w-100 p-2" ><?= $data['product'][0]['short_description'] ?></textarea>
            </div>
            <div class="input_title mb-3">
                <label for="" class="text_title">Manufacturer</label>
                <textarea required name="manufacturer" class="w-100 p-2" ><?= $data['product'][0]['manufacturer'] ?></textarea>
            </div>
            <div class="editor">
                <label for="" class="text_title">Description</label>
                <textarea name="description"><?= $data['product'][0]['description'] ?></textarea>
                <script>
                        CKEDITOR.replace( 'description' );
                </script>
            </div>
        </div>
        
    </div>
    <div class="col-md-3">
    <div class="post-box p-2">
            <div class="postbox-header">
                <h2 class="right-title">Publish</h2>
            </div>
            <div class="postbox-content">
            <div class="dropdown container">
                <button class="form-control col-sm-9 status" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Color
                </button>
                <div class="dropdown-menu p-0" aria-labelledby="dropdownMenu2">
                    <ul>
                        <?php foreach($data['color'] as $item => $key){
                            ?>
                            <li><input  type="checkbox"  <?php if( isset($_GET['id']) && in_array($key['id'],unserialize($data['product'][0]['color']))) echo "checked='true'"; ?> name="color[]" value="<?= $key['id'] ?>" id="color<?= $key['id'] ?>"><label for="color<?= $key['id'] ?>" style="height: 18px; background: <?= $key['title'] ?>;" class="border m-0 ml-2">&emsp;&emsp;</label></li>
                            <?php
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="dropdown container mt-2">
                <button class="form-control col-sm-9 status" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Size
                </button>
                <div class="dropdown-menu p-0" aria-labelledby="dropdownMenu2">
                    <ul>
                        <?php foreach($data['size'] as $item => $key){
                            ?>
                            <li><input type="checkbox" name="size[]" <?php if( isset($_GET['id']) && in_array($key['id'],unserialize($data['product'][0]['size']))) echo "checked='true'"; ?> name="color[]" value="<?= $key['id'] ?>" value="<?= $key['id'] ?>" id="size<?= $key['id'] ?>"><label for="size<?= $key['id'] ?>"  class="m-0 ml-2"><?= $key['title'] ?></label></li>
                            <?php
                        } ?>
                    </ul>
                </div>
            </div>
                <div class="catalog container">
                    
                <label for="inputPassword" >Category</label>
                <select name="id_category" required class="form-control col-sm-9 status" id="">
                            <option <?php if($data['product'][0]['id_category']) echo "selected";  ?>  value="3">Men</option>
                            <option <?php if($data['product'][0]['id_category']) echo "selected";  ?> value="13">Women</option>
                        </select>
                </div>
                <div class="container">
                        <label for="inputPassword" >Status</label>
                        <select name="status" required class="form-control col-sm-9 status" id="">
                            <option <?php if($data['product'][0]['status']) echo "selected";  ?>  value="0">Hidden</option>
                            <option <?php if($data['product'][0]['status']) echo "selected";  ?> value="1">Show</option>
                        </select>
                </div>
                <div class="container">
                        <label for="inputPassword" >Price</label>
                        <input type="number" name="price" class="form-control col-sm-9 status" value="<?= $data['product'][0]['price'] ?>">
                </div>
                <div class="container">
                        <label for="inputPassword" >Sort</label>
                        <input type="number" name="sort" class="form-control col-sm-9 status" value="0">
                </div>
                
                <div class="d-flex flex-row-reverse">
                    <input type="submit" name="publish" value="publish" class="publish-submit btn btn-primary">
                </div>
            </div>
        </div>
        <div class="post-box p-2">
            <div class="postbox-header">
                <h2 class="right-title">Product image</h2>
            </div>
            <div class="postbox-content">
                
            
            <?php if(isset($data['product'])){
                foreach(unserialize($data['product'][0]['img']) as $item){
                    ?>
                    <img class="img-banner" style="width: 50px;" alt="" src="<?= 'view/upload/'.$item ?>">
                    <input type="text" name="img1[]" accept="image/png, image/jpeg" value="<?= $item ?>" hidden />
                    <?php
                }
            } ?>
            <input type="file" id="avatar" class="img" name="img[]" accept="image/png, image/jpeg"  onchange="readURL(this);" multiple />
            </div>
        </div>
    </div>
</section>
</form>