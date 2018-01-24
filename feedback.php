<?php
session_start();
//include 'core.inc.php';
/*if(loggedin()==false)
{
  echo '<script>alert("Please login first");
    window.location.href = "index.php";</script>';
}*/
if (isset($_GET['err'])) {
if ($_GET['err']==1) {
phpAlert($_SESSION['firstname_error'],$_SESSION['email_error'],$_SESSION['feed_error']);
  }
}
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
if(!isset($_SESSION['firstname']))
{
	$_SESSION['firstname']='';
}
if(!isset($_SESSION['email']))
{
	$_SESSION['email']='';
}
if(!isset($_SESSION['feed']))
{
	$_SESSION['feed']='';
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Infodesk Portal: Sys Admin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

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
