
<link rel="stylesheet" href="signup.css">
<div class="container">

<form action="login.php" method="POST">
  <input type="text" name="username" placeholder="Username" required>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Login</button><br>
<a href="index.php">Sign Up</a>
</form>
</div>
<?php
// start the session
session_start();

// connect to the database
$conn = mysqli_connect('localhost', 'root', 'musab', 'mydatabase');

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // get the form data
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // validate the input data
  // ...

  // check if the username and password match a record in the database
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
// verify the password
if (password_verify($password, $user['password'])) {
  // set session variables and redirect to the dashboard page
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['username'] = $user['username'];
  header('Location: dashboard.php');
  exit();
} else {
  echo "Incorrect username or password.";
}
} else {
    echo "Incorrect username or password.";
    }
    }
    ?>