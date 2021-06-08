<?php
//session_start();
//$path = "uploads/" . $_GET['imageName'];
//if (file_exists('db/user_gallery.json')) {
//    $current_data = file_get_contents('db/user_gallery.json');
//    $array_data = json_decode($current_data, true);
//    foreach ($array_data as $user){
//        if((strstr($_SESSION['loggedEmail'], $user['email']) !== FALSE) && (strstr($_GET['imageName'], $user['image_name']) !== FALSE) ){
//            unset($user);
//            unlink($path);
//            file_put_contents('db/user_gallery.json', json_encode($array_data));
//            header('location:galleryJson.php');
//        }
//    }
//}

session_start();
$path = "uploads/" . $_GET['imageName'];
if (file_exists('db/user_gallery.json')) {
    $file = file_get_contents('db/user_gallery.json');
    $data = json_decode($file, TRUE);
    foreach ($data as $key => $user){
        if ($user['email'] == $_SESSION['loggedEmail'] && $user['image_name'] ==$_GET['imageName']){
            unlink($path);
            unset($data[$key]);
            file_put_contents('db/user_gallery.json', json_encode($data,JSON_PRETTY_PRINT));
            header('location:galleryJson.php');
        }
    }
}
if(file_exists('db/user_avatar.json')) {
    $file1 = file_get_contents('db/user_avatar.json');
    $data1 = json_decode($file1, TRUE);
    for ($i = 0; $i < count($data1); $i++) {
        if ($data1[$i]['email'] == $_SESSION['loggedEmail'] && $data1[$i]['avatar'] == $_GET['imageName']) {
            unset($data1[$i]);
            file_put_contents('db/user_avatar.json', json_encode($data1, JSON_PRETTY_PRINT));
            header('location:galleryJson.php');
        }
    }
}
