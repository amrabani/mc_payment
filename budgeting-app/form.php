<?php
include "proses.php";
  $username = 'root';
  $password = '';
    
  $con=mysqli_connect("localhost",$username,$password,"budgeting_db");

  // Check connection
  if (mysqli_connect_errno())
  {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $query = "SELECT SUM( IF( TYPE = 'K', balance, -balance ) ) AS saldoTotal FROM budgetings";

  $result = mysqli_query($con,$query);

    $rows = mysqli_fetch_assoc($result);
  mysqli_close($con)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budgeting</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<form action="proses.php" method="POST" onsubmit="window.location.reload()">
    <div class="row">
      <p>Submit your Balance</p>
      <div>
          <input type="text" name="balance" id="balance" placeholder="balance" />
      </div>
      <div>
        <select name="type" id="type">
           <option value="-">Type</option>
            <option value="K">Kredit</option>
            <option value="D">Debit</option>
        </select>
      </div>
      <div>
          <input type="text" name="description" id="description" placeholder="description" />
      </div>
      <br />
      <button type="submit" id="submit" nama="submit">Submit</button>

      <div>
          <h2>Balance : Rp <?php echo $rows['saldoTotal'].",00"; ?></h2> 
          <b>History :</b>
          <br />

          <?php
          $username = 'root';
          $password = '';
            
          $con=mysqli_connect("localhost",$username,$password,"budgeting_db");
        
          // Check connection
          if (mysqli_connect_errno())
          {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          $sql = "SELECT * FROM budgetings";
          if($result = mysqli_query($con, $sql)){
              if(mysqli_num_rows($result) > 0){
                  echo "<table width=100%>";
                  echo "<tr>";
                  echo "<th></th>";
                  echo "<th></th>";
              echo "</tr>";
                  while($row = mysqli_fetch_array($result)){
                      echo "<tr>";
                      if($row['type'] == 'K'){
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td> + " .  $row['balance']  . "</td>";
                      }else{
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td> - " .  $row['balance']  . "</td>";
                      }
                          
                          
                      echo "</tr>";
                  }
                  echo "</table>";
                  // Free result set
                  mysqli_free_result($result);
              } else{
                  echo "No records matching your query were found.";
              }
          } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
          }
          
          // Close connection
          mysqli_close($con);
          ?>
      </div>
    </div>
</form>

</body>
</html>