<?php

        $conn=mysqli_connect("localhost","root","","");
        if($conn)
        {
          echo "Successfully connected <br>";
        }
        else
        {
          echo "Not connect";
        }

          $sql = "CREATE DATABASE new_db";
          if(mysqli_query($conn,$sql))
          {
            echo "Database Created Successfully <br>";
          }
          else
          {
            echo "Unable to Create Database";
          }


 ?>
