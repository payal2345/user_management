<!-- register_submit.php -->
<?php
include 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$image = $_FILES['profile_image']['name'];
$tmp = $_FILES['profile_image']['tmp_name'];
move_uploaded_file($tmp, "uploads/$image");

$sql = "INSERT INTO users (name, email, password, profile_image) VALUES ('$name', '$email', '$password', '$image')";
$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Success</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow rounded-4 text-center">
        <div class="card-body">
          <h2 class="text-success mb-3">Registration Successful 🎉</h2>
          <p class="lead">Welcome, <strong><?= htmlspecialchars($name) ?></strong>! Your account has been created.</p>
          <a href="login.php" class="btn btn-primary mt-3 w-100">Go to Login</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
