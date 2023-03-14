<?php include("config.php");

$Inp=$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM blog where id='$Inp'");
        $stmt->execute();
$get_row=$stmt->fetch(PDO::FETCH_ASSOC);

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
        <?php include 'header.php';?>


        <!--Start Page Header Area-->
        <div class="page-header-area bg-f4fbf6">
            <div class="container">
                <!--<div class="row align-items-center">-->
                <!--    <div class="col-lg-6 col-md-6">-->
                <!--        <div class="page-header-content">-->
                <!--            <h1>Blog Details</h1>-->
                <!--            <ul>-->
                <!--                <li><a href="index.php">Home</a></li>-->
                <!--                <li>Blog Details</li>-->
                <!--            </ul>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="col-lg-6 col-md-6">-->
                <!--        <div class="page-header-image">-->
                <!--            <img src="assets/images/banner/banner-img-3.png" alt="Image">-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="page-header-shape">-->
                <!--    <img src="assets/images/shape/shape-8.png" alt="Image">-->
                <!--    <img src="assets/images/shape/shape-9.png" alt="Image">-->
                <!--    <img src="assets/images/shape/shape-10.png" alt="Image">-->
                <!--</div>-->
            </div>
        </div>
        <!--End Page Header Area-->

        <!--Start Blog Details Area-->
        <div class="blog-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-details">
                            <div class="top-img">
                                <img src="images/blog/<?php echo($get_row['image_name']);?>" alt="<?php echo($get_row['title']);?>">
                            </div>
                            <div class="blog-details-content">
                                <div class="user-and-date">
                                    <ul>
                                        <li>
                                            <i class="ri-user-heart-line"></i>
                                            By <a href="#"><?php echo($get_row['author_name']);?></a>
                                        </li>
                                        <li>
                                            <i class="ri-calendar-check-line"></i>
                                           <?php if(strlen($get_row['date_given']) > 0)
                                            {
                                                    echo date("d-M-Y", strtotime($get_row['date_given'])); 
                                            }
                                            else if(strlen($get_row['updated_on']) > 0 ){
                                        
                                                    echo date("d-M-Y", strtotime($get_row['updated_on'])); 
                                                    
                                            }else{
                                                
                                                    echo date("d-M-Y", strtotime($get_row['date_created'])); 
                                                
                                            }?>
                                        </li>
                                    </ul>
                                </div>
                                <h3 style="text-align: center;height: 70px;display: flex;align-items: center;"><?php echo($get_row['title']);?></h3>
                                <p style=" text-align: justify; text-justify: inter-word;"><?php echo($get_row['blog_description']);?></p>
                                <!--<div class="quote">-->
                                <!--    <p><i>Objectives. That is the reason you can redo eacih son component of our to your organization, or fam items or tions, and objectives administrations.</i></p>-->
                                <!--    <span>Augustine Wunsch</span>-->
                                <!--</div>-->
                               
                               
                               
                            
                               
                               
                                <div class="related-post">
                                    <h3>Related Post</h3>
                                    <div class="row">
                                        <?php   
                                            $pop = $conn->prepare("SELECT * FROM blog where status='p' and  id!='$Inp' order by rand() desc limit 0,4 ");
                                            $pop->execute();
                                            $i=1;
                                            while($arr1=$pop->fetch(PDO::FETCH_ASSOC))
                                            {
                                                ?>                                           
                                            
                                        <div class="col-lg-3 col-sm-3" style="max-height: 700px; overflow: hidden;">
                                            <div class="single-blog-card style4">
                                                <div class="blog-img">
                                                    <a href="blog-details.php?id=<?php echo $arr1['id']?>&title=<?php echo $arr1['title'];?>"><img src="images/blog/<?php echo($arr1['image_name']);?>" alt="<?php echo($arr1['title']);?>"></a>
                                                </div>
                                                <div class="blog-content">
                                                    <ul>
                                                        <li>
                                                            <i class="ri-user-heart-line"></i>
                                                            By <a href="#"><?php echo($arr1['author_name']);?></a>
                                                        </li>
                                                        <li>
                                                            <i class="ri-calendar-check-line"></i>
                                                             <?php if(strlen($arr1['date_given']) > 0)
                                            {
                                                    echo date("d-M-Y", strtotime($arr1['date_given'])); 
                                            }
                                            else if(strlen($arr1['updated_on']) > 0 ){
                                        
                                                    echo date("d-M-Y", strtotime($arr1['updated_on'])); 
                                                    
                                            }else{
                                                
                                                    echo date("d-M-Y", strtotime($arr1['date_created'])); 
                                                
                                            }?>
                                                        </li>
                                                    </ul>
                                                    <h3 style="text-align: center;height: 70px;display: flex;align-items: center;font-size:14px;"><a href="blog-details.php?id=<?php echo $arr1['id']?>&title=<?php echo $arr1['title'];?>"><?php echo($arr1['title']);?></a></h3>
                                                    <p style="overflow-y: hidden;  max-height: 130px; text-align:justify;font-size:12px;"><?php echo($arr1['blog_description']);?></p> <br>
                                                    <a id="knowmore" href="blog-details.php?id=<?php echo $arr1['id']?>&title=<?php echo $arr1['title'];?>" class="default-btn btn for-card">Know More <i class="ri-arrow-right-line"></i></a>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php } ?>
                                 
                                    </div>
                                </div>

                     </div>
                 </div>
            </div>
                 </div>
            </div>
            
            </div>
    </div>
            
                     <!--footer  -->
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