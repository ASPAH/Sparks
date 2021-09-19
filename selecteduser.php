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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
      <div class="container-fluid">
        <a class="navbar-brand" href="Home.html">Bank of Sparks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Home.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Customerlist.php">Transact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<?php
include "config.php";
$data; 
if(isset($_GET['id'])){
$id = $_GET['id'];
}
$q="SELECT * FROM `customer_list`.`customer data` WHERE id='$id'";
$result=mysqli_query($con,$q);
$row_count=mysqli_num_rows($result);
$_SESSION['id']=$id;
?>

<?php  
				$data=mysqli_fetch_array($result)
			?>
<h2>Current User Details</h2>		
<table class="table table-dark table-striped table-bordered border-white">
	<tr>
	  <th style="text-align: left;">Sr no.</th>
	  <td style="text-align: center;"><?php echo $data['id']; ?></td>  
	</tr>
	<tr>
	  <th style="text-align: left;">Name</th> 
	  <td style="text-align: center;"><?php echo $data['Name']; ?></td>
	</tr>	
	<tr>
	  <th style="text-align: left;">Email</th>  
	  <td style="text-align: center;"><?php echo $data['Email']; ?></td>
	</tr>	  
	<tr>
	  <th style="text-align: left;">Balance</th>
	  <td style="text-align: center;"><?php echo $data['Balance']; ?></td>
	</tr>
</table>
<form method="post" name="tcredit" class="tabletext" >
        <br><br><br>
        <label style="color : white;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose account</option>
            <?php
                include 'config.php';
                $id=$_GET['id'];
                $q1 = "SELECT * FROM `customer_list`.`customer data`";
                $result=mysqli_query($con,$q1);
                if(!$result)
                {
                    echo "Error ".$q1."<br>".mysqli_error($con);
                }
                while($data = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $data['id'];?>" >
                
                    <?php echo $data['Name'] ;?> (Balance: 
                    <?php echo $data['Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : white;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button name="submit" type="submit" id="myBtn" >Transfer Money</button>
            </div>
        </form>
<?php
include 'config.php';
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
 
    $sql = "SELECT * FROM `customer_list`.`customer data` where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.
 
    $sql = "SELECT * FROM `customer_list`.`customer data` where id=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);
 
 
 
    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }
 
 
  
    // constraint to check insufficient balance.
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    
 
 
    // constraint to check zero values
    else if($amount == 0){
 
         echo '<script type="text/javascript">';
         echo 'alert("Zero value cannot be transferred")';
         echo '</script>';
     }
 
 
    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE `customer_list`.`customer data` set Balance=$newbalance where id=$from";
                mysqli_query($con,$sql);
             
 
                // adding amount to reciever's account
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE `customer_list`.`customer data` set Balance=$newbalance where id=$to";
                mysqli_query($con,$sql);
                
				       $date = date('Y-m-d H:i:s');
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = " INSERT INTO `customer_list`.`transaction_history`(`sender`, `receiver`, `amount transferred`,`datetime`) VALUES ('$sender','$receiver','$amount','$date')";
                $query=mysqli_query($con,$sql);
 
                if($query){
                     echo '<script> alert("Transaction was Successful");
                                     window.location="transactionhistory.php";
                           </script>';
                    
                }
 
                $newbalance= 0;
                $amount =0;
        }
    
}
?>
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