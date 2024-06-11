<?php
session_start();
?>


<?php
if(isset($_GET['remove_all'])){
    if($_GET['remove_all'] == 'true'){
        setcookie('cart__data','[]',time() - (30 * 86400),'/');
        ?>
            <script>
                alert('successfully delete all cart items');
                window.location.href='cart.php';
            </script>
        <?php
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=divice-width, initial-scale=1" />
    <title> Cart</title>
    <?php include('include/links.php'); ?>
    <link rel="stylesheet" href="assets/css/single-product-page.css">
    <link rel="stylesheet" href="assets/css/cart.css">
</head>

<body>
    <?php include('include/header.php'); ?>

    <div class="container-fluid cart-breadcrumbs cart-bg-div">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center cart-crumbs"><a href="index.php">home</a> > <a href="">cart</a></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid cart-main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 cart-main-div position-relative">
                    <div class="cart-load-div"></div>
                    <div class="cart-head-div d-flex">
                        <div class="cart-head">Image</div>
                        <div class="cart-head title-box">Product</div>
                        <div class="cart-head">Price</div>
                        <div class="cart-head">Quantity</div>
                        <div class="cart-head">Subtotal</div>
                    </div>
                    <div class="w-100" id="cart-row-wrapper">
                        <?php
                        $subtotal = 0;
                        if (isset($_COOKIE['cart__data'])) {

                            $cookie__data__array = json_decode($_COOKIE['cart__data'], true);
                            $price__var = '';
                            foreach ($cookie__data__array as $c__key => $c__value) {
                                if ($c__value['salePrice']) {
                                    $price__var = $c__value['salePrice'];
                                } else {
                                    $price__var = $c__value['price'];
                                }

                                $subtotal += 0 + (intval($c__value['quantity']) * intval($price__var));
                        ?>

                                <div class="cart-row d-flex position-relative">
                                    <div class="cart-boxes"><img src="images/uploadimg/<?= $c__value['image'] ?>" class="cart-img" alt=""></div>
                                    <div class="cart-boxes title-box"><?= $c__value['name'] ?></div>
                                    <div class="cart-boxes">
                                        <?= $price__var   ?>pkr

                                    </div>
                                    <div class="cart-boxes justify-content-between">
                                        <a href="javascript:void(0)" class="dec_num" data-item-id='<?= $c__value['id'] ?>'><i class="fa-solid fa-minus"></i></a>
                                        <span class="quantity_num"><?= $c__value['quantity'] ?></span>
                                        <a href="javascript:void(0)" class="inc_num" data-item-id='<?= $c__value['id'] ?>'><i class="fa-solid fa-plus"></i></a>
                                    </div>
                                    <div class="cart-boxes justify-content-center subtotal-bx"> <?= intval($c__value['quantity']) * $price__var  ?>pkr</div>
                                    <a href="javascript:void(0)" class="remove-cart-item" data-item-id=<?= $c__value['id'] ?>><i class="fa-solid fa-xmark"></i></a>
                                </div>
                            <?php } ?>

                            <div class="col-12 d-flex justify-content-end py-4">
                                <a href="?remove_all=true" class="remove_all_btn">Remove All</a>
                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="col-12 vector-bg-div"></div>
                            <p class="cart-message-p">Add items to your cart for shopping</p>
                        <?php
                        }
                        ?>
                    </div>


                </div>
                <div class="col-lg-4 cart-items-div p-2">
                    <div class="cart-total-div col-12">
                        <h2>CART TOTALS</h2>
                        <div class="cart-item-row col-12 d-flex justify-content-between align-items-center">
                            Subtotal
                            <span class="totals-detail sb-t"><?= $subtotal ?>pkr</span>
                        </div>
                        <div class="cart-item-row col-12 d-flex justify-content-between align-items-center">
                            Shipping
                            <span class="totals-detail">-</span>
                        </div>
                        <div class="cart-item-row col-12 d-flex justify-content-between align-items-center">
                            Tax
                            <span class="totals-detail">-</span>
                        </div>
                        <div class="cart-item-row col-12 d-flex justify-content-between align-items-center">
                            Total
                            <span class="totals-detail sb-t"><?= $subtotal ?>pkr</span>
                        </div>
                        <div class="col-12 checkout-btn-div mt-2">
                            <a href="checkout.php" class="checkout-btn">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="multiVendor-toast" class="m-toast"></div>

    <?php include('include/footer.php'); ?>
    <?php include('include/cartsection.php'); ?>
    <?php include('include/script.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="assets/js/index.js"></script>
    <script src="assets/js/cart-checkout.js"></script>


</body>

</html>