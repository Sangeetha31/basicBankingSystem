<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    <link rel="stylesheet" href="css/index_page.css">
    <!--Bootstrap and google fonts links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
<!--NavBar -->
<nav class="w3-bar">
<a class="navbar-brand" href="#" style="color:white">Banking System</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" style="float:right; font-size:16px">
      <li class="nav-item active" style="padding-right:6em">
        <a class="nav-link" href="index.php" style="color: white;">Home<span class="sr-only">(current)</span></a>
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

<!-- Content of the page and buttons to navigate to other pages -->
      <div class="banner">
          <div class="content">
                  <h1>Welcome to the bank</h1>
                  <p>Transfer Money Safely</p>
                  <div>
                    <!-- Goes to view_customers.php -->
                      <button type="button"><span></span><a style="color: white" href="view_customers.php">View all customers</a></button>
                    <!-- Goes to transactionHistory.php -->
                      <button type="button" ><span></span><a style="color: white" href="transactionHistory.php" >Transaction History</button>
                  </div>
          </div>
      </div>
      
</body>
</html>