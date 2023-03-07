<?php

// Check if the file was uploaded without errors
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
  // Get the details of the uploaded file
  $filename = $_FILES['file']['name'];
  $tmpname = $_FILES['file']['tmp_name'];
  $size = $_FILES['file']['size'];
  $type = $_FILES['file']['type'];

  // Move the uploaded file to the "uploads" directory
  move_uploaded_file($tmpname, 'uploads/' . $filename);

  // Redirect back to the file.php page after successful upload
  header('Location: files.php');
  exit();
} else {
  // Display an error message if file upload failed
  echo 'Error uploading file.';
}

?>
