<div class="cart-parent-div">
    <div class="cart-overly-div"></div>
    <div class="multivendor-cart-div">
        <a href="javascript:void(0)" class="close-cart-btn">
            <span class="material-symbols-outlined">
                close
            </span>
        </a>

        <div class="col-12 p-0" id="the_cart_wrapper">
        <?php
        if (isset($_COOKIE['cart__data'])) {
            $totalVal = 0;
            $cookiee_data = json_decode($_COOKIE['cart__data'], true);
            if (count($cookiee_data) > 0) {
                foreach ($cookiee_data as $key => $value) {
                    $price_varr = '';
                    if (!empty($value['salePrice'])) {
                        $price_varr = $value['salePrice'];
                    } else {
                        $price_varr = $value['price'];
                    }
                    $totalVal += (intval($value['quantity']) *  intval($price_varr));
        ?>
                    <div class="col-12 cart-item d-flex flex-wrap align-items-start">
                        <div class="col-3 cart-item-img overflow-hidden d-flex align-items-center">
                            <img src="images/uploadimg/<?= !empty($value['image']) ? $value['image'] : 'down.webp' ?>" alt="">
                        </div>
                        <div class="col-9 cart-item-content d-flex flex-column gap-1">
                            <h6 class="c-item-title"><?php echo $value['name'];
                                                        if (is_array($value['options']) && count($value['options']) > 0) {
                                                            echo '-';
                                                            $options_arrr = [];
                                                            $strr = '';
                                                            $optss = $value['options'];
                                                            foreach ($optss as $optss_key => $optss_value) {
                                                                $options_arrr[] =  $optss_value['optname'] . ' : ' . $optss_value['optValue'];
                                                            }
                                                            echo join(' - ', $options_arrr);
                                                        }

                                                        ?>

                            </h6>
                            <p class="c-item-title m-0"><?= $value['itemType'] ?></p>
                            <div class="col-12 price-div d-flex align-items-center justify-content-between">
                                <div class="quantity-div">
                                    <span class="item-q"><?= $value['quantity'] ?></span> x <span class="item-sing-price"><?= $price_varr ?>pkr</span>
                                </div>
                                <span class="multipled-price"><?php

                                                                $c__val_01 = intval($value['quantity']);
                                                                $c__val_02 = $price_varr;
                                                                $calcule_val = $c__val_01 * $c__val_02;
                                                                echo $calcule_val;
                                                                ?>pkr</span>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="remove-item" data-remove-id='<?= $value['id'] ?>'><i class="fa-solid fa-xmark"></i></a>
                    </div>
            <?php
                }
            }
            ?>

            <div class="col-12 sub-total-div d-flex justify-content-between">
                <span class="subtotal-label">Subtotal</span>
                <span class="subtotal-label"><?= $totalVal ?>pkr</span>
            </div>
            <div class="col-12 cart-btn-div d-flex flex-column gap-2 mt-4">
                <a href="cart.php" class="cart-action-btn w-100">View Cart</a>
                <a href="checkout.php" class="cart-action-btn w-100">CheckOUT</a>
            </div>
        <?php
        } else {
        ?>
            <div class="cart-empty-box col-12">
                <div class="col-12 vector-bg-div"></div>
                <p class="cart-message-p">Add items to your cart for shopping</p>
            </div>
        <?php
        }
        ?>
        </div>


        <!-- <div class="col-12 cart-item d-flex flex-wrap align-items-start">
            <div class="col-3 cart-item-img overflow-hidden d-flex align-items-center">
                <img src="images/uploadimg/down.webp" alt="">
            </div>
            <div class="col-9 cart-item-content d-flex flex-column gap-1">
                <h6 class="c-item-title">item title starts here</h6>
                <p class="c-item-title m-0">product</p>
                <div class="col-12 price-div d-flex align-items-center justify-content-between">
                    <div class="quantity-div">
                        <span class="item-q">1</span> x <span class="item-sing-price">$985</span>
                    </div>
                    <span class="multipled-price">$8437548</span>
                </div>
            </div>
        </div>
        <div class="col-12 sub-total-div d-flex justify-content-between">
            <span class="subtotal-label">Subtotal</span>
            <span class="subtotal-label">$987585</span>
        </div>
        <div class="col-12 cart-btn-div d-flex flex-column gap-2 mt-4">
            <a href="cart.php" class="cart-action-btn w-100">View Cart</a>
            <a href="checkout.php" class="cart-action-btn w-100">CheckOUT</a>
        </div> -->
    </div>
    <div class="cart-row col-12 d-flex">

    </div>
</div>