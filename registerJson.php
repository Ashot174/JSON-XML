<?php
session_start();
include "layouts/header.php"
?>
    <form class="form-horizontal" action="registerProcJson.php" method="post">
        <span style ="color:white; background-color: red"><?=$_SESSION['error']['jsonErr']; ?> </span>
        <fieldset>
            <!-- Form Name -->
            <legend>Register Yourself</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="fname">First Name</label>
                <div class="col-md-4">
                    <input id="fname" name="firstName" type="text"  class="form-control input-md" value="<?=$_SESSION['firstName'];?>">
                    <span style ="color:white; background-color: red"><?=$_SESSION['error']['firstNameErr']; ?> </span>
                </div>


            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="lname">Last Name</label>
                <div class="col-md-4">
                    <input id="lname" name="lastName" type="text" class="form-control input-md" value="<?=$_SESSION['lastName'];?>">
                    <span style ="color:white; background-color: red"><?=$_SESSION['error']['lastNameErr']; ?> </span>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email</label>
                <div class="col-md-4">
                    <input id="email" name="email" type="text" class="form-control input-md" value="<?=$_SESSION['email'];?>">
                    <span style ="color:white; background-color: red"><?=$_SESSION['error']['emailErr']; ?> </span>
                </div>
            </div>
            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Password</label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" class="form-control input-md">
                    <span style ="color:white; background-color: red"><?=$_SESSION['error']['passwordErr']; ?> </span>
                </div>
            </div>
            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="save"></label>
                <div class="col-md-8">
                    <input type="submit" name="register" class="btn btn-success" value="Register">
                    <a href="loginJson.php" class="btn btn-success">Login <i class="fa fa-sign-in"></i></a>
                </div>
            </div>
            <?php
            if(isset($message))
            {
                echo $message;
            }
            ?>
        </fieldset>
    </form>

<?php include "layouts/footer.php" ?>