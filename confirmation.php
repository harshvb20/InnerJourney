<?php
session_start();
require_once "config.php";
// require('razorpay-php/Razorpay.php');
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
$flag=0;

$user_email=$_SESSION['email'];
$select_query1="SELECT * from `user` WHERE email='$user_email'";
$result_query1=mysqli_query($conn,$select_query1);
$row1 = mysqli_fetch_assoc($result_query1);
$user_name=$row1['name'];

$counsellor_email=$_SESSION['counsellor_email'];
$select_query="SELECT * from `counsellor_profile` WHERE email='$counsellor_email'";
$result_query=mysqli_query($conn,$select_query);
$row = mysqli_fetch_assoc($result_query);
$fee=$row['fee'];

$select_query2="SELECT * from `counsellor` WHERE email='$counsellor_email'";
$result_query2=mysqli_query($conn,$select_query2);
$row2 = mysqli_fetch_assoc($result_query2);
$counsellor_name=$row2['name'];



    if(isset($_POST['book']))
    {
        $txn_search1 = "SELECT * from transactions WHERE txnid='' AND user_email='$user_email'";
        $query1 = mysqli_query($conn, $txn_search1);
        $count=mysqli_num_rows($query1);
        if($count)
        {
            $flag=2;
        }
        else 
        {
            $flag=1;
            $qls = "INSERT INTO `students`.`transactions` ( `user_email`, `user_name`, `amount`, `counsellor_email`, `counsellor_name`) VALUES ( '$user_email', '$user_name', '$fee', '$counsellor_email', '$counsellor_name');";
            mysqli_query($conn,$qls);
        }

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

<center><body data-spy="scroll" data-target=".fixed-top">

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
                        <a class="nav-link page-scroll" href="user_login.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="sessions.php">Services</a>
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


<center><?php


if($flag==0)
{
    echo"<h4 class='btn btn-info'><center>Confirmation Page</center></h4>";
}
elseif($flag==1)
{
    echo "<h5><font color='green'>You have successfully provisionally booked your session. We will contact you for the payment and schedule.</font></h5>";
}
elseif($flag==2)
{
    echo "<h5><font color='#6897bb'>You have already provisionally booked your session. We will contact you for the payment and schedule.</font></h5>";
}




require_once "config.php";
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


    if($old_img!=""&&$old_fee!=""&&$old_email!=""&&$old_lang!=""&&$old_expertise!=""&&$old_experience!="")
    {
    echo "<div class='page-content page-container' id='page-content'>
        <div class='padding'>
            <div class='row container d-flex justify-content-center'>
                <div class='col-xl-6 col-md-12'>
                    <div class='card user-card-full'>
                        <div class='row m-l-0 m-r-0'>
                            <div class='col-sm-4 bg-c-lite-green user-profile'>
                                <div class='card-block text-center text-white'>
                                    <div class='m-b-25'>
                                        <img src=$old_img width='90' height='100' class='img-radius' alt='User-Profile-Image'>
                                    </div>
                                    <h6 class='f-w-600'>$name</h6>
                                    <p>$type</p>
                                    <i class=' mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16'></i>
                                    </div>
                                </div>
                                <div class='col-sm-8'>
                                    <h6 class='m-b-20 m-t-40 p-b-5 b-b-default f-w-600'></h6>
                                    <div class='row'>
                                        <div class='col-sm-6'>
                                            <p class='m-b-10 f-w-600'>Language(s)</p>
                                            <h6 class='text-muted f-w-400'>$old_lang</h6>
                                        </div>
                                        <div class='col-sm-6'>
                                            <p class='m-b-10 f-w-600'>Experience</p>
                                            <h6 class='text-muted f-w-400'>$old_experience</h6>
                                        </div>
                                    </div>
                                    <h6 class='m-b-20 m-t-40 p-b-5 b-b-default f-w-600'>Expertise</h6>
                                    <div class='row'>
                                        <div class='col-sm-12'>
                                            <p class='m-b-10 f-w-600'>$old_expertise</p>
                                        </div>
                                    </div>
                                    <h6 class='m-b-20 m-t-40 p-b-5 b-b-default f-w-600'></h6>
                                    <div class='row'>
                                    ".($flag==0?"<div class='col-sm-6'>
                                    <h6 class='m-b-10 f-w-600' style='text-align:center;' ><font size='4px' color='blue'>Fee: ₹$old_fee</font></h6>
                                </div>
                                <div class='col-sm-6'>
                                <form method='POST'>
                                  <button type='submit' name='book' class='btn btn-success' >Book Now</button>
                                </form>
                                </div>":"<div class='col-sm-12'>
                                <lable class='btn btn-primary'>Provisonally Booked</lable>
                                </div>")."
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
                    </div>
                </div>";
}
?></center>






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
</body></center>

</html>