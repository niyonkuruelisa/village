<?php
die("Not useless proof");
require_once 'bootstrap.php';?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Sumon Rahman">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title><?php echo SITENAME;?></title>

    <?php require_once 'FrontCSS.php'; ?>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".mainmenu-area">
    <!-- Preloader-content -->
    <!-- <div class="preloader">
        <span><i class="lnr lnr-sun"></i></span>
    </div> -->
    <!-- MainMenu-Area -->
    <?php require_once 'public/partials/_navbar.php'?>
    <!-- MainMenu-Area-End -->
    <!-- Home-Area -->
    <header class="home-area overlay" id="home_page">
        <div class="container">
            <div class="row" >
                <div class="col-xs-12 hidden-sm col-md-4">
                    <!-- <figure class="mobile-image wow fadeInUp" data-wow-delay="0.1s">
                        <img src="images/header-mobile.png" alt="">
                    </figure> -->
                </div>
                <div class="col-xs-12 col-md-8" id="kwishyura">
                    <h1 class="wow fadeInUp" data-wow-delay="0.4s">Basha kwishyura amafaranga y'umudugudu n'ibindi.</h1>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>Tutarindiriye ko baza ku twishyuza koresha urubuga hamwe na mobile money wishyura amafaranga(umutekano,isuku,...) biroroshye kandi birihuta.</p>
                    </div>
                    <!-- <div class="space-20"></div>
                    <a href="#" class="bttn-white wow fadeInUp" data-wow-delay="0.8s"><i class="lnr lnr-location"></i>KANDA HANO KWISHYURA</a>
                 -->
                    <div class="subscribe-form text-center" >
                        <h3 class="blue-color">Ishyura Byihuse</h3>
                        <div class="space-20"></div>
                        <form id="mc-form">
                            <span id="responses"></span>
                            <input type="email" class="control" id="nid" placeholder="Andika Indangamuntu Yawe hano" required="required" id="mc-email">
                            <button class="bttn-white active" id="clientLogin" type="submit"><span class="lnr lnr-location"></span>Kanda Ukomeze</button>
                            <label class="mt10" for="mc-email"></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Home-Area-End -->
        <!-- Feature-Area -->
    <section class="feature-area section-padding-top" id="features_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title text-center">
                        <h5 class="title">Ibyo Dukora</h5>
                        <div class="space-10"></div>
                        <h3>Aha Hari Ibyo Dukora</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <h4>Kwishyura umutekano,isuku</h4>
                        <p>kwishyura byoroshye kandi byihise.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box-icon">
                        <i class="lnr lnr-rocket"></i>
                        </div>
                        <h4>Kumenya umudugudu hakoreshejwe Ikarita ya Google</h4>
                        <p>kumenya imbibi zu mudugudu.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <h4>Kumenya abayobozi</h4>
                        <p>kumenya abayobozi bose kuva ku karere kugeza ku mudugudu.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-cog"></i>
                        </div>
                        <h4>Igice cyahariwe ubuzima</h4>
                        <p>Igice cyahariwe ubajyanama bu buzima batugira inama zijyanye nu buzima.</p>
                    </div>
                    <div class="space-60"></div>
                </div>
                <div class="hidden-xs hidden-sm col-md-4">
                    <!-- <figure class="mobile-image">
                        <img src="images/feature-image.png" alt="Feature Photo">
                    </figure> -->
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-clock"></i>
                        </div>
                        <h4>Gutanga amakuru</h4>
                        <p>Amakuru atandukanye yabereye mu midugudu ako kanya.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box-icon">
                            <i class="lnr lnr-laptop-phone"></i>
                        </div>
                        <h4>Ubutumwa,Inyandiko bigenewe abaturage</h4>
                        <p>ahanyuzwa inyandiko ziromo isuku,umutekano n'Ibindi...</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-cog"></i>
                        </div>
                        <h4>Forumirere za serivisi zitandukanye</h4>
                        <p>bona ibisabwa mbere yuko ujya kwaka serivisi.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-cog"></i>
                        </div>
                        <h4>Kwireba kuri lisiti y'ubudehe</h4>
                        <p>kumenya icyiciro urimo byoroshye.</p>
                    </div>
                    <div class="space-60"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature-Area-End -->
    
    <!-- About-Area -->
    <section class="section-padding" id="about_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="page-title text-center">
                        <img src="<?php echo URLROOT;?>front/images/about-logo.png" alt="About Logo">
                        <div class="space-20"></div>
                        <h5 class="title">Ibitwerekeye Ho</h5>
                        <div class="space-30"></div>
                        <h3 class="blue-color">Tukohereza kwishyura umusanzu w'ubwitange byoroshye cyane bikorohereza kuzamura FPR</h3>
                        <div class="space-20"></div>
                        <p>Ba mu ba mbere mu gutanga umusanzu wawe, kuko byorohejwe kuru uru rubuga kandi byizewe n'uturere dukorana.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-Area-End -->
    <!-- Progress-Area -->
    <!-- <section class="progress-area gray-bg" id="progress_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="page-title section-padding">
                        <h5 class="title wow fadeInUp" data-wow-delay="0.2s">Our Progress</h5>
                        <div class="space-10"></div>
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s">Grat Application Ever</h3>
                        <div class="space-20"></div>
                        <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                        </div>
                        <div class="space-50"></div>
                        <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s">Learn More</a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <figure class="mobile-image">
                        <img src="images/progress-phone.png" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Progress-Area-End -->
    <!-- Video-Area -->
    <!-- <section class="video-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="video-photo">
                        <img src="images/video-image.jpg" alt="">
                        <a href="https://www.youtube.com/watch?v=ScrDhTsX0EQ" class="popup video-button">
                            <img src="images/play-button.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1">
                    <div class="space-60 hidden visible-xs"></div>
                    <div class="page-title">
                        <h5 class="title wow fadeInUp" data-wow-delay="0.2s">VIDEO FEATURES</h5>
                        <div class="space-10"></div>
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s">Grat Application Ever</h3>
                        <div class="space-20"></div>
                        <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                        </div>
                        <div class="space-50"></div>
                        <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Video-Area-End -->
    <!-- Testimonial-Area -->
    <!-- <section class="testimonial-area" id="testimonial_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">Testimonials</h5>
                        <h3 class="dark-color">Our Client Loves US</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="team-slide">
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/team-1.png" alt="">
                            </div>
                            <h4>Ashekur Rahman</h4>
                            <h6 class="position">Art Dirrector</h6>
                            <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/team-2.jpg" alt="">
                            </div>
                            <h4>Ashekur Rahman</h4>
                            <h6 class="position">Art Dirrector</h6>
                            <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/team-3.jpg" alt="">
                            </div>
                            <h4>Ashekur Rahman</h4>
                            <h6 class="position">Art Dirrector</h6>
                            <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/team-1.png" alt="">
                            </div>
                            <h4>Ashekur Rahman</h4>
                            <h6 class="position">Art Dirrector</h6>
                            <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/team-2.jpg" alt="">
                            </div>
                            <h4>Ashekur Rahman</h4>
                            <h6 class="position">Art Dirrector</h6>
                            <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/team-3.jpg" alt="">
                            </div>
                            <h4>Ashekur Rahman</h4>
                            <h6 class="position">Art Dirrector</h6>
                            <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Testimonial-Area-End -->
    <!-- Gallery-Area -->
    <?php
    /*
    <section class="gallery-area section-padding" id="gallery_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 gallery-slider">
                    <div class="gallery-slide">
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-3.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-4.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-3.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-3.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-4.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="<?php echo URLROOT;?>front/images/gallery-3.jpg" alt=""></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-lg-3">
                    <div class="page-title">
                        <h5 class="white-color title wow fadeInUp" data-wow-delay="0.2s">Amafoto</h5>
                        <div class="space-10"></div>
                        <h3 class="white-color wow fadeInUp" data-wow-delay="0.4s">lisiti y'amafoto</h3>
                    </div>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>Amafoto Agaragaza uko ibikorwa bigerwa ho ndetse na serivice dutanga uko zakirwa.</p>
                    </div>
                    <div class="space-50"></div>
                    <!-- <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s">Learn More</a> -->
                </div>
            </div>
        </div>
    </section>*/

    ?>
    <!-- Gallery-Area-End -->
    <!-- How-To-Use -->
    <!-- <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="page-title">
                        <h5 class="title wow fadeInUp" data-wow-delay="0.2s">Our features</h5>
                        <div class="space-10"></div>
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s">Aour Approach of Design is Prety Simple and Clear</h3>
                    </div>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                    </div>
                    <div class="space-50"></div>
                    <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s">Learn More</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1">
                    <div class="space-60 hidden visible-xs"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-clock"></i>
                        </div>
                        <h4>Easy Notifications</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                    <div class="space-50"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-laptop-phone"></i>
                        </div>
                        <h4>Fully Responsive</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                    <div class="space-50"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-cog"></i>
                        </div>
                        <h4>Editable Layout</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- How-To-Use-End -->
    <!-- Download-Area -->
    <!-- <div class="download-area overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 hidden-sm">
                    <figure class="mobile-image">
                        <img src="images/download-image.png" alt="">
                    </figure>
                </div>
                <div class="col-xs-12 col-md-6 section-padding">
                    <h3 class="white-color">Download The App</h3>
                    <div class="space-20"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam possimus eaque magnam eum praesentium unde.</p>
                    <div class="space-60"></div>
                    <a href="#" class="bttn-white sq"><img src="images/apple-icon.png" alt="apple icon"> Apple Store</a>
                    <a href="#" class="bttn-white sq"><img src="images/play-store-icon.png" alt="Play Store Icon"> Play Store</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Download-Area-End -->
    <!--Price-Area -->
    <!-- <section class="section-padding price-area" id="price_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">Pricing Plan</h5>
                        <h3 class="dark-color">Our Awesome Pricing Plan</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="price-box">
                        <div class="price-header">
                            <div class="price-icon">
                                <span class="lnr lnr-rocket"></span>
                            </div>
                            <h4 class="upper">Free</h4>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>Easy Installations</li>
                                <li>Unlimited support</li>
                                <li>Uniqe Elements</li>
                            </ul>
                        </div>
                        <div class="price-rate">
                            <sup>&#36;</sup> <span class="rate">0</span> <small>/Month</small>
                        </div>
                        <div class="price-footer">
                            <a href="#" class="bttn-white">Purchase</a>
                        </div>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="price-box">
                        <div class="price-header">
                            <div class="price-icon">
                                <span class="lnr lnr-diamond"></span>
                            </div>
                            <h4 class="upper">Medium</h4>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>Easy Installations</li>
                                <li>Unlimited support</li>
                                <li>Free Forever</li>
                            </ul>
                        </div>
                        <div class="price-rate">
                            <sup>&#36;</sup> <span class="rate">49</span> <small>/Month</small>
                        </div>
                        <div class="price-footer">
                            <a href="#" class="bttn-white">Purchase</a>
                        </div>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="price-box">
                        <div class="price-header">
                            <div class="price-icon">
                                <span class="lnr lnr-pie-chart"></span>
                            </div>
                            <h4 class="upper">Business</h4>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>Easy Installations</li>
                                <li>Unlimited support</li>
                                <li>Free Forever</li>
                            </ul>
                        </div>
                        <div class="price-rate">
                            <sup>&#36;</sup> <span class="rate">99</span> <small>/Month</small>
                        </div>
                        <div class="price-footer">
                            <a href="#" class="bttn-white">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--Price-Area-End -->
    <!--Questions-Area -->
    <!-- <section id="questions_page" class="questions-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">FAQ</h5>
                        <h3 class="dark-color">Frequently Asked Questions</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="toggole-boxs">
                        <h3>Faq first question goes here? </h3>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <h3>About freewuent question goes here? </h3>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <h3>Why more question goes here? </h3>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <h3>What question goes here? </h3>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="space-20 hidden visible-xs"></div>
                    <div class="toggole-boxs">
                        <h3>Faq second question goes here? </h3>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <h3>Third faq question goes here? </h3>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <h3>Why more question goes here? </h3>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <h3>Seventh frequent question here? </h3>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--Questions-Area-End -->
    <!-- Subscribe-Form -->
    <div class="subscribe-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="subscribe-form text-center">
                        <h3 class="blue-color">Andika Nimero ujye ubona amakuru ndetse nibyahindutse.</h3>
                        <div class="space-20"></div>
                        <form id="mc-form">
                            <input type="email" class="control" placeholder="Andika Nimero Yawe Aha" required="required" id="mc-email">
                            <button class="bttn-white active" type="submit"><span class="lnr lnr-location"></span> Ohereza</button>
                            <label class="mt10" for="mc-email"></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe-Form-Area -->
    <!-- Footer-Area -->
    <footer class="footer-area" id="contact_page">
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title text-center">
                            <h5 class="title">Uko watubona</h5>
                            <h3 class="dark-color">Aha Hari Uburyo Watubona mo</h3>
                            <div class="space-60"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-map-marker"></span>
                            </div>
                            <p>Rwanda <br /> Kigali</p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-phone-handset"></span>
                            </div>
                            <p>+250 788474011 <br /> +250 786055826</p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-envelope"></span>
                            </div>
                            <p>evillage250@gmail.com 
                            <!-- <br /> backpiper.com@gmail.com -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom -->
        <?php require_once 'public/partials/_footer.php';?>
        <!-- Footer-Bootom-End -->
    </footer>
    <!-- Footer-Area-End -->
    <?php require_once 'frontJS.php';?>
</body>
</html>
