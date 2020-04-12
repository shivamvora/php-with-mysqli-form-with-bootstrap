<?php 

// create connectionn

$conn=mysqli_connect("localhost","root","","test_db");

// Check Connection
if($conn)
{
  echo "Connected <font color='green' size='6'><b>Successfully</b></font> with SERVER <hr color='yellow'  size='10'> </hr>";
}

// Retrieve data from table
$sql="SELECT * FROM student";

      		 $result=mysqli_query($conn,$sql); // Aa function result return kare che jo kai connection and sql ma debug na hoy to

        if(mysqli_num_rows($result)>0)
          {
          while($row=mysqli_fetch_assoc($result))  // return a row
          {
            echo $row['id'] . $row['name'] . $row['roll']. $row['address']. "<br>";
          }

         }

 ?>
