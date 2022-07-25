<?php
   $open = "catagory";

   require_once __DIR__. "/../../autoload/autoload.php";

   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {
       
       $data =
       [
          "name" => postInput('name'),
          "slug" => to_slug(postInput("name"))
       ];

       $error = [];

       if(postInput('name') == '')
       {
          $error['name'] = "Vui lòng nhập tên danh mục";
       }


       if (empty($error)) 
       {
           $isset = $db->fetchOne("catagory","name = '".$data['name']."' ");
           if(count($isset)>0)
           {
               $_SESSION['error'] = "Tên Danh Mục đã tồn tại !";
           }
           else
           {
              $id_insert = $db->insert("catagory",$data);
              if($id_insert > 0)
              {
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("catagory");
              }
              else
              {
                //thêm thất bại
                $_SESSION['error'] = "Thêm mới thất bại";
              }
           }
        }
    }    
    
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="index.php">Danh sách</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
        <div class="clearfix"></div>
        <?php if (isset($_SESSION['error'])) :?>
            <div class="alert alert-danger">
               <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
            </div> 
        <?php endif ; ?>  
        <!-- DataTables Example -->
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="" method="POST">
                        <div class="form-group">
                             <label for="exampleInputEmail1">Thêm mới danh mục</label>
                             <input type="text" class="form-control" id="inputEmail3"  placeholder="Tên danh mục" name="name">
                             <?php if(isset($error['name'])): ?>
                                <p class="text-danger"> <?php echo $error['name'] ?> </p>   
                             <?php endif  ?>  
                             
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
            </div>
        </div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>     