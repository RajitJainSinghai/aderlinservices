<?php
session_start();
error_reporting(0);
include('config.php');
require_once("phpclasses/base_class.php");
require_once('phpclasses/contact_class.php');
$obj = new bt_contact();
$ref = $_REQUEST['ref'];


if (!isset($_REQUEST['ref'])) {

    $get_lastid = $conn->prepare("select * from blog order by id desc");
    $get_lastid->execute();
    $last_id = $get_lastid->fetch(PDO::FETCH_ASSOC);
    $last_id['id'];
    $insertid = $last_id['id'] + 1;
}



if (isset($_REQUEST['savedata']) && $_REQUEST['savedata'] == 'savedata' && isset($_REQUEST['ref'])) {

    $title=$_POST['title'];
    $date_created=$_POST['date_created'];
    $blog_description=$_POST['blog_description'];
    $author_name=$_POST['author_name'];
    $updated_on=$_POST['updated_on'];
    $status = $_POST['status']; 
    $date_given =$_POST['date_given'];


    if ($_POST['status'] != "") {
        $status = $_POST['status'];
    } else {
        $status = "u";
    }

    $status = "p";

    $query = "UPDATE `blog` SET      title='$title',
                                              blog_description='$blog_description',
                                              author_name='$author_name',
                                              status ='$status',
                                              updated_on =now(),
                                              date_given = '$date_given'
                                              ";


if(isset($_FILES["image_name"])){

    $filename = $_FILES["image_name"]["name"];
    $image_name = $filename;
    $filetype = $_FILES["image_name"]["type"];
    $filesize = $_FILES["image_name"]["size"];
    $imagepresent  = strlen($image_name);

if($imagepresent <= 0){
         }else{
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
                 if($ext == "jpeg" || $ext == "jpg" ||  $ext == "gif" || $ext == "png" || $ext == "webp"){
                            if(file_exists("images/blog/".$_FILES["image_name"]["name"])){
                                $FileERR = "file is already exit";
                            }else{
                                move_uploaded_file($_FILES["image_name"]["tmp_name"], "images/blog/".$_FILES["image_name"]["name"]);
                                $resume = $filename;
                            } 
                            
                            
                           $query = $query ." , image_name='$image_name'" ; 
                         
                         
                     }else{
                         
                            $FileERR = "Please upload correct file format ";
            
                    }
}
}




$query .= "WHERE id = '" . $ref . "'";



$stmt = $conn->prepare($query);
$stmt->execute();

if ($stin) {
    if (isset($_REQUEST['saveonly'])) {

        $lnk = "blog_upload_list.php";
        header("Location:" . $lnk . "");
        
        
    }
}
}




if (isset($_REQUEST['savedata']) && $_REQUEST['savedata'] == 'savedata' && !isset($_REQUEST['ref'])) {

    $title=$_POST['title'];
    $date_created=$_POST['date_created'];
    $blog_description=$_POST['blog_description'];
    $author_name=$_POST['author_name'];
    $updated_on=$_POST['updated_on'];
    $status = $_POST['status']; 
    $date_given = $_POST['date_given'];


    
    $get_lastserial_value = $conn->prepare("select * from blog order by serial desc " );
    $get_lastserial_value->execute();
    $get_lastserial_value = $get_lastserial_value->fetch(PDO::FETCH_ASSOC);
    $get_lastserial_value['serial'];
    $last_serial_value = $get_lastserial_value['serial'];
     
 $last_serial_value = $last_serial_value + 1; 

    if ($_POST['status'] != "") {
        $status = $_POST['status'];
    } else {
        $status = "u";
    }


    $status = "p";


    if(isset($_FILES["image_name"])){

        $filename = $_FILES["image_name"]["name"];
        $image_name = $filename;
        $filetype = $_FILES["image_name"]["type"];
        $filesize = $_FILES["image_name"]["size"];
        $imagepresent  = strlen($image_name);
    
    if($imagepresent <= 0){
             }else{
               $ext = pathinfo($filename, PATHINFO_EXTENSION);
                     if($ext == "jpeg" || $ext == "jpg" ||  $ext == "gif" || $ext == "png" || $ext == "webp"){
                                if(file_exists("images/blog/".$_FILES["image_name"]["name"])){
                                    $FileERR = "file is already exit";
                                }else{
                                    move_uploaded_file($_FILES["image_name"]["tmp_name"], "images/blog/".$_FILES["image_name"]["name"]);
                                    $resume = $filename;
                                } 
                                
                                
                               $query = $query ." , image_name='$image_name'" ; 
                             
                             
                         }else{
                             
                                $FileERR = "Please upload correct file format ";
                
                        }
    }
    }
    if($filename=="")
    {
        $filename="default_image_blog.gif";
    }

$insert_query =" insert into blog (title, image_name, date_created, blog_description, author_name, status, serial,date_given) values ('$title','$filename',now(),'$blog_description', '$author_name','$status','$last_serial_value','$date_given');";



$insert_query_run = $conn->prepare($insert_query);
$insert_query_run->execute();


if ($stin) {

    if (isset($_REQUEST['saveonly'])) {
    
      
      
        $location = "blog_upload_list.php";
    
        echo " <script> 

                window.location.href = '$location';
    
                </script>
            ";
 
      
        
    } else {
        
        $get_lastid = $conn->prepare("select * from blog order by id desc");
        $get_lastid->execute();
        $last_id = $get_lastid->fetch(PDO::FETCH_ASSOC);
        $last_id['id'];

        $insertid = $last_id['id'];
      
       
    
         
        $location = "blog_upload.php?ref=" . $insertid;
    
        echo " <script> 

                window.location.href = '$location';
    
                </script>
            ";
 
      
    
        
        
    }
}

}

