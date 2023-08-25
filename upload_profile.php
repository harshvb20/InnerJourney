<?php

    session_start();
    require_once "config.php";
    if(!isset($_SESSION['type']))
    {
        echo "You are logged out";
        header('location:counsellor.php');
    }
    
    $email=$_SESSION['email'];

    if (isset($_POST['submitprofile']))
        {
            $phone = $_POST['phone'];
            $language = $_POST['language'];
            $about = $_POST['aboutyourself'];
            $education=$_POST['education'];
            $expertise=$_POST['expertise'];
            $experience=$_POST['experience'];
            $image=$_FILES['profile'];

            $filename=$image['name'];
            $filepath=$image['tmp_name'];
            $file_error=$image['error'];


            $email_search2 = "select * from counsellor_profile where email='$email'";
            $query2 = mysqli_query($conn, $email_search2);
            $email_count2 = mysqli_num_rows($query2);
            if($email_count2>0)
            {
                if(!$file_error)
                {
                    $destfile='images/'.$filename;
                    move_uploaded_file($filename, $destfile);
                    $sql = "INSERT INTO `students`.`counsellor_profile` ( `email`, `language`, `statement`, `education`, `expertise`, `experience`, `img`) VALUES ( '$email', '$language', '$about', '$education', '$expertise', '$experience', '$destfile');";
                    if ($conn->query($sql) == true)
                    {
                        //echo "Successfully Registered";
    
                        // Flag for successful insertion
                        $insert = true;
                    } else
                    {
                            echo "ERROR: $sql <br> $conn->error";
                    }
                }
            }
            else
            {
                $sql = "INSERT INTO `students`.`counsellor_profile` ( `email`, `language`, `statement`, `education`, `expertise`, `experience`) VALUES ( '$email', '$language', '$about', '$education', '$expertise', '$experience');";
                if ($conn->query($sql) == true)
                {
                    //echo "Successfully Registered";
    
                    // Flag for successful insertion
                    $insert = true;
                } else
                {
                    echo "ERROR: $sql <br> $conn->error";
                }
            }
        }
        $conn->close();


?>