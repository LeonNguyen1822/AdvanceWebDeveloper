<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8" /> 
  <meta name="description" content="Web application development" /> 
  <meta name="keywords" content="PHP" /> 
  <meta name="author"   content="Leon Nguyen 103139729" /> 
  <title>Lab 8 – MySQL Databases with PHP</title> 
</head> 
<body> 
<h1>Web Programming - Lab08</h1>
<h2>Task 2: VIP member Registration System</h2>
<hr>
<h3>Add New Member Form</h3>

<form action="member_add.php" method = "post">
    <fieldset>
        <legend style="font-weight:bold">Sign up your membership</legend>
        <p>First Name: <input type="text" name="mFirst" required maxlength="40"></p>
        <p>Last Name: <input type="text" name="mLast" required maxlength="40"></p>
        <p>Gender: <input type="text" name="mGender" required maxlength="1"></p>
        <p>Email: <input type="text" name="mEmail" required maxlength="40"></p>
        <p>Phone: <input type="text" name="mPhone" required maxlength="20"></p>
    </fieldset>
    <p><input type="submit">
    <input type="reset"></p>
</form>

<hr>
<a href="vip_member.php">Home Page | </a>
<a href="member_add_form.php">Add another member | </a>
<a href="member_display.php">Display all members | </a>
<a href="member_search.php">Search for member(s)</a>
</body> 
</html> 