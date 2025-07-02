<?php
include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);

    // Handle profile image
    $image = $user['profile_image']; // Default to current image
    if (!empty($_FILES['profile_image']['name'])) {
        $image = basename($_FILES['profile_image']['name']);
        move_uploaded_file($_FILES['profile_image']['tmp_name'], "uploads/$image");
    }

    // Update database
    $user_id = $user['id'];
    $sql = "UPDATE users SET name='$name', email='$email', profile_image='$image' WHERE id=$user_id";
    $conn->query($sql);

    // Update session data
    $res = $conn->query("SELECT * FROM users WHERE id=$user_id");
    $_SESSION['user'] = $res->fetch_assoc();

    // Redirect after update
    header("Location: dashboard.php");
    exit;
}
?>

<!-- HTML with Bootstrap -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title text-center text-primary mb-4">Edit Profile</h3>

          <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="profile_image" class="form-label">Profile Image</label>
              <input type="file" name="profile_image" id="profile_image" class="form-control">
              <?php if (!empty($user['profile_image'])): ?>
                <div class="mt-2">
                  <img src="uploads/<?= htmlspecialchars($user['profile_image']) ?>" width="100" class="rounded shadow-sm" alt="Profile Image">
                </div>
              <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Profile</button>
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
