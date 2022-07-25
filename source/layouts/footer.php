
 <hr>
                <div class="container">
                    <div class="col-md-4">
                        <a href=""><img src="<?php echo base_url() ?>public/frontend/images/free-shipping.png"></a>
                    </div>
                    <div class="col-md-4">
                        <a href=""><img src="<?php echo base_url() ?>public/frontend/images/guaranteed.png"></a>
                    </div>
                    <div class="col-md-4">
                        <a href=""><img src="<?php echo base_url() ?>public/frontend/images/deal.png"></a>
                    </div>
                </div>
                <hr>
                <div class="social">
                    <ul>
                        <li><a href="https://www.facebook.com/profile.php?id=100007812466933" target="_blank"><span></span></a></li>
                        <li><a href="#"><span></span></a></li>
                        <li><a href="#"><span></span></a></li>
                        <li><a href="#"><span></span></a></li>
                        <li><a href="#"><span></span></a></li>
                    </ul>
               
                </div>
                <div class="container-pluid">
                <section id="footer-button">
                    <div class="container-pluid">
                        <div class="container">
                            <div class="col-md-3" id="ft-about">
                                
                                <p><b>Maxshop</b> specializes in providing model products Manga - Anime, Game models</p>
                            </div>
                            <div class="col-md-3 box-footer" >
                                <h3 class="tittle-footer">Category</h3>
                                <ul>
                                    <?php foreach($catagory as $item) :?>
                                        <li><i class="fa fa-angle-double-right"></i><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?> </a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col-md-3 box-footer">
                                <h3 class="tittle-footer">Links</h3>
                               <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Introduce</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Contact </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i>  Shopping Guide </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> About Us ...</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3" id="footer-support">
                                <h3 class="tittle-footer"> Contact Us</h3>
                                <ul>
                                    <li>
                                        
                                        <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> 590 Cách Mạng Tháng Tám, Quận 3 (Sau siêu thị điện máy Chợ Lớn) </p>
                                        <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 0359313750 </p>
                                        <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> email support: hieuzxc00@gmail.com </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ft-bottom">
                    <p class="text-center">Copyright © 2019 . Design by  Group 5 - T1.1808.M1 !!! </p>
                </section>
            </div>
        </div>      
    </div>
            </div>      
        </div>
    <script  src="<?php echo base_url() ?>frontend/js/slick.min.js"></script>

    </body>
        
</html>

<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })

    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e){
            e.preventDefault();
            $qty = $(this).parents("tr").find(".qty").val();
            console.log($qty);
            $key = $(this).attr("data-key");
            $.ajax({
                url: 'cap-nhat-gio-hang.php',
                type: 'GET',
                data: {'qty':$qty,'key':$key},
                success:function(data)
                {
                    if(data != 1)
                    {
                        alert("Cập nhật giỏ hàng thành công");
                        location.href='gio-hang.php';
                    }
                }
            });
        })
    })
</script>