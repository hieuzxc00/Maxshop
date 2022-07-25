<?php
   $open = "catagory";

   require_once __DIR__. "/../../autoload/autoload.php";

   /*
   danh sách sản phẩm
    */
   $id = intval(getInput('id'));
    
    $Editproduct = $db->fetchID("product",$id);
    if(empty($Editproduct)){
       $_SESSION['error'] = "Dữ liệu không tồn tại";
       redirectAdmin("product");
    }

  $catagory = $db->fetchAll("catagory");

   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {
       
       $data =
       [
          "name" => postInput('name'),
          "slug" => to_slug(postInput("name")),
          "catagory_id" => postInput("catagory_id"),
          "price" => postInput("price"),
          "number" => postInput("number"),
          "content" => postInput("content"),
          "intro" => postInput("intro"),
          "sale" => postInput("sale")
       ];


       $error = [];

       if(postInput('name') == '')
       {
          $error['name'] = "Vui lòng nhập tên sản phẩm";
       }

       if(postInput('catagory_id') == '')
       {
          $error['catagory_id'] = "Vui lòng chọn tên danh mục";
       }

       if(postInput('price') == '')
       {
          $error['price'] = "Vui lòng nhập giá sản phẩm";
       }

       if(postInput('content') == '')
       {
          $error['content'] = "Vui lòng nhập mô tả sản phẩm";
       }

       if(postInput('intro') == '')
       {
          $error['intro'] = "Vui lòng nhập nội dung giới thiệu";
       }

       if(postInput('number') == '')
       {
          $error['number'] = "Vui lòng nhập số lượng sản phẩm";
       }



       if (empty($error)) 
       {
           if( isset($_FILES['thunbar']['name']))
           {
              $file_name = $_FILES['thunbar']['name'];
              $file_tmp = $_FILES['thunbar']['tmp_name'];
              $file_type = $_FILES['thunbar']['type'];
              $file_erro = $_FILES['thunbar']['error'];

              if($file_erro == 0)
              {
                  $part = ROOT."product/";
                  $data['thunbar'] = $file_name;
              }
            }
            $update = $db->update("product",$data,array("id"=>$id));
            if($update > 0)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = "Cập nhật thành công";
                redirectAdmin("product");
            }
            else
            {
                $_SESSION['error'] = "Cập nhật thất bại";
                redirectAdmin("product");
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
                <a href="index.php">Sản phẩm</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
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
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Danh mục sản phẩm</label>
                             <div class="col-sm-6">
                              <select class="form-control col-sm-8" name="catagory_id">
                                <option value="">Chọn danh mục sản phẩm</option>
                                <?php foreach ($catagory as $item) :?>
                                  <option value="<?php echo $item['id'] ?>"<?php echo $Editproduct['catagory_id'] == $item['id']? "selected = 'selected'" : '' ?>><?php echo $item['name'] ?></option>
                                <?php endforeach ?>
                              </select>
                             <?php if(isset($error['catagory'])): ?>
                                <p class="text-danger"> <?php echo $error['catagory'] ?> </p>   
                             <?php endif  ?>  
                            </div> 
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Tên sản phẩm</label>
                             <div class="col-sm-6">
                             <input type="text" class="form-control" id="inputEmail3"  placeholder="Tên sản phẩm" name="name" value="<?php echo $Editproduct['name'] ?>">
                             <?php if(isset($error['name'])): ?>
                                <p class="text-danger"> <?php echo $error['name'] ?> </p>   
                             <?php endif  ?>  
                            </div> 
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Giá sản phẩm</label>
                             <div class="col-sm-6">
                             <input type="number" class="form-control" id="inputEmail3"  placeholder="$" name="price" value="<?php echo $Editproduct['price'] ?>">
                             <?php if(isset($error['price'])): ?>
                                <p class="text-danger"> <?php echo $error['price'] ?> </p>   
                             <?php endif  ?>  
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Số lượng</label>
                             <div class="col-sm-6">
                             <input type="number" class="form-control" id="inputEmail3"  placeholder="100" name="number" value="<?php echo $Editproduct['number'] ?>">
                             <?php if(isset($error['number'])): ?>
                                <p class="text-danger"> <?php echo $error['number'] ?> </p>   
                             <?php endif  ?>  
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Giảm giá</label>
                             <div class="col-sm-6">
                             <input type="number" class="form-control" id="inputEmail3"  placeholder="10%" name="sale" value="<?php echo $Editproduct['sale'] ?>">
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Hình Ảnh</label>
                             <div class="col-sm-6">
                             <input type="file" class="form-control" id="inputEmail3" name="thunbar" value="<?php echo $Editproduct['thunbar'] ?>">
                             <?php if(isset($error['thunbar'])): ?>
                                <p class="text-danger"> <?php echo $error['thunbar'] ?> </p>   
                             <?php endif  ?> 
                             <img src="<?php echo uploads() ?>product/<?php echo $Editproduct['thunbar'] ?>" width="80px" height="80px">
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Mô tả</label>
                             <div class="col-sm-6">
                             <textarea class="form-control" name="content" rows="8" placeholder="" id="ten"><?php echo $Editproduct['content'] ?></textarea>
                             <script>CKEDITOR.replace('ten');</script>
                             <?php if(isset($error['content'])): ?>
                                <p class="text-danger"> <?php echo $error['content'] ?> </p>   
                             <?php endif  ?> 
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Giới thiệu</label>
                             <div class="col-sm-6">
                             <textarea class="form-control" name="intro" rows="8" placeholder="" id="ten2"><?php echo $Editproduct['intro'] ?></textarea>
                             <script>CKEDITOR.replace('ten2');</script>
                             <?php if(isset($error['intro'])): ?>
                                <p class="text-danger"> <?php echo $error['intro'] ?> </p>   
                             <?php endif  ?> 
                             </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
            </div>
        </div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>     