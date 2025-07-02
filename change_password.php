<!-- change_password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title mb-4 text-center text-primary">Change Password</h3>

          <form method="POST" action="change_password_submit.php">
            <div class="mb-3">
              <label for="new_password" class="form-label">New Password</label>
              <input type="password" name="new_password" id="new_password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Change Password</button>
          </form>

          <div class="text-center mt-3">
            <a href="dashboard.php" class="text-decoration-none">← Back to Dashboard</a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>
