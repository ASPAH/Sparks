<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Bank of Sparks</title>
    <style>
		h2{
			font: Bold;
			font-family: 'Times New Roman', Times, serif;
			Color: White;
			text-align: center;
			background-color: #212529;
			padding: 1%;
			margin: 1px;
      border: 1px;
      border: white;
		}
    body{
      background-color: #212529;
    }
    footer 
    {
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            color: #ffff;
        }
	</style>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">Bank of Sparks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Trasactions</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item active" href="Customerlist.php">Transfer Money</a></li>
                  <li><a class="dropdown-item" href="transactionhistory.php">Transaction History</a></li>
              </ul>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
          </ul>
        </div>
      </div>
   </nav>   
<h2>Customer Details</h2>

<table class="table table-dark table-striped table-bordered border-white">
  <tr>
    <td>Sr no.</td>
    <td>Name</td>
    <td>Email</td>
    <td>Balance</td>
    <td>Transfer Money</td>
  </tr>

<?php

include "config.php"; // Using database connection file here

$records = mysqli_query($con,"SELECT * FROM `customer_list`.`customer data`") or die( mysqli_error($con));// fetch data from database


while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>  
    <td><?php echo $data['Name']; ?></td>
    <td><?php echo $data['Email']; ?></td>
    <td><?php echo $data['Balance']; ?></td>
    <td><a href="selecteduser.php?id= <?php echo $data['id'] ;?>"><button onclick="document.location='selecteduser.php'">Transfer Funds</button></a></td>
  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($con); // Close connection ?>

<footer>
  <br>
  Contact
  <br>
  email - bos@gmail.com
  <br>
  Phone - 022 - 05050505
  <br>
  &#169;Bank of Sparks
</footer>
</body>
</html>