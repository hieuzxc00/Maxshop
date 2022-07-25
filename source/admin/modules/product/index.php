<?php
   $open = "product";
   require_once __DIR__. "/../../autoload/autoload.php";

    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    $sql = "SELECT product.*,catagory.name as namecate FROM product LEFT JOIN catagory on catagory.id = product.catagory_id";

    $product = $db->fetchJone('product',$sql,$p,5,true);

    if(isset($product['page']))
    {
        $sotrang = $product['page'];
        unset($product['page']);
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
            <li class="breadcrumb-item active">Sản Phẩm</li>
        </ol>
        <a href="add.php" class="btn btn-success" >Thêm mới</a>
        <div class="clearfix"></div>
        <!-- thông báo lỗi -->
            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Danh sách sản phẩm
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Thunbar</th>
                                <th>Info</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; foreach ($product as $item): ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['namecate'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                <td>
                                    <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="80px" height="80px">
                                </td>
                                <td>
                                    <ul>
                                        <li>Giá : <?php echo $item['price'] ?>$</li>
                                        <li>Số lượng : <?php echo $item['number'] ?> </li>
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i> Delete</a>
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
