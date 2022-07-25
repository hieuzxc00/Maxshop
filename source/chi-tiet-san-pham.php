<?php 
	require_once __DIR__. "/autoload/autoload.php"; 

    $id = intval(getInput('id'));
    
    //lấy chi tiết sản phẩm
    $product = $db->fetchID("product",$id);


    //lấy danh mục sản phẩm
    $cataid = $product['catagory_id'];
    
    $sql = "SELECT * FROM product WHERE catagory_id = $cataid ORDER BY ID DESC LIMIT 4";
    $smphamtuongtu = $db->fetchsql($sql);
?>

    <?php require_once __DIR__. "/layouts/header2.php"; ?>
		<br>
		<br>
        <div class="col-md-10 col-md-offset-1 bor">
            <section class="box-main1" >
                <div class="col-md-6 text-center">
                    <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                </div>
                <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                   <ul id="right">
                        <li><h3><?php echo $product['name'] ?></h3></li>
                        
                        <?php if ($product['sale'] > 0): ?>
                        <li><p> Sale: <?php echo $product['sale'] ?>% </p></li>
                        <li><p>Price: <strike class="sale"><?php echo formatPrice($product['price']) ?></strike> <b class="price"><?php echo formatpricesale($product['price'],$product['sale']) ?></b></li>
                        <?php else : ?>
                            <li><p>Price: <b class="price"><?php echo formatpricesale($product['price'],$product['sale']) ?></b></li>
                        <?php endif ?>    
                        <li><a href="addcart.php?id=<?php echo $product['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add To Cart</a></li>
                   </ul>
                </div>

            </section>
            <div class="col-md-12" id="tabdetail">
                <div class="row">
                        
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Product Description </a></li>
                        <li><a data-toggle="tab" href="#menu1">Introduce </a></li>
                    </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <p><?php echo $product['content'] ?></p>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <p><?php echo $product['intro'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-md-10 col-md-offset-1" style="padding-top: 10px;">
            <h3 class="text-center">Similar Product</h3>
                <div class="showitem">
                <?php foreach ($smphamtuongtu as $item): ?>    
                   <div class="col-md-2  item-product ">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                           <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                       </a>
                       <div class="info-item">
                           <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                           <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                       </div>
                       <div class="hidenitem">
                           <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                           <p><a href=""><i class="fa fa-heart"></i></a></p>
                           <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                       </div>
                   </div>
               <?php endforeach ?>
            </div>
      </div>             

        <?php require_once __DIR__. "/layouts/footer.php"; ?>
    
                