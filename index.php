<!--
Arthur ==> ADAMS PAUL OHIANI
Title ==> ADVANCED WEB LOGIN OPTION(PATTERN)

-->
<?php 
session_start();
require_once("application/protect.user.php");
$login = new USER();
$redirect_login = config::get('redirect_login');
if($login->is_loggedin()!="")
{
	if(isset($_GET['return'])) {
    		$login->redirect(urldecode($_GET['return']));
									}
		else
			$login->redirect($redirect_login);
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
	$upat = strip_tags($_POST['txt_pat']);
	if($login->doLogin($uname,$umail,$upass,$upat))
	{
		if(isset($_GET['return'])) {
    		$login->redirect(urldecode($_GET['return']));
									}
		else
			$login->redirect($redirect_login);
		
	}
	else
	{
		$error = "invalid credentials try again!";
	}	
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login-page_demo.css">
    <link rel="stylesheet" href="css/login-page_style.css">
    <link rel="stylesheet" href="css/login-page_responsive.css">

	<link rel="stylesheet" type="text/css" href="css/patternLock.css">
  <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/login-page_script.js"></script>
	<script type="text/javascript" src="js/jquery.patternlock.min.js"></script>
  
	<style type="text/css">
	
	.patternlock {
		background: url("assets/pattern.png");
	}
	.patternlock .tbl td {
		background: #fff url("assets/pattern1.png");
	}	
	.patternlock .tbl td:hover {
	 	background: #fff url("assets/pattern.png");   
	}

	.patternlock .tbl td.selected {
	 	background: #fff url("assets/pattern2.png") !important;   
	}	

	.patternlock .tbl td.selected .centerCircle {
	 	background: #f00 !important;   
	}
	.patternlock .centerCircle {
		background-color: black;
		border: none;
	}
	
	</style>

</head>

<body>

 
   <div class="login-page_container">

        <!--       Sign in Side      -->

        <div class="login-section page-side section-ope">
            <div class="section-page_intro">
                <img src="Image/signin-icon-black.png" alt="signin-icon">
                <p class="section-page-intro_title">Sign In</p>	<?php
		if(isset($error))
		{

			 echo $error; 

		}
	?>
            </div>

            <div class="login-form-area">
                <p class="form-title">Sign In</p>
                <div class="section-form">
                    <form class="login-form" method="post" action="">




                        <label class="login-page_label">
                            <input class="login-page_input" type="text" name="txt_uname_email" autocomplete="off" required>
                            <span class="login-page_placeholder">Email Or Username</span>
                        </label>

<div id="patternCSSClasses" align="center"></div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#patternCSSClasses').patternLock({
            width: 300,
         height:  300,
            lineWidth: 10, 			
           patternLineColor: '#000000', 		
            showPatternLine: true,
           centerCircle: true,
       fieldName: 'txt_pat',
             timeout: 4000
			
		});
	});
</script>

                        <div class="login-section_submit">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook fa-fw"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter fa-fw"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google fa-fw"></i></a></li>
                            </ul>
                            <div class="login-page-submit-btn">
                                <input type="submit" name="btn-login" value="submit">
                            </div>
                        </div> 
 <div class="login-page_pw">
                            <a href="">Can't remember your pattern ? try using your password</a>
                        </div>
                        <!----
<div class="login-page_forget">
                            <a href="">Forget Your Password ?</a>
                        </div>
---->
                    </form>

                    <form class="forget-form">
                        <p class="forget-title">Forget Your Password</p>
                        <label class="login-page_label">
                            <input class="login-page_input" type="email" name="email" autocomplete="off" required>
                            <span class="login-page_placeholder">Email</span>
                        </label>
                        <div class="login-section_submit">
                            <div class="login-page-submit-btn"><input type="submit" name="btn-fp" value="submit"></div>
                        </div>
                    </form>


                    <form class="pw-form" method="post" action="">
                        <p class="pw-title">Use Password Instead</p>
                        <label class="login-page_label">
                            <input class="login-page_input" type="text" name="txt_uname_email" autocomplete="off" required>
                            <span class="login-page_placeholder">Email or Username</span>
                        </label>
  <label class="login-page_label">
                            <input class="login-page_input" type="password" name="txt_password" autocomplete="off" required>
                            <span class="login-page_placeholder">Password</span>
                        </label>
                        <div class="login-section_submit">
                            <div class="login-page-submit-btn"><input type="submit" name="btn-login" value="submit"></div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <!--       Sign up Side      -->
<?php

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	$upass_confirm = strip_tags($_POST['txt_upass_confirm']);
//
//
// User random hash generator for password reset
function random_string($length) { $key = ''; $keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
    for ($i = 0; $i < $length; $i++) { $key .= $keys[array_rand($keys)]; } return $key; }
    $randomstring = random_string(64);
//
//
	if($uname=="")	{
		$errorx[] = "provide username !";	
	}
	else if($umail=="")	{
		$errorx[] = "provide email id !";	
	}
	else if($upass!=$upass_confirm) {
		$errorx[] = "Password doesn't match !";
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $errorx[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$errorx[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$errorx[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{

         	$stmt = $login->runQuery("SELECT user_id, user_name, user_email, user_pass, pattern FROM users WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

				
			if($row['user_name']==$uname) {
				$errorx[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$errorx[] = "sorry email address already taken !";
			}

			else
			{
				if($user->register($uname,$umail,$upass,$randomstring)){	
					$user->redirect('message.php?8338292374938737483472923Success465443');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>

        <div class="signup-section page-side section-clos">
            <div class="section-page_intro">
                <img src="Image/signup-icon.png" alt="signup-icon">
                <p class="section-page-intro_title">Sign Up</p>
<font style="color:white;">
<?php
	if(isset($errorx))
	{
	 	foreach($errorx as $errorx)
	{
echo $errorx;
	}
	}
	?>
</font>
            </div>

            <div class="signup-form-area">
                <p class="form-title">Sign Up</p>
                <div class="section-form">
                    <form class="signup-form" method="post" action="">
                       <label class="login-page_label">
                            <input class="login-page_input" type="text" name="txt_uname" autocomplete="off" required>
                            <span class="login-page_placeholder">Username</span>
                        </label>
                        <label class="login-page_label">
                            <input class="login-page_input" type="email" name="txt_umail" autocomplete="off" required>
                            <span class="login-page_placeholder">Email</span>
                        </label>


                        <label class="login-page_label">
                            <input class="login-page_input" type="password" name="txt_upass" required>
                            <span class="login-page_placeholder">Password</span>
                        </label>
                                 <label class="login-page_label">
                            <input class="login-page_input" type="password" name="txt_upass_confirm" onchange='check_pass();'>
                            <span class="login-page_placeholder">Confirm Password</span>
                        </label>
                        <div class="signup-section_submit">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook fa-fw"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter fa-fw"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google fa-fw"></i></a></li>
                            </ul>
                            <div class="login-page-submit-btn">
                                <input type="submit" name="btn-signup" value="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>