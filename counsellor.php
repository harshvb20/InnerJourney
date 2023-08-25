<?php
session_start();
require_once "config.php";
if(isset($_SESSION['email']))
{
    if (!$_SESSION['type'])
    {
        header('location:user_login.php');
    }
    else
    {
        header('location:counsellor_session.php');
    }
    exit;
}
$insert = false;
$already = false;
$checkpassword = false;
if (isset($_POST['submitregister'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $stype = $_POST['stype'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = "select * from counsellor where email ='$email'";
    $eq = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($eq);

    $phonequery = "select * from counsellor where phone ='$phone'";
    $pq = mysqli_query($conn, $phonequery);
    $phonecount = mysqli_num_rows($pq);

    if ($emailcount > 0 || $phonecount > 0) {
        $already = true;
        //echo "Email or Phone Number already registered.";
    } else {
        if ($password === $cpassword) {
            $sql = "INSERT INTO `students`.`counsellor` ( `name`, `email`, `phone`,`type`, `password`, `dt`,`verification`) VALUES ( '$name', '$email', '$phone','$stype' ,'$pass', current_timestamp(),0);";
            //echo $sql;
            if ($conn->query($sql) == true) {
                //echo "Successfully Registered";

                // Flag for successful insertion
                $insert = true;
            } else {
                echo "ERROR: $sql <br> $conn->error";
            }
        } else {
            $checkpassword = true;
        }
    }
    // Close the database connection
    $conn->close();
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

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.jpg">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="index.php"><img src="images/logo.svg" alt="alternative"></a> -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text page-scroll" style="font-family : arial;" href="index.php"><font size="40px" color="#00a2ff">inner</font><font size="40px" color="green">Journey</font></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php#header">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php#services">Services</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Drop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="project.php">Project Details</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="terms.php">Terms Conditions</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="privacy.php">Privacy Policy</a>
                        </div>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="counsellor_login.php">Counsellor/Mentor Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="register.php">User Registeration</a>
                    </li>
                </ul>
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


    <!-- Header -->
    <header class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1>Apply as a Counseller/Mentor</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Contact -->
    <div id="contact" class="form-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>New Registration</h2>
                    <p class="p-heading">For any type of help please don't hesitate to get in touch with me.
                        The fastest way is to send me your message using the following email <a class="blue no-line"
                            href="mailto:innerjourney.service@gmail.com">innerjourney.service@gmail.com</a></p>
                    <?php
                    if ($already) {
                        echo "<p style='color:red'> Email or Phone Number already registered. </p>";
                    }
                    if ($checkpassword) {
                        echo "<p style='color:red'> Passwords are not matching. Please Check. </p>";
                    }
                    if ($insert) {
                        echo "<p style='color:green'> Thankyou for the Registration. Now login and update your profile to be visible to the clients and get sessions. </p>";
                    }
                    ?>
                </div> <!-- end of col -->
            </div> <!-- end of row -->

            <div class="row">
                <div class="col-lg-12">

                    <!-- Contact Form -->
                    <form id="contactForm" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control-input" name="name" id="name" required>
                            <label class="label-control" for="cname">Full Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" name="email" id="email" required>
                            <label class="label-control" for="email">Email</label>
                        </div>
                        <div class="form-group">
                            <input type="tel" pattern="[0-9]{10}" maxlength="10" name="phone" id="phone"
                                class="form-control-input" required>
                            <label class="label-control" maxlength="10" for="Phone">Phone Number </label>
                        </div>
                        <div class="form-group">
                            <input type="radio"  name="stype" id="counsellor" value="Counsellor" required>
                            <label  for="counsellor">Counsellor</label>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input type="radio"  name="stype" id="mentor" value="Mentor" required>
                            <label  for="mentor">Mentor</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-input" name="password" id="password"
                                minlength="8" required>
                            <label class="label-control" for="password">Password</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-input" name="cpassword" id="cpassword" required>
                            <label class="label-control" for="password">Confirm Password</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitregister" class="form-control-submit-button">Register
                                Now</button>
                        </div>

                    </form>
                    <p>Already Registered! Click below to login</p>
                    <a class="btn-solid-reg mb-5" href="counsellor_login.php">Login</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of contact -->


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