<?php 

error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message']){
    $message = $_SESSION['message'];

    echo "<script type = 'text/javascript'>
    
    alert('message');    
    
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shahzadpur Govt. Model Pilot High School</title>
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <img class="logo1" src="logo1.png">
        <label class="logo">Shahzadpur Govt. Model Pilot High School</label>

        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <div class="section1">
        <label class="img_text"> We Teach Students With Care</label>
        <img class="main_img" src="School.jpg">
    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <img class="welcome_img" src="school2.jpg">
            </div>

            <div class="col-md-8 align">
                <h1>শাহজাদপুর সরকারি মডেল পাইলট উচ্চ বিদ্যালয়ে আপনাকে স্বাগতম! 🌟</h1>
                <p>আমরা আনন্দিত এবং গর্বিত অনুভূতির সাথে আপনাদেরকে স্বাগত জানাচ্ছি এই শিক্ষা প্রতিষ্ঠানে। এটি একটি অত্যন্ত উন্নত শিক্ষা প্রতিষ্ঠান, এখানে শিক্ষক-ছাত্র-কর্মচারী একসঙ্গে একটি সৃজনশীল পরিবার তৈরি করেছে। আমরা নিজেদেরকে একটি সৃজনশীল মানবজীবনে উন্নত করার জন্য প্রতিশ্রুতিবদ্ধ আছি। <br>একসঙ্গে এগিয়ে যাই উজ্জ্বল ভবিষ্যের দিকে, জ্ঞান এবং সংগঠনশীল প্রশিক্ষণের মাধ্যমে। আপনাদের সাথে এই অসীম জুটির একটি অংশ হিসেবে অত্যন্ত গর্বিত এবং আনন্দিত আছি। আবারও, স্বাগতম! 🏫📚🌈</p>
            </div>
        </div>
    </div>

    <center>
        <h1> Our Courses</h1>
    </center>

    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <img class="teacher" src="lab.jpg">
            </div>

            <div class="col-md-4">
                <img class="teacher" src="Humanities.jpg">
            </div>

            <div class="col-md-4">
                <img class="teacher" src="comunicacion.jpg">
            </div>

            <div class="col-md-4">
                <img class="vocational" src="VOCATIONAL.jpg">
            </div>
        </div>
    </div>

    <center>
        <h1> Admission Form</h1>
    </center>

    <div align="center" class="admission _form">

        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
    
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
    
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
    
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_text" name="message"></textarea>
            </div>
    
            <div class="adm_int">
                <input class="btn btn-success" id="submit" type="submit" value="Apply" name="apply">
            </div>
    </div>
    </form>

    <footer>
        <h2 class="footer_text"> Copyright @Shahzadpur Govt. Model Pilot High School</h2>
    </footer>
</body>
</html>