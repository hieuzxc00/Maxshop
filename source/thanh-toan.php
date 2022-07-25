<?php 
	require_once __DIR__. "/autoload/autoload.php"; 
    $user = $db->fetchID("users",intval($_SESSION['name_id']));

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
            'amount' => $_SESSION['total'],
            'users_id' => $_SESSION['name_id'],
            'note' => postInput("note")
        ];

        $idtran = $db->insert("transaction",$data);
        if($idtran > 0)
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
               $data2 = 
               [
                'transaction_id' =>$idtran,
                'product_id' => $key,
                'qty' => $value['qty'],
                'price' => $value['price']
               ]; 
               $id_insert = $db->insert("orders", $data2);
            }
            unset($_SESSION['cart']);
            unset($_SESSION['total']);
            $_SESSION['success'] = "Lưu thông tin đơn hàng thành công ! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.";
            header("location: thong-bao.php");
        }
    }
?>

    <?php require_once __DIR__. "/layouts/header2.php"; ?>

        <div class="col-md-1"></div>
        <div class="col-md-10">
            
            <section class="box-main1" style="margin-top: 20px;">
                <h3 class="title-main"><a href=""> Thanh toán đơn hàng</a> </h3>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">

                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1" style="margin-top: 10px">Tên thành viên</label>
                        <div class="col-md-7">
                            <input type="text" readonly="" name="name" placeholder="Nhập tên" class="form-control" value="<?php echo $user['name'] ?>">    
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1" style="margin-top: 10px">Email</label>
                        <div class="col-md-7">
                            <input type="email" readonly="" name="email" placeholder="Nhập email" class="form-control" value="<?php echo $user['email'] ?>">  
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1" style="margin-top: 10px">Số điện thoại</label>
                        <div class="col-md-7">
                            <input type="number"  name="phone" placeholder="Nhập sđt" class="form-control" value="<?php echo $user['phone'] ?>">  
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1" style="margin-top: 10px">Địa chỉ</label>
                        <div class="col-md-7">
                            <input type="text"  name="address" placeholder="Nhập địa chỉ" class="form-control" value="<?php echo $user['address'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1" style="margin-top: 10px">Số tiền thanh toán</label>
                        <div class="col-md-7">
                            <input type="text" readonly="" name="address" placeholder="" class="form-control" value="<?php echo formatPrice($_SESSION['total']) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1" style="margin-top: 10px">Ghi chú</label>
                        <div class="col-md-7">
                            <input type="text" name="note" class="form-control" value="">
                        </div>
                    </div>
                     
                     <button type="submit" class="btn btn-success col-md-2 col-md-offset-5">Xác nhận</button>
                </form>
            </section>

        </div>
        <?php require_once __DIR__. "/layouts/footer.php"; ?>
    
                