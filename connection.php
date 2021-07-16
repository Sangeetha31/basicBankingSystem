<?php

//Connect to a database by giving all appropriate details
$username = "root";
$password = "";
$server = '127.0.0.1:3307';
$db = "bank";

$con = mysqli_connect($server,$username,$password,$db);

//if connection is successful
if($con){
    ?>
    <?php

}
//if connection is not successful
else{
    die("No connection".mysqli_connect_error());
}

?>