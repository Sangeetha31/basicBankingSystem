<!DOCTYPE html>
<html lang="en">
<head>
        <title>Basic Banking System</title>
        <link rel="stylesheet" type="text/css" href="css/viewCustomer_page.css">
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
        <h1>List of customers</h1>
        <div class="table-wrapper">
            <div class="fl-table">
            <!-- Displaying customer's data in table form -->
                <table>
                    <thead>
                        <tr>
                            <th style="font-size: 20px">Customer id</th>
                            <th style="font-size: 20px">Account Number</th>
                            <th style="font-size: 20px">Name</th>
                            <th style="font-size: 20px">Email</th>
                            <th style="font-size: 20px">Balance</th>
                            <th style="font-size: 20px" >View</th>
                            <th style="font-size: 20px">Transfer</th>                          
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      //Connects to a database
                       include 'connection.php';
                      
                       //This query fetches the customer table and then we run the query
                       $selectquery = " select * from customers ";

                       $query = mysqli_query($con,$selectquery);
                      
                       //Run the loop, fetch the data one by one and display it in table form
                       while($res = mysqli_fetch_array($query)) {
                            ?>

                            <tr>
                                <td class="id" style="font-size: 17px"><?php echo $res['id']; ?> </td>
                                <td class="id" style="font-size: 17px"><?php echo $res['account_number']; ?> </td>
                                <td style="font-size: 17px"><?php echo $res['name']; ?> </td>
                                <td style="font-size: 17px"><?php echo $res['email']; ?> </td>
                                <td style="font-size: 17px"><?php echo $res['balance']; ?> </td>
                                <td style="font-size: 17px"><button data-id='<?php echo $res['id']; ?>'class="userinfo btn btn-success">View</button></td>
                                <! -- The modal is used to display a particular user's data as dialog box when clicked on the button -->
                                    <div class="modal fade" id="viewModal" role="dialog">
                                       <div class="modal-dialog">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Details:</h4>
                                                </div>
                                              <div class="modal-body">
                                              </div>
                                               <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>                
                                         </div>
                                      </div>
                                  <!-- Navigates to the Transfer money page with customer id -->
                                 <td style="font-size: 17px"><button type="button"><span></span><a href="transfer_money.php?id=<?php echo $res['id'];?>">Transfer Money</a></button></td>
                              </tr>    
                      <?php
                        }

                         ?>

                    </tbody>
               </table>
            </div>
        </div>
      </div>

<!-- Fetching the particular user data with the help of ajax function and displaying it in modal view -->
<script type='text/javascript'>
    $(document).ready(function(){
         $('.userinfo').click(function(){
             var customer_id=$(this).data('id');
             $.ajax({
                 url: 'ajaxfile.php',
                 type: 'post',
                 data: {customer_id: customer_id},
                 success: function(response){
                     $('.modal-body').html(response);
                     $('#viewModal').modal('show');
                 }
             })
         });
    });
</script>
</body>
</html>