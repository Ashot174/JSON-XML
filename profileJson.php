<?php
session_start();
include "layouts/header.php";
?>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container" style="background: #1a9ec4; padding: 10px">
    <div class="row" style="margin-bottom: 20px">
        <div class="col-2 offset-10">
            <form action="logoutJson.php" method="post">
                <input type="submit" name = "logout" class="btn btn-danger btn-md" value="Logout">
            </form>
        </div>
    <div class="col-4 offset-3">
        <a href="galleryJson.php" style = "padding:2px; background: darkslateblue; font-size: 25px; color: white ">Gallery</a>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <?php
            if (file_exists('db/user_avatar.json')) {
                $current_data = file_get_contents('db/user_avatar.json');
                $array_data = json_decode($current_data, true);
                $avatar = "";
                if (!empty($array_data)) {
                    foreach ($array_data as $user) {
                        if (strstr($_SESSION['loggedEmail'], $user['email']) !== FALSE) {
                            $avatar = $user['avatar'];
                        }else{
                            $avatar ="no-avatar.png";
                        }
                    }
                    ?>
                        <img src="uploads/<?php echo  $avatar; ?>" alt="" class="avatar" style="height: 250px; width: 200px; "/>
                <?php }
            }else{
            ?>
            <img src="uploads/no-avatar.png" alt="avatar" class="avatar"  style="height: 200px; width: 150px; "/>
            <?php }?>
        </div>
        <div class="col-sm-4 col-md-4">
            <div style="padding:2px; background: navy; color: white; font-size: 25px;">
                <p><?=($_SESSION['loggedFirstName']." ".$_SESSION['loggedLastName']);?></p>
            </div>
            <br>
            <div style="padding:2px; background: navy; color: white; font-size: 25px;">
                <p> <i class="glyphicon glyphicon-envelope"></i> <?=$_SESSION['loggedEmail'];?> </p>
            </div>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php";
