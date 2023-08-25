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

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="index.php"><img src="images/logo.svg" alt="alternative"></a> -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text page-scroll" style="font-family : arial;" href="index.php"><font size="40px" color="#00a2ff">inner</font><font size="40px" color="green">Journey</font></a>

            <button class="navbar-toggler p-0 bsession-0" type="button" data-toggle="offcanvas">
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

<br> <br><br>

<body>
<div class="page">

<div class="translations-content-container">
<div class="container">
<div class="tab-content translations-content-item en visible" id="en">
<h1>Cancellation & Refund Policy</h1>
<p>Last updated: April 24, 2023</p>
<p>Thank you for booking session at innerJourney.</p>
<p>If, for any reason, You are not completely satisfied with a purchase We invite You to review our policy on refunds and refunds.</a>.</p>
<p>The following terms are applicable for any products that You purchased with Us.</p>
<h1>Interpretation and Definitions</h1>
<h2>Interpretation</h2>
<p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
<h2>Definitions</h2>
<p>For the purposes of this refund and Refund Policy:</p>
<ul>
<li>
<p><strong>Company</strong> (referred to as either &quot;the Company&quot;, &quot;We&quot;, &quot;Us&quot; or &quot;Our&quot; in this Agreement) refers to innerJourney, India.</p>
</li>
<li>
<p><strong>Appointments</strong> refer to the items offered for sale on the Service.</p>
</li>
<li>
<p><strong>sessions</strong> mean a request by You to purchase Appointments from Us.</p>
</li>
<li>
<p><strong>Service</strong> refers to the Website.</p>
</li>
<li>
<p><strong>Website</strong> refers to innerJourney, accessible from <a href="http://inner-journey.in" rel="external nofollow noopener" target="_blank">http://inner-journey.in</a></p>
</li>
<li>
<p><strong>You</strong> means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</p>
</li>
</ul>
<h1>Your Session Cancellation Rights</h1>
<p>You are entitled to cancel Your session within a day without giving any reason for doing so.</p>
<p>The deadline for cancelling an session is a day from the date on which You received the Appointments or on which a third party you have appointed, who is not the carrier, takes possession of the product delivered.</p>
<p>In session to exercise Your right of cancellation, You must inform Us of your decision by means of a clear statement. You can inform us of your decision by:</p>
<ul>
<li>By email: <a class="blue no-line"
                            href="mailto:innerjourney.service@gmail.com">innerjourney.service@gmail.com</a></li>
</ul>
<p>We will reimburse You no later than 14 days from the day on which We receive the refunded Appointments. We will use the same means of payment as You used for the session, and You will not incur any fees for such reimbursement.</p>
<h1>Conditions for refunds</h1>
<p>In session for the Appointments to be eligible for a refund, please make sure that:</p>
<ul>
<li>The Appointments were purchased in the last a day</li>
<li>The Appointments are in the original packaging</li>
</ul>
<p>The following Appointments cannot be refunded:</p>
<ul>
<li>The supply of Appointments made to Your specifications or clearly personalized.</li>
<li>The supply of Appointments which according to their nature are not suitable to be refunded, deteriorate rapidly or where the date of expiry is over.</li>
<li>The supply of Appointments which are not suitable for refund due to health protection or hygiene reasons and were unsealed after delivery.</li>
<li>The supply of Appointments which are, after delivery, according to their nature, inseparably mixed with other items.</li>
</ul>
<p>We reserve the right to refuse refunds of any merchandise that does not meet the above refund conditions in our sole discretion.</p>
<p>Only regular priced Appointments may be refunded. Unfortunately, Appointments on sale cannot be refunded. This exclusion may not apply to You if it is not permitted by applicable law.</p>
<h1>refunding Appointments</h1>
<p>You are responsible for the cost and risk of refunding the Appointments to Us. You should send the Appointments at the following address:</p>
<p>email us</p>
<p>We cannot be held responsible for Appointments damaged or lost in refund shipment. Therefore, We recommend an insured and trackable mail service. We are unable to issue a refund without actual receipt of the Appointments or proof of received refund delivery.</p>
<h1>Gifts</h1>
<p>If the Appointments were marked as a gift when purchased and then shipped directly to you, You'll receive a gift credit for the value of your appointment. Once the refunded product is received, a gift certificate will be mailed to You.</p>
<p>If the Appointments weren't marked as a gift when purchased, or the gift giver had the session shipped to themselves to give it to You later, We will send the refund to the gift giver.</p>
<h2>Contact Us</h2>
<p>If you have any questions about our Cancellation and Refunds Policy, please contact us:</p>
<ul>
<li>By email: <a class="blue no-line"
                            href="mailto:innerjourney.service@gmail.com">innerjourney.service@gmail.com</a></li>
</ul>
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