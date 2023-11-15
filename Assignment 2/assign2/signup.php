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
  $mail = null; 
  $profileName = null;
  $password = null;
  
  // set regexes for email, profile name, and password
  $mailRegex = "/^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/";
  $profileRegex = "/^[a-zA-Z ]+$/";
  $passwordRegex = "/^[a-zA-Z0-9]+$/";

  // removing illegal characters
  function sanitizeInput($input)
  {
    // remove any leading or trailing white spaces from the input.
    $input = trim($input); 
    // remove backslashes that might be added during data submission
    $input = stripslashes($input);
    // convert special characters to their HTML entities
    $input = htmlspecialchars($input);
    return $input;
  }

  // checks whether the field value is empty or if it matches the specified regular expression pattern
  function validateField($fieldName, $fieldValue, $regex, $errMsg)
  {
    if (empty($fieldValue)) {
      echo "<span class='err'>$fieldName is empty</span>";
    } else if (!preg_match($regex, $fieldValue)) {
      echo "<span class='err'>$errMsg</span>";
    } else {
      return $fieldValue;
    }
    return null;
  }

  // check if an email address already exists in the 'friends' table of a database
  function checkUniqueEmail($email)
  {
    global $conn, $friends;
    $sql = "SELECT friend_email FROM $friends WHERE friend_email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $numRows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);

    // Return error if the email already exist
    if ($numRows > 0) {
      echo "<span class='err'>Email already exists. Please choose another email</span>";
      return false;
    }
    return true;
  }

  // Check password match or not 
  function checkMatchPasswords($password, $confirmPassword)
  {
    if ($password !== $confirmPassword) {
      echo "<span class='err'>Passwords do not match. Please re-enter your password.</span>";
      return false;
    }
    return true;
  }
  ?>

  <!-- Header and navbar menu -->
  <div class="header">
    <h1>My Friends System</h1>
    <ul class="nav">
      <li class="nav-link"><a href="index.php">Home</a></li>
      <li class="nav-link"><a href="signup.php">Sign-Up</a></li>
      <li class="nav-link"><a href="login.php">Login</a></li>
      <li class="nav-link"><a href="about.php">About</a></li>
    </ul>
  </div>

  <!-- Login Form  -->
  <div class="login_text">
    <h1>Registration Page</h1>
    <form method="post" action="signup.php">
      <div class="row">
        <div class="col-25">
          <p><label for="email">Email</label> </p>
        </div>
        <!-- Check email valid or not -->
        <div class="col-75">
          <p> <input name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $mail = validateField("Email", sanitizeInput($_POST['email']), $mailRegex, "Email is invalid");
              $isMailUnique = checkUniqueEmail($mail);
            }
            ?>
          </p>
        </div>
      </div>
      <!-- Check validity and sanitizes the input for profile name field       -->
      <div class="row">
        <div class="col-25">
          <p><label for="profileName">Profile Name</label></p>
        </div>
        <div class="col-75">
          <p><input name="profileName" value="<?php echo isset($_POST['profileName']) ? htmlspecialchars($_POST['profileName']) : ''; ?>">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $profileName = validateField("Profile Name", sanitizeInput($_POST['profileName']), $profileRegex, "Profile Name is invalid");
            }
            ?>
          </p>
        </div>
      </div>

      <!-- Check password input field meets validation using validateField function -->
      <div class="row">
        <div class="col-25">
          <p><label for="password">Password</label></p>
        </div>
        <div class="col-75">
          <p><input type="password" name="password">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $password = validateField("Password", sanitizeInput($_POST['password']), $passwordRegex, "Password is invalid");
            }
            ?>
          </p>
        </div>
      </div>
      
      <!-- Check if the entered password matches the orignal password using checkMatchPasswords function -->
      <div class="row">
        <div class="col-25">
          <p><label for="confirmPassword">Confirm Password</label></p>
        </div>
        <div class="col-75">
          <p><input type="password" name="confirmPassword">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $arePasswordsMatch = checkMatchPasswords($password, sanitizeInput($_POST['confirmPassword']));
            }
            ?>
          </p>
        </div>
      </div>

      <?php
      // Validation check for email address, profile name, password and unique email
      if ($mail && $profileName && $password && $isMailUnique && $arePasswordsMatch) {
        // insert into the database if the validation passed
        $sql = "INSERT INTO $friends (friend_email, password, profile_name, date_started, num_of_friends) VALUES (?, ?, ?, CURDATE(), 0)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $mail, $password, $profileName);
        if (mysqli_stmt_execute($stmt)) {
          // start the session with the profile name and the number of friends
          session_start();
          $_SESSION['email'] = $mail;
          $_SESSION['loggedIn'] = true;
          // redirect user after creating account
          header("Location: friendadd.php");
          exit();
        } else {
          echo "<p class='err' style=color:red>Error when creating account: " . mysqli_error($conn) . "</p>";
        }
        // display error message if the database insertuion fails
        mysqli_stmt_close($stmt);
      }
      ?>

      <p><input class="button-32" type="submit" value="Register">
        <!-- clear button as a link to refresh the page since the html clear button cant remove default values -->
        <a href="signup.php" class="btnclear">Clear</a>
      </p>
    </form>
  </div>
</body>

</html>