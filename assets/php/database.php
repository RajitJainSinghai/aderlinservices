<?php include('../../config.php');


$name = $_POST["name"];
$email = $_POST["email"];
$msg_subject = $_POST["msg_subject"];
$phone_number = $_POST["phone_number"];
$message = $_POST["message"];


$insert_query=("INSERT INTO enquiry_data(name,contact_no,subject,email,message) VALUES('$name','$phone_number','$msg_subject','$email','$message')");
$insert_query_run = $conn->prepare($insert_query);
$insert_query_run->execute(); 



?>