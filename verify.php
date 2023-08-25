


<?php
session_start();
require_once "config.php";
if(isset($_SESSION['type']))
{
    header('location:counsellor_session.php');
    exit;
}
if(!isset($_SESSION['email']))
{
    echo "You are logged out";
    header('location:login.php');
}
$rep=$_SESSION['razorpay_order_id'];


require('razorpay-php/Razorpay.php');
require('gateway-config.php');

$user_email=$_SESSION['email'];
$select_query3="SELECT * from `user` WHERE email='$user_email'";
$result_query3=mysqli_query($conn,$select_query3);
$row3 = mysqli_fetch_assoc($result_query3);
$user_name=$row3['name'];


$counsellor_email=$_SESSION['counsellor_email'];

$select_query4="SELECT * from `counsellor` WHERE email='$counsellor_email'";
$result_query4=mysqli_query($conn,$select_query4);
$row4 = mysqli_fetch_assoc($result_query4);
$counsellor_name=$row4['name'];


$select_query="SELECT * from `counsellor_profile` WHERE email='$counsellor_email'";
$result_query=mysqli_query($conn,$select_query);
$row = mysqli_fetch_assoc($result_query);


    $old_email=$row['email'];
    $old_lang=$row['language'];
    $old_expertise=$row['expertise'];
    $old_experience=$row['experience'];
    $old_img=$row['img'];
    $old_fee=$row['fee'];

    $email_search = "SELECT * from counsellor WHERE email='$old_email'";
    $query = mysqli_query($conn, $email_search);

    $email_count = mysqli_num_rows($query);
    $email_pass = mysqli_fetch_assoc($query);
    $name=$email_pass['name'];
    $type=$email_pass['type'];


use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";
if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    if(isset($_POST['razorpay_payment_id']))
    {
        $txnid=$_POST['razorpay_payment_id'];
        $amount=$old_fee;
        $eid="";
        $subject='Your payment was successful.';
        $key_value='okpmt';
        $currency='INR';
        $date=new DateTime(null, new DateTimezone("Asia/Kolkata"));
        $payment_date=$date->format('Y-m-d H:i:s');
        $txn_search = "SELECT * from transactions WHERE txnid='$txnid'";
        $query1 = mysqli_query($conn, $txn_search);
        $txn_count = mysqli_num_rows($query1);
        if($txnid!='')
        {
            if($txn_count<=0)
            {
                $qls = "INSERT INTO `students`.`transactions` ( `user_email`, `user_name`, `amount`, `txnid`, `counsellor_email`, `counsellor_name`, `currency`, `payment_status`) VALUES ( '$user_email', '$user_name', '$amount', '$txnid', '$counsellor_email', '$counsellor_name', '$currency', '$subject');";
                mysqli_query($conn,$qls);
            }
        }

    }
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
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
    <link href="css/profile_card.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon1.jpg">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand fixed-top navbar-dark bg-dark">
        <div class="container">

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="index.php"><img src="images/favicon1.jpg" alt="alternative"></a> -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text page-scroll" style="font-family : arial;" href="index.php">
                <font size="40px" color="#00a2ff">inner</font><font size="40px" color="green">Journey</font>
            </a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a class="nav-link page-scroll" href="profile.php">Hi, <?php echo $_SESSION['name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#services">Services</a>
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
                        <a class="nav-link page-scroll" href="user_history.php">History</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="logout.php">Logout</a>
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

    <br> <br> <br> <br>
<!-- Testimonials -->



    <div class='page-content page-container' id='page-content'>
        <div class='padding'>
            <div class='row container d-flex justify-content-center'>
                <div class='col-xl-6 col-md-12'>
                    <div class='card user-card-full'>
                        <div class='row m-l-0 m-r-0'>
                            <div class='col-sm-4 bg-c-lite-green user-profile'>
                                <div class='card-block text-center text-white'>
                                    <div class='m-b-25'>
                                        <img src=<?php echo $old_img ?> width='90' height='100' class='img-radius' alt='User-Profile-Image'>
                                    </div>
                                    <h6 class='f-w-600'><?php echo $name ?></h6>
                                    <p><?php echo $type ?></p>
                                    <i class=' mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16'></i>
                                    </div>
                                </div>
                                <div class='col-sm-8'>
                                    <h6 class='m-b-20 m-t-40 p-b-5 b-b-default f-w-600'></h6>
                                    <div class='row'>
                                        <div class='col-sm-6'>
                                            <p class='m-b-10 f-w-600'>Language(s)</p>
                                            <h6 class='text-muted f-w-400'><?php echo $old_lang ?></h6>
                                        </div>
                                        <div class='col-sm-6'>
                                            <p class='m-b-10 f-w-600'>Experience</p>
                                            <h6 class='text-muted f-w-400'><?php echo $old_experience ?></h6>
                                        </div>
                                    </div>
                                    <h6 class='m-b-20 m-t-40 p-b-5 b-b-default f-w-600'>Expertise</h6>
                                    <div class='row'>
                                        <div class='col-sm-12'>
                                            <p class='m-b-10 f-w-600'><?php echo $old_expertise ?></p>
                                        </div>
                                    </div>
                                    <h6 class='m-b-20 m-t-40 p-b-5 b-b-default f-w-600'></h6>
                                    <?php
                                    if($success)
                                    {
                                    echo "<div class='row'>
                                        <div class='col-sm-12'><center>
                                        <label name='button' class='btn btn-success' >Successfully Booked</label>
                                        </center></div>
                                    </div>
                                    <h6 class='m-b-20 m-t-40 p-b-5 b-b-default f-w-600'><center>We are trying to schedule your appointment as soon as possible.<center></h6>";
                                    }
                                    else
                                    {
                                        echo "<div class='row'>
                                        <div class='col-sm-12'><center>
                                        <label name='button' class='btn btn-danger' >Failed to Book</label>
                                        </center></div>
                                    </div>
                                    <h6 class='m-b-20 m-t-40 p-b-5 b-b-default f-w-600'><center>Please retry booking.<center></h6>";
                                    }
                                    ?>

<h6 class='m-b-20 m-t-40 p-b-5 b-b-default f-w-600'><center><?php $rep ?> This<center></h6>
                                </div>
                            </div>
                        </div>
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
                    <div class="social-container">
                        <!-- <span class="fa-stack">
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
                        <span class="fa-stack">
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