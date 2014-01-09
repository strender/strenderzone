<!--스터디그룹원을 쉽게 찾을 수 있도록 하는 홈페이지 제작-->
<!--2014.01.03-->
<!--현재진행상태: 간단한 회원 DB구축 및 로그인 기능 제작-->
<!--2014.01.03-->
<!--로그아웃 기능 임시로 제작. 한페이지에 합치는 기능 넣으려 할 것. 완료.  회원가입 폼을 만들기도 해야하고, DB설계도 다시 해야함.-->
<?php
	require_once('connect.php');
	//세션 시작
	session_start();
	//에러 메세지 초기화
	$error_msg = "";
	//로그인 체크
	if (!isset($_SESSION['user_key'])){
		//양식 제출했는지 확인
		if (isset($_POST['submit'])) {
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			$user_id = mysqli_real_escape_string($dbc, trim($_POST['user_id']));
			$user_pw = mysqli_real_escape_string($dbc, trim($_POST['user_pw']));

			//ID, PW입력했는지 확인
			if (!empty($user_id) && !empty($user_pw)) {
				//DB에서 값들 찾아보기
				$query = "SELECT user_key, user_name FROM user_info WHERE user_id = '$user_id' AND user_pw = SHA('$user_pw')";
				$data = mysqli_query($dbc, $query);

				if (mysqli_num_rows($data) == 1) {
					//로그리인이 처리된 것이므로, 세션변수와 쿠키변수 설정해두기
					$row = mysqli_fetch_array($data);
					$_SESSION['user_key'] = $row['user_key'];
					$_SESSION['user_name'] = $row['user_name'];
					setcookie('user_key', $row['user_key'], time() + (60 * 60 * 6));
					setcookie('user_name', $row['user_name'], time() + (60 * 60 * 6));
					$home_url = 'http://'. $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);
					header('Location: '. $home_url);
				}
				else{
					$error_msg = '올바른 이름과 비밀번호를 입력해주세요';
				}
			}
			else{
				var_dump($user_id);
				var_dump(empty($user_id));
				$error_msg = 'ID와 비밀번호를 입력해주세요';
			}
		}
	}
	//DB 연결
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$page_title = "자신만의 studymate를 찾아보세요!";

	//html부분 완성
	require_once('header.php');
	require_once('navmenu.php');
	require_once('content.php');


	//DB연결

	if (empty($_SESSION['user_key'])) {
		echo '<p class="error">' . $error_msg . '</p>';
	}
	require_once('footer.php');
?>