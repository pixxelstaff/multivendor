<?php

session_start();



?>



<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Multi-Vendor</title>

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/style.css">

    <script src="assets/bootstrap/js/style.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/img">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>



    <?php

    require __DIR__ . '/vendor/autoload.php';

    include('connect.php');

    include('customFunc.php');





    // Recipient's email address





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

    <style>
        .error {

            color: red;

        }
    </style>

</head>



<body>

    <div class="container-fluid">

        <div class="row viewport">

            <div class="col-lg-4 p-5 sidebar">

                <div class="side-port">

                    <img src="assets/bootstrap/img/logo-3.webp" alt="" width="100%">

                </div>

                <div class="mt-5 text-white">

                    <h1 class="mt-5 text-center">Welcome</h1>

                    <h6 class="text-center">Signup & Discover a great amount of</h6>

                    <h3 class="text-center">New Opportunities!</h3>

                </div>

            </div>

            <div class="col-lg-8">

                <div class="container p-5">

                    <div>

                        <h2 class="">Register Vendor Account</h2>

                        <div class="hr"></div>

                    </div>

                    <div class="mt-3">

                        <form action="#" method='post' id="shah">

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="" class="pt-3">First Name</label>

                                    <input type="text" class="form-control" name="name">

                                </div>

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Last Name</label>

                                    <input type="text" class="form-control" name="surname">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Email</label>

                                    <input type="email" name="email" id="" class="form-control">

                                </div>

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Password</label>

                                    <input type="password" class="form-control" name="pass">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Phone</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <select name="country-code" id="" class="input-group-text p-2" id="basic-addon1">

                                                <?php

                                                $c_code = fetchAllData($con, 'country');

                                                while ($sh = mysqli_fetch_assoc($c_code)) {

                                                ?>

                                                    <option value=<?= $sh['country_code'] ?> class="">+<?= $sh['country_code'] ?></option>

                                                <?php

                                                }

                                                ?>

                                            </select>

                                        </div>

                                        <input type="number" class="form-control" name="phonenumber" aria-label="Username" aria-describedby="basic-addon1">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label for="" class="pt-3">C.N.I.C</label>

                                    <input type="number" class="form-control" name="cnic">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Business Name</label>

                                    <input type="text" class="form-control" name="business">

                                </div>

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Business URL (Optional)</label>

                                    <input type="text" class="form-control" name="businessurl">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Country</label>

                                    <select name="country" class="form-select p-2 w-100" id="country">

                                        <option value="" class="">select country</option>

                                        <?php

                                        $result = fetchAllData($con, 'country');

                                        while ($show = mysqli_fetch_assoc($result)) {

                                        ?>

                                            <option value=<?= $show['Id'] ?> class=""><?= $show['country'] ?></option>

                                        <?php

                                        }

                                        ?>



                                    </select>

                                </div>

                                <div class="col-md-6">

                                    <label for="" class="pt-3">City</label>

                                    <select name="city" class="form-select p-2 w-100" id="city">

                                        <option value="" class="">select city</option>

                                    </select>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Zip Code</label>

                                    <input type="number" name="zipcode" class="form-control">

                                </div>

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Address</label>

                                    <input type="text" name="address" class="form-control">

                                </div>

                            </div>

                            <div class="row mt-3">

                                <div class="col-md-6">

                                    <label for="">
                                        I agree to
                                        <a href="" class="text-decoration-none login-btn">term of use</a> &

                                        <a href="" class="text-decoration-none login-btn">Privacy policy</a>
                                        <input type="checkbox" name="policy" value="1" id="check">
                                    </label>


                                </div>

                                <div class="col-md-6">
                                    <label for="">
                                        I'd like to receive exclusive offers and promotions via SMS
                                        <input type="checkbox" name="promo" id="" value="1" class="mt-3">
                                    </label>
                                </div>

                                <div>

                                    <input type="submit" value="Submit" name="sub" class="form-control fs-5 mt-4 submit" id="submit">

                                    <div class="mt-3 text-center">
                                        <h6 style="text-align:center;">already have an account? <a href="/vendor/login.php" class="text-decoration-none login-btn">Sign In</a> </h6>
                                        <!-- <h5>All Ready a user? <a href="/vendor/login.php" class="text-decoration-none login-btn">Sign in</a></h5> -->

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    </div>







    <!-- Bootstrap--Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        $(document).ready(function() {

            $('#country').on('change', function() {

                let id = $(this).val();

                $.ajax({

                    url: 'ajax/city.php',

                    type: 'POST',

                    dataType: 'json',

                    data: {

                        id: id

                    },

                    success: function(response) {

                        $('#city').empty();

                        let data = response;

                        Array.from(data).forEach((elem) => {

                            $('#city').append(`<option value="${elem.id}">${elem.name}</option>`)

                        })

                    },

                    error: function(error) {

                        console.log(error)

                    }

                })

            })



            $("#shah").validate({

                rules: {

                    name: "required",

                    surname: "required",

                    email: "required",

                    pass: {
                        required: true,
                        minlength: 8,
                    },
                    phonenumber: {
                        required: true,
                        minlength: 10,
                    },
                    cnic: {
                        required: true,
                        minlength: 13,
                    },
                    business: "required",
                    businessurl: "required",
                    country: "required",
                    city: "required",
                    zipcode: {
                        required: true,
                        minlength: 5,
                    },
                    address: "required",
                    policy: "required",
                },
                messages: {

                    name: "put your first name",

                    surname: "put your last name",

                    email: "put your valid email",

                    pass: {
                        required: "put strong password",
                        minlength: "password must be 8 character",
                    },
                    phonenumber: {
                        required: "put your valid phone number",
                        minlength: "phone number must be 10 digits",
                    },
                    cnic: {
                        required: "put your valid cnic number",
                        minlength: "cnic number must be 13 digits",
                    },
                    business: "put your business name",
                    businessurl: "put your valid business url",
                    country: "put your country name",
                    city: "put your city name",
                    zipcode: {
                        required: "put your area zip code",
                        minlength: "zip code must be 5 digit",
                    },
                    address: "put your address",
                    policy: "first accept our terms and conditions",
                }


            })



            // $("#shah").on("submit", function(event) {

            //     event.preventDefault();

            //     $.ajax({

            //         url: "vendor-sub.php",

            //         type: "POST",

            //         data: $(this).serialize(),

            //         success: function(response) {

            //             alert('Form submitted successfully!');

            //             $('#shah')[0].reset();

            //         }

            //     });

            // });

        });

        //     // regex

        //     const nameRegex = /^[a-zA-Z\s']{4,30}$/;

        //     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        //     const numRegex = /^\d{10}$/;

        //     // const cnicRegex = /^\d{5}-\d{7}-\d{1}[0-9a-zA-Z]$/;

        //     const cnicRegex = /^\d{13}$/;

        //     // const passRegex = /^(?=.*\d)(?=.*[a-zA-Z]).{8,16}$/;

        //     const passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])(?=.*[a-zA-Z\d@$!%*?&]).{8,16}$/;

        //     const zipRegex = /^\d{5}$/;

        //     const addressRegex = /^[a-zA-Z0-9\s.,-]{1,120}$/;



        //     if (!nameRegex.test(firstname)) {

        //         document.getElementById("nameerror").innerHTML = "Name must be 4 digit";

        //     }
    </script>

