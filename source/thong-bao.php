<?php 
	require_once __DIR__. "/autoload/autoload.php"; 
    
?>

    <?php require_once __DIR__. "/layouts/header2.php"; ?>

        <div class="col-md-1"></div>
        <div class="col-md-10">
            
            <section class="box-main1" style="margin-top: 20px;">
                <h3 class="title-main"><a href="">Thông báo thanh toán</a> </h3>
                
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success'] ;unset($_SESSION['success']) ?>
                    </div>
                <?php endif ?>
                <a href="index.php" class="btn btn-success">Trở về trang chủ</a>
            </section>

        </div>
        <?php require_once __DIR__. "/layouts/footer.php"; ?>
    
                