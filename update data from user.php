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

if(isset($_REQUEST['update']))
{
  if(($_REQUEST['name']== "") || ($_REQUEST['roll']== "") || ($_REQUEST['address']== ""))
  {
              echo "<small style='color:red'> Fill All Fields... </small> <hr>";
  }
  else {
     $name=$_REQUEST['name'];
     $roll=$_REQUEST['roll'];
     $address=$_REQUEST['address'];
     $sql="UPDATE student SET name= '$name', roll= '$roll', address= '$address' WHERE id= {$_REQUEST['id']}";
     if(mysqli_query($conn,$sql))
     {
       echo "updated";
     }
     else {
       echo "not updated";
     }

  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>EDIT AND UPDATE DATA</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <?php
            if(isset($_REQUEST['edit']))
            {
              $sql = "SELECT * FROM student WHERE id={$_REQUEST['id']}";
              $result = mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($result);
            }
           ?>
           <form  action="index.html" method="post">
             <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value=" <?php if(isset($row["name"])) {echo $row["name"];} ?> ">
             </div>

             <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" class="form-control" name="roll" id="roll" value=" <?php if(isset($row["roll"])) {echo $row["roll"];} ?> ">
             </div>

             <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value=" <?php if(isset($row["address"])) {echo $row["address"];}  ?> ">
             </div>

             <input type="hidden" name="id" value="<?php echo $row['id']?>">

             <button type="submit" class="btn btn-success" name="update">UPDATE</button>
           </form>
        </div>
        <div class="col-sam-6 offset-sem-2">
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
                        echo "<th>ACTION</th>";
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
                      echo '<td>
                      <form action="" method="POST">
                      <input type="hidden" name="id" value='. $row["id"] .'>
                      <input type="submit" class="btn btn-sm btn-warning" name="edit" value="Edit">
                      </form>
                      </td>';
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
