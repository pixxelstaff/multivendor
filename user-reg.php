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

    include('connect.php');

    include('customFunc.php');



    ?>
    <style>
        .error {

            color: red !important;

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

                        <h2 class="">Register User Account</h2>

                        <div class="hr"></div>

                    </div>

                    <div class="mt-3">

                        <form action="#" method="post" id="shah">

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="" class="pt-3">First Name</label>

                                    <input type="text" name="name" class="form-control">

                                </div>

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Last name</label>

                                    <input type="text" name="surname" class="form-control">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Email</label>

                                    <input type="email" name="email" id="" class="form-control">

                                </div>

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

                                        <input type="number" name="phonenumber" class="form-control" aria-label="Username" aria-describedby="basic-addon1">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Password</label>

                                    <input type="password" name="pass" class="form-control" id="pass">

                                </div>

                                <div class="col-md-6">

                                    <label for="" class="pt-3">Retype Password</label>

                                    <input type="password" name="confirm_pass" class="form-control">

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

                                    <input type="number" name="zip" class="form-control">

                                </div>

                                <div class="col-md-6">

                                    <label for="" class="pt-3">D/O/B</label>

                                    <input type="date" id="" name='dob' class="form-control">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mt-3">

                                    <div class="d-flex flex-row">

                                        <div class="col-md-3">

                                            <label for="" class="pt-2">Gender:</label>

                                        </div>

                                        <div class="col-md-3">

                                            <input type="radio" name="gender" id="gender" value="male"><label class="p-2" for="gender">Male</label>

                                        </div>

                                        <div class="col-md-3">

                                            <input type="radio" name="gender" id="gender" value="female"><label class="p-2" for="gender">Female</label>

                                        </div>

                                        <div class="col-md-3">

                                            <input type="radio" name="gender" id="gender" value="other"><label class="p-2" for="gender">Other</label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div>

                                <input type="submit" value="Submit" name="sub" class="form-control fs-5 mt-4 submit">

                                <div class="mt-3 text-center">

                                    <!-- <h5>All Ready a user? <a href="sign-in.php" class="text-decoration-none login-btn">Sign in</a></h5> -->
                                    <h6 style="text-align:center;">already have an account? <a href="user-sign-in.php" class="text-decoration-none login-btn">Sign In</a> </h6>

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

                    phonenumber: {
                        required: true,
                        minlength: 10,
                    },
                    pass: {
                        required: true,
                        minlength: 8,
                    },
                    confirm_pass: {
                        required: true,
                        minlength: 8,
                        equalTo: "#pass"
                    },
                    country: "required",
                    city: "required",
                    zip: {
                        required: true,
                        minlength: 5,
                    },
                    gender: "required",
                    dob: "required",
                    policy: "required",
                },
                messages: {

                    name: "put your first name",

                    surname: "put your last name",

                    email: "put your valid email",
                    phonenumber: {
                        required: "put your valid phone number",
                        minlength: "phone number must be 10 digits",
                    },
                    pass: {
                        required: "put strong password",
                        minlength: "password must be 8 character",
                    },
                    confirm_pass: {
                        required: "put strong password",
                        minlength: "password must be 8 character",
                        equalTo: "confirm password not match !!",
                    },
                    country: "put your country name",
                    city: "put your city name",
                    zip: {
                        required: "put your area zip code",
                        minlength: "zip code must be 5 digit",
                    },
                    dob: "put your date of birth",
                    gender: "put your gender",
                    policy: "first accept our terms and conditions",
                }


            })


        });
    </script>





</body>



</html>





<?php



//name surname email country-code phonenumber pass confirm-pass country city zip dob gender policy and promo

if (isset($_POST['sub'])) {



    if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['country-code']) && !empty($_POST['phonenumber']) && !empty($_POST['country']) && !empty($_POST['city']) && !empty($_POST['zip']) && !empty($_POST['dob']) && !empty($_POST['gender'])  && !empty($_POST['pass'])  && !empty($_POST['confirm_pass'])) {







        $name = mysqli_real_escape_string($con, $_POST['name']);

        $surname = mysqli_real_escape_string($con, $_POST['surname']);

        $email = mysqli_real_escape_string($con, $_POST['email']);

        $countryCode = mysqli_real_escape_string($con, $_POST['country-code']);

        $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);

        $country = mysqli_real_escape_string($con, $_POST['country']);

        $city = mysqli_real_escape_string($con, $_POST['city']);

        $zip = mysqli_real_escape_string($con, $_POST['zip']);

        $dob = mysqli_real_escape_string($con, $_POST['dob']);

        $gender = mysqli_real_escape_string($con, $_POST['gender']);

        $policy = isset($_POST['policy']) ? '1' : '0';

        $promo = isset($_POST['promo']) ? '1' : '0';

        $pass =  $_POST['pass'];

        $confirmPass = $_POST['confirm_pass'];

        $status = '1';

        $date = date('d-m-Y');

        if ($pass === $confirmPass) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $qData =   fetchOtherdetailsCol2($con, 'user', 'email', "$email", 'phone', "$phonenumber");



                if (mysqli_num_rows($qData) == 0) {

                    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

                    $strDate = strtotime($dob);

                    $converted_dob = date('d-m-Y', $strDate);



                    $insert_data = "INSERT INTO `user` (`name`, `surname`, `gender`, `dob`, `email`, `phone`, `country code`, `zip_code`, `city`, `country`, `password`, `privacy_policy`, `promotions`,`status`, `date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";



                    $insert_data_p = mysqli_prepare($con, $insert_data);



                    if ($insert_data_p) {

                        mysqli_stmt_bind_param($insert_data_p, 'sssssssssssssss', $name, $surname, $gender, $converted_dob, $email, $phonenumber, $countryCode, $zip, $city, $country, $hash_pass, $policy, $promo, $status, $date);



                        if (mysqli_stmt_execute($insert_data_p)) {

                            // Query executed successfully

                            alerting('successfully registered', 'user-sign-in.php');
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

                    echo "<script>alert('The email or phone is already used')</script>";
                }
            } else {

                echo "<script>alert('please enter the valid email')</script>";
            }
        } else {

            echo "<script>alert('please confirm the password')</script>";
        }
    } else {

        echo "<script>alert('please enter all the values')</script>";
    }
}
