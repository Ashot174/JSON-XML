<?php
session_start();
include "layouts/header.php";
$email = $_SESSION['loggedEmail'];
?>
<div class="container">
    <div class="row">
        <div class="col-4 ">
            <div class="container">
                <a href="profileJson.php" ><i class="fas fa-user-circle"></i>MyProfile</a>
            </div>
        </div>
        <div class="col-2 offset-6">
            <form action="logoutJson.php" method="post">
                <input type="submit" name = "logout" class="btn btn-danger btn-md" value="Logout">
            </form>
        </div>
    </div>
</div>
    <br>
<div class="container">
    <div class="row">
        <div class="col-4 offset-5">
            <h1>My Gallery</h1>
        </div>
    </div>
</div>
    <br>
<div class="container">
    <form action="uploadJson.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="upload">
        <?php
        if(isset($message))
        {
            echo $message;
        }
        ?>
    </form>
</div>
<?php
$sample_data = file_get_contents('db/user_gallery.json');;
$raw_data = json_decode($sample_data, true);
$page = !isset($_GET['page']) ? 1 : $_GET['page'];
$limit = 5; // five rows per page
$offset = ($page - 1) * $limit; // offset
$total_items = count($raw_data); // total items
$total_pages = ceil($total_items / $limit);
$final = array_splice($raw_data, $offset, $limit); // splice them according to offset and limit

// for($x = 1; $x <= $total_pages; $x++): ?>
<!--    <a href='galleryJson.php?page=--><?php //echo $x; ?><!--'>--><?php //echo $x; ?><!--</a>-->
<?php //endfor; ?>
    <?php foreach($final as $key => $value): ?>
    <div class="container" >
        <div class="col-4 offset-3" style="position: relative">
            <a href="addAvatarJson.php?imageName=<?=$value['image_name'];?>" style="position: absolute; left:20px"><i class="fas fa-user-alt"></i></a>
            <a href="deleteImageJson.php?imageName=<?=$value['image_name'];?>" style="position: absolute; right: 20px"><i class="fas fa-times-circle"></i></a>
            <img alt="picture" style="width: 100%; height: 300px" src="uploads/<?=$value['image_name'];?>" class="img-thumbnail">
        </div>
    </div>

    <?php endforeach;
    for($x = 1; $x <= $total_pages; $x++): ?>
        <a href='galleryJson.php?page=<?php echo $x; ?>'><?php echo $x; ?></a>
    <?php endfor;
include "layouts/footer.php";
?>