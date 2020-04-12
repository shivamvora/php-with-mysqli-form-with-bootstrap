<?php

$conn=mysqli_connect("localhost","root","","test_db");
if($conn)
{
  echo "Successfully connected with database...<br>";
}
else
{
    echo "Unable to Connect <br>";
}

$sql="UPDATE student SET name = 'Bharat Sheth', roll='45', address='Amin Marg' WHERE id=3";

if(mysqli_query($conn,$sql))
{
  echo "Record Upadated";
}
else {
  echo "Unable to update";
}
 ?>
