<?php
   $open = "catagory";

   require_once __DIR__. "/../../autoload/autoload.php";

   $id = intval(getInput('id'));
   
   $Editproduct = $db->fetchID("transaction",$id);
   if(empty($Editproduct))
   {
      $_SESSION['error'] = "Dữ liệu không tồn tại";
      redirectAdmin("transaction");
   }
    
    $num = $db->delete("transaction",$id);
    if($num > 0)
    {
       $_SESSION['success'] = "Xóa thành công";
      redirectAdmin("transaction");
    }
    else
    {
       $_SESSION['error'] = "Xóa thất bại";
      redirectAdmin("transaction");
    }
?>