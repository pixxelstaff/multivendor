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
                <h2 class="dash-head">Approve Vendors</h2>
                <div class="col-12 vd-list">
                    <table id="vendor-list" class="display vd-list-table approve-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>sno</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>
                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="d-flex gap-3 align-items-center">
                                    James potter
                                </td>
                                <td>System@gmail.com</td>
                                <td>+44 2763263723</td>
                                <td>york</td>
                                <td>England</td>
                                <td class="status-td"> <span class="pending">pending</span>

                                <td> <img src="../images/dashboard-img/vendor-img.jpg" class="vendor-img" alt="">
                                </td>
                                </td>
                                <td>
                                    <div class="w-100 d-flex gap-2">
                                        <a href="javascript:void(0)" class="act-btn view bg-dark" id="view-profile"><i class="fa-solid fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="act-btn edit bg-success approve-vendor"><i class="fa-solid fa-check"></i></a>
                                        <a href="javascript:void(0)" class="act-btn delete bg-danger" id="delete-profile"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>




                        </tbody>
                    </table>

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