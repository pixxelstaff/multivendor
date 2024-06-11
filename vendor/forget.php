<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget password || multivendor</title>
    <?php include('include/links.php') ?>
    <link rel="stylesheet" href="../assets/css/forget.css">
    <?php
    // Recipient's email address
    require __DIR__ . '/autoload.php';;

    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'mail.sindhfurniture.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'multivendor@sindhfurniture.com';
    $mail->Password = '@anus1925';
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, ssl also accepted
    $mail->Port = 465; // TCP port to connect to
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
                        <h4>Account Recovery Email</h4>
                        <form action="#" method="post">
                            <input type="email" id="email" name="email" placeholder="email" required>
                            <input type="submit" value="Reset" class="submit" name="submit">
                        </form>
                        <div class="text-center">
                            <p>Dont have account.? <a href="../vendor-reg.php">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $check_email = fetchOtherdetails($con, 'vendor', 'email', $email);
    $token = bin2hex(random_bytes(15));
    $time = time() + (3600 * 3);
    $date = date('d-m-Y');
    if (mysqli_num_rows($check_email) > 0) {
        while ($sh = mysqli_fetch_assoc($check_email)) {
            $v__id = $sh['Id'];
            $v__name = $sh['name'];
            $v__email = $sh['email'];
        }
        $upd_Qry = mysqli_prepare($con, "UPDATE `vendor` SET `token` = ?,`token_expire` = ?,`date` = ? WHERE `Id` = ? ");
        mysqli_stmt_bind_param($upd_Qry, 'ssss', $token, $time, $date, $v__id);
        if (mysqli_stmt_execute($upd_Qry)) {

            // $actual_name = $v__name;
            $subjct = "password recovery";
            $mail->setFrom('multivendor@sindhfurniture.com', 'Multivendor');
            $mail->addAddress($v__email, $actual_name);
            $mail->Subject = $subjct;
            $mail->isHTML(true);
            $confirmation_email_content = "Dear $v__name Click this link to reset password https://ml.sindhfurniture.com/vendor/reset_pass.php?id=$v__id&token=$token";
            $mail->Body = $confirmation_email_content;
            $mail->AltBody = 'This is the plain text message body';

            // Send email and check if it sends successfully
            if ($mail->send()) {
                alerting('successfully send the email', 'forget.php');
            } else {
                alerting('failed to send the email', 'forget.php');
            }
        } else {
            alerting('somehting went wrong', 'forget.php');
        }


        // $update_Qry = 
    } else {
        alerting('the email u enter doesnot present', 'forget.php');
    }
}
