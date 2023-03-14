<?php include('config.php');

$stmt = $conn->prepare("SELECT * FROM blog where status='p' order by serial desc");
        $stmt->execute();
        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Aderlin Services offers online payroll and HR automation and outsourcing solutions. Visit our website online for more info." />
        <title>Aderlin Services</title>
        <!--Bootstrap Css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--Meanmenu Css-->
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <!--Owl carousel-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <!--Owl Theme-->
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <!--Magnific-popup-->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!--Flaticon-->
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <!--Remixicon-->
        <link rel="stylesheet" href="assets/css/remixicon.css">
        <!--Odometer-->
        <link rel="stylesheet" href="assets/css/odometer.min.css">
        <!--Aos css-->
        <link rel="stylesheet" href="assets/css/aos.css">
        <!--Style css-->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--Dark css-->
        <link rel="stylesheet" href="assets/css/dark.css">
        <!--Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
                        <link rel="icon" type="image/png" href="assets/images/aderlin_favicon.png">

     
    </head>
    <body>

        <!-- Pre Loader Start -->
        <div class="preloader clock text-center">
            <div class="organiaLoader">
                <div class="loaderO">
                <span>A</span>
                <span>D</span>
                <span>E</span>
                <span>R</span>
                <span>L</span>
                <span>I</span>
                <span>N</span>
                </div>
            </div>
        </div>
        <!-- Pre Loader End -->

        <!--Mouce Cursor-->
        <div class="mouseCursor cursor-outer"></div>
        <div class="mouseCursor cursor-inner"><span>Drag</span></div>
        <!--Mouce Cursor-->

        <!-- Start Navbar Area --> 
        
   <style>

    .start-footer-area.pt-100.pb-70 {
    margin-top: 90px;

}
[data-aos=fade-up] {
    transform: translate3d(0,1px,0) !important;
} 


    div#cardingpasage {
    margin-bottom: 20px !important;
}


a#knowmore {
    position: inherit;
  
}

@media screen and (max-width: 800px) {
    .single-blog-card {
    height: 670px;
}
}
@media screen and (max-width: 400px) {
    .single-blog-card {
         height: 400px;
}
}


a#knowmore {
    position: relative;
}
   </style>
 <?php include 'header.php';?>
        
 <div class="blog-area pt-100 pb-70" id="blogging_space">
            <div class="container">
                <div class="section-title">
                    <span>News & Blog</span>
                    <h2>Check Out Our Latest Blog Post</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim phareta lorem. Sed ut lacus aliquet, volutpat sem pellentesque, egestas nisl.</p> -->
                </div>
                
                
                <div class="row justify-content-center">
                    <?php
                $i=1;
                while($get_row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    
                ?>
                    <div id="cardingpasage" class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <div class="single-blog-card">
                            <div class="blog-img">
                                <a href="blog-details.php?id=<?php echo $get_row['id']?>&title=<?php echo $get_row['title'];?>"><img src="images/blog/<?php echo $get_row['image_name'];?>" alt="Image"></a>
                                <div class="date"> 
                                    <p><?php  if(strlen($get_row['date_given']) > 0)
                                            {
                                                    echo date("d", strtotime($get_row['date_given'])); 
                                            }
                                            else if(strlen($get_row['updated_on']) > 0 ){
                                        
                                                    echo date("d", strtotime($get_row['updated_on'])); 
                                                    
                                            }else{
                                                
                                                    echo date("d", strtotime($get_row['date_created'])); 
                                                
                                            }?></p>
                                    <span><?php if(strlen($get_row['date_given']) > 0)
                                            {
                                                    echo date("M", strtotime($get_row['date_given'])); 
                                            }
                                            else if(strlen($get_row['updated_on']) > 0 ){
                                        
                                                    echo date("M", strtotime($get_row['updated_on'])); 
                                                    
                                            }else{
                                                
                                                    echo date("M", strtotime($get_row['date_created'])); 
                                                
                                            }?></span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <ul>
                                    <li>
                                        <i class="ri-user-heart-line"></i>
                                        By <a href="#"><?php echo $get_row['author_name'];?></a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <i class="ri-price-tag-3-line"></i>-->
                                    <!--   <a href="#">Latest News</a>-->
                                    <!--</li>-->
                                </ul>
                                <h3 style="text-align: center;height: 70px;display: flex;align-items: center;"><a href="blog-details.php?id=<?php echo $get_row['id']?>&title=<?php echo $get_row['title'];?>"><?php echo $get_row['title'];?></a></h3>
                               
                                <a id="knowmore" href="blog-details.php?id=<?php echo $get_row['id']?>&title=<?php echo $get_row['title'];?>" class="default-btn btn for-card">Know More <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                </div>
                
                </div>
                </div>
                
                
               <?php include 'footer.php';?>
               <!-- Jquery js -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Bootstrap bundle js -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- Meanmenu js -->
        <script src="assets/js/jquery.meanmenu.js"></script>
        <!-- Owl Carosel js -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <!-- Aos js -->
        <script src="assets/js/aos.js"></script>
        <!-- Mixitup js -->
        <script src="assets/js/mixitup.min.js"></script>
        <!-- Odometer js -->    
        <script src="assets/js/odometer.min.js"></script>
        <!-- Appear js -->  
        <script src="assets/js/appear.min.js"></script> 
        <!-- Form Validator js -->    
        <script src="assets/js/form-validator.min.js"></script>
        <!-- Contact Form Script js -->    
        <script src="assets/js/contact-form-script.js"></script>
        <!-- Ajaxchimp js -->    
        <script src="assets/js/ajaxchimp.min.js"></script>
        <!--Custom js-->
        <script src="assets/js/custom.js"></script>
        </body>
        </html>