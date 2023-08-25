<?php
session_start();
require_once "config.php";

$email="parvathy.preethi@gmail.com";
if($email=="")
{
    header('location:counsellor_login.php');
    exit;
}
$email_query = "select * from counsellor where email ='$email'";
$e_q = mysqli_query($conn, $email_query);
$details=mysqli_fetch_assoc($e_q);
$name=$details['name'];
$phone=$details['phone'];
$type=$details['type'];
$checkpassword=false;

if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        if ($password === $cpassword) {
            $sql = "UPDATE counsellor SET password='$pass' WHERE email='$email'";
            //echo $sql;
            if ($conn->query($sql) == true) {
                $_SESSION['change_pass']=true;
                header('location:counsellor_login.php');
            } else {
                echo "ERROR: $sql <br> $conn->error";
            }
        } else {
            $checkpassword = true;
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
    <title>Generate New Password</title>

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
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="index.php"><img src="images/logo.svg" alt="alternative"></a> -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text page-scroll" style="font-family : arial;" href="index.php"><font size="40px" color="#00a2ff">inner</font><font size="40px" color="green">Journey</font></a>


        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->



    <!-- Contact -->
    <div id="contact" class="form-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Generate New Password</h2>
                    <p class="p-heading">For any type of help please don't hesitate to get in touch with me.
                        The fastest way is to send me your message using the following email <a class="blue no-line"
                            href="mailto:innerjourney.service@gmail.com">innerjourney.service@gmail.com</a></p>
                    <?php
                    if ($checkpassword) {
                        echo "<p style='color:red'> Passwords are not matching please retype. </p>";
                    }
                    ?>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Contact Form -->
                    <form id="contactForm" method="post">
                        <div class="form-group">
                        <h5>Full name:  <?php echo $name ?></h5>
                        </div>
                        <div class="form-group">
                        <h5>Email:  <?php echo $email ?></h5>
                        </div>
                        <div class="form-group">
                        <h5>Phone:  <?php echo $phone ?></h5>
                        </div>
                        <div class="form-group">
                        <h5>Type:  <?php echo $type ?></h5>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-input" name="password" id="password" required>
                            <label class="label-control" for="password">New Password</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-input" name="cpassword" id="cpassword" required>
                            <label class="label-control" for="password">Confirm New Password</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="change_password" class="form-control-submit-button">Change Password</button>
                        </div>

                    </form>
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