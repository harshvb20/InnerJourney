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

<br> <br><br><br>

<div class="wrapper">
            <div class="page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>
                                <strong>Terms and Conditions</strong>
                            </h2>
                            <p>Welcome to innerJourney!</p>
                            <p>These terms and conditions outline the rules and regulations for the use of innerJourney's Website, located at inner-journey.in.</p>
                            <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use innerJourney if you do not agree to take all of the terms and conditions stated on this page.</p>
                            <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company's terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client's needs in respect of provision of the Company's stated services, in accordance with and subject to, prevailing law of in. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
                            <h3>
                                <strong>Cookies</strong>
                            </h3>
                            <p>We employ the use of cookies. By accessing innerJourney, you agreed to use cookies in agreement with the innerJourney's Privacy Policy. </p>
                            <p>Most interactive websites use cookies to let us retrieve the user's details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
                            <h3>
                                <strong>License</strong>
                            </h3>
                            <p>Unless otherwise stated, innerJourney and/or its licensors own the intellectual property rights for all material on innerJourney. All intellectual property rights are reserved. You may access this from innerJourney for your own personal use subjected to restrictions set in these terms and conditions.</p>
                            <p>You must not:</p>
                            <ul>
                                <li>Republish material from innerJourney</li>
                                <li>Sell, rent or sub-license material from innerJourney</li>
                                <li>Reproduce, duplicate or copy material from innerJourney</li>
                                <li>Redistribute content from innerJourney</li>
                            </ul>
                            <p>
                                This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the <a href="https://www.termsfeed.com/terms-conditions-generator/">Terms and Conditions Generator</a>
                                .
                            </p>
                            <p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. innerJourney does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of innerJourney,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, innerJourney shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>
                            <p>innerJourney reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>
                            <p>You warrant and represent that:</p>
                            <ul>
                                <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
                                <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
                                <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
                                <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
                            </ul>
                            <p>You hereby grant innerJourney a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>
                            <h3>
                                <strong>Hyperlinking to our Content</strong>
                            </h3>
                            <p>The following organizations may link to our Website without prior written approval:</p>
                            <ul>
                                <li>Government agencies;</li>
                                <li>Search engines;</li>
                                <li>News organizations;</li>
                                <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
                                <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
                            </ul>
                            <p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party's site.</p>
                            <p>We may consider and approve other link requests from the following types of organizations:</p>
                            <ul>
                                <li>commonly-known consumer and/or business information sources;</li>
                                <li>dot.com community sites;</li>
                                <li>associations or other groups representing charities;</li>
                                <li>online directory distributors;</li>
                                <li>internet portals;</li>
                                <li>accounting, law and consulting firms; and</li>
                                <li>educational institutions and trade associations.</li>
                            </ul>
                            <p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of innerJourney; and (d) the link is in the context of general resource information.</p>
                            <p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party's site.</p>
                            <p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to innerJourney. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>
                            <p>Approved organizations may hyperlink to our Website as follows:</p>
                            <ul>
                                <li>By use of our corporate name; or</li>
                                <li>By use of the uniform resource locator being linked to; or</li>
                                <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party's site.</li>
                            </ul>
                            <p>No use of innerJourney's logo or other artwork will be allowed for linking absent a trademark license agreement.</p>
                            <h3>
                                <strong>iFrames</strong>
                            </h3>
                            <p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>
                            <h3>
                                <strong>Content Liability</strong>
                            </h3>
                            <p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>
                            <h3>
                                <strong>Reservation of Rights</strong>
                            </h3>
                            <p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it's linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>
                            <h3>
                                <strong>Removal of links from our website</strong>
                            </h3>
                            <p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>
                            <p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>
                            <h3>
                                <strong>Disclaimer</strong>
                            </h3>
                            <p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>
                            <ul>
                                <li>limit or exclude our or your liability for death or personal injury;</li>
                                <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
                                <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
                                <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
                            </ul>
                            <p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>
                            <p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
                            <hr/>
                        </div>
                    </div>
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