<?php
session_start();
require_once "config.php";
if(!isset($_SESSION['type']))
{
    echo "You are logged out";
    header('location:counsellor.php');
}
$email=$_SESSION['email'];
$email_search = "SELECT * from counsellor WHERE email='$email'";
    $query = mysqli_query($conn, $email_search);

    $email_count = mysqli_num_rows($query);
    $email_pass = mysqli_fetch_assoc($query);
    $old_phone=$email_pass['phone'];

    $old_lang="";
    $old_stat="";
    $old_edu="";
    $old_expertise="";
    $old_experience="";
    $old_img="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAADVUlEQVR4nO2czUsVURjGf23SwFz0hX1AEWmbEooWRpugZasWlULQOoKWfSwrKBChFtGHZotoVdG/UBFlSIvoY1GLoK+FipR2tbTsxMH3kt6svN6ZOec6zw8ekKvXd973mTkzZ94zA0IIIYQQQgghhBBCxEc90AZ0Ab1APzBu6rfPOoFWYHHojZ1PNAHdwAjgZin/t1eBxtAbX80sAjqA72UUvlT+6GgHakMnU200As8rKHypeoCVoZOqFrbYmO4S1nugOXRy1bDn96dQ/KkmNIROMlZqgacpFr+oJ3Z+ESV0ZFD8ok6WBs87TRVe7ZSrLxqKptOdYfGLuhhoZ4tyhjsSwICCZsyTtAUoflH7bRtyTVdAA66ETj4GegMa4GfIuWcgoAF9ua8+MBbQgG8yABkQmgENQWHp1Uk4LJ0BDbgcOPcoaA1owN7QycdAnd0WyLr4BYstmGygZ22AH/rElE7YeIbF93OP9cXgYpL2DA04azFFSUuyJ4PiPwJqpgYWv/EN83cpFv8jsHpKPDEDzbZ6Ienie2M3zxRQ/Mly4H7Cw46Wo5RJja1eKFR4tXNGY35lNFgDvRwjCtbt0qVmgtRZD9ffv3lszZQxU599dgnYpxmuEEIIIYQQQgghhBBCiOmtx2PAPWAIeGNrdZamWKQlFqPPYt4FjgKb8mLMNuD8fxrvr4G1KcReZ//7b3HfAueArczD/u4J4GUZHa0PwPYEt2GHrYiYbfwXdnQuo4rZYK3E0Tn2c8eBUxW+asZ/93QFq+7847MXqq216dfd3AAmElxOctieJ54t9fadpNYY/QCuA6uImIXAcXsNQBJJuxn2xlvAIaAFWGGrHWrs5xb73e0UH/wetpO2zzW6dz0k+YIlF7mexfQ6tN3ApwiK4jKWPxr2hC7+EeBnBMVwgTRh55ogHMx58Z3J1+BA1sX3i1y/RpC8i0SjWc6mFwAPI0jaRaYHWRmwK4JkXaTamYUB1yJI1EUq/7Bh6vzrhlbe9SoLA+Z6bycPGsnCgNBJusglA5ABwfdCpyMgfCGchqDwxXABpHMA89yA4QiSdJHqcxYG3IkgURepfDcudTYCgxEk6yLTYJZdsjXATVvc5HKuIdvzo2lRCiGEEEIIIYQQQgii5BfygzQEYKOeIQAAAABJRU5ErkJggg==";
    $old_acc="";
    $old_ifsc="";
    $old_fee="";


            $email_search3 = "select * from counsellor_profile where email='$email'";
            $query3 = mysqli_query($conn, $email_search3);
            $email_count3 = mysqli_num_rows($query3);
            if($email_count3){
                $email_pass3 = mysqli_fetch_assoc($query3);
                $old_lang=$email_pass3['language'];
                $old_stat=$email_pass3['statement'];
                $old_edu=$email_pass3['education'];
                $old_expertise=$email_pass3['expertise'];
                $old_experience=$email_pass3['experience'];
                if($email_pass3['img']!="")
                {
                    $old_img=$email_pass3['img'];
                }
                $old_acc=$email_pass3['account_no'];
                $old_ifsc=$email_pass3['ifsc'];
                $old_fee=$email_pass3['fee'];
            }





    if (isset($_POST['submitprofile']))
        {
            $phone = $_POST['phone'];
            $language = $_POST['language'];
            $about = $_POST['aboutyourself'];
            $education=$_POST['education'];
            $expertise=$_POST['expertise'];
            $experience=$_POST['experience'];
            $image=$_FILES['profile'];




            
            $old_lang=$language;
            $old_stat=$about;
            $old_expertise=$expertise;
            $old_experience=$experience;
            $old_edu=$education;


            $ghd="UPDATE counsellor SET phone=$phone WHERE email='$email'";
            mysqli_query($conn,$ghd);
            $old_phone=$phone;


            $filename=$image['name'];
            $filepath=$image['tmp_name'];
            $file_error=$image['error'];
            $file_size=$image['size'];
            $file_ext=pathinfo($filename, PATHINFO_EXTENSION);
            $filename=pathinfo($filename, PATHINFO_FILENAME);


            $email_search2 = "select * from counsellor_profile where email='$email'";
            $query2 = mysqli_query($conn, $email_search2);
            $email_count2 = mysqli_num_rows($query2);
            if($email_count2>0)
            {
                if($file_error||$file_size==0)
                {
                    $sql = "UPDATE counsellor_profile SET language='$language', statement='$about', education='$education', expertise='$expertise', experience='$experience' WHERE email='$email'";
                    mysqli_query($conn,$sql);
                }
                else
                {
                    $destfile='images/'.$email.'.'.$file_ext;
                    move_uploaded_file($filepath, $destfile);
                    $sql = "UPDATE counsellor_profile SET language='$language', statement='$about', education='$education', expertise='$expertise', experience='$experience', img='$destfile' WHERE email='$email'";
                    mysqli_query($conn,$sql);
                    $old_img=$destfile;
                }
            }
            else
            {
                if($file_error==0&&$file_size!=0)
                {
                    $destfile='images/'.$email.'.'.$file_ext;
                    move_uploaded_file($filepath, $destfile);
                    $sql = "INSERT INTO `students`.`counsellor_profile` ( `email`, `language`, `statement`, `education`, `expertise`, `experience`, `img`) VALUES ( '$email', '$language', '$about', '$education', '$expertise', '$experience', '$destfile');";
                    mysqli_query($conn,$sql);
                    $old_img=$destfile;

                }
                else
                {
                    $sql = "INSERT INTO `students`.`counsellor_profile` ( `email`, `language`, `statement`, `education`, `expertise`, `experience`) VALUES ( '$email', '$language', '$about', '$education', '$expertise', '$experience');";
                    mysqli_query($conn,$sql);
                }
            }
        }

        if (isset($_POST['bank_update']))
        {
            $acc_no=$_POST['acc_no'];
            $ifsc=$_POST['ifs_code'];

            $old_acc=$acc_no;
            $old_ifsc=$ifsc;

            $email_search4 = "select * from counsellor_profile where email='$email'";
            $query4 = mysqli_query($conn, $email_search4);
            $email_count4 = mysqli_num_rows($query4);
            if($email_count4>0)
            {
                $ghdg="UPDATE counsellor_profile SET  account_no='$acc_no', ifsc='$ifsc'  WHERE email='$email'";
                mysqli_query($conn,$ghdg);
            }
            else
            {
                $sqll = "INSERT INTO `students`.`counsellor_profile` (`email`, `account_no`, `ifsc`) VALUES ('$email', '$acc_no', '$ifsc');";
                    mysqli_query($conn,$sqll);
            }
        }


        if (isset($_POST['fee_update']))
        {
            $fee=$_POST['fee'];

            $old_fee=$fee;

            $email_search5 = "select * from counsellor_profile where email='$email'";
            $query5 = mysqli_query($conn, $email_search5);
            $email_count5 = mysqli_num_rows($query5);
            if($email_count5>0)
            {
                $ghdgf="UPDATE counsellor_profile SET  fee='$fee'  WHERE email='$email'";
                mysqli_query($conn,$ghdgf);
            }
            else
            {
                $sqllb = "INSERT INTO `students`.`counsellor_profile` (`email`, `fee`) VALUES ('$email', '$fee');";
                    mysqli_query($conn,$sqllb);
            }
        }


        // if (isset($_POST['password_update']))
        // {
        //     $password=$_POST['password'];

        //     $email_search6 = "select * from counsellor where email='$email'";
        //     $query6 = mysqli_query($conn, $email_search6);
        //     $email_count6 = mysqli_num_rows($query5);
        //     if($email_count>0)
        //     {
        //         $ghdgf="UPDATE counsellor_profile SET  fee='$fee'  WHERE email='$email'";
        //         mysqli_query($conn,$ghdgf);
        //     }
        //     else
        //     {
        //         $sqllb = "INSERT INTO `students`.`counsellor_profile` ( `fee`) VALUES ( '$fee');";
        //             mysqli_query($conn,$sqllb);
        //     }
        // }
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

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
  <link href='css/bootstrap.css' rel='stylesheet' type='text/css' />
  <link href='css/bootstrap-custom.css' rel='stylesheet' type='text/css' />
  <link href='css/bootstrap-theme.css' rel='stylesheet' type='text/css' />
  <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href='css/booki-new.css' rel='stylesheet' type='text/css' />
  <link href='css/aloha.css' rel='stylesheet' type='text/css' />
  <link href='css/backo.css' rel='stylesheet' type='text/css' />

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
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="profile.php">Hi, <?php echo $_SESSION['name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php#header">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="about.php">About Us</a>
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
                        <a class="nav-link page-scroll" href="counsellor_history.php">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="counsellor_logout.php">Logout</a>
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


    

    <div class="container">
    	<div class="row two-col">
    		<div class="col-xs-8">

    			<div class="box gray">

    				<h2 class="box-title-alter">Update Profile</h2>
    				<form method="post"  target="hidden_settings" enctype="multipart/form-data" name="formsettings">
	    				<fieldset class="plain">
		    				<ul class="list">
		    					<li>
							    	<label>Email</label>
                                    <label><?php echo $_SESSION['email'] ?></label>
							      	<!-- <input type="text" name="email" class="form-control" value="vladimir.stefanovic@sourcefabric.org"> -->
							    </li>

							    <li>
								    <label>Full name</label>
								    <label><?php echo $_SESSION['name'] ?></label>
							    </li>

                                <li>
							    	<label>Phone Number</label>
							      	<input type="tel" name="phone" pattern="[0-9]{10}" maxlength="10" class="form-control" value=<?php echo $old_phone?>>
							    </li>

                                <li>
									<label>Session Language(s)</label>
									<textarea name="language" class="form-control" cols="40" rows="2"><?php echo $old_lang?></textarea>
								</li>

								<li>
									<label>Professional Statement</label>
									<textarea type="text" name="aboutyourself" class="form-control" cols="40" rows="10"><?php echo $old_stat?></textarea>
								</li>

                                <li>
									<label>Education</label>
									<textarea name="education" class="form-control" cols="40" rows="10"><?php echo $old_edu?></textarea>
								</li>

                                <li>
									<label>Expertise</label>
									<textarea name="expertise" class="form-control" cols="40" rows="10"><?php echo $old_expertise?></textarea>
								</li>

                                <li>
									<label>Experience</label>
                                    <textarea name="experience" class="form-control" cols="40" rows="1"><?php echo $old_experience?></textarea>
								</li>

                                <li>
									<label></label>
									<img src=<?php echo $old_img ?> alt=<?php echo $old_img ?> width="90" height="100">
								</li>

								<li>
									<label>Profile image</label>
									<input type="file" name="profile">
								</li>
                                
							</ul>

							 <button class="btn btn-default float-left" name="submitprofile">Save changes</button>

						</fieldset>
					</form>

    			</div>

    		</div>

    		<div class="col-xs-4">
                



                <div class="box white">

    				<h2 class="box-title">Bank Account Update</h2>

	    			<form method="post" action="" enctype="multipart/form-data" name="formpassword">
					  <fieldset class="plain">
						<ul class="list">

							<li>
								<label>Account Number</label>
								<input type="tel" name="acc_no" class="form-control" value=<?php echo $old_acc?>>
							</li>

							<li>
								<label>IFSC Code</label>
								<input type="text" name="ifs_code" class="form-control" value=<?php echo $old_ifsc?>>
							</li>


						</ul>
						
						<button name="bank_update" class="btn btn-default float-left">Update</button>
					  
					  </fieldset>
					</form>

	    		</div>




                <div class="box white">

    				<h2 class="box-title">Fee Update</h2>
                    <p><font color="green">You will get 70% of fee at the end of the day according<br> to your sessions. So adjust fee to make yourself in profit.</font></p>

	    			<form method="post" action="" enctype="multipart/form-data" name="formpassword">
					  <fieldset class="plain">
						<ul class="list">

                            <li>
								<label>Fee per Session in INR</label>
						      	<input type="tel" name="fee"  class="form-control" value=<?php echo $old_fee?>>
						    </li>


						</ul>
						
						<button name="fee_update" class="btn btn-default float-left">Update</button>
					  
					  </fieldset>
					</form>

	    		</div>




    		</div>

    	</div>
    </div> <!-- End of container -->



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