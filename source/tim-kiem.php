<?php 
	require_once __DIR__. "/autoload/autoload.php"; 

		
?>


<?php require_once __DIR__. "/layouts/header2.php"; ?>
	<div class="col-md-10 col-md-offset-1">
		<br>
		
		<?php 
			if(isset($_GET['search']))
			{
				$key = $_GET['search'];
			}
			else
			{
				$key = '';
			}
			$sql = "SELECT * FROM product WHERE name LIKE '%$key%'";
			$ProductHome = $db->fetchsql($sql);
		 ?>
		 <h4 style="font-style: italic; margin: 20px"> Có <span class="h4" id="soluong"></span> Kết quả với từ khóa tìm kiếm "<?php echo $key ?>" </h4>
	                <?php $soluong = 0; foreach ($ProductHome as $item): ?>    
               <div class="col-md-2  item-product">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                       <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="220">
                   </a>
                   <div class="info-item">
                       <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                       <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                   </div>
                   <div class="hidenitem">
                       <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                       <p><a href=""><i class="fa fa-heart"></i></a></p>
                       <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                   </div>
               </div>
               <?php $soluong++; endforeach ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	</div>
	<script type="text/javascript">
        document.getElementById("soluong").innerHTML = "<?php echo $soluong?>";
    </script>
<?php require_once __DIR__. "/layouts/footer.php"; ?>