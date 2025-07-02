<!-- forgot_password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title mb-4 text-center text-primary">Forgot Password</h3>

          <form method="POST" action="send_code.php">
            <div class="mb-3">
              <label for="email" class="form-label">Enter Your Registered Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Send OTP Code</button>
          </form>

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
