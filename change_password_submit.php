<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
$user_id = $_SESSION['user']['id'];
$conn->query("UPDATE users SET password='$new_password' WHERE id=$user_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Password Changed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow rounded-4 text-center">
        <div class="card-body">
          <h3 class="text-success mb-3">✅ Password Changed Successfully</h3>
          <p class="lead">Your new password has been updated.</p>
          <a href="dashboard.php" class="btn btn-primary mt-3 w-100">Return to Dashboard</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
