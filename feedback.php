<?php
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$continent=$_POST["continent"];
$age=$_POST["age"];
$rating=$_POST["rating"];
$rating = filter_var($rating, FILTER_SANITIZE_NUMBER_INT);
$category=$_POST["category"];
$budget = $_POST["budget"];
$budget1=implode(",",$budget);
$message=$_POST["message"];
$recommendation=$_POST["recommendation"];
$recommendation = filter_var($recommendation, FILTER_SANITIZE_NUMBER_INT);
$conn=new mysqli('localhost','root','','customer_details');
if($conn->connect_error)
{
    die('Connection Failed:'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into feedback(firstname,lastname,email,continent,age,rating,category,budget,message,recommendation)
    values(?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssisssi",$firstname,$lastname,$email,$continent,$age,$rating,$category,$budget1,$message,$recommendation);
}
$stmt->execute();
header( "Location: thankyou.html" ); 
$stmt->close();
$conn->close();
?>