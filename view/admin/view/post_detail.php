<?php
echo date("Y-m-d");
print_r($data['post'][0])
?>
<form method="POST" action="<?= (isset($_GET['id'])) ? strstr(param, "&id", true) : param ?>" >
<section class="post_detail row">
    <div class="col-md-9">
        <h1 class="text-center">Tiêu đề trang</h1>
        <div class="border-left rounded shadow-sm p-3 mb-5">
            <div class="input_title mb-3">
                <label for="" class="text_title">Tiêu đề</label>
                <input type="text" value="<?= $data['post'][0]['title'] ?>" name="title" class="w-100 p-1">
            </div>
            <div class="input_title mb-3">
                <label for="" class="text_title">Mô tả</label>
                <textarea name="description" class="w-100 p-2" ><?= $data['post'][0]['description'] ?></textarea>
            </div>
            <div class="editor">
                <label for="" class="text_title">Nội Dung</label>
                <textarea name="content"><?= $data['post'][0]['content'] ?></textarea>
                <script>
                        CKEDITOR.replace( 'content' );
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
                
                <div class="catalog">
                    <ul>
                        <?php
                            foreach ($data['category'] as $item => $key) {
                                ?>
                                <li class ="<?php if($key['cat_parent'] != '0') echo "pl-3"; ?>" >
                                    <input id="<?= $key['name'] ?>" value="<?= $key['id'] ?>" type="checkbox" name="category[]">
                                    <label for="<?= $key['name'] ?>"><?= $key['name'] ?></label>
                                </li>
                            <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="container">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Status</label>
                        <select name="status" required class="form-control col-sm-9 status" id="">
                            <option value="0">Show</option>
                            <option value="1">Hidden</option>
                        </select>
                    </div>
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
                <img class="img-banner" id="img-banner_id" src="view/upload/<?= $data['post'][0]['img'] ?>" alt="">
                <input type="file" id="avatar" name="img" accept="image/png, image/jpeg"  onchange="readURL(this);" />
            </div>
        </div>
    </div>
</section>
</form>