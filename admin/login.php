<?php
session_start();
if (isset($_SESSION['email'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login || lanotte</title>
    <?php include('include/links.php') ?>
</head>

<body>
    <div class="container-fluid login-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 login-image-wrapper">
                    <img src="../images/dashboard-img/login.png" alt="login image" srcset="">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 login-form-wrapper d-flex align-items-center justify-content-center">
                    <div class="login-form-box col-12">
                        <form class="form w-100" action="" method="post">
                            <h2 class="log-head">Sign in - Admin dashboard</h2>
                            <div class="flex-column">
                                <label>Email </label>
                            </div>
                            <div class="inputForm">
                                <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Layer_3" data-name="Layer 3">
                                        <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path>
                                    </g>
                                </svg>
                                <input type="text" class="input" name="email" placeholder="Enter your Email">
                            </div>
                            <div class="flex-column">
                                <label>Password </label>
                            </div>
                            <div class="inputForm">
                                <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path>
                                    <path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path>
                                </svg>
                                <input type="password" class="input" name="pass" placeholder="Enter your Password">
                            </div>
                            <div class="flex-row">
                                <div>
                                    <input type="checkbox" class="rem-me-checkbox">
                                    <label class="rem-me">Remember me </label>
                                </div>
                                <!-- <span class="span">Forgot password?</span> -->
                            </div>
                            <button class="button-submit" type="submit" name="log-btn">Sign In</button>
                            <!-- <p class="p">Don't have an account? <a href="" class="span">Sign Up</a> </p> -->


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php


if (isset($_POST['log-btn'])) {
    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
        $email =  $_POST['email'];
        $password = $_POST['pass'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = fetchOtherdetails($con, 'admin', 'email', $email);
            if (mysqli_num_rows($response) > 0) {
                while ($sh = mysqli_fetch_assoc($response)) {
                    $hash = $sh['password'];
                }
                if (password_verify($password, $hash)) {
                    $_SESSION['email'] = $email;
    ?>
                    <script>
                        window.location.href = "index.php";
                    </script>
<?php
                } else {
                    alerting('wrong password', 'login.php');
                }
            } else {
                alerting('data not found', 'login.php');
            }
        } else {
            alerting('enter valid email', 'login.php');
        }
    } else {
        alerting('enter complete data', 'login.php');
    }
}



?>

</html>