<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = mysqli_real_escape_string($data, $_GET['student_id']);

$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($data, $_POST['name']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $phone = mysqli_real_escape_string($data, $_POST['phone']);
    $password = mysqli_real_escape_string($data, $_POST['password']);

    $query = "UPDATE user SET username='$name', email='$email', phone='$phone', password='$password' WHERE id='$id'";
    $result2 = mysqli_query($data, $query);

    if ($result2) {
        header("location: view_student.php");
        exit();
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

    <?php include 'admin_css.php'; ?>

</head>
<body>

    <?php include 'admin_sidebar.php'; ?>

    <div class="content">

        <center>

            <h1>Update Student Data</h1>
            <br>

            <div class="div_deg">

                <form action="#" method="POST">

                    <div>
                        <label>Username:</label>
                        <input type="text" name="name" placeholder="Username" value="<?php echo htmlspecialchars($info['username']); ?>">
                    </div>

                    <div>
                        <label>Email:</label>
                        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($info['email']); ?>">
                    </div>

                    <div>
                        <label>Phone:</label>
                        <input type="text" name="phone" placeholder="Phone Number" value="<?php echo htmlspecialchars($info['phone']); ?>">
                    </div>

                    <div>
                        <label>Password:</label>
                        <input type="text" name="password" placeholder="Password" value="<?php echo htmlspecialchars($info['password']); ?>">
                    </div>

                    <div>
                        <input type="submit" class="btn btn-success" name="update" value="Update">
                    </div>

                </form>
            </div>

        </center>

    </div>

</body>
</html>