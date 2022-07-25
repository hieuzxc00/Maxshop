

<!DOCTYPE html>
<html>
    <head>
        <title>Toys Store</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/
        font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" 
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url() ?>/public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>/public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/style.css">
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Group_5</a><b> T1.1808.M1</b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if(isset($_SESSION['name_user'])): ?>
                                            <li>
                                                <a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['name_user'] ?> <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="gio-hang.php"><i class="fa fa-shopping-basket"></i> Cart</a></li>
                                                    <li><a href="thoat.php"><i class="fas fa-sign-out-alt"></i>
                                                    Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li>Welcome to MaxShop !!!</li>
                                        <?php else : ?> 
                                            <li>
                                                <a href="dang-nhap.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                                            </li>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-unlock"></i> Sign-up</a>
                                            </li>
                                        <?php endif ; ?>   
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline" method="GET" action="<?php echo base_url() ?>tim-kiem.php">
                                <div class="form-group">
                                    
                                    <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm" class="form-control">
                                    <button type="submit" name="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="index.php">
                                <img src="<?php echo base_url() ?>public/frontend/images/logo-default.png">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0359313750</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Home</a>
                        </div>

                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="gioi-thieu.php">Introduce</a>
                            </li>
                            <li>
                                <a href="huong-dan-mua-hang.php">Shopping guide</a>
                            </li>
                            <li>
                                <a href="lien-he.php">Contact</a>
                            </li>
                            <li>
                                <a href="about-us.php">About us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php"><i class="fas fa-shopping-cart"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Category</h3>
                            <ul>
                                <?php foreach($catagory as $item) :?>
                                <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <!--Sản phẩm bán chạy-->
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i> Selling products </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach ($productPay as $item): ?>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name'] ?></p >
                                            <b class="price">Sale: <?php echo formatpricesale($item['price'],$item['sale']) ?></b><br>
                                            <b class="sale">Cost: <?php echo formatPrice($item['price']) ?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ?>
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>

                    </div>
                    <section class="box-main1">
                        <h3 class="title-main"><a href="">New Products</a> </h3>
                        
                        <div class="showitem">
                            <?php foreach ($productNew as $item) :?>
                            <div class="col-md-3  item-product">
                                 <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                    <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="240">
                                </a>
                                <div class="info-item">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a><br>
                                    <b class="price">Sale: <?php echo formatpricesale($item['price'],$item['sale']) ?></b><br>
                                    <b class="sale">Cost: <?php echo formatPrice($item['price']) ?></b><br>
                                </div>
                                <div class="hidenitem">
                                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                                    <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </section>

                </div>