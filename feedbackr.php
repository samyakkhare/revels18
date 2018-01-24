<?php
    
    session_start();
    
    if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']){
    $secret = "6LcTJUIUAAAAAF1HMfI-kg-XnYz2C3VDGdcpVSp-";
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $rsp = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip";
    include 'database.inc.php';
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname= $feed = $email= '';
        $error=0;
        if (isset($_POST['firstname'])) {
            if(empty($_POST['firstname'])) {
                $error=1;
                
            } else {
                if($_POST['firstname'] == test_input($_POST['firstname'])) {
                     if (!preg_match("/^[a-zA-Z.' ]*$/",$_POST['firstname'])){
                    $error=1;
                  }
                    else {
                    $firstname = test_input($_POST['firstname']);
                    }
            }
        }
    }
     
       if (isset($_POST['email'])) {
            if(empty($_POST['email'])) {
                $error=2;
            } else {
                 if($_POST['email'] == test_input($_POST['email'])) {
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $error=2;
                  }
                    else {
                    $email = test_input($_POST['email']);
                  }
            }
        }
    }
  
        if (isset($_POST['feed'])) {
            if(empty($_POST['feed'])) {
                $error=3;
            }
            else
            {
                $feed=$_POST['feed'];
            }
        }
}
if($error==0) {
$stmt = $conn->prepare("INSERT INTO feedback (FN,EMAIL,FEED) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $email, $feed);
    $stmt->execute();
    $stmt -> close();
    $conn -> close();
    header("Location: feedback.php?success");
}
else
{
header("Location: feedback.php?err=$error");
}
}
else
    {   $msg = "Captcha error";
        $_SESSION['captcha']=$msg;
        header("Location: feedback.php?err=4");
    }
?>