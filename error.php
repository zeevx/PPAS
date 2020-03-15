<!--
Arthur ==> ADAMS PAUL OHIANI
Title ==> ADVANCED WEB LOGIN OPTION(PATTERN)

Simple page shown only if database configurations problem
-->
<!DOCTYPE html>
<html >
	<head>
		  <meta charset="UTF-8">
		  <title>Error | AuthX</title>
	   
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	</head>
			<body>

<?php
		if(isset($_GET['75844857389034858593345677DatabaseError585849']))
		{
			?>
			<center>
				<h2 style="margin-top:100px">Database Configurations Error, Please recheck database configurations.</h2>
				</center>
			</body>

			<?php
        }
		else
		{
			?>
				<center>
				<h2>Nothing to show here</h2></center>
				<?php header("location: index.php") ?>
					</div>
				</form>
			<?php
		}
	?>
</html>