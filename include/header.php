<header>
    <div class="container-fluid bg">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 col-md-9 col-sm-9 p-0 top">
            <!-- <a href="#">Get 50% Off On Selected Items</a> -->
            <p class="px-2"><i class="fa-solid fa-phone"></i> +92 312 3456789</p>
            <p class="px-2"><i class="fa-regular fa-envelope"></i> company@gmail.com</p>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 p-0">
            <!-- Translation Code here -->
            <span class="d-flex justify-content-center db">
              <i class="fa-solid fa-earth-americas px-1 ico"></i>
              <div class="translate" id="google_translate_element"></div>
              <script type="text/javascript">
                function googleTranslateElementInit() {
                  new google.translate.TranslateElement({
                      defaultLanguage: "en",
                      pageLanguage: "en",
                      includedLanguages: "en,ur,sd",
                      layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                      autoDisplay: false,
                    },
                    "google_translate_element"
                  );
                }
              </script>
              <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </span>
            <!-- Translation Code End here -->
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-3 col-md-6 col-sm-6 p-0 top">
            <a href="index.php"><img src="assets/bootstrap/img/logo.webp" alt="site-logo" width="100%" /></a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 p-0">
            <form action="" method="post" class="d-flex justify-content-center py-3">
              <div class="searchBar">
                <input class="searchQueryInput" type="text" name="" placeholder="Search" />
                <button class="searchQuerySubmit" type="submit" name="">
                  <i class="fa-solid fa-magnifying-glass text-light"></i>
                </button>
              </div>
            </form>
          </div>
          <div class="col-lg-3 col-md-12 col-sm-12 p-0">
            <div class="sig text-center">
              <ul>
                <?php
                if (isset($_SESSION['user_email'])) {
                ?>
                  <li>
                    <a href="#"><i class="fa-solid fa-circle-user bc"></i> <?= $user__name ?></a>
                  </li>
                <?php
                } else {
                ?>
                  <li>
                    <a href="sign-in.php"><i class="fa-solid fa-circle-user bc"></i> Sign in</a>
                  </li>
                  <li>
                  <a href="sign-up.php"><i class="fa-solid fa-circle-user bc"></i> Sign up</a>
                </li>
                <?php
                }
                ?>
                <li>
                  <a href="javascript:void(0)" id="multivendor-cart"><i class="fa-solid fa-cart-shopping bc"></i>
                    <?php
                    $num__items = 0;
                    if (isset($_COOKIE['cart__data'])) {
                      $cook__d = json_decode($_COOKIE['cart__data'], true);
                      $num__items = count($cook__d);
                    }
                    ?>
                    Cart
                    <sup class="counter_sup"><?= $num__items ?></sup>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid nav-bg">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <ul class="m-0 btn btn-primary dec" style="background: #ff9801">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu drop" aria-labelledby="navbarDropdown">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Action</a></li>
                </ul>
              </li>
            </ul>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fix" id="navbarSupportedContent">
              <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="my-services.php">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="blog.php">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
</header>
