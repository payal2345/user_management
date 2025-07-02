<?php
include 'config.php';
session_start();

$message = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['code'], $_POST['new_password']) && isset($_SESSION['reset_code'], $_SESSION['reset_email'])) {
    if ($_POST['code'] == $_SESSION['reset_code']) {
      $email = $_SESSION['reset_email'];
      $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

      $conn->query("UPDATE users SET password='$new_password' WHERE email='$email'");

      $message = "✅ Password has been reset successfully.";
      $success = true;

      // Clear reset session variables
      unset($_SESSION['reset_code'], $_SESSION['reset_email']);
    } else {
      $message = "❌ Invalid code. Please check and try again.";
    }
  } else {
    $message = "⚠️ Please provide all required fields.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title text-center text-primary mb-4">Reset Password</h3>

          <?php if ($message): ?>
            <div class="alert <?= $success ? 'alert-success' : 'alert-danger' ?>">
              <?= htmlspecialchars($message) ?>
            </div>
          <?php endif; ?>

          <?php if (!$success): ?>
          <form method="POST">
            <div class="mb-3">
              <label for="code" class="form-label">Enter OTP Code</label>
              <input type="text" name="code" id="code" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="new_password" class="form-label">New Password</label>
              <input type="password" name="new_password" id="new_password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
          </form>
          <?php endif; ?>

          <div class="text-center mt-3">
            <a href="login.php" class="text-decoration-none">← Back to Login</a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>
