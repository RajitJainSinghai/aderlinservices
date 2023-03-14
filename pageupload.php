<?php
require_once('lib/config.php');
//require_once('../lib/configin.php');
//require_once('ajax/inc2.php');
//If directory doesnot exists create it.
$output_dir = "../images/gallery/";
$thumb_w=300;
$thumb_h=200;



$galid=$_REQUEST['galid'];
function copyImage($srcFile, $destFile, $w, $h, $quality = 75)
    {
        $tmpSrc     = pathinfo(strtolower($srcFile));
        $tmpDest    = pathinfo(strtolower($destFile));
        $size       = getimagesize($srcFile);

        if ($tmpDest['extension'] == "gif" || $tmpDest['extension'] == "jpg")
        {
           $destFile  = substr_replace($destFile, 'jpg', -3);
           $dest      = imagecreatetruecolor($w, $h);
           imageantialias($dest, TRUE);
        } elseif ($tmpDest['extension'] == "png") {
           $dest = imagecreatetruecolor($w, $h);
           imagecolortransparent($dest, imagecolorallocatealpha($dest, 0, 0, 0, 127));
           imagealphablending($dest, false);
           imagesavealpha($dest, true);
           imageantialias($dest, TRUE);
        } else {
          return false;
        }

        switch($size[2])
        {
           case 1:       //GIF
               $src = imagecreatefromgif($srcFile);
               break;
           case 2:       //JPEG
               $src = imagecreatefromjpeg($srcFile);
               break;
           case 3:       //PNG
               $src = imagecreatefrompng($srcFile);
               break;
           default:
               return false;
               break;
        }

        imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);

        switch($size[2])
        {
           case 1:
           case 2:
               imagejpeg($dest,$destFile, $quality);
               break;
           case 3:
               imagepng($dest,$destFile);
        }
        return $destFile;
    }
    
if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
   {
    
    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
            $RandomNum   = time();
            
            $ext = substr(strrchr($_FILES["myfile"]['name'], "."), 1); //$extensions[$image['type']];

            // generate a random new file name to avoid name conflict
            $filename=str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i])).time();
            
            $imagePath = $filename.".$ext";

            list($width, $height, $type, $attr) = getimagesize($_FILES["myfile"]['tmp_name']); 
            
            $srcFile=$_FILES["myfile"]["tmp_name"];
            $destFile=$output_dir.$imagePath;
            $destFilethumb=$output_dir.'thumb/'.$imagePath;
            $quality=75;
            
           
            
            
            $size        = getimagesize($srcFile);
            $w           = number_format($width, 0, ',', '');
            $h           = number_format(($size[1] / $size[0]) * $width, 0, ',', '');
            
           $thumbnailname = copyImage($srcFile, $destFile, $w, $h, $quality);
           $thumbnail2 = copyImage($srcFile, $destFilethumb, $thumb_w, $thumb_h, $quality);
            
              //  move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
               // move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$NewImageName);
       	 	 //echo "<br> Error: ".$_FILES["myfile"]["error"];
       	 $filennm = basename($thumbnailname);	
                         
            $sql ="INSERT INTO page_images SET  galid='".$galid."', image='".$filennm."'";
	
	   // $retval=mysql_query($sql);
           $stmt = $conn->prepare($sql); 
     $stmt->execute();
     $arr = $stmt->fetch(PDO::FETCH_ASSOC);
    	}
    	else
    	{
            $fileCount = count($_FILES["myfile"]['name']);
    		for($i=0; $i < $fileCount; $i++)
    		{
                    
                   $RandomNum   = time();
            
            $ext = substr(strrchr($_FILES["myfile"]['name'][$i], "."), 1); //$extensions[$image['type']];

            // generate a random new file name to avoid name conflict
            $filename=str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i])).time();
            
            $imagePath = $filename.".$ext";

            list($width, $height, $type, $attr) = getimagesize($_FILES["myfile"]['tmp_name'][$i]); 
            
            $srcFile=$_FILES["myfile"]["tmp_name"][$i];
            $destFile=$output_dir.$imagePath;
            $destFilethumb=$output_dir.'thumb/'.$imagePath;
            $quality=75;
            
           
            
            
            $size        = getimagesize($srcFile);
            $w           = number_format($width, 0, ',', '');
            $h           = number_format(($size[1] / $size[0]) * $width, 0, ',', '');
            
           $thumbnailname = copyImage($srcFile[$i], $destFile, $w, $h, $quality);
           $thumbnail2 = copyImage($srcFile[$i], $destFilethumb, $thumb_w, $thumb_h, $quality);
            
              //  move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
               // move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$NewImageName);
       	 	 //echo "<br> Error: ".$_FILES["myfile"]["error"];
       	 $filennm = basename($thumbnailname);	 
  
                    
             
	    $sql ="INSERT INTO page_images SET   galid='".$galid."', image='".$filennm."'";
	
	   // $retval=mysql_query($sql);
              $stmt = $conn->prepare($sql); 
     $stmt->execute();
     $arr = $stmt->fetch(PDO::FETCH_ASSOC);
            
            
    		}
    	}
    }
    echo json_encode($ret);
 
}
