<!-- verify_code.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Verify Code & Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow-lg rounded-4">
        <div class="card-body">
          <h3 class="card-title mb-4 text-center text-primary">Reset Your Password</h3>

          <form method="POST" action="reset_password.php">
            <div class="mb-3">
              <label for="code" class="form-label">Enter 6-digit OTP Code</label>
              <input type="text" name="code" id="code" class="form-control rounded-3" placeholder="Enter OTP" required>
            </div>

            <div class="mb-3">
              <label for="new_password" class="form-label">New Password</label>
              <input type="password" name="new_password" id="new_password" class="form-control rounded-3" placeholder="Enter new password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-3">Reset Password</button>
          </form>

          <div class="text-center mt-3">
            <a href="login.php" class="text-decoration-none text-secondary">← Back to Login</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>
