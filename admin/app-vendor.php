<?php
session_start();
if (!isset($_SESSION['email'])) {
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

    <?php
    require __DIR__ . '/../vendor/autoload.php';

    include('include/links.php');



    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'incredibleinfo333@gmail.com';
    $mail->Password = 'jvza qobx oqyu uehp';
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $qry = mysqli_query($con, "SELECT * FROM `vendor` WHERE `approved` = '0'");
    $count = mysqli_num_rows($qry);

    ?>
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
                <div class="col-12 d-flex justify-content-between p-2 brd__crumbs">
                    <h3 class="page-head">Vendors-list</h3>
                    <h6 class="brd-crumbs brd-crumbs-active"><a href="index.php">Dashboard</a>/<a href="">vendors-list</a></h6>
                </div>



                <!-- filter options -->
                <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4 other-type-filter">
                    <div class="filter-inp-div">
                        <label for="">Action**</label>
                        <select name="" id="" class="product-sort w-100">
                            <option value="">Action</option>
                            <option value="">Move to trash</option>
                            <option value="">Delete permenantly</option>
                            <option value="">Approve </option>
                        </select>
                    </div>

                    <div class="filter-inp-div">
                        <label for="">search**</label>
                        <input type="text" placeholder="search category" class="search-products w-100">
                    </div>

                </div>

                <div class="col-12 table-responsive product-wrapper">
                    <table class=" product-table w-100">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="" id=""></th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        sno

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        name
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        email

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        phone

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        C.N.I.C

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        Business Name

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        Country

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        City

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        zipcode

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        address

                                    </div>
                                </th>


                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $status = '0';
                            $result_count = '';
                            $data = mysqli_prepare($con, "SELECT * FROM `vendor` WHERE `approved` = ? ORDER BY `Id` DESC LIMIT $limit OFFSET $offset");
                            mysqli_stmt_bind_param($data, 's', $status);
                            if (mysqli_stmt_execute($data)) {
                                $result = mysqli_stmt_get_result($data);
                                $result_count = mysqli_num_rows($result);
                                if (mysqli_num_rows($result) > 0) {
                                    $sno = 0;
                                    while ($sh = mysqli_fetch_assoc($result)) {
                                        $sno++;
                            ?>
                                        <tr class="<?= $sh['viewed'] == '0' ? 'un-viewed' : '' ?>">
                                            <td><input type="checkbox" name="vendorId[]" id=""></td>
                                            <td><?= $sno; ?></td>
                                            <td><?= $sh['name'] ?></td>
                                            <td><?= $sh['email'] ?></td>
                                            <td><?= $sh['phone'] ?></td>
                                            <td><?= $sh['cnic'] ?></td>
                                            <td><?= $sh['business'] ?></td>
                                            <td>
                                                <?php $country = fetchOtherdetails($con, 'country', 'Id', $sh['country']);
                                                echo mysqli_fetch_assoc($country)['country'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php $country = fetchOtherdetails($con, 'city', 'Id', $sh['city']);
                                                echo mysqli_fetch_assoc($country)['name'];
                                                ?>
                                            </td>
                                            <td><?= $sh['zipcode'] ?></td>
                                            <td><?= $sh['address'] ?></td>
                                            <td>

                                                <a href="?page=<?= $page ?>&approve_id=<?= base64_encode($sh['Id']) ?>" class="approve-btn">approve</a>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="100">no data is present</td>

                                    </tr>

                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>






                <!-- pagination and information -->
                <?php
                $totalPage = ceil($count / $limit);
                $startNo = 1 + $offset;
                $rangeNo = min(($page * $limit), $count);
                if ($result_count != 0) {
                ?>
                    <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                        <div class="col-lg-4 col-md-6 col-sm-12 pagination-message">
                            <?php

                            ?>
                            showing ( <span class="show-product-num"><?= $startNo ?></span> to <span class="total-product-num"><?= $rangeNo; ?></span> products )
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 cus-pagination d-flex justify-content-end">
                            <div class="page-num-wrapper d-flex gap-2">
                                <?php
                                if ($page > 1) {
                                ?>
                                    <a href="?page=<?= $page - 1 ?>" class="page-btn page-prev">
                                        <span class="material-symbols-outlined">
                                            arrow_back
                                        </span>
                                    </a>
                                <?php
                                }
                                if ($page > 2) {
                                ?> <a href="?page=1" class="page-btn">1</a> <?php
                                                                            if ($page > 3) {   ?>
                                        <a href="javascript:void(0)" class="page-btn page-dots">
                                            <span class="material-symbols-outlined">
                                                page_control
                                            </span>
                                        </a>
                                    <?php
                                                                            }
                                                                        }

                                                                        for ($i = $page - 1; $i <= $page + 1; $i++) {
                                                                            if ($i < 1) {
                                                                                continue;
                                                                            }
                                                                            if ($i > $totalPage) {
                                                                                continue;
                                                                            }
                                    ?> <a href="?page=<?= $i ?>
                                " class="page-btn <?php echo $page == $i ?  'active-page' : '' ?> "><?= $i ?></a> <?php

                                                                                                                }
                                                                                                                    ?>


                                <?php
                                if ($page < $totalPage - 1) {
                                    if ($page < $totalPage - 2) {
                                ?>
                                        <a href="javascript:void(0)" class="page-btn page-dots">
                                            <span class="material-symbols-outlined">
                                                page_control
                                            </span>
                                        </a>
                                    <?Php
                                    }
                                    ?> <a href="?page=<?= $totalPage ?>" class="page-btn"><?= $totalPage ?></a> <?php
                                                                                                            }


                                                                                                            if ($page < $totalPage) {
                                                                                                                ?>
                                    <a href="?page=<?= $page + 1 ?>" class="page-btn page-next">
                                        <span class="material-symbols-outlined">
                                            arrow_forward
                                        </span>
                                    </a>
                                <?php
                                                                                                            }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>



            <?php include('include/footer.php') ?>


            <!-- footer here -->
        </div>
    </main>

    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>
    <script src="../assets/js/product.js"></script>

    <!-- approve code here -->

    <?php
    if (isset($_GET['approve_id'])) {
        $date = date('d-m-Y');
        $sts = '1';
        $id = base64_decode($_GET['approve_id']);
        $qry = mysqli_prepare($con, "UPDATE `vendor` SET `approved` = ? , `date` = ? WHERE `Id` = ?");
        mysqli_stmt_bind_param($qry, 'sss', $sts, $date, $id);
        if (mysqli_stmt_execute($qry)) {
            $vendor__data = fetchOtherdetails($con, 'vendor', 'Id', $id);
            while ($vnd_data = mysqli_fetch_assoc($vendor__data)) {
                $vn__name = $vnd_data['name'];
                $vn__email = $vnd_data['email'];
            }


            $mail->setFrom('incredibleinfo333@gmail.com', 'Multivendor');
            $mail->addAddress($vn__email, $vn__name);
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
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Congratulations! Your account is approved</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Dear " . $vn__name . " ,</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Congratulations you are now community member.</span><br>

            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Before you can start using our platform, your registration needs to be approved by our admin team. This process typically takes 2-4 hours. We'll notify you via email once your account is approved and ready for use.</span><br>
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>A friendly reminder: please refrain from sharing your email and password with anyone. Keeping your account information confidential helps ensure the security of your account and protects your privacy.
            <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>
            Once again, thank you for choosing our platform. We're excited to see the value you'll bring to our community!<br>
            Best regards,</span><br>
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
                $url = 'app-vendor.php?page=' . $page;
                alerting('successfully send the data', $url);
            } else {
                alerting('failed to send the data', $url);
            }
        } else {
    ?>
            <script>
                alert('something went wrong');
                window.location.href = 'app-vendor.php';
            </script>
    <?php
        }
    }

    ?>

</body>

</html>