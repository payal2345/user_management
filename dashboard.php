<!-- dashboard.php -->
<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card shadow rounded-4">
        <div class="card-body text-center">

          <h2 class="text-primary mb-4">Welcome, <?= htmlspecialchars($user['name']) ?></h2>

          <img src="uploads/<?= htmlspecialchars($user['profile_image']) ?>" class="rounded-circle shadow mb-3" width="120" height="120" alt="Profile Image">

          <p class="mb-2"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>

          <div class="d-grid gap-2 col-8 mx-auto mt-4">
            <a href="edit_profile.php" class="btn btn-outline-primary">Edit Profile</a>
            <a href="change_password.php" class="btn btn-outline-secondary">Change Password</a>
            <a href="download_pdf.php" class="btn btn-outline-success">Download Profile (PDF)</a>
            <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
