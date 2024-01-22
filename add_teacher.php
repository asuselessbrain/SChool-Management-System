<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_teacher'])) {
    $name = mysqli_real_escape_string($data, $_POST['name']);
    $description = mysqli_real_escape_string($data, $_POST['description']);
    $file = $_FILES['image']['name'];

    $dst = "./image/" . $file;

    $dst_db = "./image/" . $file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    $sql = "INSERT INTO teacher (name, description, image) VALUES ('$name', '$description', '$dst_db')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        header('location:add_teacher.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon">
    
    <?php include 'admin_css.php'; ?>

    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
    
    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
            <h1>Add Teacher</h1>
            <br>

            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">

                    <div>
                        <label>Name:</label>
                        <input type="text" name="name">
                    </div>

                    <div>
                        <label>Description:</label>
                        <textarea name="description"></textarea>
                    </div>

                    <div>
                        <label>Image:</label>
                        <input type="file" name="image">
                    </div>

                    <div>
                        <input type="submit" class="btn btn-success" name="add_teacher" value="Add Teacher">
                    </div>

                </form>
            </div>
        </center>
    </div>

</body>
</html>