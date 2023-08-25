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
                        <a class="nav-link page-scroll" href="profile.php">Hi, <?php echo $_SESSION['name'] ?></a>
                    </li>
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

    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1 class="h1-large">Best Mentorship and Counselling</h1>
                        <h2 class="h2-large">We Understand, We Heal, We Care</h2>
                        <a class="btn-solid-lg page-scroll" href="#about">Discover</a>
                        <a class="btn-outline-lg page-scroll" href="sessions.php"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAADO0lEQVR4nOWX609SYRjA/da31ofW9+CPcAlt2aZih4upNDnlvBS5TFiuNV0uZ2GluWVu6uZaFk5TDlYyXWaraeLdlrcNSsAtLgcEk0OOUsuedl48hCEKJq7Vs/12eJ/3Oe/z48Dh5cTE/AvBIuwYiyCtLBVpYanJ5L0XUJEWttoaxyJsXBZBmv94QZ3dw9fZPdg2TQfZBAkMdPPDatvRwBybILU7EyDdy+rhuR/MWCQSHTiZKrWJJTIQ43LEb41CwtTT54pEuWuJXP4THo+3L2TzNFzOv1Xd2Cc9X+QWJEnK6JxAlK2kF8kvLIfrlQ2IcAWY+vxCBRLh8ySQwDlxdtPGYlxWJMbly3RhIheDRC4ffFcgt4/OTZgcoCcphPCFY9vmdA1TPzHnQAJC7AwkcDD0xjYE3Tgdl1eUlNcN0GRmyj00gQLMYjtlOwGgj0xxi9aI+OsFrB0EUOdEQAmOAIXFAiWIg8ULYjANDkdfwNyl8TXdjPRjMKszRVdgMU8cWgCLhY+q1sgExBkFWCQCbiFnQ8PPWUngLc3xYxibDF8gXSL3iHE5FY7AB4MZzMrGX82zjwNVwIMvdy7CeEMpWNUV6BjZdyBDxkvDC5LDEdjQHAnEw1JlFqz21CCWHuTDSvfdyASYCO8KWMDc9BDcwji/hPdmnl/ga3sZrPbci56Afh0X0eD7vBVSWNFU+QXe1JTAQm9z9AXmx1+Ct7UYvK1FCE93Hcy/ew326SGYtcxHV6DDRMGVYSvc1vRCtboTnjbVwzOiCRRjTqifXABdpL+ETDDbp28zwkIKnJr+DrgeIHXqG9p44h9PA1WDg0zZhcb1UwvRFcD14IfZ/d7WXYZ85XP0+tqIa+8F2AFEXUAzMOCnaMgVRKvuU3QF9Lu9HUciMGJwQp/Ojhg1OINygTDzuyrQNmjy36ZtQ6agXCDM/K4KjBqd8GrGhhgxOoNygTDzYQu0aI0EY9/cb1QFCsyYg+/tcJkxu8IU6H1/sLnf4GjWGl1Ng8ZDSECY84g++aqiFu63dO6Ikhu163/LMyCRg+XGbBWXiqsyaZgxj3d6f0qq1BL4YBIxEhmkpOSsJXEF7Vs+mMT8b/ETcDqF3LujpKMAAAAASUVORK5CYII=">Book
                            Now</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- About-->
    <div id="about" class="basic-1 bg-gray">
        <div class="container"><center>




            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="text-container first">
                        <!-- <h2>Hi there I'm Mark,</h2> -->
                        <h4 style="font-family: cursive-font;">Maintaining good mental health is important for everyone,
                            not just those who are preparing for competitive exams.</h4>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="text-container first">
                        <!-- <h2>Hi there I'm Mark,</h2> -->
                        <a class="navbar-brand logo-image"><img src="images/psychology.png" alt="alternative"></a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div>




            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="text-container first">
                        <!-- <h2>Hi there I'm Mark,</h2> -->
                        <a class="navbar-brand logo-image"><img src="images/wellbeing.png" alt="alternative"></a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-2"></div>

                <div class="col-lg-4">
                    <div class="text-container second">
                        <h4 style="font-family: cursive-font;" class="TopMg SubHeadingtext">Stigma around mental health is still prevalent in many societies, which can prevent people from seeking help when needed. It is important to break down these stigmas and encourage people to seek support if they need it.</h4>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div>



            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="text-container third">
                        <!-- <div class="time">2017 - 2018</div>
                        <h6>Senior Web Designer</h6>
                        <p>Inhouse web designer for ecommerce firm</p>
                        <div class="time">2016 - 2017</div>
                        <h6>Junior Web Designer</h6>
                        <p>Junior web designer for small web agency</p> -->
                        <h4 style="font-family: cursive-font;">A mentor who has already cleared JEE/NEET or has
                            experience in mentoring JEE/NEET aspirants can share their experiences and insights with the
                            students. They can provide tips on time management, exam strategy, and handling pressure
                            during the exam.</h4>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="text-container first">
                        <!-- <h2>Hi there I'm Mark,</h2> -->
                        <a class="navbar-brand logo-image"><img src="images/online-counseling.png"
                                alt="alternative"></a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->


            <br>
            <br>
            <p style="font-family: cursive-font;">
                <font size="5px">There is still a significant amount
                    of stigma around mental health in India. As a result, aspirants may not seek help when they are
                    struggling with their mental wellbeing. So <font color="#00a2ff">inner</font><font color="green">Journey</font> provides best service to help.
                </font>
            </p>
            <a class="btn-solid-lg" href="sessions.php">Book a Session Now</a>
        </center></div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of about -->


    <!-- Services -->
    <div id="services" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Offered services</h2>
                    <p class="p-heading">We offer India's Largest Online Counselling and Personal Mentorship Platform by
                        the most humble Counsellors, IITians and Medicos</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="text-box">
                        <i>
                            <center><img
                                    src="data:image/png;base64,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">
                            </center>
                        </i>
                        <br>
                        <h2>
                            <center>COUNSELLING</center>
                        </h2>
                        <p>
                            <center>Customers' Voices Heard Straight about our Top Indian Therapists, Counsellors, and
                                Mental Health Professionals. We support the highest-quality mental health care
                                available. Treatment for Everyone. Psychiatrist Consultation Best Online.We match you
                                with the best psychiatrist for your psychological and emotional well-being.</center>
                        </p>
                    </div> <!-- end of text-box -->
                    <div class="col-lg-3"></div>
                </div> <!-- end of col -->
            </div>



            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="text-box">
                        <i>
                            <center><img
                                    src="data:image/png;base64,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">
                            </center>
                        </i>
                        <br>
                        <h2>
                            <center>MENTORSHIP</center>
                        </h2>
                        <p>
                            <center>We offer India's Largest Online Personal Mentorship Platform for IIT-JEE & NEET,
                                which is endorsed by many IITians and Medicos. On this platform, you can receive
                                guidance from the country's Best IITians and Top Medicos and learn how to make the most
                                of your self-study in order to succeed on these challenging exams.</center>
                        </p>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
                <div class="col-lg-3"></div>


            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of services -->



