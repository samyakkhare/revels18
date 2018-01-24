<?php
include 'database.inc.php';
session_start();
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $firstname = $firstname_error = $feed = '';
        $email = $email_error=$feed_error = '';

        if (isset($_POST['firstname'])) {
          $_SESSION['firstname']='';
            if(empty($_POST['firstname'])) {

                $firstname_error = 'Name is required';
                $_SESSION['firstname_error'] = $firstname_error;
            } else {
                if($_POST['firstname'] == test_input($_POST['firstname'])) {
                     if (!preg_match("/^[a-zA-Z.' ]*$/",$_POST['firstname'])){
                    $firstname_error = 'Symbols not allowed in the name';
                    $_SESSION['firstname_error'] = $firstname_error;
                  }
                    else {
                    $firstname = test_input($_POST['firstname']);
                    $_SESSION['firstname']=$firstname;
                  $_SESSION['firstname_error'] = $firstname_error;}
            }
        }
    }

       if (isset($_POST['email'])) {
         $_SESSION['email']='';
            if(empty($_POST['email'])) {
                $email_error = 'Email is required';
                $_SESSION['email_error'] = $email_error;
            } else {
                 if($_POST['email'] == test_input($_POST['email'])) {
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $email_error = 'Enter a valid email address';
                    $_SESSION['email_error'] = $email_error;
                  }
                    else {
                    $email = test_input($_POST['email']);
                    $_SESSION['email']=$email;
                    $_SESSION['email_error'] = $email_error;
                  }
            }
        }
    }
  if (isset($_POST['feed'])) {
          $_SESSION['feed']='';
            if(empty($_POST['feed'])) {

                $feed_error = 'Enter feedback';
                $_SESSION['feed_error'] = $feed_error;
            }
            else
            {
            	$_SESSION['feed']=$_POST['feed'];
            }
        }




}

if($firstname_error == '' && $email_error == '' && $feed_error == '' ) {

$stmt = $conn->prepare("INSERT INTO feedback (FN,EMAIL,FEED) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_SESSION['firstname'], $_SESSION['email'], $_SESSION['feed']);
    $stmt->execute();
    $stmt -> close();
    $conn -> close();


    header("Location: feedback.php?success");
}
else
{

header("Location: feedback.php?err=1");
}
?>

