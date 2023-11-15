<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Friends System</title>
  <link rel="stylesheet" href="style/styles.css">
</head>

<body class="bg_image">
  <?php
  require_once("settings.php");

  // set up variables
  $inputEmail = null;
  $inputPassword = null;
  $msg1 = null;
  $msg2 = null;
  $msg3 = null;
  $msg4 = null;

  // function for validating fields
  function validateField($fieldName, $fieldValue)
  {
    if (empty($fieldValue)) {
      echo "<span class='err'>$fieldName is empty</span>";
    } else {
      return $fieldValue;
    }
    return null;
  }

  // Sanitising function for input
  function sanitizeInput($input)
  {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
  }
  ?>
  <div class="header">
    <h1>My Friends System</h1>
    <ul class="nav">
      <li class="nav-link"><a href="index.php">Home</a></li>
      <li class="nav-link"><a href="signup.php">Sign-Up</a></li>
      <li class="nav-link"><a href="login.php">Login</a></li>
      <li class="nav-link"><a href="about.php">About</a></li>
    </ul>
  </div>

  <!-- Login Form -->
  <div class="login_text">
    <h1>Log in page</h1>
    <form method="post" action="login.php">
      <div class="row">
        <div class="col-25">
          <p><label for="email">Email</label> </p>
        </div>
        <div class="col-75">
          <p><input name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <?php
            // Validate email and sanitise input
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $inputEmail = validateField("Email", sanitizeInput($_POST['email']));
            }
            ?>
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <p><label for="password">Password</label></p>
        </div>
        <div class="col-75">
          <p><input type="password" name="password">
            <?php
            // validate password and sanitise input
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $inputPassword = validateField("Password", sanitizeInput($_POST['password']));
            }
            ?>
          </p>
        </div>
      </div>

      <?php
      //Verify whether the user submitted the form 
      if ($inputEmail && $inputPassword) {
        $sql = "SELECT friend_email, password FROM $friends WHERE friend_email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $inputEmail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        // Check whether an email exists then proceeds to check the password
        if (mysqli_stmt_num_rows($stmt) > 0) {
          mysqli_stmt_bind_result($stmt, $dbEmail, $dbPassword);
          mysqli_stmt_fetch($stmt);
          // Login Authentication
          if ($dbPassword === $inputPassword) {
            // Set up session variable(s) to a successful login status and redirect to friendlist.php
            session_start();
            $_SESSION['email'] = $inputEmail;
            $_SESSION['loggedIn'] = true;
            header("Location: friendlist.php");
            exit();
          } else {
            echo "<p class='err'>Incorrect email or password</p>";
          }
        } else {
          echo "<p class='err'>Incorrect email or password</p>";
        }

        mysqli_stmt_close($stmt);
      }
      ?>

      <p><input class="button-32" type="submit" value="Log in">
        <!-- clear button as a link to refresh the page since the html clear button cant remove default values -->
        <a href="login.php" class="btnclear">Clear</a>
      </p>
    </form>
  </div>
</body>

</html>