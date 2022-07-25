<?php 

	$open = "catagory";
    
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $id = intval(getInput('id'));

	$EditCatagory = $db->fetchID("catagory",$id);

    if(empty($EditCatagory))
    {
       $_SESSION['error'] = "Dữ liệu không tồn tại";
       redirectAdmin("catagory");
    }

    $home = $EditCatagory['home'] == 0 ? 1 : 0;


    $update = $db->update("catagory", array("home" => $home), array("id" => $id));
    if($update > 0)
   {
     $_SESSION['success'] = "Cập nhật thành công";
     redirectAdmin("catagory");
   }
   else
   {
     //thêm thất bại
     $_SESSION['error'] = "Dữ liệu không thay đổi";
     redirectAdmin("catagory");
   }
 ?>