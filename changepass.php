<!--
Arthur ==> ADAMS PAUL OHIANI
Title ==> ADVANCED WEB LOGIN OPTION(PATTERN)

-->
<?php
  require_once("application/session.php");
  require_once("application/protect.user.php");
  $user = new user();
  $auth_user = new USER();
  $user_id = $_SESSION['user_session'];
  $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  $pr_id = $userRow['pr_id'];
  $redirect_login = config::get('redirect_login');

  if(!$auth_user->is_loggedin())
{
	$auth_user->redirect('index.php?return=changepass.php');
}

if(isset($_POST['btn-changepass']))
{
	$password = strip_tags($_POST['txt_password']);
	$passwordconfirm = strip_tags($_POST['txt_password_confirm']);
//
	if($password!=$passwordconfirm) {
		$error[] = "Password doesn't match !";
	}
	else if($password=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($password) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
		{
			try
			{
		if($user->changepass($password, $pr_id)){	
					$user->redirect('message.php?90819948564782345789056748PasswordChanged857432');
				}
		
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password | AuthX</title>
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/header-fixed.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
</head>
<body>
<header class="header-fixed">
	<div class="header-limiter">
		<h1><a href="#">Auth<span>X</span></a></h1>
		<nav>
			<a href="home.php">Home</a>
			<a>|</a>
			<a href="profile.php">Profile</a>
			<a>|</a>
			<a href="changepass.php">Change Password</a>
           	<a>|</a>
			<a href="changepat.php">Change Pattern</a>
			<a>|</a> &nbsp;
			<a href="application/logout.php?logout=true" class="logout-btn">Logout</a>
		</nav>
	</div>
</header>
<!-- You need this element to prevent the content of the page from jumping up -->

<div class="signin-form">
<div class="container">
	<section id="content">
		<form method="post" class="form-signin">
		<form action="">
			<h1>Change Password</h1>

<?php
	if(isset($error))
	{
	 	foreach($error as $error)
	{
?>
            <div id="error">
            <h3>&nbsp; <?php echo $error; ?> !</h3> 
            <script type="text/javascript">function timedMsg(){var t=setTimeout("document.getElementById('error').style.display='none';",4000);}</script>
			<script language="JavaScript" type="text/javascript">timedMsg()</script>
            </div>

    <?php
	}
	}
	?>

	<?php
		{
		if(config::get('change_pass'))
		{
			?>
			<div class="form-group">
				<input type="password" class="form-control" name="txt_password" placeholder="New Password" required="" id="username" />
			</div>

			<div class="form-group">
				<input type="password" class="form-control" name="txt_password_confirm" placeholder=" Confirm Password" required="" id="password" />
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-success" name="btn-changepass" value="Update" />
			</div>
		
			<?php
		}
		else
			header("location: message.php?34585474839057488936799350PassChangeDisabled985484");
		}
	      ?>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
<!-- Your scripts. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Your scripts. -->
</body>

</html>
