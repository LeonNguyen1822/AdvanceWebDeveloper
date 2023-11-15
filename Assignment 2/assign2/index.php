<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Friends System</title>
  <link rel="stylesheet" href="style/styles.css">

</head>

<!-- Background image and Header navbar -->
<body class="bg_image">
  <div class="header">
    <h1>My Friends System</h1>
    <ul class="nav">
      <li class="nav-link"><a href="index.php">Home</a></li>
      <li class="nav-link"><a href="signup.php">Sign-Up</a></li>
      <li class="nav-link"><a href="login.php">Login</a></li>
      <li class="nav-link"><a href="about.php">About</a></li>
    </ul>
  </div>

  <!-- Text content -->
  <div class="bg_text">
    <h1>Assignment Home Page</h1>
    <p>Name: Leon Nguyen</p>
    <p>Student ID: 103139729 </p>
    <p>Email: <a class="email" href="mailto:103139729@student.swin.edu.au">103139729@student.swin.edu.au</a></p>
    <p>I declare that this assignment is my individual work. I have not worked collaboratively nor have I copied from any other students work or from any other source.</p>
  </div>
  

  <div class="grid_container">
    <?php
    require_once("settings.php");

    // If "friends" table doesn't already exist, create it.
    $sql1 = "CREATE TABLE IF NOT EXISTS $friends (
    friend_id INT NOT NULL AUTO_INCREMENT,
    friend_email VARCHAR(50) NOT NULL,
    password VARCHAR(20) NOT NULL,
    profile_name VARCHAR(30) NOT NULL,
    date_started DATE NOT NULL,
    num_of_friends INT UNSIGNED NOT NULL,
    PRIMARY KEY (friend_id)
  )";

    // Run the query and look for any errors. Print success or failure message
    if (mysqli_query($conn, $sql1)) {
      echo "<p style=color:green>Table $friends created successfully.</p>";
    } else {
      echo "<p style=color:red>Error creating table: " . mysqli_error($conn) . "</p>";
    }

    // If "myfriends" table doesn't already exist, create it.
    $sql2 = "CREATE TABLE IF NOT EXISTS $myfriends (
    friend_id1 INT NOT NULL,
    friend_id2 INT NOT NULL
  )";

    // Run the query and look for any errors.
    if (mysqli_query($conn, $sql2)) {
      echo "<p style=color:green>Table $myfriends created successfully.</p>";
    } else {
      echo "<p style=color:red>Error while creating table: " . mysqli_error($conn) . "</p>";
    }

    // Verify if the "friends" table is empty.
    $sql3 = "SELECT * FROM $friends";
    $result = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($result) > 0) {
      echo "<p style=color:green>Table $friends has data already.</p>";
    } else {

      // Add example data to the table "friends"
      $sql4 = "INSERT INTO $friends (friend_email, password, profile_name, date_started, num_of_friends)
    VALUES
    ('newfriend1@example.com', 'newpassword1', 'Alice Johnson', '2023-01-05', 5),
      ('newfriend2@example.com', 'newpassword2', 'Bob Smith', '2023-02-20', 5),
      ('newfriend3@example.com', 'newpassword3', 'Ella Davis', '2023-03-15', 5),
      ('newfriend4@example.com', 'newpassword4', 'Charlie Brown', '2023-04-25', 5),
      ('newfriend5@example.com', 'newpassword5', 'Grace Wilson', '2023-05-10', 5),
      ('newfriend6@example.com', 'newpassword6', 'Henry Lee', '2023-06-22', 5),
      ('newfriend7@example.com', 'newpassword7', 'Lily Anderson', '2023-07-11', 5),
      ('newfriend8@example.com', 'newpassword8', 'Noah Taylor', '2023-08-15', 5),
      ('newfriend9@example.com', 'newpassword9', 'Mia Smith', '2023-09-28', 5),
      ('newfriend10@example.com', 'newpassword10', 'William Davis', '2023-10-31', 5)";

      // Run the query and look for any errors
      if (mysqli_query($conn, $sql4)) {
        echo "<p style=color:green>Sample data successfully added to table $friends.</p>";
      } else {
        echo "<p style=color:red>Error while inserting data: " . mysqli_error($conn) . "</p>";
      }
    }

    // Verify if the "myfriends" table is empty
    $sql5 = "SELECT * FROM $myfriends";
    $result = mysqli_query($conn, $sql5);
    if (mysqli_num_rows($result) > 0) {
      echo "<p style=color:green>Table $myfriends has data already.</p>";
    } else {
      //  Add example data to the table "myfriends"
      $sql4 = "INSERT INTO $myfriends (friend_id1, friend_id2)
    VALUES
      (1, 2),
      (2, 3),
      (3, 4),
      (4, 5),
      (5, 6),
      (6, 7),
      (7, 8),
      (8, 9),
      (9, 10),
      (10, 1),
      (1, 3),
      (2, 4),
      (3, 5),
      (4, 6),
      (5, 7),
      (6, 8),
      (7, 9),
      (8, 10),
      (9, 1),
      (10, 2)";

      // Run the query and look for any errors.
      if (mysqli_query($conn, $sql4)) {
        echo "<p style=color:green>Sample data successfully added to table $myfriends.</p>";
      } else {
        echo "<p style=color:red>Error while inserting data: " . mysqli_error($conn) . "</p>";
      }
    }

    // Close connection
    mysqli_close($conn);
    ?>
  </div>
</body>

</html>