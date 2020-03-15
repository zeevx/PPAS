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
  $passwordconfirm =$userRow['user_pass'];
  $redirect_login = config::get('redirect_login');

  if(!$auth_user->is_loggedin())
{
	$auth_user->redirect('index.php?return=changepass.php');
}

if(isset($_POST['btn-changepat']))
{
	$password = strip_tags($_POST['txt_password']);

	$pat = strip_tags($_POST['txt_pat']);
//
	if(!password_verify($password, $userRow['user_pass'])) {
		$error[] = "Password is incorrect !";
	}
	else if($password=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($pat) < 5){
		$error[] = "Pattern must be of atleast 3 dots";	
	}
	else
		{
			try
			{
		if($user->changepat($pat, $pr_id)){	
					$user->redirect('message.php?90819948564782345789056748PatChanged857432');
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
	<title>Change Pattern | AuthX</title>
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/header-fixed.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>


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
			<h1>Change/Create Pattern</h1>

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

			<div class="form-group">
				<input type="password" class="form-control" name="txt_password" placeholder="Input Password" required="" id="username" />
			</div>

<div id="patternCSSClasses" align="center">New Pattern</div>

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


			<div class="form-group">
				<input type="submit" class="btn btn-success" name="btn-changepat" value="Update" />
			</div>
		
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
<!-- Your scripts. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Your scripts. -->
</body>

</html>
