<?php
	$temp = ''; 
	echo '<hr />';
	if (isset($_SESSION['user_key'])) {
		echo '<a href="index.php">Home</a> &#10084; ';
		echo '<a href="viewprofile.php">View Profile</a> &#10084; ';
		echo '<a href="edit.php">Edit Profile</a> &#10084; ';
		echo '<a href="logout.php">Log Out (' . $_SESSION['user_name'] . ')</a>';
	}
	else{
		echo '<script>function moveSignup(){
			location.href="/groupstudy/signup.php";
		}</script>';
		echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><fieldset><legend>Log In</legend>';
		echo'<input type="text" name="user_id" value="" placeholder="아이디" required="required"/><br />';
		echo'<input type="password" name="user_pw" value="" placeholder="비밀번호" required="required"/><br />';
		echo'<input type="submit" value="Log In" name="submit" />or <input type="button" value="Sign up" name="Signup" onClick="moveSignup();"/></fieldset></form>';
	}
 ?>