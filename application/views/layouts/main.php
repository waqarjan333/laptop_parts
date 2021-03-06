<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>E&E - Electronics eCommerce Bootstrap4 HTML Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/images/favicon.ico">

  <!-- CSS
	============================================ -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

  <!-- Icon Font CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/icon-font.min.css">

  <!-- Plugins CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/plugins.css">

  <!-- Main Style CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/hover.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.min.css">

  <!-- Modernizer JS -->
  <script src="<?=base_url()?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

  <!-- Header Section Start -->
  <div class="header-section section">

    <!-- Header Top Start -->
    <div class="header-top header-top-one header-top-border pt-10 pb-10">
      <div class="container">
        <div class="row align-items-center justify-content-between">

          <div class="col mt-10 mb-10">
            <!-- Header Links Start -->
            <div class="header-links">
              <a href="track-order.html"><img src="<?=base_url()?>assets/images/icons/car.png" alt="Car Icon"> <span>Track your order</span></a>
              <a href="store.html"><img src="<?=base_url()?>assets/images/icons/marker.png" alt="Car Icon"> <span>Locate Store</span></a>
            </div><!-- Header Links End -->
          </div>

          <div class="col order-12 order-xs-12 order-lg-2 mt-10 mb-10">
            <!-- Header Advance Search Start -->
            <div class="header-advance-search">

              <form action="#">
                <div class="input"><input type="text" placeholder="Search your product"></div>
                <div class="select">
                  <select class="nice-select">
                    <option>All Categories</option>
                    <option>Mobile</option>
                    <option>Computer</option>
                    <option>Laptop</option>
                    <option>Camera</option>
                  </select>
                </div>
                <div class="submit"><button><i class="icofont icofont-search-alt-1"></i></button></div>
              </form>

            </div><!-- Header Advance Search End -->
          </div>

          <div class="col order-2 order-xs-2 order-lg-12 mt-10 mb-10">
            <!-- Header Account Links Start -->
            <div class="header-account-links">
              <a href="register.html"><i class="icofont icofont-user-alt-7"></i> <span>my account</span></a>
              <a href="login.html"><i class="icofont icofont-login d-none"></i> <span>Login</span></a>
            </div><!-- Header Account Links End -->
          </div>

        </div>
      </div>
    </div><!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="header-bottom header-bottom-one header-sticky">
      <div class="container">
        <div class="row align-items-center justify-content-between">

          <div class="col mt-15 mb-15">
            <!-- Logo Start -->
            <div class="header-logo">
              <a href="index.html">
                <img src="<?=base_url()?>assets/images/logo.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                <img class="theme-dark" src="<?=base_url()?>assets/images/logo-light.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
              </a>
            </div><!-- Logo End -->
          </div>

          <div class="col order-12 order-lg-2 order-xl-2 d-none d-lg-block">
            <!-- Main Menu Start -->
            <div class="main-menu">
              <nav>
                <ul>
                  <li class="active"><a href="<?=base_url()?>">HOME</a></li>
                  <li ><a href="<?=base_url('part/search_part')?>">Brows Laptop Parts</a></li>
                  <li ><a href="<?=base_url()?>">Parts Request</a></li> 
                   
                  <!-- <li class="menu-item-has-children"><a href="#">PAGES</a>
                    <ul class="mega-menu three-column">
                      <li><a href="#">Column One</a>
                        <ul>
                          <li><a href="about-us.html">About us</a></li>
                          <li><a href="best-deals.html">Best Deals</a></li>
                          <li><a href="cart.html">Cart</a></li>
                          <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Column Two</a>
                        <ul>
                          <li><a href="compare.html">Compare</a></li>
                          <li><a href="faq.html">Faq</a></li>
                          <li><a href="feature.html">Feature</a></li>
                          <li><a href="login.html">Login</a></li>
                          <li><a href="register.html">Register</a></li>
                          <li><a href="store.html">Store</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Column Three</a>
                        <ul>
                          <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                          <li><a href="track-order.html">Track Order</a></li>
                          <li><a href="wishlist.html">Wishlist</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li> -->
                  <!-- <li class="menu-item-has-children"><a href="blog-1-column-left-sidebar.html">BLOG</a>
                    <ul class="sub-menu">
                      <li><a href="blog-1-column-left-sidebar.html">Blog 1 Column Left Sidebar</a></li>
                      <li><a href="single-blog-left-sidebar.html">Single Blog Left Sidebar</a></li>
                    </ul>
                  </li> -->
                  <li><a href="contact.html">CONTACT</a></li>
                </ul>
              </nav>
            </div><!-- Main Menu End -->
          </div>

          <div class="col order-2 order-lg-12 order-xl-12">
            <!-- Header Shop Links Start -->
            <div class="header-shop-links">

              <!-- Compare -->
              <a href="compare.html" class="header-compare"><i class="ti-control-shuffle"></i></a>
              <!-- Wishlist -->
              <a href="wishlist.html" class="header-wishlist"><i class="ti-heart"></i> <span class="number">3</span></a>
              <!-- Cart -->
              <a href="cart.html" class="header-cart"><i class="ti-shopping-cart"></i> <span class="number">3</span></a>

            </div><!-- Header Shop Links End -->
          </div>

          <!-- Mobile Menu -->
          <div class="mobile-menu order-12 d-block d-lg-none col"></div>

        </div>
      </div>
    </div><!-- Header Bottom End -->

    <!-- Header Category Start -->
    <div class="header-category-section">
      <div class="container">
        <div class="row">
          <div class="col">

            <!-- Header Category -->
            <div class="header-category">

              <!-- Category Toggle Wrap -->
              <div class="category-toggle-wrap d-block d-lg-none">
                <!-- Category Toggle -->
                <button class="category-toggle">Categories <i class="ti-menu"></i></button>
              </div>

              <!-- Category Menu -->
              <nav class="category-menu">
                <ul>
                  <li><a href="category-1.html">Tv & Audio System</a></li>
                  <li><a href="category-2.html">Computer & Laptop</a></li>
                  <li><a href="category-3.html">Phones & Tablets</a></li>
                  <li><a href="category-1.html">Home Appliances</a></li>
                  <li><a href="category-2.html">Kitchen appliances</a></li>
                  <li><a href="category-3.html">Accessories</a></li>
                </ul>
              </nav>

            </div>

          </div>
        </div>
      </div>
    </div><!-- Header Category End -->

  </div><!-- Header Section End -->

  <!-- Mini Cart Wrap Start -->
  <div class="mini-cart-wrap">

    <!-- Mini Cart Top -->
    <div class="mini-cart-top">

      <button class="close-cart">Close Cart<i class="icofont icofont-close"></i></button>

    </div>

    <!-- Mini Cart Products -->
    <ul class="mini-cart-products">
      <li>
        <a class="image"><img src="<?=base_url()?>assets/images/product/product-1.png" alt="Product"></a>
        <div class="content">
          <a href="single-product.html" class="title">Waxon Note Book Pro 5</a>
          <span class="price">Price: $295</span>
          <span class="qty">Qty: 02</span>
        </div>
        <button class="remove"><i class="fa fa-trash-o"></i></button>
      </li>
      <li>
        <a class="image"><img src="<?=base_url()?>assets/images/product/product-2.png" alt="Product"></a>
        <div class="content">
          <a href="single-product.html" class="title">Aquet Drone D 420</a>
          <span class="price">Price: $275</span>
          <span class="qty">Qty: 01</span>
        </div>
        <button class="remove"><i class="fa fa-trash-o"></i></button>
      </li>
      <li>
        <a class="image"><img src="<?=base_url()?>assets/images/product/product-3.png" alt="Product"></a>
        <div class="content">
          <a href="single-product.html" class="title">Game Station X 22</a>
          <span class="price">Price: $295</span>
          <span class="qty">Qty: 01</span>
        </div>
        <button class="remove"><i class="fa fa-trash-o"></i></button>
      </li>
    </ul>

    <!-- Mini Cart Bottom -->
    <div class="mini-cart-bottom">

      <h4 class="sub-total">Total: <span>$1160</span></h4>

      <div class="button">
        <a href="checkout.html">CHECK OUT</a>
      </div>

    </div>

  </div>
  <!-- Mini Cart Wrap End -->

  <!-- Cart Overlay -->
  <div class="cart-overlay"></div>

  <?php if (isset($_view) && $_view)
    $this->load->view($_view);
  ?> 

  <!-- Footer Section Start -->
  <div class="footer-section section bg-ivory">

    <!-- Footer Top Section Start -->
    <div class="footer-top-section section pt-90 pb-50">
      <div class="container">

        <!-- Footer Widget Start -->
        <div class="row">
          <div class="col mb-90">
            <div class="footer-widget text-center">
              <div class="footer-logo">
                <img src="<?=base_url()?>assets/images/logo.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                <img class="theme-dark" src="<?=base_url()?>assets/images/logo-light.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
              </div>
              <p>Electronics product actual teachings of he great explorer of the truth, the malder of human happiness. No one rejects</p>
            </div>
          </div>
        </div><!-- Footer Widget End -->

        <div class="row">

          <!-- Footer Widget Start -->
          <div class="col-lg-3 col-md-6 col-12 mb-40">
            <div class="footer-widget">

              <h4 class="widget-title">CONTACT INFO</h4>

              <p class="contact-info">
                <span>Address</span>
                You address will be here <br>
                Lorem Ipsum text </p>

              <p class="contact-info">
                <span>Phone</span>
                <a href="tel:01234567890">01234 567 890</a>
                <a href="tel:01234567891">01234 567 891</a>
              </p>

              <p class="contact-info">
                <span>Web</span>
                <a href="mailto:info@example.com">info@example.com</a>
                <a href="#">www.example.com</a>
              </p>

            </div>
          </div><!-- Footer Widget End -->

          <!-- Footer Widget Start -->
          <div class="col-lg-3 col-md-6 col-12 mb-40">
            <div class="footer-widget">

              <h4 class="widget-title">CUSTOMER CARE</h4>

              <ul class="link-widget">
                <li><a href="#">About us</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="#">Checkout</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">blog</a></li>
                <li><a href="#">Contact</a></li>
              </ul>

            </div>
          </div><!-- Footer Widget End -->

          <!-- Footer Widget Start -->
          <div class="col-lg-3 col-md-6 col-12 mb-40">
            <div class="footer-widget">

              <h4 class="widget-title">INFORMATION</h4>

              <ul class="link-widget">
                <li><a href="#">Track your order</a></li>
                <li><a href="#">Locate Store</a></li>
                <li><a href="#">Online Support</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Payment</a></li>
                <li><a href="#">Shipping & Returns</a></li>
                <li><a href="#">Gift coupon</a></li>
                <li><a href="#">Special coupon</a></li>
              </ul>

            </div>
          </div><!-- Footer Widget End -->

          <!-- Footer Widget Start -->
          <div class="col-lg-3 col-md-6 col-12 mb-40">
            <div class="footer-widget">

              <h4 class="widget-title">LATEST TWEET</h4>

              <div class="footer-tweet"></div>

            </div>
          </div><!-- Footer Widget End -->

        </div>

      </div>
    </div><!-- Footer Bottom Section Start -->

    <!-- Footer Bottom Section Start -->
    <div class="footer-bottom-section section">
      <div class="container">
        <div class="row">

          <!-- Footer Copyright -->
          <div class="col-lg-6 col-12">
            <div class="footer-copyright">
              <p>&copy; Copyright, 2018 All Rights Reserved by <a href="https://freethemescloud.com/">Free themes Cloud</a></p>
            </div>
          </div>

          <!-- Footer Payment Support -->
          <div class="col-lg-6 col-12">
            <div class="footer-payments-image"><img src="<?=base_url()?>assets/images/payment-support.png" alt="Payment Support Image"></div>
          </div>

        </div>
      </div>
    </div><!-- Footer Bottom Section Start -->

  </div><!-- Footer Section End -->



  <!-- JS
============================================ -->

  <!-- jQuery JS -->
  <script src="<?=base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>
  <!-- Popper JS -->
  <script src="<?=base_url()?>assets/js/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <!-- Plugins JS -->
  <script src="<?=base_url()?>assets/js/plugins.js"></script>

  <!-- Main JS -->
  <script src="<?=base_url()?>assets/js/main.js"></script>

</body>

</html>