</body>



</html>



<?php







//========================



if (isset($_POST['sub'])) {



    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['country-code']) && isset($_POST['phonenumber']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['zipcode']) && isset($_POST['cnic']) && isset($_POST['business']) && isset($_POST['businessurl']) && isset($_POST['address'])   && isset($_POST['pass'])) {


        $name = mysqli_real_escape_string($con, $_POST['name']);

        $surname = mysqli_real_escape_string($con, $_POST['surname']);

        $email = mysqli_real_escape_string($con, $_POST['email']);

        $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);

        $cnic = mysqli_real_escape_string($con, $_POST['cnic']);

        $business = mysqli_real_escape_string($con, $_POST['business']);

        $businessUrl = mysqli_real_escape_string($con, $_POST['businessurl']);

        $countryCode = mysqli_real_escape_string($con, $_POST['country-code']);

        $zip = mysqli_real_escape_string($con, $_POST['zipcode']);

        $address = mysqli_real_escape_string($con, $_POST['address']);

        $city = mysqli_real_escape_string($con, $_POST['city']);

        $country = mysqli_real_escape_string($con, $_POST['country']);

        $pass =  $_POST['pass'];

        $policy = isset($_POST['policy']) ? '1' : '0';

        $promo = isset($_POST['promo']) ? '1' : '0';

        $approve = '0';

        $date = date('d-m-Y');

        $syed = $name . $surname;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $qData =   fetchOrdetailsCol3($con, 'vendor', 'email', "$email", 'phone', "$phonenumber", 'cnic', "$cnic");



            if (mysqli_num_rows($qData) == 0) {

                $hash_pass = password_hash($pass, PASSWORD_DEFAULT);





                $insert_data = "INSERT INTO `vendor`( `name`, `surname`, `email`, `phone`, `cnic`, `business`, `business_url`, `country_code`, `zipcode`, `address`, `city`, `country`,  `password`, `policy`, `promo`, `approved`, `date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";



                $insert_data_p = mysqli_prepare($con, $insert_data);



                if ($insert_data_p) {

                    mysqli_stmt_bind_param($insert_data_p, 'sssssssssssssssss', $name, $surname, $email, $phonenumber, $cnic, $business, $businessUrl, $countryCode, $zip, $address, $city, $country, $hash_pass, $policy, $promo, $approve, $date);



                    if (mysqli_stmt_execute($insert_data_p)) {



                        $mail->setFrom('multivendor@sindhfurniture.com', 'Multivendor');

                        $mail->addAddress($email, $name);

                        $mail->Subject = 'Welcome to our platform';

                        $mail->isHTML(true);





                        // HTML content

                        $html_content = "

<!DOCTYPE html>

<html lang='en'>

<head>

    <meta charset='UTF-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <title>Document</title>

    <link rel='preconnect' href='https://fonts.googleapis.com'>

    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>

    <link href='https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap' rel='stylesheet'>

</head>

<body>

        <table style='width:100%;border:1px solid #FDA621;' cellspacing='0'>

            <thead>

                <tr style='width: 100%;'>

                    <td style='width:100%;padding:10px;text-align:center;background:#eee;color:#fff;'><img src='https://multivender.sindhexpress.com/email-logo-1.png' style='display: inline-block;width:220px;' alt=''></td>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td style='width:100%;padding:20px 16px;height:400px;vertical-align:baseline;font-family: Outfit, sans-serif;font-size:16px;'>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Welcome to Our Platform!</span><br>



                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Dear " . $syed . " ,</span><br>



                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Thank you for registering on our platform! We're thrilled to have you join our community of vendors.</span><br>



                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Before you can start using our platform, your registration needs to be approved by our admin team. This process typically takes 2-4 hours. We'll notify you via email once your account is approved and ready for use.</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>A friendly reminder: please refrain from sharing your email and password with anyone. Keeping your account information confidential helps ensure the security of your account and protects your privacy.

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>

                        Once again, thank you for choosing our platform. We're excited to see the value you'll bring to our community!<br>

                        Best regards,</span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>

                        https://ml.sindhfurniture.com/vendor/login.php

                        </span><br>

                        <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>

                        Express Team</span><br>

                    </td>

                </tr>

            </tbody>

        </table>



</body>

</html>";









                        $mail->Body = $html_content;

                        $mail->AltBody = 'This is the plain text message body';



                        // Send email and check if it sends successfully

                        if ($mail->send()) {

                            alerting('successfully registered', '/vendor/login.php');
                        } else {

                            alerting('failed to send the data', 'vendor-reg.php');
                        }













                        // Query executed successfully

                    } else {

                        // Query execution failed

                        echo "<script>alert('Failed to upload data: " . mysqli_stmt_error($insert_data_p) . "')</script>";
                    }



                    mysqli_stmt_close($insert_data_p); // Close the prepared statement

                } else {

                    // Error in preparing the statement

                    echo "<script>alert('Error preparing the statement: " . mysqli_error($con) . "')</script>";
                }
            } else {

                echo "<script>alert('The email , phone OR cnic is already used')</script>";
            }
        } else {

            echo "<script>alert('please enter the valid email')</script>";
        }
    } else {

        echo "<script>alert('please enter all the values')</script>";
    }
}
