<?php
  // Insert the page header
  $page_title = 'Sign Up';
  require_once('header.php');
  require_once('connect.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $user_id = mysqli_real_escape_string($dbc, trim($_POST['user_id']));
    $user_pw = mysqli_real_escape_string($dbc, trim($_POST['user_pw']));
    $user_pw2 = mysqli_real_escape_string($dbc, trim($_POST['user_pw2']));
    $user_name = mysqli_real_escape_string($dbc, trim($_POST['user_name']));

    if (!empty($user_id) && !empty($user_pw) && !empty($user_pw2) && !empty($user_name)&&($user_pw == $user_pw2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM user_info WHERE user_id = '$user_id'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO user_info (user_id, user_pw, join_date, user_name) VALUES ('$user_id', SHA('$user_pw'), NOW(), '$user_name')";
        mysqli_query($dbc, $query);

        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You\'re now ready to <a href="index.php">Home</a>.</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
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
      <label for="user_id">ID:</label>
      <input type="text" id="username" name="user_id" value="<?php if (!empty($username)) echo $username; ?>" placeholder="아이디" /><br />
      <label for="user_pw">Password:</label>
      <input type="password" id="password1" name="user_pw" placeholder="비밀번호"/><br />
      <label for="user_pw2">Password (retype):</label>
      <input type="password" id="password2" name="user_pw2" placeholder="비밀번호 재입력" /><br />
      <label for="user_name">Name:</label>
      <input type="text" name="user_name" placeholder="이름"><br />
    </fieldset>
      <input type="submit" value="Sign Up" name="submit" />
  </form>

<?php
  // Insert the page footer
  require_once('footer.php');
?>
