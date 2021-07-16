<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Basic Banking System</title>
        <link rel="stylesheet" href="css/transactionHistory_page.css">
        <!-- Bootstrap and other links -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body> 
<!-- Navbar -->
<nav class="w3-bar">
<a class="navbar-brand" href="#" style="color:white">Banking System</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" style="float:right; font-size:16px">
      <li class="nav-item active" style="padding-right:6em">
        <a class="nav-link" href="home.php" style="color: white">Home<span class="sr-only">(current)</span></a>
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

<div class="main-div">
        <h1>Transaction History</h1>
        <div class="table-wrapper">
            <div class="fl-table">
                <!-- Displaying transaction data in table form -->
                <table>
                    <thead>
                        <tr>
                            <th style="font-size: 20px">Transaction id</th>
                            <th style="font-size: 20px">Sender Account Number</th>
                            <th style="font-size: 20px">Sender Name</th>
                            <th style="font-size: 20px">Receiver Account Number</th>
                            <th style="font-size: 20px">Receiver Name</th>
                            <th style="font-size: 20px">Amount</th>                           
                        </tr>
                    </thead>
                   <tbody>
                        <?php
                         //Connect to database
                        include 'connection.php';
                        
                        //This query fetches the transaction table and then we run the query
                        $selectquery = " select * from transaction ";

                        $query = mysqli_query($con,$selectquery);

                        //Run the loop and fetch the data one by one and display it in table form
                        while($res = mysqli_fetch_array($query)) {
                            ?>

                            <tr>
                                <td class="id" style="font-size: 17px"><?php echo $res['id']; ?> </td>
                                <td style="font-size: 17px"><?php echo $res['senderaccNo']; ?> </td>
                                <td style="font-size: 17px"><?php echo $res['senderName']; ?> </td>
                                <td style="font-size: 17px"><?php echo $res['receiveraccNo']; ?> </td>
                                <td style="font-size: 17px"><?php echo $res['receiverName']; ?> </td>
                                <td style="font-size: 17px"><?php echo $res['amount']; ?> </td>
                            
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