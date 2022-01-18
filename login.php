<?php include ( "inc/connect.inc.php" ); ?>
<?php session_start(); ?>
<?php
ob_start();
if (!isset($_SESSION['user_login'])) {
}
else {
	header("location: index.php");
}
$emails = "";
$passs = "";
$mysqli=new mysqli($mysql_server,$mysql_username,$mysql_password,$mysql_db);
if (isset($_POST['login'])) {
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$user_login = $mysqli -> real_escape_string($_POST['email']);
		$user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");	
		$password_login = $mysqli -> real_escape_string($_POST['password']);		
		$num = 0;
		$password_login_md5 = md5($password_login);
                
                $query="SELECT * FROM user WHERE (email='$user_login') AND password='$password_login_md5' AND activation='yes'";
                $result=$mysqli->query($query);
                $num=$result->num_rows;
                $get_user_email=$result->fetch_assoc();
		if ($num>0) {
                        $get_user_uname_db = $get_user_email['id'];
                        $first_name=$get_user_email['firstName'];
                        $_SESSION['fname']=$first_name;
			$_SESSION['user_login'] = $get_user_uname_db;
			setcookie('user_login', $user_login, time() + (365 * 24 * 60 * 60), "/");
			
			if (isset($_REQUEST['ono'])) {
				$ono = $mysqli -> real_escape_string($_REQUEST['ono']);
				header("location: orderform.php?poid=".$ono."");
			}else {
				header("location: index.php?mail=".$user_login."");
			}
			exit();
		}
		else {
                        $query="SELECT * FROM user WHERE (email='$user_login') AND password='$password_login_md5' AND activation='no'";
                        $result1=$mysqli->query($query);
                        
                        $num1=$result1->num_rows;
                       
		if ($num1>0) {
			$emails = $user_login;
			$activacc ='';
		}else {
			$emails = $user_login;
			$passs = $password_login;
			$error_message = '<br><br>
				<div class="maincontent_text" style="text-align: center; font-size: 18px;">
				<font face="bookman">Email or Password incorrect.<br>
				</font></div>';
		}
			
		}
                $mysqli->close();
	}

}
$acemails = "";
$acccode = "";
if(isset($_POST['activate'])){
	if(isset($_POST['actcode'])){
		$user_login = $mysqli -> real_escape_string($_POST['acemail']);
		$user_acccode = $mysqli -> real_escape_string($_POST['actcode']);
                $query="SELECT * FROM user WHERE (email='$user_login') AND confirmCode='$user_acccode'";
                $result2=$mysqli->query($query);
                $num3=$result2->num_rows;
		echo $user_login;
		if ($num3>0) {
                        $get_user_email=$result2->fetch_assoc();
			$get_user_uname_db = $get_user_email['id'];
                        $_SESSION['user_login'] = $get_user_uname_db;
                        $first_name=$get_user_email['firstName'];
                        $_SESSION['fname']=$first_name;
                        
			setcookie('user_login', $user_login, time() + (365 * 24 * 60 * 60), "/");
                        $query="UPDATE user SET confirmCode='0', activation='yes' WHERE email='$user_login'";
                        $result3=$mysqli->query($query);
			if (isset($_REQUEST['ono'])) {
				$ono = $mysqli -> real_escape_string($_REQUEST['ono']);
				header("location: orderform.php?poid=".$ono."");
			}else {
				header('location: index.php');
			}
			exit();
		}else {
			$emails = $user_login;
			$error_message = '<br><br>
				<div class="maincontent_text" style="text-align: center; font-size: 18px;">
				<font face="bookman">Code not matched!<br>
				</font></div>';
		}
                $mysqli->close();
	}else {
		$error_message = '<br><br>
				<div class="maincontent_text" style="text-align: center; font-size: 18px;">
				<font face="bookman">Activation code not matched!<br>
				</font></div>';
	}

}
    
    
?>

<!doctype html>
<html>
	<head>
		<title>Welcome to ebuybd online shop</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="home-welcome-text" style="background-image: url(image/homebackgrndimg.png);">
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<a style="text-decoration: none; color: #fff;" href="signin.php">SIGN IN</a>
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="image/ebuybdlogo.png">
				</a>
			</div>
			<div class="">
				<div id="srcheader">
					<form id="newsearch" method="get" action="search.php">
					        <input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..."><input type="submit" value="search" class="srcbutton" >
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
		<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 110px;">
			<div class="container">
				<div>
					<div>
						<div class="signupform_content">
							<?php
							 	if (isset($activacc)){
							 		echo '<h2>Activation Form</h2>';
							 	}else {
							 		echo '<h2>Login Form</h2>';
							 	}
							?>
							<div class="signupform_text"></div>
							<div>
								<form action="" method="POST" class="registration">
									<div class="signup_form">
										<?php
											if (isset($activacc)) {

												echo '
													<div class="signup_error_msg">
														<div class="maincontent_text" style="text-align: center; font-size: 18px;">
													<font face="bookman">Check your email!<br>
													</font></div>
													</div>
													<div>
														<td>
															<input name="acemail" placeholder="Enter Your Email" required="required" class="email signupbox" type="email" size="30" value="'.$emails.'">
														</td>
													</div>
													<div>
														<td>
															<input name="actcode" placeholder="Activation Code" required="required" class="email signupbox" type="text" size="30" value="'.$acccode.'">
														</td>
													</div>
													<div>
														<input name="activate" class="uisignupbutton signupbutton" type="submit" value="Active Account">
													</div>
													';
											}else{
												echo '
										<div>
											<td>
												<input name="email" placeholder="Enter Your Email" required="required" class="email signupbox" type="email" size="30" value="'.$emails.'">
											</td>
										</div>
										<div>
											<td>
												<input name="password" id="password-1" required="required"  placeholder="Enter Password" class="password signupbox " type="password" size="30" value="'.$passs.'">
											</td>
										</div>
										<div>
											<input name="login" class="uisignupbutton signupbutton" type="submit" value="Log In">
										</div>
										';
											}
										  ?>
										<div style="float: right;">
											<a class="forgetpass" href="forgetpass.php">
												<span>forget your password???</span>
											</a>
										</div>
										<div class="signup_error_msg">
											<?php 
												if (isset($error_message)) {echo $error_message;}
												
											?>
										</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
