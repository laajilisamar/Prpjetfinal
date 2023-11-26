
<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.css">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.css">
  <link rel="stylesheet" href="assets/vendors/flaticon/flaticon.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body id="top-header">

    
<header> 
    <!-- Main Menu Start -->
    <div class="site-navigation main_menu menu-style-2" id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="assets/images/loog.png" alt="Eduhash" class="img-fluid">
                </a>

                <!-- Toggler -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">
                   
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.html" >                                Accueil
                            </a>
                           
                        </li>
                        <li class="nav-item ">
                            <a href="about.html" class="nav-link js-scroll-trigger">
                                À propos
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Courses<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                 <a class="dropdown-item " href="course-grid.html">
                                    table1+2
                                </a>
                                <a class="dropdown-item " href="course-grid-2.html">
                                    table2+3
                                </a> 

                                <a class="dropdown-item " href="course-grid-3.html">
                                    table3+4
                                </a> 
                                <a class="dropdown-item " href="course-grid-4.html">
                                    table5+6
                                </a> 
                                 <a class="dropdown-item " href="course-single.html">
                                    table 7+8
                                </a> 
                                <a class="dropdown-item " href="course-single2.html">
                                    table 8+9
                                </a> 
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                 <a class="dropdown-item " href="login.html">
                                    Login
                                </a>
                                <a class="dropdown-item " href="register.html">
                                    Register
                                </a> 
                                <a class="dropdown-item " href="cart.html">
                                    cart
                                </a> 
                                <a class="dropdown-item " href="checkout.html">
                                    checkout
                                </a> 
                                <a class="dropdown-item " href="error.html">
                                    404
                                </a> 
                            </div>
                        </li>
                        <!--li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                 <a class="dropdown-item " href="blog.html">
                                    Blog
                                </a>
                                <a class="dropdown-item " href="blog-single.html">
                                    Blog Single
                                </a> 
                            </div>
                        </li-->
                        
                        <li class="nav-item ">
                            <a href="contact.html" class="nav-link">
                                Contact
                            </a>
                        </li>
                    </ul>
                    
                    
                    <div class="header-login">
                        <a href="#" class="btn btn-solid-border btn-sm ">Log In</a>
                        <a href="#" class="btn btn-main btn-sm">sign up</a>
                    </div>
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>
</header>

        




<main class="site-main page-wrapper woocommerce single single-product">
    <section class="space-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="woocommerce-notices-wrapper"></div>
                    <h2 class="font-weight-bold mb-4">Login</h2>
                    <form class="woocommerce-form woocommerce-form-login login" method="post">
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="username">Username or email address&nbsp;<span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" autocomplete="username" value="" placeholder="Username or Email">
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password" placeholder="password">
                        </p>
                        <p class="form-row">
                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="a414dce984"><input type="hidden" name="_wp_http_referer" value="/my-account/">
                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                            </label>
                        </p>
                        <p class="woocommerce-LostPassword lost_password">
                            <a href="#">Lost your password?</a>
                        </p>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2 class="font-weight-bold mb-4">Register</h2>
                    <form method="post" class="woocommerce-form woocommerce-form-register register">

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label>User Name&nbsp;<span class="required">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="user-name" id="" autocomplete="user-name" value="" placeholder="Username">
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label>Email address&nbsp;<span class="required">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="" autocomplete="email" value="" placeholder="Email">
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label>Password&nbsp;<span class="required">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="" autocomplete="password" value="" placeholder="Password">
                        </p>
                        <p class="woocommerce-FormRow form-row">
                            <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="b1c661ab82"><input type="hidden" name="_wp_http_referer" value="/my-account/">
                            <button type="submit" class="woocommerce-Button button" name="register" value="Register">Register</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>
<!-- Footer section start -->
<section class="footer-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-sm-6 col-md-8 col-xl-3 col-sm-6">
				<div class="widget footer-about mb-5 mb-lg-0">
					<h5 class="widget-title text-gray">About us</h5>
					<ul class="list-unstyled footer-info">
						<li><span>Ph:</span>+(68) 345 5902</li>
						<li><span>Email:</span>info@yourdomain.com</li>
						<li><span>Location:</span> 123 Fifth Floor East 26th Street,
							New York, NY 10011</li>
					</ul>
					<ul class="list-inline footer-socials">
						<li class="list-inline-item">Follow us :</li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"> <a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>

			
			<div class="col-xl-7 ml-auto col-lg-7 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-lg-4 col-xl-4 col-sm-4 col-md-4 ">
						<div class="footer-widget mb-5 mb-lg-0">
							<h5 class="widget-title text-gray">Explore</h5>
							<ul class="list-unstyled footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Contact us</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Support</a></li>
							</ul>
						</div>
					</div>

					<div class="col-lg-4 col-xl-4 col-sm-4 col-md-4">
						<div class="footer-widget mb-5 mb-lg-0">
							<h5 class="widget-title text-gray">Courses</h5>
							<ul class="list-unstyled footer-links">
								<li><a href="#">SEO Business</a></li>
								<li><a href="#">Digital Marketing</a></li>
								<li><a href="#">Graphic Design</a></li>
								<li><a href="#">Social Marketing</a></li>
							</ul>
						</div>
					</div>

					<div class="col-lg-4 col-xl-4 col-sm-4 col-md-4">
						<div class="footer-widget mb-5 mb-lg-0">
							<h5 class="widget-title text-gray">Legal</h5>
							<ul class="list-unstyled footer-links">
								<li><a href="#">Terms & Condition</a></li>
								<li><a href="#">Privacy policy</a></li>
								<li><a href="#">Return policy</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-xl-6 col-lg-4 col-md-12">
					<div class="footer-logo text-lg-left text-center mb-4 mb-lg-0">
						<img src="assets/images/light-logo.png" alt="EduHash" class="img-fluid">
					</div>
				</div>
				<div class="col-xl-6 col-lg-8 col-md-12">
					<div class="copyright text-lg-right text-center">
						<p>© Copyright EduHash Template All rights reserved.Crafted by <a href="https://themeturn.com/">Dreambuzz</a> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Footer section End -->

<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>




    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="assets/vendors/jquery/jquery.js"></script>
    <!-- Bootstrap 4.5 -->
    <script src="assets/vendors/bootstrap/bootstrap.js"></script>
    <!-- Counterup -->
    <script src="assets/vendors/counterup/waypoint.js"></script>
    <script src="assets/vendors/counterup/jquery.counterup.min.js"></script>
    <script src="assets/vendors/jquery.isotope.js"></script>
    <script src="assets/vendors/imagesloaded.html"></script>
    <script src="assets/vendors/owl/owl.carousel.min.js"></script>
    <script src="assets/vendors/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&amp;callback=initMap"></script>    
    <script src="assets/js/script.js"></script>


  </body>
  
<!-- Mirrored from pxelcode.com/tf-db/eduhash/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 17:51:50 GMT -->
</html>