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

   /**
    * kiểm tra xem danh sách có sản phẩm
    */
    $is_product = $db->fetchOne("product"," catagory_id = $id ");
    if($is_product == NULL)
    {
        $num = $db->delete("catagory",$id);
        if($num > 0)
        {
           $_SESSION['success'] = "Xóa thành công";
           redirectAdmin("catagory");
        }
        else
        {
           $_SESSION['error'] = "Xóa thất bại";
           redirectAdmin("catagory");
        }
    }
    else
    {
        $_SESSION['error'] = "Không thể xóa danh mục có chứa sản phẩm";
        redirectAdmin("catagory");
    }
    
    
?>
 