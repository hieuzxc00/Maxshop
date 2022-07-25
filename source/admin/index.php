<?php
   require_once __DIR__. "/autoload/autoload.php";

   $catagory = $db -> fetchAll("catagory");
    
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                    </ol>
                    <!-- Page Content -->
                    <h1>Dashboard</h1>
                    <hr>
                </div>
                <!-- /.container-fluid -->
                <div class="row" style="margin-right: 0; margin-left: 0">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-box-open"></i>
                                </div>
                                <div class="mr-5">Tổng số sản phẩm</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="../admin/modules/product/index.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                            </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="mr-5">Tổng doanh thu</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                            </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-shopping-cart"></i>
                                </div>
                                <div class="mr-5">Đơn hàng</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="../admin/modules/transaction/index.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                            </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="mr-5">Tổng số thành viên</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="../admin/modules/user/index.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>
<?php 
   
 ?>