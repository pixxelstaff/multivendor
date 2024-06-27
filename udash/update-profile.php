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
                            <h4>Babu Bhaiya</h4>
                            <p>babubhaiya@gmail.com</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end align-items-center">
                            <a href="update-profile.php" class="send-message-btn">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="vendor-tabs-div col-12 mt-4">
                    <div class="w-100 d-flex field-parent">
                        <div class="field-box">
                            <label for="">Name</label>
                            <input type="text" value="" disabled>
                        </div>
                        <div class="field-box">
                            <label for="">Last Name</label>
                            <input type="text" value="" disabled>
                        </div>
                        <div class="field-box">
                            <label for="">Email</label>
                            <input type="text" value="" disabled>
                        </div>

                    </div>
                    <div class="w-100 d-flex field-parent">
                        <div class="field-box">
                            <label for="">Phone</label>
                            <input type="text" value="" disabled>
                        </div>
                        <div class="field-box">
                            <label for="">Country</label>
                            <input type="text" value="" disabled>
                        </div>
                        <div class="field-box">
                            <label for="">City</label>
                            <input type="text" value="" disabled>
                        </div>

                    </div>
                    <div class="w-100 d-flex field-parent">
                        <div class="field-box">
                            <label for="">Zipcode</label>
                            <input type="text" value="" disabled>
                        </div>
                        <div class="field-box">
                            <label for="">country-code</label>
                            <input type="text" value="" disabled>
                        </div>
                        <div class="field-box">
                            <label for="">D/O/B</label>
                            <input type="date" value="" disabled>
                        </div>

                    </div>
                </div>

            </div>
            <?php include('include/footer.php') ?>


            <!-- footer here -->
        </div>
    </main>

    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>


</body>

</html>