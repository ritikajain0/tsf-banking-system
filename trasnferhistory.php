<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sparks Bank - Transfer History</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="style2.css">

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

    <!--table section-->
    <?php
  
  $servername="localhost";
  $username="root";
  $password="";
  $database="transfer";

  $conn=mysqli_connect($servername, $username, $password, $database);

  if(!$conn)
  {
      //die("sorry we failed to connect : ".mysqli_connect_error());
     // echo ("<br>");
  }
  else{
      //echo("connection successfull<br>");
  }
  $sql = "SELECT * FROM `transferdetail`";
  $result = mysqli_query($conn, $sql);
  $num= mysqli_num_rows($result);
  //echo $num;
  

  //display rows return by sql

  if($num>0){
      //$row=mysqli_fetch_assoc($result);
     // echo var_dump($row);

     //we can fetch using while loop
     //while($row = mysqli_fetch_assoc($result)){
         //echo var_dump($row);
         //echo ("<br>");

         //echo $row['Sr.no'] . $row['Name'] . $row['Email id'] . $row['Account balance'];
         //echo "<br>";
     }
     $history = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  ?>
 
  
  <table>
      <thead>
          <tr >
              <th >Sr.no</th>
              <th>Sender's Name</th>
              <th>Receiver's Name</th>
              <th>Amount Transfered</th>
              <th>Date and Time</th>
</tr>
</thead>
<tbody>

<?php 
						foreach($history as $hist) {
							echo "<tr>"."<th>" .$hist['Sr.no']."</th><th>". $hist['sender']."</th><th>". $hist['receiver']."</th><th>".$hist['amount']."</th><th>".$hist['Time'] ;
						}
					?>

</tbody>
</table>









  </body>
  </html>