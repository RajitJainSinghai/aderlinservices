<?php 

require("PHPMailer_5.2.0/class.phpmailer.php");



/*

if(isset($_REQUEST['send_mail'])){
    
    echo "at sending mail";
    
    $name = $_REQUEST['name'];
    
    $email = $_REQUEST['email'];
    
    $phone_number = $_REQUEST['phone_number'];
    
    $msg_subject = $_REQUEST['msg_subject'];
    
    $message = $_REQUEST['message'];
    
    
$mail = new PHPMailer();
$mail = new PHPMailer();

$mail->IsSMTP();             // set mailer to use SMTP
$mail->Host = "localhost";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Port = 465; // or 587

$mail->Username = "info@aderlinservices.com";  // SMTP username
$mail->Password = "Ader%^*&^_Lin(SERVE"; // SMTP password


$mail->From = $email;
$mail->FromName = $name;

$mail->AddAddress("gunjeet.singh@intenim.com");                  // name is optional

$mail->WordWrap = 50;                                 // set word wrap to 50 characters

$mail->IsHTML(true);                              // set email format to HTML

$mail->Subject = $msg_subject;
$mail->Body    = " <a href='www.aderlinservices.com'><img src='cid:13'> </a> <br> hi, <br> Someone send you an enquiry  <br> 
                    and the mail id of that person is $email <br> Name is $name <br> Contact No is $phone_number <br>  Message he send you ($message) <br> ";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

//$mail->AddEmbeddedImage(dirname(_FILE_) . '/image_mail/Capture_1111.JPG', '13');

   
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
   
} 

    
}



*/



    $name = $_REQUEST['name'];
    
    $email = $_REQUEST['email'];
    
    $phone_number = $_REQUEST['phone_number'];
    
    $msg_subject = $_REQUEST['msg_subject'];
    
    $message = $_REQUEST['message'];


    $to = "rajat.b@aderlinservices.com";
    $subject = $msg_subject;
    $txt ="Name = ". $name . "\r\n  Email = " . $email ."\r\n  Phone = " . $phone_number . "\r\n Message =" . $message;
    
    $headers = "From: $email" . "\r\n" .
        "CC: info@aderlinservices.com";


if($email!=NULL){
    mail($to,$subject,$txt,$headers);
    //echo "mail sent sucessfully";
    
    $msg = "mail sent sucessfully";
    
}



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

        <!-- End Navbar Area -->

        <!--Start Page Header Area-->
        <div class="page-header-area bg-f4fbf6">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="page-header-content">
                            <h1>Contact Us</h1>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Contact</li>
                            </ul>
                            <?php 
                                
                                if(isset($msg)){
                            ?>        
                                    
                                <p> <?php echo $msg; ?> </p>        
                                 
                                    
                            <?php        
                                
                                }
                                
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="page-header-image">
                            <img src="./assets/images/banner/contact_us.webp" alt="Image">
                        </div>
                    </div>
                </div>

                <div class="page-header-shape">
                    <img src="assets/images/shape/shape-8.png" alt="Image">
                    <img src="assets/images/shape/shape-9.png" alt="Image">
                    <img src="assets/images/shape/shape-10.png" alt="Image">
                </div>
            </div>
        </div>
        <!--End Page Header Area-->

        <!--Start Contact Area-->
        <div class="contact-area pt-100 pb-70">
            <div id="makingtheboxcenter" class="container">
                <div class="row" id="makingoncenter">
                    <div class="col-lg-3 col-sm-6" id="model_card">
                        <div class="single-contact-card">
                            <div class="icon">
                                <i class="flaticon-placeholder"></i>
                            </div>
                            <h3>Address:</h3>
                            <span>1st floor, Landmark Cyber park, Sector 67, Gurugram, Haryana 122018</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6" id="model_card">
                        <div class="single-contact-card">
                            <div class="icon">
                                <i class="flaticon-mail"></i>
                            </div>
                            <h3>Email Address:</h3>
                            <a href="mailto:info@aderlinservices.com">Info@aderlinservices.com</a>
                            <!-- <a href="mailto:irisesupport@gmail.com">irisesupport@gmail.com</a> -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6" id="model_card">
                        <div class="single-contact-card">
                            <div class="icon">
                                <i class="flaticon-phone-call-1"></i>
                            </div>
                            <h3>Phone Number:</h3>
                            <a href="tel:+56987298257809">+91 9953797039</a>
                            <!-- <a href="tel:+94298725989234">+94 2987 2598 9234</a> -->
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-sm-6">
                        <div class="single-contact-card">
                            <div class="icon">
                                <i class="flaticon-desktop"></i>
                            </div>
                            <h3>Fax:</h3>
                            <a href="tel:+85863546987">+8-586-3546987</a>
                            <a href="tel:+35732874259">+3-573-2874259</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!--End Contact Area-->

        <!--Start Contact Form Area-->
        <div class="contact-form-area pb-100">
            <div class="container">
                <div class="section-title">
                    <!-- <span>Get In Touch</span> -->
                    <h2>Get In Touch</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacus, dignissim phareta lorem. Sed ut lacus aliquet, volutpat sem pellentesque, egestas nisl.</p> -->
                </div>
                <div class="contacts-form">
                    <!--<form id="contactForm" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>" > -->
                        
                        <form  method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>" >
                    
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name *" id="name" class="form-control" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
            
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="Email*" class="form-control" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
            
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="phone_number" id="phone_number" placeholder="Number*" required data-error="Please enter your number" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
            
                            <div class="col-lg-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="msg_subject" id="msg_subject" class="form-control" placeholder="Subject*" required data-error="Please enter your subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
            
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Message*" id="message" cols="30" rows="6" required data-error="Write your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                        

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" name = "send_mail" class="default-btn active">
                                    <span>Send Message</span>
                                    <i class="ri-arrow-right-line"></i>
                                </button>
                                <!--<div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End Contact Form Area-->

        <!--Start map Area-->
        <div class="map-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3509.9398691102097!2d77.05756051507716!3d28.39088408251378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjjCsDIzJzI3LjIiTiA3N8KwMDMnMzUuMSJF!5e0!3m2!1sen!2sin!4v1675836490411!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!--End map Area-->

        <!--Start Footer Area-->
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