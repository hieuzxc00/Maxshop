<?php
   $open = "product";

   require_once __DIR__. "/../../autoload/autoload.php";
   /*
   danh sách sản phẩm
    */
  $catagory = $db->fetchAll("catagory");

  $data =
       [
          "name" => postInput('name'),
          "slug" => to_slug(postInput("name")),
          "catagory_id" => postInput("catagory_id"),
          "price" => postInput("price"),
          "number" => postInput("number"),
          "content" => postInput("content"),
          "thunbar" => postInput("thunbar"),
          "intro" => postInput("intro")
       ];
   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {
       
       


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
          $error['price'] = "Vui lòng nhập giá sản phẩm ";
       }
       elseif (postInput('price') <= 0) {
          $error['price'] = "Giá sản phẩm không hợp lệ";
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
       elseif (postInput('number') <= 0) {
          $error['number'] = "Số lượng không hợp lệ";
       }


       if(! isset($_FILES['thunbar']))
       {
          $error['thunbar'] = "Vui lòng chọn hình ảnh";
       }

      // error trống có nghĩa là không có lỗi
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

            $id_insert = $db->insert("product",$data);
            if($id_insert)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("product");
            }
            else
            {
                $_SESSION['error'] = "Thêm mới thất bại";
                
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
                              <select  class="form-control col-sm-8" name="catagory_id" >
                                <option value="">Chọn danh mục sản phẩm</option>
                                <?php foreach ($catagory as $item) :?>
                                  <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                <?php endforeach ?>
                              </select>
                             <?php if(isset($error['catagory_id'])): ?>
                                <p class="text-danger"> <?php echo $error['catagory_id'] ?> </p>   
                             <?php endif  ?>  
                            </div> 
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Tên sản phẩm</label>
                             <div class="col-sm-6">
                             <input type="text" class="form-control" id="inputEmail3"  placeholder="Tên sản phẩm" name="name" value="<?php echo $data['name'] ?>">
                             <?php if(isset($error['name'])): ?>
                                <p class="text-danger"> <?php echo $error['name'] ?> </p>   
                             <?php endif  ?>  
                            </div> 
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Giá sản phẩm</label>
                             <div class="col-sm-6">
                             <input type="number" class="form-control" id="inputEmail3"  placeholder="$" name="price" value="<?php echo $data['price'] ?>">
                             <?php if(isset($error['price'])): ?>
                                <p class="text-danger"> <?php echo $error['price'] ?> </p>   
                             <?php endif  ?>  
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Số lượng</label>
                             <div class="col-sm-6">
                             <input type="number" class="form-control" id="inputEmail3"  placeholder="100" name="number" value="<?php echo $data['number'] ?>">
                             <?php if(isset($error['number'])): ?>
                                <p class="text-danger"> <?php echo $error['number'] ?> </p>   
                             <?php endif  ?>  
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Giảm giá</label>
                             <div class="col-sm-6">
                             <input type="number" class="form-control" id="inputEmail3"  placeholder="10%" name="sale" value="0">
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Hình Ảnh</label>
                             <div class="col-sm-6">
                             <input type="file" class="form-control" id="inputEmail3" name="thunbar">
                             <?php if(isset($error['thunbar'])): ?>
                                <p class="text-danger"> <?php echo $error['thunbar'] ?> </p>   
                             <?php endif  ?> 
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Mô tả</label>
                             <div class="col-sm-6">
                             <textarea class="form-control" name="content" rows="8" placeholder="" id="ten"></textarea>
                             <script>CKEDITOR.replace('ten');</script>
                             <?php if(isset($error['content'])): ?>
                                <p class="text-danger"> <?php echo $error['content'] ?> </p>   
                             <?php endif  ?> 
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Giới thiệu</label>
                             <div class="col-sm-6">
                             <textarea class="form-control" name="intro" rows="8" placeholder="" id="ten2"></textarea>
                             <script>CKEDITOR.replace('ten2');</script>
                             <?php if(isset($error['intro'])): ?>
                                <p class="text-danger"> <?php echo $error['intro'] ?> </p>   
                             <?php endif  ?> 
                             </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
            </div>
        </div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>     