$stmt = $conn->prepare("SELECT * FROM blog where id='" . $ref . "'");
$stmt->execute();
$arr = $stmt->fetch(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Upload</title>
                <link rel="icon" type="image/png" href="assets/images/aderlin_favicon.png">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

        <link href="uploader/css/uploadfilemulti.css" rel="stylesheet">
        <script src="uploader/js/jquery-1.8.0.min.js"></script>
        <script src="uploader/js/jquery.fileuploadmulti.min.js"></script>
        
        
        <style>
        .content-wrapper{margin-left:0px;}
            .model-space{position:relative;left:30px;}
            .col-md-3-1{position: relative;
    
    min-height: 1px;
    /* display: inline-block; */
    margin-right: 59px;
    padding-left: 70px;
    float: left;}
    .form-control1 {
    display: block;
    width: 128%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    /*border-radius: 4px;*/
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}


    .display-other-images{
        
        padding:10px;
        display: inline-block;
        
    }

        </style>
        
        
        
<?php

if (!isset($_REQUEST['ref'])) {

    $gal_id = $insertid;

} else {
    
$gal_id = $_REQUEST['ref'];

}

?>
        <script>
            function delete_img_details(id, type) // fetching states 
            {
                // alert(id);


                $.ajax({
                    url: "ajax/deletepageimagedetails.php?id=" + id + "&type=" + type,

                    success: function (data) {
                        //alert(data);
                        $('#' + type).html(data);
                        $('#delete_item').show();
                        setTimeout(function () {
                            $("#delete_item").hide('blind', {}, 500)
                        }, 5000);
                        $('tr#' + id).hide(1000);
                    },

                    context: document.body
                }).done(function ()

                {

                });
            }



            function save_img_detailsz(id, imgserial, title, alttext, type) // fetching states 
            {
                //alert(id);
                // var title=document.getElementById('savedtitle').value;
                //alert(title);

                //var alttext=document.getElementById('savedalttext').value;
                //alert(alttext);

                // var imgserial=document.getElementById('savedimgserial').value;
                //alert(imgserial);

                $.ajax({
                    url: "ajax/savepageimagedetails.php?id=" + id + "&type=" + type + "&title=" + title + "&alttext=" + alttext + "&imgserialz=" + imgserial,

                    success: function (data) {
                        //alert(data);
                        $('#' + type).html(data);
                        setTimeout(function () {
                            $("#savedimgdetails").hide('blind', {}, 500)
                        }, 5000);
                    },

                    context: document.body
                }).done(function ()

                {

                });
            }
            function get_images(id, type) // fetching states 
            {
                //alert('hello');
                //alert(state);
                //alert(type);
                //id=$(elm).val();

                //if(id){ // modified by vikrant 22/jan/14
                //	document.getElementById("bedroom").disabled = id == 'commercial';
                //}

                $.ajax({
                    url: "ajax/page_images.php?id=" + id + "&type=" + type,

                    success: function (data) {
                        //alert(data);
                        $('#' + type).html(data);
                        $('#delete_item').show();
                        setTimeout(function () {
                            $("#delete_item").hide('blind', {}, 500)
                        }, 5000);
                        $('table#dataTable1 tr#' + id).hide(1000);
                    },

                    context: document.body
                }).done(function ()
                {

                });
            }
            function set_featured(galid, id, type) // fetching states 
            {
                //alert(id);
                // var title=document.getElementById('savedtitle').value;
                //alert(title);

                //var alttext=document.getElementById('savedalttext').value;
                //alert(alttext);

                // var imgserial=document.getElementById('savedimgserial').value;
                //alert(imgserial);

                $.ajax({
                    url: "ajax/doctorsetfeatured.php?galid=" + galid + "&type=" + type + "&id=" + id,

                    success: function (data) {
                        //alert(data);
                        $('#' + type).html(data);
                        setTimeout(function () {
                            $("#savedimgdetails").hide('blind', {}, 500)
                        }, 5000);
                    },

                    context: document.body
                }).done(function ()

                {

                });
            }

            /*
             $(document).ready(function()
             {
             
             var settings = {
             url: "galleryupload.php",
             method: "POST",
             allowedTypes:"jpg,png,gif,doc,pdf,zip",
             fileFull Name: "myfile",
             multiple: true,
             onSuccess:function(files,data,xhr)
             {
             $('#upload').attr("disabled", false);
             $("#status").html("<font color='green'>Upload is success</font>");
             
             },
             afterUploadAll:function()
             {
             $('#upload').attr("disabled", false);
             //alert("all images uploaded!!");
             get_images('<?php echo $_REQUEST['id']; ?>','gallery_images');
             },
             onError: function(files,status,errMsg)
             {		
             $("#status").html("<font color='red'>Upload is Failed</font>");
             }
             }
             $("#mulitplefileuploader").uploadFile(settings);
             
             });*/

            $(document).ready(function ()
            {

                var settings = {
                    url: "pageupload.php?galid=<?php echo $gal_id; ?>",
                    method: "POST",
                    allowedTypes: "jpg,png,gif,doc,pdf,zip",
                    fileFullName: "myfile",
                    multiple: true,
                    onSuccess: function (files, data, xhr)
                    {
                        $('#upload').attr("disabled", false);
                        $("#status").html("<font color='green'>Upload is success</font>");

                    },
                    afterUploadAll: function ()
                    {
                        $('#upload').attr("disabled", false);
                        //alert("all images uploaded!!");
                        get_images('<?php echo $gal_id; ?>', 'service_images');
                    },
                    onError: function (files, status, errMsg)
                    {
                        $("#status").html("<font color='red'>Upload is Failed</font>");
                    }
                }
                $("#mulitplefileuploader").uploadFile(settings);

            });
        </script>

        <script>
            function getsome() {
                document.getElementById("preview").style.display = "block";
                var URL = window.URL || window.webkitURL;

                var input = document.querySelector('#image');
                var preview = document.querySelector('#preview');

                // When the file input changes, create a object URL around the file.
                input.addEventListener('change', function () {
                    preview.src = URL.createObjectURL(this.files[0]);
                });

                // When the image loads, release object URL
                preview.addEventListener('load', function () {
                    URL.revokeObjectURL(this.src);

                    //alert('jQuery code here. W: ' + this.width + ', H: ' + this.height);
                });
            }

            function getsome2() {
                document.getElementById("preview2").style.display = "block";
                var URL = window.URL || window.webkitURL;

                var input = document.querySelector('#image2');
                var preview = document.querySelector('#preview2');

                // When the file input changes, create a object URL around the file.
                input.addEventListener('change', function () {
                    preview.src = URL.createObjectURL(this.files[0]);
                });

                // When the image loads, release object URL
                preview.addEventListener('load', function () {
                    URL.revokeObjectURL(this.src);

                    //alert('jQuery code here. W: ' + this.width + ', H: ' + this.height);
                });
            }

        </script> 
        
		<style>
.cke_contents{
height:500px !important;
}
</style>
   
</head>
<body>
    <?php include('assets/startup.php');?>
<body class="hold-transition skin-blue sidebar-mini"  onload="get_images(<?php echo $_REQUEST['ref']; ?>, 'service_images');">

<div class="wrapper">





<form id="form" enctype="multipart/form-data" name="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
    <div class="content-wrapper">

        <section class="content-header">
            <h1 >
                <span style="font-size: 15px;"><a href="blog_upload_list.php"> Home </a> > <a href="blog_upload_list.php">Blog Upload</a>  > Edit </span>
            </h1>

            <ol class="breadcrumb">
                <li> 
                    <button style="margin-left:20px;margin-right: 30px;margin-top:-10px;" class="btn btn-info btn-icon" name="Back" id="back" type="button" title="Back" onclick="location.href = 'blog_upload_list.php'" ><i class="fa fa-reply"></i></button>  
                    <button style="margin-left:20px;margin-right: 30px;margin-top:-10px;" class="btn btn-info btn-icon" name="saveonly" id="saveonly" type="button" title='save'  ><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </li>
            </ol> 
        </section>

        <!-- Main content -->
        
        <section class="content">
          
                <span id='psave' style='display:none'></span>         
                <input type="hidden" name="savedata" value="savedata" >
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-12">

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#pagedata" data-toggle="tab">Page Data</a></li>
                                <!-- <li><a href="#image" data-toggle="tab">Upload Images</a></li> -->
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="pagedata">

                                    <!-- Post -->
                                    <div class="row" style="margin-left: 70px"><br/> 
                                        
                                    
                                
                                    
                                  
                                        
                                
                                    <div class="form-group clearfix">
                                            
                                            
                                            <label class="col-md-2 control-label">Blog Title</label>
                                            <div class="col-md-3">
                                                <input type="text" name="title"  class="form-control" value="<?php echo $arr['title']; ?>"> 
                                            </div>

                                  
                                            <label class="col-md-2 control-label">Author Name</label>
                                            <div class="col-md-3">
                                                <input type="text" name="author_name"  class="form-control" value="<?php echo $arr['author_name']; ?>"> 
                                            </div>
                            
                                           
                                    </div>
                                    <br/>
                                  
                                  <div class="form-group clearfix">
                                        <label class="col-md-2 control-label " >Date</label>
                                        
                                        <div class="col-md-3">
                                          <input type="date" class="form-control" name="date_given"  value="<?php echo $arr['date_given']; ?>">
                                        </div>
                                        <div class= "col-md-2 control-label">
                                            <p>Default Date: <?php if($arr['date_given'] !=null){  echo date("d-M-Y",strtotime($arr['date_given']));  } else{ echo date("d-M-Y",strtotime("now")); } ?></p>
                                        </div>   
                                    </div>
                                  
                                  
                                    <br/>
                                    <div class="form-group clearfix">
                                        <label class="col-md-2 control-label " >Blog Image</label>
                                        <div class="col-md-3">
                                            <input class="form-control" name="image_name" id="parallax"   type="file">
                                        </div>
                                        <div class= "display-other-images">
                                            <img id="blah" <?php if($arr['image_name'] !=null){ ?> src="images/blog/<?php echo $arr['image_name']; ?>"<?php } else{ ?>src="images/blog/default_image_blog.gif"<?php } ?>alt="" width="260px;" />
                                        </div>   
                                    </div>
                                    <br/>
                                    <div class="form-group clearfix">

                                        <label class="col-md-2 control-label ">Description</label>
                                        <div class="col-md-3">
                                            <textarea  name="blog_description" rows="6" cols="60"><?php echo $arr['blog_description']; ?></textarea>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-md-2 control-label " for="Speciality">Status</label>
                                        <div class="col-md-3">
                                            <select  name="status"  class="form-control"  >
                                                <option value="">Select Status</option>
                                                <option value="p"<?php if($arr['status']=="p"){ echo 'selected';}?>>Active</option>
                                                <option value="u" <?php if($arr['status']=="u"){ echo 'selected';}?>>In Active</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                               
                                        
                                
                                       
                                
                                            
                                
                                
                                       
                                
                                
                                    
                                       

                                    </div>
                                    <!-- /.post -->
                                </div>
                               

                                
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div> 
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            
        </section>
        <!-- /.content -->
    </div>
</form>
    <!-- /.content-wrapper -->
<?php include('include/footer.php'); ?>

   
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<link href="uploader/css/uploadfilemulti.css" rel="stylesheet">

<script src="uploader/js/jquery.fileuploadmulti.min.js"></script>






<!--<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>!-->
<!-- Bootstrap 3.3.6 -->

<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script>

 

                    


    
    
    
    
                                                    function readURL(input) {

                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();

                                                            reader.onload = function (e) {
                                                                $('#blah').attr('src', e.target.result);
                                                            }

                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }

                                                    $("#parallax").change(function () {
                                                        readURL(this);
                                                    });</script>
<script src="dist/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
                                                    $(function () {
                                                        // Replace the <textarea id="editor1"> with a CKEditor
                                                        // instance, using default configuration.
                                                        CKEDITOR.replace('editor');
                                                        //bootstrap WYSIHTML5 - text editor
                                                        $(".textarea").wysihtml5();
                                                    });
</script>
<script type="text/javascript">

    $('#saveonly').click(function ()
    {
        document.getElementById("psave").innerHTML = '<input type="text" name="saveonly" value="saveonly">';
        $('#form').submit();
    });

</script>
  <script type="text/javascript">

    $('#save').click(function ()
    {
        document.getElementById("psave").innerHTML = '<input type="text" name="save" value="save">';
        $('#form').submit();
    
        
    });

</script>

</body>
</html>