<!doctype html>
<body>
    <style>
        
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color:aquamarine;
        }
        .hide{
display: none;
}
    </style>
    <script>
function showContact(){

        document.getElementById("contact").style.display = 'block';
        document.getElementById("payment").style.display = 'none';
        document.getElementById("feedback").style.display = 'none';
}
function showPayment()
{           
        document.getElementById("payment").style.display = 'block';
        document.getElementById("contact").style.display = 'none';
        document.getElementById("feedback").style.display = 'none';
}
function showFeedback()
{
        document.getElementById("feedback").style.display = 'block';
        document.getElementById("payment").style.display = 'none';
        document.getElementById("contact").style.display = 'none';

}
        </script>

    <div>
        <h1>Admin Dashboard</h1>
        <a href="#contact" ><input type="button" value="Contact" onclick="showContact()"/></a>
        <a href="#payment"><input  type="button" value="Payment" onclick="showPayment()"/></a>
        <a href="#feedback"><input  type="button" value="Feedback" onclick="showFeedback()"/></a>

    </div>
    <div id="contact" class="hide">
        <h1>Contacts</h1>
    <?php
    
    $conn=new mysqli('localhost','root','','customer_details');

    if($conn->connect_error)
    {
        die("connection Failed".$conn->connect_error);
    }
    $sql="select * from contact;";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
    $resultcheck=mysqli_num_rows($result);
    echo '<table>';
    echo '<tr><th>Name</th><th>Email</th><th>Phone Number</th><th> Message</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["phone"] . '</td>';
        echo '<td>' . $row["message"] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    
        ?>
    </div>
   <div id="payment" class="hide">
    <h1>Payments</h1>
   <?php
    
    $conn=new mysqli('localhost','root','','customer_details');

    if($conn->connect_error)
    {
        die("connection Failed".$conn->connect_error);
    }
    $sql="select * from payment;";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
    $resultcheck=mysqli_num_rows($result);
    echo '<table>';
    echo '<tr><th>Name</th><th>Address</th><th>Email</th><th>Phone</th><th>IFSC</th><th>UPI</th><th>Payment</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["address"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["phone"] . '</td>';
        echo '<td>' . $row["ifsc"] . '</td>';
        echo '<td>' . $row["upi"] . '</td>';
        echo '<td>' . $row["payment"] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    
        ?>
   </div>
   <div id="feedback" class="hide">
    <h1>Feedback</h1>
   <?php
    
    $conn=new mysqli('localhost','root','','customer_details');

    if($conn->connect_error)
    {
        die("connection Failed".$conn->connect_error);
    }
    $sql="select * from feedback;";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
    $resultcheck=mysqli_num_rows($result);
    echo '<table>';
    echo '<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Continent</th><th>Age</th><th>Rating</th><th>Category</th><th>Budget Preference</th><th>Message</th><th>Recommendation</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["firstname"] . '</td>';
        echo '<td>' . $row["lastname"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["continent"] . '</td>';
        echo '<td>' . $row["age"] . '</td>';
        echo '<td>' . $row["rating"] . '</td>';
        echo '<td>' . $row["category"] . '</td>';
        echo '<td>' . $row["budget"] . '</td>';
        echo '<td>' . $row["message"] . '</td>';
        echo '<td>' . $row["recommendation"] . '</td>';


        echo '</tr>';
    }
    echo '</table>';
    
        ?>
   </div>
</body>
</html>