<?php 
 $username = $_POST['username'];  
$password = $_POST['password'];       
$conn=new mysqli('localhost','root','','customer_details');
if($conn->connect_error)
{
    die('Connection Failed:'.$conn->connect_error);
}
   
      
        //to prevent from mysqli injection  
       
      
        $sql = "select * from login where username = ? and password = ?;";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();  
        $result=$stmt->get_result();
        $count=$result->num_rows; 
        if($count >=1){  
            echo "<h1><center> Login successful </center></h1>"; 
            header("location:showdashboard.php");

        }  
        else{  
               
            echo "<script>alert('Invalid user or password'); window.location.href = 'login.html';</script>";


        }    
        $stmt->close();
$conn->close(); 
?> 