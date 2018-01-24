<?php
//include 'core.inc.php';
/*if(loggedin()==false)
{
  echo '<script>alert("Please login first");
    window.location.href = "index.php";</script>';
}*/
session_start();
$firste=$emaile=$feede='';
if (isset($_GET['err'])) {
if ($_GET['err']==1) {
	$firste="Enter name correctly";}
if ($_GET['err']==2)
	$emaile="Enter correct email";
if ($_GET['err']==3)
	$feede="Enter feedback";
if($_GET['err']==4)
{	
	phpAlert($_SESSION['captcha'],"","");	
}
}
if ($firste!='' || $emaile!='' || $feede!='')
phpAlert($firste,$emaile,$feede);
/*if(isset($_GET['err']))
{
	if($_GET['err']==2)
	{
		echo '<script>alert("Please submit details for registration.")</script>';
	}
}
*/
function phpAlert($msg,$msg2,$msg3) {
    echo '<script type="text/javascript">alert("' . $msg . $msg2 .$msg3 .'");</script>';
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Revels'18 Feedback</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script src='https://www.google.com/recaptcha/api.js'></script>

	<!--<script src="assets/js/jquery.min.js"></script>-->
	<style>
		@import url('https://fonts.googleapis.com/css?family=Questrial');
	</style>
</head>
<body>


				
						<form method="post" action="feedbackr.php" style="font-family:'Questrial',sans-serif;font-weight:100;">
						
								<div class="field half">
								<label for="name"> Name</label>
								<input type="text" name="firstname" id="firstname" placeholder="Enter name" required/>
							</div>
							<div class="field half">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" placeholder="Enter email" required/>
							</div>
								<label for="feed">Feedback</label>
								<textarea name="feed" rows="4" cols="100" >
									
								</textarea>
							<div class="g-recaptcha" data-sitekey="6LcTJUIUAAAAALh3TALzqLztVptQyYN_Z05D8iaL"></div>
							<div class="field">
								<ul class="actions">
									<li><input type="submit" name="submit" value="Submit" class="button special" /></li>
								</ul>
							</div>
						</form>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>