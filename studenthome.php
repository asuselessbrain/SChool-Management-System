<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

elseif($_SESSION['usertype']=="admin"){
    header("location:login.php");
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

    <?php 
    
    include 'admin_css.php';

    ?>

</head>
<body>
    
    <?php 
    
    include 'student_sidebar.php';
    
    ?>
</body>
</html>