<?php 
    require_once __DIR__. "/autoload/autoload.php";
    if(!isset($_SESSION['name_id']))
    {
        echo"<script>alert('Bạn phải đăng nhập để thực hiện chức năng này');location.href='index.php'</script>";
    }

    $id = intval(getInput('id'));
    
    //lấy chi tiết sản phẩm
    $product = $db->fetchID("product",$id);

    //Nếu tồn tại giỏ hàng thì cập nhật giỏ hàng
    //
    //ngược lai thi  tạo mới
    if(!isset($_SESSION['cart'][$id]))
    {
    	//tạo mới giỏ hàng
    	$_SESSION['cart'][$id]['name'] = $product['name'];
    	$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
    	$_SESSION['cart'][$id]['qty'] = 1;
    	$_SESSION['cart'][$id]['price'] = ((100 - $product['sale']) * $product['price']) / 100 ;
    }
    else
    {
    	//cập nhật giỏ hàng   	
    	$_SESSION['cart'][$id]['qty'] += 1;
    }
    echo"<script>alert('Thêm sản phẩm thành công');location.href='gio-hang.php'</script>";
 ?>