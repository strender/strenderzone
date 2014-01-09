<br />
<?php 
	if (isset($_SESSION['user_key'])) {
		echo '로그인 했을때 간단히 페이지 소개하는 내용을 담은 페이지';
	} else {
		echo'로그인 안했을 때 페이지 소개하는 내용 담은 페이지';
	}
	
 ?>