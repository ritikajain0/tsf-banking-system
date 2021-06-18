<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="style2.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<header>
    <navbar>
    <div class="logo">
    <a href="index.php"><img src="./images/bank.png" alt="logo"></a>
    </div>
    <div class="name"><h2>The Sparks Bank</h3></div>

    <div class="links">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="userdetails.php">View Customers</a></li>
    <li><a href="trasnferhistory.php">Transaction History</a></li>
    <li><a href="#">About us</a></li>
    </ul>
    </div>
    </navbar>
    </header>
    <?php
       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sender = $_POST['sender'];
        $receiver = $_POST['receiver'];
        $amount = $_POST['amount'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "transfer";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `transferdetail` ( `sender`, `receiver`, `amount`, `Time`) VALUES ('$sender', '$receiver', '$amount', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        

 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "userdetails";
      
      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
        $sql= "UPDATE `userdetail` SET `Account balance` = `Account balance`+'$amount' WHERE `userdetail`.`Name` = '$receiver'";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
          echo "update succesfully";
        }
        else{
          echo "not updated";
        }

      }   
      

    }

       
    ?>
<div class="container mt-3">
<h1>Secure and Fast Money Transfer !!</h1>
    <form action="/phpt/transfer.php" method="post">
    <div class="form-group">
        <label for="sender">Select Your Username</label>
        <input type="text" name="sender" class="form-control" id="sender" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
        <label for="receiver">Select User to Send Money</label>
        <input type="text" name="receiver" class="form-control" id="receiver" aria-describedby="emailHelp"> 
        
    </div>

    <div class="form-group">
        <label for="amount">Amount To Be Transfered</label>
        <input type="integer" class="form-control" name="amount" id="amount"> 
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="btns" style="width:330px; padding:10px; padding-bottom:30px; height:60px;"><a href="trasnferhistory.php" style="text-decoration:none; color:white;">Check Transfer History</a></div>

</body>
</html>