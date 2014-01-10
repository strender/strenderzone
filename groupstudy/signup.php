<?php
	$page_title = 'Sign Up';
	require_once('header.php');
	require_once('connect.php');

	//데이터베이스 연결
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (isset($_POST['submit'])) {
		$user_id = mysqli_real_escape_string($dbc, trim($_POST['user_id']));
		$user_pw = mysqli_real_escape_string($dbc, trim($_POST['user_pw']));
		$user_pw2 = mysqli_real_escape_string($dbc, trim($_POST['user_pw2']));
		$user_name = mysqli_real_escape_string($dbc, trim($_POST['user_name']));

		if (!empty($user_id) && !empty($user_pw) && !empty($user_pw2) && !empty($user_name)&&($user_pw == $user_pw2)) {
			$query = "SELECT * FROM user_info WHERE user_id = '$user_id'";
			$data = mysqli_query($dbc, $query);
			if (mysqli_num_rows($data) == 0) {
				$query = "INSERT INTO user_info (user_id, user_pw, join_date, user_name) VALUES ('$user_id', SHA('$user_pw'), NOW(), '$user_name')";
				mysqli_query($dbc, $query);

				echo '<p>Your new account has been successfully created. You\'re now ready to <a href="index.php">Home</a>.</p>';
				mysqli_close($dbc);
				exit();
			}
			else{
				echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
				$user_id   = "";
			}
		}
	else {
		echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
	}
	}
	mysqli_close($dbc);
?>
<p>원하는 아이디와 비밀번호 및 기타 회원정보를 입력해주세요!</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<fieldset>
		<legend>Registration Info</legend>
		<input type="text" id="username" name="user_id" value="<?php if (!empty($username)) echo $username; ?>" placeholder="아이디" /><br />
		<input type="password" id="password1" name="user_pw" placeholder="비밀번호"/><br />
		<input type="password" id="password2" name="user_pw2" placeholder="비밀번호 재입력" /><br />
		<input type="text" name="user_name" placeholder="이름"><br />
		<input type="submit" value="Sign Up" name="submit" />
	</fieldset>
</form>
<?php 
	require_once('footer.php');
 ?>