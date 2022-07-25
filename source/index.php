<?php 
    require_once __DIR__. "/autoload/autoload.php"; 

     //unset($_SESSION['cart']);
     $sqlHomecata = "SELECT name,id FROM catagory WHERE home = 1 ORDER BY update_at";
     $catagoryHome = $db->fetchsql($sqlHomecata);

     $data = [];

     foreach ($catagoryHome as $item) {
        $cataId = intval($item['id']);
        $sql = "SELECT * FROM product WHERE catagory_id = $cataId ";
        $ProductHome = $db->fetchsql($sql);
        $data[$item['name']] = $ProductHome;
     }
?>

    <?php require_once __DIR__. "/layouts/header.php"; ?>
        
        <div class="wrap">
        <div class="slider">
          <div class="slide">
            <img src="<?php echo base_url() ?>public/uploads/logo/one-piece-logo.gif" />
            <img src="<?php echo base_url() ?>public/uploads/logo/dragon_ball_z__dbz__nuevo_logo_by_saodvd_d8rx6aw-fullview.png" />
            <img src="<?php echo base_url() ?>public/uploads/logo/70KWWkZ.png" />
            <img src="<?php echo base_url() ?>public/uploads/logo/mavel.jpg" />
            <img src="<?php echo base_url() ?>public/uploads/logo/lol.png" />
            <img src="<?php echo base_url() ?>public/uploads/logo/pubg.png" />
          </div>
          <div class="slide">
            <img src="<?php echo base_url() ?>public/uploads/logo/one-piece-logo.gif" />
            <img src="<?php echo base_url() ?>public/uploads/logo/dragon_ball_z__dbz__nuevo_logo_by_saodvd_d8rx6aw-fullview.png" />
            <img src="<?php echo base_url() ?>public/uploads/logo/70KWWkZ.png" />
            <img src="<?php echo base_url() ?>public/uploads/logo/mavel.jpg" />
            <img src="<?php echo base_url() ?>public/uploads/logo/lol.png" />
            <img src="<?php echo base_url() ?>public/uploads/logo/pubg.png" />
          </div>
        </div>
      </div> <br>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <section class="box-main1">
                <?php foreach ($data as $key => $value): ?>
                <h3 class="title-main"><a href=""><?php echo $key ?></a></h3>
                
            <div class="showitem">
                <?php foreach ($value as $item): ?>    
               <div class="col-md-2  item-product">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                       <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="220">
                   </a>
                   <div class="info-item">
                       <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                       <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                   </div>
                   <div class="hidenitem">
                       <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                       <p><a href=""><i class="fa fa-heart"></i></a></p>
                       <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                   </div>
               </div>
               <?php endforeach ?>
            </div>
            <?php endforeach ?>
            </section>           
        </div>
      </div>
        
        <?php require_once __DIR__. "/layouts/footer.php"; ?>
               