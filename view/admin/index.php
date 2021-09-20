<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="apple-mobile-web-app-title" content="CodePen">
    <title>CodePen - Simple Admin Dashboard - Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="http://thanhvan.local/vancoder/view/admin/js/query.js"></script>
    <script src="js/read.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <link rel="stylesheet" href="http://localhost:81/vancoder/view/admin/css/style.css">
</head>
<body translate="no">
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <?php include_once 'view/template/menubar.php' ?>
            <!-- overlay to close sidebar on small screens -->
            <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>
            <!-- note: in the layout margin auto is the key as sidebar is fixed -->
            <div class="col-md-9 col-lg-10 ml-md-auto px-0">
                <!-- top nav -->
                <?php include_once 'view/template/header.php' ?>
                <!-- main content -->
                <main class="container-fluid">
                    
                    <?= $layout; ?>
                    
                </main>
            </div>
        </div>
    </div>
</body>

</html>