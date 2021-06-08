<?php
session_start();
if(isset($_POST['login'])) {
    $loginEmail = htmlspecialchars($_POST['loginEmail']);
    $loginPass = htmlspecialchars($_POST['loginPass']);
    if (file_exists('db/user_data.json')) {
        $current_data = file_get_contents('db/user_data.json');
        $array_data = json_decode($current_data, true);
        foreach ($array_data as $user) {
            if ((strstr($loginEmail, $user['email'])=== FALSE) || (strstr($loginPass, $user['password'])=== FALSE)) {
                header('location:registerJson.php');
            }else {
                $_SESSION['userId'] = $user["id"];
                $_SESSION['loggedFirstName'] = $user['firstName'];
                $_SESSION['loggedLastName'] = $user['lastName'];
                $_SESSION['loggedEmail'] = $user['email'];
                header('location:profileJson.php');die;
            }
        }
    }
}