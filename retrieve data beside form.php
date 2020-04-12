<?php

$conn=mysqli_connect("localhost","root","","test_db");
    if($conn)
    {
        echo"<center> Successfully Connected </center><hr color='red'>";
    }
    else
    {
        echo"Fail to Connect";
    }

    if(isset($_REQUEST['submit']))
    {
        //Checking for empty fields
       if(($_REQUEST['name']== "") || ($_REQUEST['roll']== "") || ($_REQUEST['address']== ""))
       {
                   echo "<small style='color:red'> Fill All Fields... </small> <hr>";
       }
       else
       {
           $name=$_REQUEST['name'];
           $roll=$_REQUEST['roll'];
           $address=$_REQUEST['address'];

            $sql=" INSERT INTO student (name,roll,address) VALUES ('$name','$roll','$address')";

            if(mysqli_query($conn,$sql))
            {
                echo "New Record inserted Successfully";
            }
            else
            {
                echo "Unable to insert data ";
            }
        }

    }
?>
        <!--now i'm going to starting table -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Shivam vora</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" >
                    </div>

                    <div class="form-group">
                        <label for="roll">Roll</label>
                        <input type="text" class="form-control" name="roll" id="roll" >
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>

                        <input type="text" class="form-control" name="address" id="address" >
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
            <div class="col-sm-6  offset-sm-1">
               <?php
                   $sql="SELECT * FROM student";
                   $result=mysqli_query($conn,$sql);
                   if(mysqli_num_rows($result)>0)
                   {
                      echo  "<table class='table'>";
                         echo "<thead>";
                           echo "<tr>";
                             echo "<th>ID</th>";
                             echo "<th>NAME</th>";
                             echo "<th>ROLL</th>";
                             echo "<th>ADDRESS</th>";
                             echo "</tr>";
                           echo "</thead>";
                         echo "<tbody>";


                         while($row=mysqli_fetch_assoc($result))
                         {
                           echo "<tr>";
                             echo "<td>" .$row["id"]. "</td>";
                             echo "<td>" .$row["name"]. "</td>";
                             echo "<td>" .$row["roll"]. "</td>";
                             echo "<td>" .$row["address"]. "</td>";
                           echo "</tr>";
                         }

                       echo "</tbody>";
                    echo "</table>";

                  }

                ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
