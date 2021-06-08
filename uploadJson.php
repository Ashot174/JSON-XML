<?php
session_start();
$target_dir = "uploads/";
$imageName = uniqid().basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $imageName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST['upload'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        if(file_exists('db/user_gallery.json')) {
            $current_data = file_get_contents('db/user_gallery.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                'email' => $_SESSION['loggedEmail'],
                'image_name' => $imageName,
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
            if (file_put_contents('db/user_gallery.json', $final_data)) {
                header("Location:galleryJson.php");
            } else {
                $error = 'JSON File not exists';
            }
        }
    }
}
















//$target_dir = "uploads/";
//$imageName = uniqid().basename($_FILES["fileToUpload"]["name"]);
//$target_file = $target_dir . $imageName;
//$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//// Check if image file is a actual image or fake image
//if(isset($_POST["upload"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}
//// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
//// Check file size
//if ($_FILES["fileToUpload"]["size"] > 50000000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//    && $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
//// Check if $uploadOk is set to 0 by an error
//if ($uploadOk == 0) {
//// if everything is ok, try to upload file
//} else {
//    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//    } else {
//    }
//}
//if ($uploadOk != 0) {
//    if(file_exists('db/user_gallery.json')) {
//        $current_data = file_get_contents('db/user_gallery.json');
//        $array_data = json_decode($current_data, true);
//        $extra = array(
//            'email' => $_SESSION['loggedEmail'],
//            'image_name' => $imageName,
//        );
//        $array_data[] = $extra;
//        $final_data = json_encode($array_data);
//        if (file_put_contents('db/user_gallery.json', $final_data)) {
//            header("Location:galleryJson.php");
//        } else {
//            $error = 'JSON File not exists';
//        }
//    }
////}

?>
