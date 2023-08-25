<?php
session_start();
require_once "config.php";

$cons=0;
if(isset($_SESSION['email']))
{
    $cons=2;
}
if(isset($_SESSION['type']))
{
    $cons=1;
}
if($cons)
{
    $name=$_SESSION['name'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Best Mentorship and Counselling">
    <meta name="author" content="Shreya Yadav">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>InnerJourney</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap"
        rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/contact.css" rel="stylesheet">
    <link href="css/profile_card.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.jpg">
</head>

<center><body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="index.php"><img src="images/logo.svg" alt="alternative"></a> -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text page-scroll" style="font-family : arial;" href="index.php"><font size="40px" color="#00a2ff">inner</font><font size="40px" color="green">Journey</font></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <?php if($cons==1)
                    {
                    echo "<ul class='navbar-nav ml-auto'>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='profile.php'>Hi, $name</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='index.php#header'>Home <span
                                class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='about.php'>About Us</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='index.php#services'>Services</a>
                    </li>
                    <!-- <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown'
                            aria-haspopup='true' aria-expanded='false'>Drop</a>
                        <div class='dropdown-menu' aria-labelledby='dropdown01'>
                            <a class='dropdown-item page-scroll' href='project.php'>Project Details</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item page-scroll' href='terms.php'>Terms Conditions</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item page-scroll' href='privacy.php'>Privacy Policy</a>
                        </div>
                    </li> -->
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='counsellor_history.php'>History</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='counsellor_logout.php'>Logout</a>
                    </li>
                </ul>";
                }
                if($cons==2)
                {
                    echo "<ul class='navbar-nav ml-auto'>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='profile.php'>Hi, $name</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='user_login.php'>Home <span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='#about'>About</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='#services'>Services</a>
                    </li>
                    
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='user_history.php'>History</a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='logout.php'>Logout</a>
                    </li>
                </ul>";
                }
                if($cons==0)
                {
                    echo "<ul class='navbar-nav ml-auto'>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='index.php#header'>Home <span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='aboutus.php'>About</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='index.php#services'>Services</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='counsellor_login.php'>For Counsellor/Mentor</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link page-scroll' href='login.php'>User Login/Register</a>
                    </li>
                </ul>";
                }

                ?>
                <!-- <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                </span> -->
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

<br> <br>

<div class="new_home_web">
  <div class="responsive-container-block big-container">
    <img class="imgBG" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/aw65.png">
    <div class="responsive-container-block textContainer">
      <div class="topHead">
        <p class="text-blk heading">
          Contact
          <span class="orangeText">
            Us
          </span>
        </p>
        <div class="orangeLine" id="w-c-s-bgc_p-2-dm-id">
        </div>
      </div>
      <p class="p-heading">For any type of help please don't hesitate to get in touch with me.
                        The fastest way is to send me your message using the following email <a class="blue no-line"
                            href="mailto:innerjourney.service@gmail.com">innerjourney.service@gmail.com</a></p>
    </div>
    
  </div>
</div>



<div class="new_home_web">
  <div class="responsive-container-block big-container">
    <div class="responsive-container-block textContainer">
      <div class="topHead">
        <p class="text-blk heading">
          Office
          <span class="orangeText">
            Address
          </span>
        </p>
        <div class="orangeLine" id="w-c-s-bgc_p-2-dm-id">
        </div>
      </div>
      <h7><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABhklEQVR4nK2Vv0oDQRCHf42oRRS1EQuxsAi2goS72RxiCstAULTRRl/AyldQYi/4ACKpbSwMvoF/QFInnSAY0EIDjuyyHCGZ2+xePPg1x8z33c3e7gEeF0dYYsI+E05s9jjBok+vG0yoMOGBFX5ZgQei7zW5jM1wcAnTTLgSoHIIl5xgyg++jgkm3HrDVSq5421MjhYoXATDVSo5d8MJa0zoCY1tVqhxhIIJocoKLaGuxwmKLkFdhJcwL9TOWfHgm5y5BC9CQ81RvyPUP7rm3x1qiFDIrN/AjPDGHy7BV5CggllB8OkSPAkN1cz6MnbDRiQtskJLL+hQ7RYWmNARHqieLUhQFI8FQtssqJ65jn5yCa57XZ+pHVNzjI1274RbQZRxuLFHyiMFdi1ucsCvveBGEGNZ3BMqM13d4y2wozr0FsQ4CIL3SRoegkYuuBFE5uR8dnw1r3o35xYYSYIVVngTBO+cYHUseCqJQazw3Qf/yfUvdkoIx3Z/6Bz9KzyVKJzqhDT9AT+qS2yVD3YJAAAAAElFTkSuQmCC"> Kanpur, UP, India, 208017</h7>
    </div>
    
  </div>
</div>




  <!-- Footer -->
  <div class="footer bg-gray">
        <div class="container">
        <p class="p-heading">For any type of help please don't hesitate to get in touch with me.
                        The fastest way is to send me your message using the following email <a class="blue no-line"
                            href="mailto:innerjourney.service@gmail.com">innerjourney.service@gmail.com</a></p>
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="text-container">
                        <span >
                            <a class="btn btn-secondary"  href="aboutus.php">About us</a>
                        </span>
                        <span>
                            <a class="btn btn-secondary" href="contactus.php">Contact us</a>
                        </span>
                        <span>
                            <a class="btn btn-secondary" href="privacy.php">Privacy Policy</a>
                        </span>
                        <span>
                            <a class="btn btn-secondary" href="terms.php">Terms & Conditions</a>
                        </span>
                        <span>
                            <a class="btn btn-secondary" href="policy.php">Cancellation/Refund Policies</a>
                        </span>
                      <!--     <span class="fa-stack">
                        
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-youtube fa-stack-1x"></i>
                            </a>
                        </span> -->
                    </div> <!-- end of social-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © <a class="no-line">innerJourney</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <p class="p-small">Distributed By <a class="no-line" href="https://themewagon.com/">Themewagon</a> -->
                    </p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->

    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>