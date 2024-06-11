<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password || multivendor</title>
    <?php include('include/links.php') ?>
    <link rel="stylesheet" href="../assets/css/forget.css">

    <?php
    if (isset($_GET['id']) && isset($_GET['token'])) {
        $rm_token = '';
        $rm_time = '';
        $id = $_GET['id'];
        $token = $_GET['token'];
        $date = date('d-m-Y');
        $current_time = time();
        $fetch__vendor = fetchOtherdetailsCol2($con, 'vendor', 'Id', $id, 'token', $token);
        if (mysqli_num_rows($fetch__vendor) > 0) {
            while ($sh = mysqli_fetch_assoc($fetch__vendor)) {
                $expire_time = $sh['token_expire'];
            }
            if (($expire_time - $current_time) < 0) {
                $upd_Qry = mysqli_prepare($con, "UPDATE `vendor` SET `token` = ?,`token_expire` = ?,`date` = ? WHERE `Id` = ? ");
                mysqli_stmt_bind_param($upd_Qry, 'ssss', $rm_token, $rm_time, $date, $id);
                mysqli_stmt_execute($upd_Qry);
                alerting('token is expired now', 'forget.php');
            }
        } else {
            alerting('the following is expired now', 'forget.php');
        }
    } else {
    ?>
        <script>
            window.location.href = 'forget.php';
        </script>
    <?php
    }

    ?>

</head>

<body>
    <div class="container-fluid">
        <div class="conatiner">
            <div class="row justify-content-center py-5">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="pb-5 text-center">
                        <img src="../assets/bootstrap/img/logo.webp" alt="" width="80%">
                    </div>
                    <div class="card">
                        <h3>Create New Password</h3>
                        <form action="#" method="post">
                            <input type="password" id="password" name="pass" placeholder="New Password" required>
                            <input type="password" id="password" name="cpass" placeholder="Confirm Password" required>
                            <input type="submit" value="Submit" class="submit" name="submit">
                        </form>
                        <!-- <div class="text-center">
                            <p>Dont have account.? <a href="register.php">Sign up</a></p>
                            <p>Forgot you password.? <a href="forget.php">Click here</a></p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    if (!empty($_POST['pass']) && !empty($_POST['cpass'])) {
        $pass1 = $_POST['pass'];
        $pass2 = $_POST['cpass'];
        if ($pass1 ==  $pass2) {
            $hash_pass = password_hash($pass1, PASSWORD_DEFAULT);
            $update_password = mysqli_prepare($con, "UPDATE `vendor` SET `password`=?,`token` = ?,`token_expire` = ?,`date` = ? WHERE `Id` = ? ");
            mysqli_stmt_bind_param($update_password, 'sssss', $hash_pass, $rm_token, $rm_time, $date, $id);
            if (mysqli_stmt_execute($update_password)) {
                alerting('successfully updated the password', 'login.php');
            } else {
                alerting('something went wrong', 'forget.php');
            }
        } else {
            alerting('your passwords doesnot match', '');
        }
    } else {
        alerting('provide complete details', '');
    }
}
