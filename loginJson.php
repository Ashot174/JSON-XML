<?php
session_start();
include "layouts/header.php"
?>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                    <h4>Welcome back.</h4>
                    <form action="loginProcJson.php" method="post">
                    <input type="text" id="userName" class="form-control input-sm chat-input" name ="loginEmail" value="<?=$_SESSION['email'];?>" />
                    <br>
                    <input type="password" class="form-control input-sm chat-input"  name = "loginPass" />
                    <br>
                    <div class="wrapper">
            <span class="group-btn">
                <input type="submit" class="btn btn-primary btn-md" value="Login" name="login">
            </span>
             <span class="group-btn">
                <a href="registerJson.php" class="btn btn-primary btn-md">Register <i class="fa fa-sign-in"></i></a>
             </span>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "layouts/footer.php"?>