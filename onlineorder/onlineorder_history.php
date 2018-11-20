<?php
    session_start();
    include "../header.php";
    include "../conn/pdomysql.php";
    date_default_timezone_set('Asia/Bangkok');
    $mysql = new pdomysql();
    $ward = $_SESSION['hos_user']['ward'];
    $wardname = $_SESSION['hos_user']['wardname'];
    $dateNow = date("Y-m-d");
    ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ประวัติการสั่งอาหารออนไลน์</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">ประวัติการสั่งอาหารออนไลน์</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">WARD : <?= $wardname;?></h3>
        </div>
        <div class="card-body">         
            <div class="col-md-8 offset-md-2">
                <div class="input-group input-group-sm col-sm-4 offset-sm-4">
                    <span class="input-group-text">AN</span>
                    <input type="text" class="form-control" name="an">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-info btn-flat">
                            ค้นหา <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer"></div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
  
   
   
</section>
<?php include "../footer.php";?>

