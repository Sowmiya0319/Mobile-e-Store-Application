<?php
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];

$conn=new mysqli('localhost','root','','customer_details');
if($conn->connect_error)
{
    die("connection Failed".$conn->connect_error);
}
else{
   
    $stmt=$conn->prepare("insert into contact (name,email,phone,message) values(?,?,?,?)");
   $stmt->bind_param("ssis",$name,$email,$phone,$message);
}
$stmt->execute();

 header ( "Location: contactus.html" );
$stmt->close();
$conn->close();
?>