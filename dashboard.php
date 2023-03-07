<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  // Redirect to login page if user is not logged in
  header('Location: login.php');
  exit();
}

// Get the username from the session
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <!-- Include your CSS and other scripts here -->
  <style>
    /* Your CSS code for the navigation bar and other styles here */
    nav {
      background-color: #333;
      color: #fff;
      padding: 10px;
    }

    nav h1 {
      margin: 0;
      font-size: 24px;
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    nav li {
      margin-right: 10px;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      padding: 10px;
    }

    nav a:hover {
      background-color: #ddd;
      color: #333;
    }
  </style>
</head>
<body>
  <!-- Your HTML code for the dashboard page here -->
  <nav>
    <h1>WELCOME TO THE FILE MANAGER</h1><BR>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="files.php">Files</a></li>
      <li><a href="#">Settings</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
  
  <?php
  // Generate JavaScript code to display a welcome message in a pop-up
  echo '<script>alert("Welcome ' . $username . '");</script>';
  ?>
</body>
</html>
