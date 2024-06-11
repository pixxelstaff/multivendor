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
    <?php include('include/links.php');

    require __DIR__ . '/../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer(true);

    ?>

    <!-- cdn for datatables -->
    <?php
    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    ?>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300  position-absolute w-100 overlay-div"></div>
    <?php include('include/sidebar.php') ?>



    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <?php include('include/navbar.php');
        if (isset($_GET['type']) && $_GET['type'] == 'disapprove') {
            $un_app = '-2';
        } else {
            $un_app = '0';
        }
        $trash_status = '-1';
        $fetch_unapprove_service  = mysqli_prepare($con, "SELECT * FROM `service` WHERE `status` = ? AND `trash` != ?");
        mysqli_stmt_bind_param($fetch_unapprove_service, 'ss', $un_app, $trash_status);
        if (mysqli_stmt_execute($fetch_unapprove_service)) {

            $count_qry  = mysqli_stmt_get_result($fetch_unapprove_service);
        }

        $count = mysqli_num_rows($count_qry);
        ?>
        <!-- End Navbar -->
        <div class="container-fluid p-4">
            <form action="" method="post" id="act-form">
                <div class="col-12 p-2 rounded bg-white">
                    <div class="col-12 d-flex justify-content-between p-2 brd__crumbs">
                        <h3 class="page-head">service-List</h3>
                        <h6 class="brd-crumbs"><a href="index.php">Dashboard</a>/<a href="">service</a></h6>
                    </div>
                    <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4 other-type-filter">
                        <div class="filter-inp-div">
                            <label for="">Action**</label>
                            <select name="action_select" class="product-sort w-100" id='act-select'>
                                <option value="">Action</option>
                                <option value="-1">Move to trash</option>
                                <option value="11">Approve</option>
                            </select>
                            <input type="hidden" name="sub_data" value="sub">
                        </div>

                        <div class="filter-inp-div">
                            <label for="">search**</label>
                            <input type="text" placeholder="search category" class="search-products w-100">
                        </div>

                    </div>
                    <div class="service-states-div col-12 p-2">
                        <?php
                        $stss = !isset($_GET['type']) ? '-2' : '0';
                        $label = !isset($_GET['type']) ? 'non-approved' : 'un-approve';
                        $dis_appr_qry = mysqli_prepare($con, "SELECT * FROM `service` WHERE `status` = ? AND `trash` != ?");
                        mysqli_stmt_bind_param($dis_appr_qry, 'ss', $stss, $trash_status);
                        if (mysqli_stmt_execute($dis_appr_qry)) {
                            $res = mysqli_stmt_get_result($dis_appr_qry);
                            // if (mysqli_num_rows($res) > 0) {
                        ?>
                            <a href="approve-services.php<?= isset($_GET['type']) ? '' : '?type=disapprove' ?>" class="approve-btn bg-danger d-inline-block"><?= $label ?> ( <?= mysqli_num_rows($res) ?> )</a>
                        <?php
                        }
                        // }
                        ?>


                    </div>
                    <?php
                    $showservice = "SELECT * FROM `service` WHERE `status` = ? AND `trash` != ?  ORDER BY `Id` DESC LIMIT $limit OFFSET $offset";
                    $showservice__prepare = mysqli_prepare($con, $showservice);
                    mysqli_stmt_bind_param($showservice__prepare, 'ss', $un_app, $trash_status);
                    if (mysqli_stmt_execute($showservice__prepare)) {
                        $p__result = mysqli_stmt_get_result($showservice__prepare);
                        $res_count = mysqli_num_rows($p__result);



                    ?>
                        <div class="col-12 table-responsive product-wrapper">
                            <table class=" product-table w-100">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id="all_check"></th>
                                        <th>sno</th>
                                        <th>image</th>
                                        <th> Name</th>
                                        <th> vendor</th>
                                        <th>Category</th>
                                        <th> Price</th>
                                        <th> services</th>
                                        <th> status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $serialNo = 0 + $offset;
                                    while ($sh = mysqli_fetch_assoc($p__result)) {
                                        $serialNo++;
                                    ?>
                                        <tr class="<?= $sh['viewed'] == '0' ? 'un-viewed' : '' ?>">
                                            <td><input type="checkbox" class="mini-checkbox" name="serviceId[]" value="<?= $sh['Id'] ?>"></td>
                                            <td><?= $serialNo; ?></td>
                                            <td>
                                                <img src="../images/uploadimg/<?= !empty($sh['featured_image']) ? $sh['featured_image'] : 'down.webp' ?>" class="product-td-img" alt="image here">
                                            </td>
                                            <td><?= substr(dec_function($sh['name']), 0, 15) ?></td>
                                            <td> <?php
                                                    if ($sh['user_id'] != 0) {
                                                        $ser__vendor = fetchOtherdetails($con, 'vendor', 'Id', $sh['user_id']);
                                                        if (mysqli_num_rows($ser__vendor) > 0) {
                                                            echo mysqli_fetch_assoc($ser__vendor)['name'];
                                                        } else {
                                                            echo "data not found";
                                                        }
                                                    } else {
                                                        echo "Admin";
                                                    }

                                                    ?></td>
                                            <td>
                                                <?php
                                                if (!empty($sh['category'])) {
                                                    $ser__cat = fetchOtherdetails($con, 'service_category', 'Id', $sh['category']);
                                                    echo mysqli_fetch_assoc($ser__cat)['name'];
                                                } else {
                                                    echo "uncategorized";
                                                }

                                                ?></td>
                                            <td>
                                                <?php
                                                if (!empty($sh['sale_price'])) {
                                                ?>
                                                    <span class="table-sell-price"><?= $sh['price'] ?></span> <?= $sh['sale_price'] ?>
                                                <?php
                                                } else {
                                                    echo  $sh['price'];
                                                }
                                                ?>

                                            </td>
                                            <td>

                                                <?php
                                                $service = json_decode($sh['services_data'], true);
                                                $service_name = '';
                                                foreach ($service as $value) {
                                                    $service_name .= $value['name'] . ',';
                                                }
                                                echo trim(substr(dec_function($service_name), 0, 15), ',');

                                                ?>

                                            </td>
                                            <td><?= $sh['status'] == '0' ? 'un-approve' : 'dis-approved'  ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a class="approve-btn" href="approve-services.php?page=<?= $page ?>&approve=<?= base64_encode($sh['Id'])  ?>">approve</a>
                                                    <?php
                                                    if (!isset($_GET['type'])) {
                                                    ?>
                                                        <a class="approve-btn bg-danger" href="approve-services.php?page=<?= $page ?>&disapprove=<?= base64_encode($sh['Id'])  ?>">disapprove</a>
                                                    <?php
                                                    }

                                                    ?>



                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    <?php
                    }

                    //execute the statement

                    ?>

                    <!-- grid view column -->


                    <!-- pagination and information -->
                    <?php
                    $totalPage = ceil($count / $limit);
                    if ($page > $totalPage && $totalPage > 1) {
                    ?>
                        <script>
                            window.location.href = 'approve-services.php?page=<?= $totalPage  ?>'
                        </script>
                    <?php
                    }
                    $startNo = 1 + $offset;
                    $rangeNo = min(($page * $limit), $count);
                    ?>
                    <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                        <div class="col-lg-4 col-md-6 col-sm-12 pagination-message">
                            showing ( <span class="show-product-num"><?= $startNo ?></span> to <span class="total-product-num"><?= $rangeNo; ?></span> service )
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 cus-pagination d-flex justify-content-end">
                            <div class="page-num-wrapper d-flex gap-2">
                                <?php
                                if ($page > 1) {
                                ?>
                                    <a href="?page=<?= $page - 1 ?><?= (isset($_GET['type']) ? "&type=" . $_GET['type'] : '') ?>" class="page-btn page-prev">
                                        <span class="material-symbols-outlined">
                                            arrow_back
                                        </span>
                                    </a>
                                <?php
                                }
                                if ($page > 2) {
                                ?> <a href="?page=1<?= (isset($_GET['type']) ? "&type=" . $_GET['type'] : '') ?>" class="page-btn">1</a> <?php
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
                                    ?> <a href="?page=<?= $i ?><?= (isset($_GET['type']) ? "&type=" . $_GET['type'] : '') ?>
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
                                    ?> <a href="?page=<?= $totalPage ?><?= (isset($_GET['type']) ? "&type=" . $_GET['type'] : '') ?>" class="page-btn"><?= $totalPage ?></a> <?php
                                                                                                                                                                            }


                                                                                                                                                                            if ($page < $totalPage) {
                                                                                                                                                                                ?>
                                    <a href="?page=<?= $page + 1 ?><?= (isset($_GET['type']) ? "&type=" . $_GET['type'] : '') ?>" class="page-btn page-next">
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
                </div>
            </form>



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
            <a href="approve-services.php?page=<?= $page ?>" class="close-btn" id="pop-close-btn">
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

    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>
    <script src="../assets/js/product.js"></script>
    <script src="../assets/js/action.js"></script>

</body>

</html>

<?php

if (isset($_GET['approve'])) {
    $app = '1';
    $viewed = '0';
    $approve_id = base64_decode($_GET['approve']);
    $fetch_result = fetchOtherdetails($con, 'service', 'Id', $approve_id);
    if (mysqli_num_rows($fetch_result) > 0) {
        $approve_service =  mysqli_prepare($con, "UPDATE `service` SET `status` = ?,`viewed` = ? WHERE `Id` = ?");
        mysqli_stmt_bind_param($approve_service, 'sss', $app, $viewed, $approve_id);
        if (mysqli_stmt_execute($approve_service)) {
?>
            <script>
                window.location.href = 'approve-services.php?page=<?= $page ?>&pop=success&msg=<?= base64_encode('the service is successfully approved') ?>';
            </script>
            <?php
        }
    } else {
        alerting("invalid id", "approve-services.php?page=" . $page);
    }
}
if (isset($_GET['disapprove'])) {
    $app = '-2';
    $viewed = '0';
    $dis_approve_id = base64_decode($_GET['disapprove']);
    $fetch_result = fetchOtherdetails($con, 'service', 'Id', $dis_approve_id);
    if (mysqli_num_rows($fetch_result) > 0) {
        while ($detail = mysqli_fetch_assoc($fetch_result)) {
            $title = $detail['name'];
            $vendor = $detail['user_id'];
        }
        //fetch vendor data
        $v__data = fetchOtherdetails($con, 'vendor', 'Id', $vendor);
        while ($sh = mysqli_fetch_assoc($v__data)) {
            $v__name = $sh['name'];
            $v__email = $sh['email'];
        }
        $subject = "Disapproval of your service" . $title;

        // HTML content
        $content = "
           <!DOCTYPE html>
           <html lang='en'>
           <head>
           <meta charset='UTF-8'>
           <meta name='viewport' content='width=device-width, initial-scale=1.0'>
           <title>disapprove notification</title>
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
                       <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Dear " . $v__name . "</span><br>
                       <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> I hope this message finds you well.</span><br>
                       <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> your service " . $title . " has been disapproved</span><br>
        
                       <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> After thorough consideration and review of the services provided by [Service Provider's Company Name], we regret to inform you that we have decided to disapprove and discontinue the services effective [End Date].</span><br>
                       <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'> Our decision is based on the following points:</span><br>
                       <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>1: Detailed explanation of the first reason, such as quality issues, unmet expectations, or specific incidents.<br>
                       2: Detailed explanation of the second reason, such as lack of communication, delays, or cost concerns.<br>
                       3: Additional reasons, if applicable</span><br>
                       <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>While we acknowledge the efforts and resources you have dedicated to our partnership, these concerns have led us to the conclusion that it is in our best interest to terminate the current agreement.</span><br>
                       <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>We wish you and your team all the best in your future endeavors.<br>Sincerely,.</span><br>
                       <span style='display: inline-block;padding:10px 0px;font-size:14px;color:#000;'>Multivendor team .</span><br>                      
                   </td>
               </tr>
           </tbody>
           </table>
           
           </body>
           </html>";






        MailFunc($mail, $v__email, $v__name, $subject, $content);
        $approve_service =  mysqli_prepare($con, "UPDATE `service` SET `status` = ?,`viewed` = ? WHERE `Id` = ?");
        mysqli_stmt_bind_param($approve_service, 'sss', $app, $viewed, $dis_approve_id);
        if (mysqli_stmt_execute($approve_service)) {
            if ($mail->send()) {
            ?>
                <script>
                    window.location.href = 'approve-services.php?page=<?= $page ?>&pop=success&msg=<?= base64_encode('the service is denied successfully and vendor is also notified with email') ?>';
                </script>
        <?php

            } else {
                alerting("service denied", "approve-services.php?page=" . $page);
            }
        }
    } else {
        alerting("invalid id", "approve-services.php?page=" . $page);
    }
}

if (isset($_GET['pop'])) {

    if ($_GET['pop'] == "success") {


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


// trash // multiapprove


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sub_data'])) {
        $error = '';
        if (!empty($_POST['action_select']) && !empty($_POST['serviceId'])) {
            $service_ids = $_POST['serviceId'];
            if (is_array($service_ids)) {

                foreach ($service_ids as $sng__service_id) {
                    $serviceData = fetchOtherdetails($con, 'service', 'Id', $sng__service_id);
                    if (mysqli_num_rows($serviceData) > 0) {

                        //ten items
                        if ($_POST['action_select'] == '-1') {
                            $trash_service = mysqli_prepare($con, "UPDATE `service` SET `trash` = ? WHERE `Id` = ? ");
                            mysqli_stmt_bind_param($trash_service, 'ss', $trash_status, $sng__service_id);
                            if (mysqli_stmt_execute($trash_service)) {
                                $suc__msg = 'successfully trash the unapprove service';
                            } else {
                                $suc__msg = '';
                                $error = 'something went wrong';
                            };
                        } elseif ($_POST['action_select'] == '11') {
                            $appr = '1';
                            $appr_service = mysqli_prepare($con, "UPDATE `service` SET `status` = ? WHERE `Id` = ? ");
                            mysqli_stmt_bind_param($appr_service, 'ss', $appr, $sng__service_id);
                            if (mysqli_stmt_execute($appr_service)) {
                                $suc__msg = 'successfully approve the services';
                            } else {
                                $suc__msg = '';
                                $error = 'something went wrong';
                            };
                        }
                    } else {
                    }
                }
            } else {
                alerting('something went wrong', 'approve-services.php?page=' . $page . (isset($_GET['type']) ? "&type=" . $_GET['type'] : ''));
            }
        } else {
            alerting('please select at least one service', 'approve-services.php?page=' . $page . (isset($_GET['type']) ? "&type=" . $_GET['type'] : ''));
        }
    } else {
        alerting('something went wrong', 'approve-services.php?page=' . $page . (isset($_GET['type']) ? "&type=" . $_GET['type'] : ''));
    }
}

if (!empty($suc__msg)) {
    alerting($suc__msg, 'approve-services.php?page=' . $page . (isset($_GET['type']) ? "&type=" . $_GET['type'] : ''));
} elseif (!empty($error)) {
    alerting($error, 'approve-services.php?page=' . $page . (isset($_GET['type']) ? "&type=" . $_GET['type'] : ''));
}


?>