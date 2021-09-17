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
    <script src="js/query.js"></script>
    <script src="js/read.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <link rel="stylesheet" href="http://thanhvan.local/vancoder/view/admin/css/style.css">
</head>
<?= $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<body translate="no">
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
                <h1 class="bi bi-bootstrap text-primary d-flex my-4 justify-content-center"></h1>
                <div class="list-group rounded-0">
                    <a href="#"
                        class="list-group-item list-group-item-action active border-0 d-flex align-items-center">
                        <span class="bi bi-border-all"></span>
                        <span class="ml-2">Dashboard</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
                        <span class="bi bi-box"></span>
                        <span class="ml-2">Products</span>
                    </a>

                    <button
                        class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center collapsed"
                        data-toggle="collapse" data-target="#sale-collapse" aria-expanded="false">
                        <div>
                            <span class="bi bi-person-circle"></span>
                            <span class="ml-2">Tài Khoản</span>
                        </div>
                        <span class="bi bi-chevron-down small"></span>
                    </button>
                    <div class="collapse" id="sale-collapse" data-parent="#sidebar" style="">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Admin</a>
                            <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Khách Hàng</a>
                        </div>
                    </div>

                    <button
                        class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center"
                        data-toggle="collapse" data-target="#purchase-collapse" aria-expanded="true">
                        <div>
                            <span class="bi bi-cart-plus"></span>
                            <span class="ml-2">Purchase</span>
                        </div>
                        <span class="bi bi-chevron-down small"></span>
                    </button>
                    <div class="collapse" id="purchase-collapse" data-parent="#sidebar" style="">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Sellers</a>
                            <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Purchase Orders</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- overlay to close sidebar on small screens -->
            <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>
            <!-- note: in the layout margin auto is the key as sidebar is fixed -->
            <div class="col-md-9 col-lg-10 ml-md-auto px-0">
                <!-- top nav -->
                <nav class="w-100 d-flex px-4 py-2 mb-4 shadow-sm">
                    <!-- close sidebar -->
                    <button class="btn py-0 d-lg-none" id="open-sidebar">
                        <span class="bi bi-list text-primary h3"></span>
                    </button>
                    <div class="dropdown ml-auto">
                        <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown"
                            aria-expanded="false">
                            <span class="bi bi-person text-primary h4"></span>
                            <span class="bi bi-chevron-down ml-1 mb-2 small"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm"
                            aria-labelledby="logout-dropdown" style="">
                            <a class="dropdown-item" href="#">Logout</a>
                            <a class="dropdown-item" href="#">Settings</a>
                        </div>
                    </div>
                </nav>
                <!-- main content -->
                <main class="container-fluid">
                    
                    <?php include_once 'view/user.php' ?>
                    
                </main>
            </div>
        </div>
    </div>
</body>

</html>