<?php

//Connects to a database and fetches a particular user data
include "connection.php";

$customer_id = $_POST['customer_id'];

$sql = "select * from customers where id='$customer_id'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
    ?>
    <p>Your id: <?php echo $row['id']; ?></p>
    <p>Account Number: <?php echo $row['account_number']; ?> </p>
    <p>Name: <?php echo $row['name']; ?></p>
    <p>Email: <?php echo $row['email']; ?></p>
    <p>Balance: <?php echo $row['balance']; ?></p>
<?php 
} 
?>