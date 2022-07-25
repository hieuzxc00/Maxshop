<?php
   $open = "admin";

   require_once __DIR__. "/../../autoload/autoload.php";

   /*
   danh sách sản phẩm
    */
   
       $data =
       [
          "name" => postInput('name'),
          "email" => postInput("email"),
          "phone" => postInput("phone"),
          "password" => MD5(postInput("password")),
          "address" => postInput("address"),
          "level" => postInput("level")
       ];

   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {
       

       $error = [];

       if(postInput('name') == '')
       {
          $error['name'] = "Vui lòng nhập Họ-Tên";
       }

       if(postInput('email') == '')
       {
          $error['email'] = "Vui lòng nhập địa chỉ Email";
       }
       else
       {
          $is_check = $db->fetchOne("admin", "email = '".$data['email']."' ");
          if($is_check != NULL)
          {
             $error['email'] = "Email đã tồn tại";
          }
       }

       if(postInput('phone') == '')
       {
          $error['phone'] = "Vui lòng nhập số điện thoại";
       }

       if(postInput('password') == '')
       {
          $error['password'] = "Vui lòng nhập mật khẩu của bạn";
       }

       if(postInput('address') == '')
       {
          $error['address'] = "Vui lòng nhập địa chỉ";
       }

       if($data['password'] != MD5(postInput("re_password")))
       {
        $error['password'] = "Mật khẩu không khớp";
       }


      // error trống có nghĩa là không có lỗi
       if (empty($error)) 
       {

            $id_insert = $db->insert("admin",$data);
            if($id_insert)
            {
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("admin");
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
                <a href="index.php">Admin</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới Admin</li>
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
                             <label for="inputEmail3" class="col-sm-5 control-label">Họ và Tên</label>
                             <div class="col-sm-6">
                             <input type="text" class="form-control" id="inputEmail3"  placeholder="Nhập Họ-Tên" name="name" value="<?php echo $data['name'] ?>">
                             <?php if(isset($error['name'])): ?>
                                <p class="text-danger"> <?php echo $error['name'] ?> </p>   
                             <?php endif  ?>  
                            </div> 
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Email</label>
                             <div class="col-sm-6">
                             <input type="email" class="form-control" id="inputEmail3" placeholder="Nhập Email" name="email" value="<?php echo $data['email'] ?>">
                             <?php if(isset($error['email'])): ?>
                                <p class="text-danger"> <?php echo $error['email'] ?> </p>   
                             <?php endif  ?>  
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Phone</label>
                             <div class="col-sm-6">
                             <input type="number" class="form-control" id="inputEmail3" placeholder="Số điện thoại" name="phone" value="<?php echo $data['phone'] ?>">
                             <?php if(isset($error['phone'])): ?>
                                <p class="text-danger"> <?php echo $error['phone'] ?> </p>   
                             <?php endif  ?>  
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Password</label>
                             <div class="col-sm-6">
                             <input type="password" class="form-control" id="inputEmail3" placeholder="**********" name="password">
                             <?php if(isset($error['password'])): ?>
                                <p class="text-danger"> <?php echo $error['password'] ?> </p>   
                             <?php endif  ?>  
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">ConfigPassword</label>
                             <div class="col-sm-6">
                             <input type="password" class="form-control" id="inputEmail3" placeholder="**********" name="re_password" required="">
                             <?php if(isset($error['re_password'])): ?>
                                <p class="text-danger"> <?php echo $error['re_password'] ?> </p>   
                             <?php endif  ?>  
                             </div>
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Địa chỉ</label>
                             <div class="col-sm-6">
                             <input type="text" class="form-control" id="inputEmail3"  placeholder="Nhập địa chỉ" name="address" value="<?php echo $data['address'] ?>">
                             <?php if(isset($error['address'])): ?>
                                <p class="text-danger"> <?php echo $error['address'] ?> </p>   
                             <?php endif  ?>  
                            </div> 
                        </div>

                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-5 control-label">Level</label>
                             <div class="col-sm-6">
                             <select class="form-control" name="level">
                               <option value="1" <?php echo isset($data['level']) && $data['level'] == 1 ? "selected = 'selected'" : '' ?>>Admin</option>
                               <option value="2" <?php echo isset($data['level']) && $data['level'] == 2 ? "selected = 'selected'" : '' ?>>CTV</option>
                             </select>
                             <?php if(isset($error['level'])): ?>
                                <p class="text-danger"> <?php echo $error['level'] ?> </p>   
                             <?php endif  ?>  
                            </div> 
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
            </div>
        </div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>     