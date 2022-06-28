<?php
require 'function.php';

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $data = $select->selectUser();
  $totaluser= $select->userCount();
  // print_r($totaluser);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Index Of User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="colum">
        <div class="col-md-5 mx-auto" style="margin-top: 100px;  ">
            <h1 style="text-align:center;">Welcome <?php echo $user["name"]; ?></h1>
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
        <div class="col-md-5 mx-auto">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">USERNAME</th>
                        <th scope="col">EMAIL</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($rows = mysqli_fetch_assoc($data)){
                ?>
                    <tr>
                        <td scope="row"><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['name'];?></td>
                        <td><?php echo $rows['username'];?></td>
                        <td><?php echo $rows['email'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td><?php echo "Total registered users : " .$totaluser." user";?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
    </div>
</body>

</html>