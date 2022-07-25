<?php 
	require_once __DIR__. "/autoload/autoload.php"; 
    $sum = 0;
    if(! isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    {
        echo"<script>alert('Không có  sản phẩm nào trong giỏ hàng');location.href='index.php'</script>";
    }
?>

    <?php require_once __DIR__. "/layouts/header2.php"; ?>

        <div class="col-md-1"></div>
        <div class="col-md-10">
            <section class="box-main1" style="margin-top: 20px">
                <h3 class="title-main"><a href=""> Giỏ hàng của bạn</a> </h3><br>
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success'] ;unset($_SESSION['success']) ?>
                    </div>
                <?php endif ?>
                <table class="table table-hover" id="shoppingcart_info">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($_SESSION['cart'] as $key => $value): ?>      
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td>
                                    <img src="<?php echo uploads() ?>product/<?php echo $value['thunbar'] ?>" width="80px" height="80px">
                                </td>
                                <td>
                                    <input type="number" name="qty" value="<?php echo $value['qty'] ?>" class="form-control qty" id="qty" min="0" >
                                </td>
                                <td><?php echo formatPrice($value['price']) ?></td>
                                <td><?php echo formatPrice($value['price'] * $value['qty']) ?></td>
                                <td>
                                    <a href="remove.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Remove</a>
                                    <a href="#" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?>><i class="fa fa-refresh"></i> Update</a>
                                </td>
                            </tr>
                            <?php $sum += $value['price'] * $value['qty']; $_SESSION['tongtien'] = $sum ; ?>        
                        <?php $stt ++; endforeach ?>
                        
                    </tbody>
                </table>

                <div class="col-md-6 pull-right">
                    <ul class="list-group">
                        <li class="list-group-item text-center">
                            <h3>Thông tin đơn hàng</h3>
                        </li>
                    
                        <li class="list-group-item">
                            <span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
                            Số tiền
                        </li>
                    
                        <li class="list-group-item">
                            <span class="badge">10%</span>
                            Thuế VAT
                        </li>
                    
                        <li class="list-group-item">
                            <span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien'] * 110/100; echo formatPrice($_SESSION['total']) ?></span>
                            <b>Tổng thanh toán</b>
                        </li>

                        <li class="list-group-item">
                            <a href="index.php" class="btn btn-info">Tiếp tục mua hàng</a>
                            <a href="thanh-toan.php" class="btn btn-success"> Thanh toán</a>
                        </li>
                    </ul>
                </div>
            </section>

        </div>
        <?php require_once __DIR__. "/layouts/footer.php"; ?>
    
                