<center><?php
require_once "config.php";
$select_query="SELECT * from `counsellor_profile` ";
$result_query=mysqli_query($conn,$select_query);
$result_query2=mysqli_query($conn,$select_query);

if(mysqli_fetch_assoc($result_query2))
{
    echo "<h4><center>Our Best Counsellors</center></h4>";
}
while($row=mysqli_fetch_assoc($result_query))
{
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

                            <form id='contactForm' method='post' action='checkout.php'>
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
                                        <div class='col-sm-6'>
                                            <h6 class='m-b-10 f-w-600' style='text-align:center;' ><font size='4px' color='blue'>Fee: ₹$old_fee</font></h6>
                                        </div>
                                        <div class='col-sm-6'>
                                            <button name='button' class='btn btn-success' value=$old_email>Book Now</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
                    </div>
                </div>";
    }
}
?></center>





    
    <!-- Testimonials -->
    <div class="cards-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Our Top Mentors from Recognized Colleges.</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <!--<p class="testimonial-text">“Mark is a skilled developer which will do everything possible
                                to deliver the project on time and I really appreciate that”</p>
                            <div class="details">
                                <img src="images/testimonial-1.jpg" alt="alternative">
                                <div class="text">
                                    <div class="testimonial-author">Samantha Bloom</div>
                                    <div class="occupation">Team Leader - Syncnow</div>
                                </div>  end of text
                            </div>  end of testimonial-details -->
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                    <div class="card-body">
                            <p class="testimonial-text">“My confidence and communication abilities have seen a significant transformation. Positive feedback from your mentees makes you feel wonderful.”</p>
                            <div class="details">
                                <img src="images/vaibhav.jpg" alt="alternative">
                                <div class="text">
                                    <div class="testimonial-author">Vaibhav Kumar</div>
                                    <div class="occupation">IIT Kanpur - BSBE</div>
                                </div> <!-- end of text -->
                            </div> <!-- end of testimonial-details -->
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of testimonials -->


<!-- About-->
<div id="about" class="basic-1">
        <div class="container"><center>
        <div class="row">
                <div class="col-lg-12">
                    <h1 style="font-family: serif;" class="h2-heading">Meet Our Team</h1>
                    <br>
                    <br>
                </div> <!-- end of col -->
            </div> <!-- end of row -->


            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="text-box">
                        <i>
                            <center><img
                                    src="images/shreya.jpg">
                            </center>
                        </i>
                        <br>
                        <h2>
                            <center><font color="">Shreya Yadav</font></center>
                        </h2>
                        <p>
                            <center>Founder & CEO</center>
                        </p>
                    </div> <!-- end of text-box -->
                    <div class="col-lg-3"></div>
                </div> <!-- end of col -->
            </div>

                
            </div>



        </center></div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of about -->


    <!-- Section Divider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <hr class="section-divider">
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <!-- end of section divider -->


    <!-- Questions -->
    <div class="accordion-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Frequent questions</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How can I contact you and quickly get a session?
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    The best way to reach us is by registering on the registeration form. Then we will
                                    contact you.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    How much should I pay for a session?
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    We have the most affordable fee for a session. Anyone can pay that much low fee. So
                                    do not worry about that.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Who are the Mentors & Counsellers?
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    They are the professionals from recognized college like IIT.
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- end of accordion -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of accordion-1 -->
    <!-- end of questions -->


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