<?php include ( "inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
        $mail_href="index.php";
}
else {
    
    
   $user = $_SESSION['user_login'];
   $uname_db=$_SESSION['fname'];
    if (isset($_REQUEST['mail'])) {
       
    $mysqli=new mysqli($mysql_server,$mysql_username,$mysql_password,$mysql_db);
    $u_email=$mysqli->real_escape_string($_REQUEST['mail']);
    $mail_href="index.php?mail=".$u_email."";
	
	
                $query="SELECT * FROM user WHERE email='$u_email'";
                $result=$mysqli->query($query);
                
		
                $get_user_email=$result->fetch_assoc();
                
		$uname_db = $get_user_email['firstName'];
    $mysqli->close();
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to E-Shop</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="/js/homeslideshow.js"></script>
	</head>
	<body style="min-width: 980px;">
		<div class="homepageheader" style="position: relative;">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="color: #fff; text-decoration: none;" href="signin.php">SIGN IN</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="profile.php?uid='.$user.'">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
                            <?php
				echo '<a href="".$mail_href."">
					<img style=" height: 75px; width: 130px;" src="image/ebuybdlogo.png">
				</a>';
                              ?>
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
		<div class="home-welcome">
			<div class="home-welcome-text" style="background-image: url(image/homebackgrndimg.png); height: 380px; ">
				<h1 style="margin: 0px;">Welcome To E-Shop</h1>
				<h2>Largest Online Shopping In ...</h2>
			</div>
		</div>
		<div class="home-prodlist">
			<div>
				<h3 style="text-align: center;">Products Category</h3>
			</div>
			<div style="padding: 20px 30px; width: 85%; margin: 0 auto;">
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="women/saree.php">
                                                        <img src="./image/product/saree/sr0.jpg" class="home-prodlist-imgi">
							</a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="women/perfume.php">
                                                        <img src="./image/product/perfume/pf0.jpg" class="home-prodlist-imgi">
							</a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="women/hijab.php">
							<img src="./image/product/hijab/hj0.jpg" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="women/toilatry.php">
							<img src="./image/product/beauty/toiletries.jpg" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="women/footwear.php">
							<img src="./image/product/footwear/footwear1.jpg" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="women/tshirt.php">
							<img src="./image/product/tshirt/1491497644.jpg" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="women/watch.php">
							<img src="./image/product/watch/watches1.jpg" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="women/ornament.php">
							<img src="./image/product/ornament/earrings1.png" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
			</div>			
		</div>
	</body>
</html>