<?php
session_start();
$_SESSION['firstName'] = "";
$_SESSION['lastName'] = "";
$_SESSION['email'] = "";
$_SESSION['error'] = [];
$current_data = file_get_contents('db/user_data.json');
$array_data = json_decode($current_data, true);
function emailExistence($myEmail, $myArray){
    for ($i=0; $i<count($myArray); $i++){
        if ($myArray[$i]['email']==$myEmail)
            return true;
    }
    return false;
}
if(isset($_POST['register'])) {
    $firstName = htmlspecialchars($_POST['firstName']);
    $_SESSION['firstName'] = $firstName;
    $lastName = htmlspecialchars($_POST['lastName']);
    $_SESSION['lastName'] = $lastName;
    $email = htmlspecialchars($_POST['email']);
    $_SESSION['email'] = $email;
    $password = htmlspecialchars($_POST['password']);

    if (!preg_match("/^[a-zA-Z ]*$/", $firstName) || strlen($firstName) < 2) {
        $_SESSION['error']['firstNameErr'] = "Only letters and white space allowed firstname";
        header('location:registerJson.php');
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $lastName) || strlen($lastName) < 2) {
        $_SESSION['error']['lastNameErr'] = "Only letters and white space allowed lastname";
        header('location:registerJson.php');
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error']['emailErr'] = "Invalid email format";
        header('location:registerJson.php');

    } elseif (strlen($_POST['password']) < 6 || empty($_POST['password'])) {
        $_SESSION['error']['passwordErr'] = "Invalid password";
        header('location:registerJson.php');
    } elseif (!emailExistence($email, $array_data)) {
        $extra = array(
                    'id' => hexdec(uniqid()),
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'password' => $password,
                );
                $array_data[] = $extra;
                $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
                if (file_put_contents('db/user_data.json', $final_data)) {
                    header('location: loginJson.php');
                }
            }else{$_SESSION['error']['emailErr'] = "This email already exists";
        header('location:registerJson.php');

    }

}

