<?php
// connect to the database
$conn = mysqli_connect('localhost', 'id20414586_root', '[GcR>b>7pD>pHfmi', 'id20414586_mydatabase');

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // get the form data
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // validate the input data
  // ...

  // check if the username or email already exists
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
  if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("Username or email already exists");</script>';
  } else {
    // insert the new user into the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')");

    // redirect the user to the login page
    header('Location: login.php');
    exit();
  }
}
?>
