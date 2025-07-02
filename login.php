<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title mb-4 text-center text-primary">User Login</h3>

          <form method="POST" action="login_submit.php">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>

          <div class="mt-3 text-center">
            <a href="forgot_password.php" class="text-decoration-none">Forgot Password?</a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>
