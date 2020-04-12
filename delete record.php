<?php

  $conn=mysqli_connect("localhost","root","","test_db");
  if($conn)
  {
    echo "Successfully connected with database <br>";
  }
  else
  {
    echo "Unable to Connect <br>";
  }

  //sql delete Record

    $sql="DELETE FROM student WHERE id=9";

    if(mysqli_query($conn,$sql))
    {
      echo "Record deleted";
    }
    else
    {
       echo "Unable to delete";
    }

 ?>
