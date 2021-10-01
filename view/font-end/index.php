<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= host . '/' . name_project; ?>view/font-end/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div id="searchbox" class="light-blue white-text pattern py-2" style="background-image: url(<?= host . '/' . name_project; ?>view/upload/pattern.png)">
			<div class="container">
                <div class="row">
                    <div class="col-sm-3 ">
                        <label for="exampleInputEmail1">Địa điểm</label>
                        <select class="form-control" id="exampleInputEmail1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="col-sm-3 ">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="col-sm-3 ">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="col-sm-3 d-flex align-items-end">
                        <input type="submit" class="btn btn-dark" value="Tìm Kiếm">
                    </div>
                   
                </div>
                <div class="icon-cofig">
                        <i class="bi bi-gear"></i>
                    </div>
                
			</div>
		</div>
</body>
</html>