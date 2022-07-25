<?php 
   session_start();
   require_once __DIR__. "/../libraries/Database.php";
   require_once __DIR__. "/../libraries/Function.php";

   $db = new Database;

   define("ROOT", $_SERVER['DOCUMENT_ROOT']."/projectphp/public/uploads/");


   $catagory = $db->fetchAll("catagory");

   /**
    * lấy danh sách sản phẩm mới
    */
   $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 6";
   $productNew = $db->fetchsql($sqlNew);

   $sqlPay = "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 3";
   $productPay = $db->fetchsql($sqlPay);
 ?>