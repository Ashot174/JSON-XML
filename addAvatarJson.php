<?php
session_start();
$imageName = $_GET['imageName'];
$current_data = file_get_contents('db/user_avatar.json');
$array_data = json_decode($current_data, true);
function emailExistence($myEmail, $myArray){
    for ($i=0; $i<count($myArray); $i++){
        if ($myArray[$i]['email']==$myEmail)
            return true;
    }
    return false;
}
if(!emailExistence($_SESSION['loggedEmail'], $array_data)){
    $extra = array(
                'email' => $_SESSION['loggedEmail'],
                'avatar' => $imageName,
    );
            $array_data[] = $extra;
            $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
            file_put_contents('db/user_avatar.json', $final_data);
            header("location:profileJson.php");
}else{
    for ($i = 0; $i < count($array_data); $i++) {
        if ($array_data[$i]['email'] == $_SESSION['loggedEmail']){
            $array_data[$i]['avatar'] = $imageName;
            $newJsonString = json_encode($array_data,JSON_PRETTY_PRINT);
            file_put_contents('db/user_avatar.json', $newJsonString);
            header("location:profileJson.php");
        }
    }
}






//if(file_exists('db/user_avatar.json')) {
//    $current_data = file_get_contents('db/user_avatar.json');
//    $array_data = json_decode($current_data, true);
//    foreach ($array_data as $user){
//        if($user['email']!=$_SESSION['loggedEmail'] ){
//            $extra = array(
//                'email' => $_SESSION['loggedEmail'],
//                'avatar' => $imageName,
//    );
//            $array_data[] = $extra;
//            $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
//            file_put_contents('db/user_avatar.json', $final_data);
//            header("location:profileJson.php");
//        }else{
//            $jsonString = file_get_contents('db/user_avatar.json');
//            $data = json_decode($jsonString, true);
//            $data[0]['avatar'] = $imageName;
//// or if you want to change all entries with activity_code "1"
//            foreach ($data as $key => $entry) {
//                if ($entry['email'] == $_SESSION['loggedEmail']) {
//                    $data[$key]['avatar'] = "$imageName";
//                }
//            }
//            $newJsonString = json_encode($data,JSON_PRETTY_PRINT);
//            file_put_contents('db/user_avatar.json', $newJsonString);
//////            unset($array_data[$user]);
////            file_put_contents('db/user_avatar.json', json_encode($array_data,JSON_PRETTY_PRINT));
////            header('location:galleryJson.php');
////            $extra11 = array(
////                'email' => $_SESSION['loggedEmail'],
////                'avatar' => $imageName,
////            );
////            $array_data[] = $extra11;
////            $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
////            file_put_contents('db/user_avatar.json', $final_data);
////            header("location:profileJson.php");
//        }
////else{
//////            unset($array_data[$value]);
////            $user['avatar'] = $imageName;
////            $data = json_encode($array_data, JSON_PRETTY_PRINT);
////            file_put_contents('db/user_avatar.json', $data);
////            header("location:profileJson.php");
////        }
//    }
//}
////        else{
////            if(strstr($_SESSION['loggedEmail'],$user['email']) !== false){
////                $user['avatar'] = $_GET['imageName'];
////                file_put_contents('db/user_avatar.json', json_encode($data));
////            }
////        }
////    }
////}

