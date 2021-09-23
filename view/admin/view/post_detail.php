<section class="post_detail row">
    <div class="col-md-9">
        <h1 class="text-center">Tiêu đề trang</h1>
        <div class="border-left rounded shadow-sm p-3 mb-5">
            <div class="input_title mb-3">
                <label for="" class="text_title">Tiêu đề</label>
                <input type="text" class="w-100">
            </div>
            <div class="editor">
                <label for="" class="text_title">Nội Dung</label>
                <textarea name="editor1"></textarea>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
            </div>
        </div>
        <div class="border-left rounded shadow-sm p-3">
            <div class="editor">
                <label for="" class="text_title">Mô tả</label>
                <?php include_once 'ckeditor.php' ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
    <div class="post-box p-2">
            <div class="postbox-header">
                <h2 class="right-title">Publish</h2>
            </div>
            <div class="postbox-content">
                <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Status: 
                </a>
                <div class="collapse" id="collapseExample">
                    <select name="" id="">
                        <option value="">Show</option>
                        <option value="">Hiden</option>
                    </select>
                </div>
                <div class="date">
                    <label for="">Date</label>
                    <input type="date" value="<?= date("Y-m-d"); ?>">
                </div>
                    <div class="">
                        <label for="" class="text_title mr-2">Giá</label>
                        <input type="text">
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
                <img class="img-banner" id="img-banner_id" src="https://d25tv1xepz39hi.cloudfront.net/2016-01-31/files/1045.jpg" alt="">
                <input type="file" id="avatar" name="banner" accept="image/png, image/jpeg"  onchange="readURL(this);" />
            </div>
        </div>
    </div>
</section>