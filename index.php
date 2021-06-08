<?php

$hobbies = "First & second & third";

echo "<a href='$hobbies'>Hobbies </a>";
echo "<a href='".urlencode($hobbies)."'>Hobbies</a>";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>JSON<br /> XML</h2>
                <div class="col-md-6 .col-md-offset-3">
                    <ul class="social">
                        <li class="facebook"><a href="registerJson.php"> JSON</a></li>
                        <li class="twitter"><a href="">XML</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>