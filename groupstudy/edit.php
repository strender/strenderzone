<?php 
	//세션 시작
	require_once('startsession.php');
	require_once('connect.php');

	$page_title = '개인정보 수정';
	require_once('header.php');

	if (!isset($_SESSION['user_key'])){
		echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
		exit();
	}

	//네비게이션 바는 출력해야됨
	require_once('navmenu.php');

	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	//POST로 제출한 값 가져오기
	if (isset($_POST['submit'])){
		$gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
		$birthdate = mysqli_real_escape_string($dbc, trim($_POST['birthdate']));
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
		$phone = mysqli_real_escape_string($dbc, trim($_POST['phone']));
		$avail_city = mysqli_real_escape_string($dbc, trim($_POST['avail_city']));

		//값이 다 차있는지 확인이 되면 DB에 제출하기
		if (!empty($gender) && !empty($birthdate) && !empty($email) && !empty($phone) && !empty($avail_city)) {
			$query = "UPDATE user_info SET gender = '$gender', birthdate = '$birthdate', email = '$email', phone = '$phone', avail_city = '$avail_city'" .
						" WHERE user_key = '". $_SESSION['user_key'] ."'";
			mysqli_query($dbc, $query);
		
			//사용자에게 잘 저장되었다고 알려주기
			echo '<p>성공적으로 저장되었습니다.</p>';
			mysqli_close($dbc);
			exit();
		}
		else{
			echo '<p>모든 데이터 값을 입력해주셔야 합니다.</p>';
		}
	}
	else{
		$query = "SELECT gender, birthdate, email, phone, avail_city FROM user_info WHERE user_key = '" . $_SESSION['user_key'] . "'"; 
		$data = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($data);

		if ($row != NULL) {
			$gender = $row['gender'];
			$birthdate = $row['birthdate'];
			$email = $row['email'];
			$phone = $row['phone'];
			$avail_city = $row['avail_city'];
		}
		else{
			echo '<p>사용자의 데이터 값을 불러들여오는 데 오류가 발생했습니다.</p>';
		}
	}
	mysqli_close($dbc);
?>
<!--html form양식-->
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
	<label for="gender">성별:</label>
	<select name="gender" id="gender">
		<option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>남자</option>
		<option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>여자</option>
	</select><br />
	<label for="birthdate">생년월일:</label>
	<input type="text" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) echo $birthdate; ?>" placeholder='생일 ex)1990-01-24' /><br />
	<label for="email">이메일:</label>
	<input type="text" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" placeholder='이메일'/><br />
	<label for="phone">연락처:</label>
	<input type="text" id="phone" name="phone" value="<?php if (!empty($phone)) echo $phone; ?>" placeholder='연락처'/><br />
	<label for="birthdate">가능한 장소:</label>
	<input type="text" id="avail_city" name="avail_city" value="<?php if (!empty($avail_city)) echo $avail_city; ?>" placeholder='스터디 가능한 장소'><br />
	<input type="submit" name="submit" value="저장" />
</form>
<?php 
	require_once('footer.php');
?>