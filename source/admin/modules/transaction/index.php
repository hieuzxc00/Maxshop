<?php
   $open = "transaction";
   require_once __DIR__. "/../../autoload/autoload.php";

    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    $sql = "SELECT transaction.*, users.name as nameuser, users.phone as  phoneuser, users.address as addressuser FROM transaction LEFT JOIN users ON users.id = transaction.users_id ORDER BY ID DESC ";

    $transaction = $db->fetchJone('transaction',$sql,$p,5,true);

    if(isset($transaction['page']))
    {
        $sotrang = $transaction['page'];
        unset($transaction['page']);
    }
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
            <div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Quản lý đơn hàng</li>
        </ol>
        <div class="clearfix"></div>
        <!-- thông báo lỗi -->
            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Thông tin đơn hàng
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; foreach ($transaction as $item): ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $item['nameuser'] ?></td>
                                <td><?php echo $item['phoneuser'] ?></td>
                                <td><?php echo $item['addressuser'] ?></td>
                                <td><?php echo $item['created_at'] ?></td>
                                <td>
                                    <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-primary' ?>"><?php echo $item['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i> Delete</a>
                                    <!--
                                    <a class="btn btn-xs btn-info" href="chi-tiet.php?id=<?php echo $item['id'] ?>"><i class="fas fa-plus"></i> Chi tiết đơn hàng</a>
                                    -->
                                </td> 
                            </tr>
                            <?php $stt++ ; endforeach ?>
                        </tbody>
                    </table>

                    <div class="pull-right">
                        <nav aria-label="Page navigation" class="clearfix">
                            <ul class="pagination">
                                <li>
                                    <a href="" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for($i = 1 ; $i <= $sotrang ; $i++) : ?>
                                    <?php 
                                       if(isset($_GET['page']))
                                       {
                                           $p = $_GET['page'];
                                       } 
                                       else
                                       {
                                           $p = 1;
                                       }  
                                     ?>
                                    <li class="<?php echo ($i == $p) ? 'active' : '' ?>">
                                        <a href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>
                                    </li> 
                                <?php endfor; ?>
                                
                                 <li>
                                    <a href="" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>   
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>public/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url() ?>public/admin/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>public/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>public/admin/js/sb-admin.min.js"></script>
<!-- Demo scripts for this page-->
<script src="<?php echo base_url() ?>admin/js/demo/datatables-demo.js"></script>
</body>
</html>
