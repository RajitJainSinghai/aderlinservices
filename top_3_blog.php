<?php include('config.php');

$stmt = $conn->prepare("SELECT * FROM blog where status='p' order by serial desc limit 0,3");
        $stmt->execute();
        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <title>Irise - Staffing & Consulting Agency HTML Template</title>
        <link rel="icon" type="image/png" href="assets/images/aderlin_favicon.png">
    </head>
    <body>
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
                    <div id="cardblogss" class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <div id="cardingfortop3blog" class="single-blog-card">
                            <div class="blog-img">
                                <a href="blog-details.php?id=<?php echo $get_row['id']?>&title=<?php echo $get_row['title'];?>"><img src="images/blog/<?php echo $get_row['image_name'];?>" alt="Image"></a>
                               
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
                                <h3 style="text-align: center;height: 120px;display: flex;align-items: center;" ><a href="blog-details.php?id=<?php echo $get_row['id']?>&title=<?php echo $get_row['title'];?>"><?php echo $get_row['title'];?></a></h3>
                                <p id="latestparad"><?php echo $get_row['blog_description'];?></p>
                                <a id="echolo" href="blog-details.php?id=<?php echo $get_row['id']?>&title=<?php echo $get_row['title'];?>" class="default-btn btn for-card">Know More <i class="ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        
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

<style>
p#latestparad {
    height: 105px;
    overflow-y: hidden;
}

.row.justify-content-center {
    display: flex;
    justify-content: space-around !important;
    flex-wrap: wrap;
    width: 100%;
}

div#cardingfortop3blog {
    height: 750px;
    position: relative;
    width: 300px;
    margin: 20px 0;
}
a#echolo {
    position: absolute;
    bottom: 20px;
    left: 70px;
}
div#cardblogss {
    width: 350px !important;
}
@media screen and (max-width: 1400px) {
div#cardingfortop3blog {
    height: 700px;
    position: relative;
    width: 100%;
}

}

@media screen and (max-width: 600px) {
    .single-testimonials-card {
    padding: 15px;
    height: 250px !important;

}
.row.justify-content-center {
    margin-left: 0 !important;
}

}



   </style> 