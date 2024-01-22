<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] != "student") {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$name = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username='$name' ";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $phone = mysqli_real_escape_string($data, $_POST['phone']);
    $password = mysqli_real_escape_string($data, $_POST['password']);

    // Use password_hash for secure password storage
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE user SET email='$email', phone='$phone', password='$password' WHERE username='$name'";
    $result2 = mysqli_query($data, $query);

    if ($result2) {
        header('location: student_profile.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon">

    <?php include 'admin_css.php'; ?>

    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
    
    <?php include 'student_sidebar.php'; ?>

    <div class="content">
        <center>
            <h1>Update Profile</h1>
            <form action="" method="POST">
                <div class="div_deg">
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
                        <input type="submit" class="btn btn-success" name="update_profile" value="Update">
                    </div>
                </div>
            </form>
        </center>
    </div>
</body>
</html>
