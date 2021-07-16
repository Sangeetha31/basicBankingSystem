<?php
include 'connection.php';
//sender's id
$id = $_GET['id'];

//This query fetches the account number, name and balance of sender using their id
$senderquery = " select account_number,name,balance from customers where id='$id' ";
$query2 = mysqli_query($con,$senderquery);
$res2 = mysqli_fetch_array($query2);
$sender_accNo = $res2['account_number'];
$sender_name=$res2['name'];
$sender_amount = $res2['balance'];

//Fetching all customers data(receivers name) and displaying it in drop down list except the sender's name
$fetchquery = "SELECT * FROM customers where id!='$id'";             
$query_run = mysqli_query($con,$fetchquery);

if(isset($_POST['submit'])){

        //Fetches the receiver name and amount from the form
        $receiver_name = $_POST['receiver'];
        $amount = $_POST['amount'];
         
        //This query fetches the account number and balance of receiver using their name
        $recievequery = " select account_number,balance from customers where name='$receiver_name' ";
        $query = mysqli_query($con,$recievequery);
        $res = mysqli_fetch_array($query);
        $receiver_accNo=$res['account_number'];
        $receiver_amount=$res['balance'];

      
        //Checking if the sender has sufficient balance to transfer money
        if((int)$amount > $sender_amount){
                ?>
                <script>
                    alert("You have insufficient balance");
            </script>
            <?php
            }
            else{
                
                //Add the amount to receiver balance
                $receiver_amount = $receiver_amount + (int)$amount;
                //Subtract the amount from sender's balance
                $sender_amount = $sender_amount - (int)$amount;
                //Update sender's and receiver's data with new balance
                $update_rece_query="UPDATE customers SET balance='$receiver_amount' WHERE account_number='$receiver_accNo'";
                $update_send_query="UPDATE customers SET balance='$sender_amount' WHERE account_number='$sender_accNo'";
                $run_query=mysqli_query($con,$update_rece_query);
                $run_query2=mysqli_query($con,$update_send_query);
                $amount_transfer = (int)$amount;
                
                //insert the transaction data to transaction table
                $INSERT = "INSERT INTO transaction(senderaccNo,senderName,receiveraccNo,receiverName,amount) VALUES('$sender_accNo','$sender_name','$receiver_accNo','$receiver_name','$amount_transfer')";

                $check=mysqli_query($con,$INSERT);

                if($check){
                    ?>
                    <script>
                        alert("Transaction successful");
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("Transaction failed");
                    </script>
                    <?php

                }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Bootstrap and font awesome links -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link  rel="stylesheet" href="css/transferMoney_page.css" type="text/css">
</head>

<body>
      <!-- Navbar -->
      <nav class="w3-bar">
        <a class="navbar-brand" href="#" style="color:white">Banking System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="float:right; font-size:16px">
            <li class="nav-item active" style="padding-right:6em">
                <a class="nav-link" href="index.php" style="color: white">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" style="padding-right:6em">
                <a class="nav-link" href="view_customers.php" style="color:white">View all customers</a>
            </li>
            <li class="nav-item" style="padding-right:6em">
                <a class="nav-link" href="transactionHistory.php" style="color:white">Transaction History</a>
            </li>
        </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Transfer money</h1>
        <div class="row">
             <?php
              //Connect to a database and fetch particular customer data
                include 'connection.php';
               
                $selectquery = " select * from customers where id='$id' ";
                
                $query = mysqli_query($con,$selectquery);
                $check_customer = mysqli_num_rows($query) > 0;

                if($check_customer){
                       while($row = mysqli_fetch_array($query))
                       {           
                           ?>

                        <!-- Display the particular customer data in a card view -->
                         <div class="col">
                           <div class="card">
                             <div class="card-body">
                                <p class="card-title">Sender's details</p>
                                <img src="css/images/avatar.png">    
                                <h5 id="name" name="name" class="card-title"><?php echo $row['name']; ?></h4>
                                <h6 class="card-subtitle mb-2 text-muted">ID: <?php echo $row['id']; ?></h6>
                                <h6 class="card-text">Account number: <?php echo $row['account_number']; ?></h6>
                                <p class="card-text">Email id: <?php echo $row['email']; ?></p>
                                <p class="card-text">Balance: <?php echo $row['balance']; ?></p>
                            </div>
                          </div>    
                           <?php                          
                       }
                    }
                else{
                    echo "No customer found";
                }
                ?>
            </div>
        </div>
        <div class="form">
            <!-- Form for taking receiver's name and amount to transfer as input -->
            <form method="POST">
            <h2>Transfer Amount to</h2>
            <select name="receiver" id="receiver">
            <option>Select Receiver...</option>
            <?php
                while($row=mysqli_fetch_array($query_run)){
                    $name=$row["name"];
                    echo "<option>$name</option>";             
            }           
            ?>
            </select>
             <input type="text" id="amount" name="amount" placeholder="Amount">   
             <input type="submit" id="submit" name="submit" text="Submit" value="submit">
     
           </form>
        </div>
    </div>
    <!-- Displaying the transaction details of particular customer -->       
    <div class="main-div">
        <h1>Your Transaction details</h1>
        <div class="table-wrapper">
            <div class="fl-table">
                <table>
                    <thead>
                        <tr>
                            <th style="font-size: 20px">Transaction ID</th>
                            <th style="font-size: 20px">Receiver Account Number</th>
                            <th style="font-size: 20px">Receiver Name</th>
                            <th style="font-size: 20px">Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include 'connection.php';

                        $transactionquery = "select * from transaction where senderaccNo='$sender_accNo' ";

                        $run_query = mysqli_query($con,$transactionquery);

                        while($row = mysqli_fetch_array($run_query))
                        {

                             ?>
                            <tr>
                                <td class="id" style="font-size: 17px"><?php echo $row['id']; ?> </td>
                                <td style="font-size: 17px"><?php echo $row['receiveraccNo']; ?> </td>
                                <td style="font-size: 17px"><?php echo $row['receiverName']; ?> </td>
                                <td style="font-size: 17px"><?php echo $row['amount']; ?> </td>   
                            </tr> 
                          <?php
                    }

            ?>
        </tbody>
     </table>
    </div>
  </div>
</div>

</body>
</html>   