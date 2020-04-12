<?php
    $conn=mysqli_connect("localhost","root","","test_db");
    if($conn)
    {
        echo"Successfully Connected";
    }
    else
    {
        echo"Fail to Connect";
    }

    // insert data in table using sql

    $sql="INSERT INTO student (name,roll,address) VALUES('Dehil','42','Rajkot')";
    
    if(mysqli_query($conn,$sql))
    {
        echo "New Record inserted";
    }
    else
     {
         echo "Unable to insert data into table ";
     }
    
?>