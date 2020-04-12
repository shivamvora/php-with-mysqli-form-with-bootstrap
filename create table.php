<?php

$conn=mysqli_connect("localhost","root","","new_db");
if($conn)
{
  echo "Successfully connected <br> <hr>";
}
else
{
  echo "Not connect";
}

  $sql="CREATE TABLE new_tab (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255),
       roll INT,
       address TEXT
       )";

  if(mysqli_query($conn,$sql))
  {
    echo "Created table";
  }
  else {
     echo "Not Create";
  }


 ?>
