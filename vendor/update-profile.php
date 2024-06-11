<?php



session_start();

if (!isset($_SESSION['vendor_email'])) {

    header('location:login.php');
} ?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">

    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <title>

        Lanotte - saloon dashboard

    </title>

    <?php include('include/links.php') ?>

    <!-- cdn for datatables -->
    <style>
        .error {



            color: red !important;



        }
    </style>

</head>



<body class="g-sidenav-show   bg-gray-100">

    <div class="min-height-300  position-absolute w-100 overlay-div"></div>

    <?php include('include/sidebar.php') ?>







    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->

        <?php include('include/navbar.php') ?>

        <!-- End Navbar -->

        <div class="container-fluid p-4">

            <div class="col-12 p-2 rounded bg-white">

                <h2 class="dash-head">Vendor profile</h2>

            </div>



            <div class="col-12 main-profile-div p-4 mt-4 bg-white rounded overflow-hidden">

                <div class="banner-div col-12">

                    <!-- <div class="vendor-profile-pic">

                        <img src="../images/dashboard-img/sal.png" alt="">

                    </div> -->

                    <div class="map-div w-100 p-0">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d57675.49282374098!2d68.34884445!3d25.3807559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1708446542311!5m2!1sen!2s" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>

                </div>

                <div class="col-12 main-info">

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12">

                            <h4><?= $v__user__name ?></h4>

                            <p><?= $v__user__email ?></p>

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end align-items-center">



                    </div>

                </div>

                <form action="" method="post" id="shah">

                    <div class="vendor-tabs-div col-12 mt-4">

                        <div class="w-100 d-flex field-parent">

                            <div class="field-box">

                                <label for="">Name</label>

                                <input type="text" value="<?= $v__user__name ?>" name="name">

                            </div>

                            <div class="field-box">

                                <label for="">Surname</label>

                                <input type="text" value="<?= $v__user__surname ?>" name="surname">

                            </div>

                            <div class="field-box">

                                <label for="">Business</label>

                                <input type="text" value="<?= $v__user__business ?>" name="business">

                            </div>





                        </div>

                        <div class="w-100 d-flex field-parent">



                            <div class="field-box">

                                <label for="">Business-url</label>

                                <input type="text" value="<?= $v__user__businessurl ?>" name="businessurl">

                            </div>

                            <?php $countryData = fetchAllData($con, 'country');   ?>

                            <div class="field-box">

                                <label for="">Country</label>

                                <select name="country" id="country" class="cus-text-area">

                                    <option value="">select country</option>

                                    <?php

                                    while ($showCountry = mysqli_fetch_assoc($countryData)) {

                                    ?>

                                        <option value="<?= $showCountry['Id'] ?>" <?= $showCountry['country'] == $logged_actual_country_name ? 'selected' : '' ?>><?= $showCountry['country'] ?></option>

                                    <?php

                                    }

                                    ?>



                                </select>

                            </div>

                            <div class="field-box">

                                <label for="">country-code</label>

                                <input type="text" id="country-code" value="<?= $v__user__country_code ?>" name="country-code">

                            </div>

                        </div>

                        <div class="w-100 d-flex field-parent">

                            <div class="field-box">

                                <label for="">City</label>

                                <select name="city" id="city" class="cus-text-area" current-city-id='<?= $v__user_city ?>'>

                                    <option value="">select city</option>

                                    <?php

                                    $sel_city_opts = fetchOtherdetails($con, 'city', 'country_id', $v__user_country);

                                    while ($display_city = mysqli_fetch_assoc($sel_city_opts)) {

                                    ?>

                                        <option value="<?= $display_city['Id'] ?> " <?= $display_city['Id'] == $v__user_city ? 'selected' : '' ?>><?= $display_city['name'] ?></option>

                                    <?php

                                    }

                                    ?>

                                </select>

                            </div>

                            <div class="field-box">

                                <label for="">Zipcode</label>

                                <input type="text" value="<?= $v__user__zipcode ?>" name="zipcode">

                            </div>

                        </div>

                        <div class="w-100 d-flex field-parent">

                            <div class="field-box w-100">

                                <label for="">address</label>

                                <textarea name="address" id="" class="cus-text-area" rows="5"><?= $v__user__address ?></textarea>

                            </div>

                        </div>

                        <div class="w-100 d-flex upd_profile_wrap">

                            <input type="submit" value="update profile" name="upd_profile" class="upd-profile">

                        </div>

                    </div>

                </form>

            </div>



        </div>

        <?php include('include/footer.php') ?>



        <!-- footer here -->

        </div>

    </main>





    <div class="success-wrapper">

        <div class="success-message-container d-none">

            <div class="success-gif">

                <img src="../images/dashboard-img/success.gif" alt="">

            </div>

            <p class="pop-message"><?= isset($_GET['msg']) ? base64_decode($_GET['msg']) : ''; ?> </p>

            <a href="profile.php" class="close-btn" id="pop-close-btn">

                <span class="material-symbols-outlined">

                    close

                </span>

            </a>

        </div>

        <div class="error-message-container d-none">

            <div class="success-gif">

                <img src="../images/dashboard-img/cross.gif" alt="">

            </div>

            <p class="pop-message"><?= isset($_GET['msg']) ? base64_decode($_GET['msg']) : ''; ?> </p>

            <a href="category.php" class="close-btn" id="pop-close-btn">

                <span class="material-symbols-outlined">

                    close

                </span>

            </a>

        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(() => {

            $('#country').on('change', function() {

                let current_city_id = $('#city').attr('current-city-id');

                let id = $(this).val();

                $.ajax({

                    url: 'ajax/country_city.php',

                    type: 'POST',

                    dataType: 'json',

                    data: {

                        countryId: id

                    },

                    success: function(response) {

                        $('#country-code').empty();

                        $('#country-code').val(`${response.country_code}`);

                        let city_opts = response.city;

                        $('#city').empty();

                        $('#city').append(`<option value=''>select city</option>`);

                        Array.from(city_opts).forEach((item) => {

                            $('#city').append(`<option value='${item.id}' ${item.id == current_city_id ? 'selected' : ''}  >${item.name}</option>`);

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
        })
    </script>

    <!--   Core JS Files   -->

    <?php include('include/script.php') ?>







</body>



</html>



<?php

// tommorrow will do the code?ok



if (isset($_POST['upd_profile'])) {

    if (!empty($_POST['name']) && !empty($_POST['surname'])  &&  !empty($_POST['country-code'])  && !empty($_POST['country']) && !empty($_POST['city']) && !empty($_POST['zipcode'])  && !empty($_POST['business']) && !empty($_POST['address'])) {



        $name = mysqli_real_escape_string($con, $_POST['name']);

        $surname = mysqli_real_escape_string($con, $_POST['surname']);

        $business = mysqli_real_escape_string($con, $_POST['business']);

        $businessUrl = mysqli_real_escape_string($con, $_POST['businessurl']);

        $countryCode = mysqli_real_escape_string($con, $_POST['country-code']);

        $zip = mysqli_real_escape_string($con, $_POST['zipcode']);

        $address = mysqli_real_escape_string($con, $_POST['address']);

        $city = mysqli_real_escape_string($con, $_POST['city']);

        $country = mysqli_real_escape_string($con, $_POST['country']);

        $date = date('d-m-Y');



        if (filter_var($businessUrl, FILTER_VALIDATE_URL)) {

            $update__data = "UPDATE `vendor` SET `name`=?,`surname`=?,`business`=?,`business_url`=?,`country_code`=?,`zipcode`=?,`address`=?,`city`=?,`country`=?,`date`=? WHERE `Id` = ?";



            $updata_data_p = mysqli_prepare($con, $update__data);



            if ($updata_data_p) {

                mysqli_stmt_bind_param($updata_data_p, 'sssssssssss', $name, $surname, $business, $businessUrl, $countryCode, $zip, $address, $city, $country, $date, $v__user__id);



                if (mysqli_stmt_execute($updata_data_p)) {

                    // Query executed successfully

?>

                    <script>
                        window.location.href = '?screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('successfully updated the data hope u enjoyed?') ?>';
                    </script>

        <?php

                } else {

                    // Query execution failed

                    echo "<script>alert('Failed to upload data: " . mysqli_stmt_error($updata_data_p) . "')</script>";
                }



                mysqli_stmt_close($updata_data_p); // Close the prepared statement

            } else {

                // Error in preparing the statement

                alerting('Error preparing the statement', 'update-profile.php');
            }
        } else {

            alerting('enter valid url', 'update-profile.php');
        }
    } else {

        alerting('please enter all the values', 'update-profile.php');
    }
}





if (isset($_GET['screen'])) {

    if (base64_decode($_GET['screen']) == 'success') {

        ?>

        <script>
            let sucWrap = document.querySelector('.success-message-container');

            sucWrap.classList.remove('d-none');

            let wrap = document.querySelector('.success-wrapper');

            wrap.style.display = 'flex';

            setTimeout(() => {

                wrap.style.opacity = '1';

                wrap.style.transform = 'scale(1)'

            }, 50)
        </script>

<?php

    }
}
