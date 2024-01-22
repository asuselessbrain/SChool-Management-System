<?php


session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
} else {
    // Connection successful
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($data, $_POST['username']);
    $pass = mysqli_real_escape_string($data, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '$name' AND password = '$pass'";
    $result = mysqli_query($data, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row["usertype"] == "student") {

            $_SESSION['username']=$name;
            $_SESSION['usertype']="student";
            header("location: studenthome.php");
            exit;
        } elseif ($row["usertype"] == "admin") {

            $_SESSION['username']=$name;
            $_SESSION['usertype']="admin";
            header("location: adminhome.php");
            exit;
        } 
    } else {


        $message = "Username or password do not match";

        $_SESSION['loginMessage']=$message;

        header("location:login.php");
    }
}

?>
