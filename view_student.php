<?php

session_start();
error_reporting(0);

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype']=="student"){
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM user WHERE usertype='student'";

$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon">

    <style type = "text/css">

        .table_th{
            padding: 20px;
            font-size: 20px;
            background-color: skyblue;
        }

        .table_td{
            padding: 20px;
            font-size: 16px;
            
        }
    </style>
    
    <?php 
    
    include 'admin_css.php';

    ?>

</head>
<body>
    
    <?php 
    
    include 'admin_sidebar.php';
    
    ?>

    <div class="content">

        <center>
            <h1>Student Data</h1>
            <br>

            <?php 
            
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }

            unset($_SESSION['message']);
            
            ?>
            <table border = "1px">
                <tr>
                    <th class="table_th">UserName</th>
                    <th class="table_th">Email</th>
                    <th class="table_th">Phone</th>
                    <th class="table_th">Password</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>

                <?php 
                    while ($info = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='table_td'>{$info['username']}</td>";
                        echo "<td class='table_td'>{$info['email']}</td>";
                        echo "<td class='table_td'>{$info['phone']}</td>";
                        echo "<td class='table_td'>{$info['password']}</td>";
                        echo "<td class='table_td'><a class='btn btn-danger' onclick=\"javascript:return confirm('Are you sure to Delete this');\" href='delete.php?student_id={$info['id']}'> Delete</a></td>";
                        echo "<td class='table_td'><a class='btn btn-success' href='update_student.php?student_id={$info['id']}'> Update</a></td>";
                        echo "</tr>";
                    }
                    ?>
            </table>

        </center>
        
    </div>

</body>
</html>