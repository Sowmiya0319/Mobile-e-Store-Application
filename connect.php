<?php
$name=$_POST["name"];
$address=$_POST["address"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$ifsc=$_POST["ifsc"];
$upi=$_POST["upi"];
$payment=$_POST["payment"];

$conn=new mysqli('localhost','root','','customer_details');
if($conn->connect_error)
{
    die('Connection Failed:'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into payment(name,address,email,phone,ifsc,upi,payment)
    values(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssisss",$name,$address,$email,$phone,$ifsc,$upi,$payment);
}
$stmt->execute();
header( "Location: success.html" ); 
$stmt->close();
$conn->close();

?>