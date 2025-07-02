<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'config.php';
session_start();

// Start HTML Output
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Send OTP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow rounded-4">
        <div class="card-body">
          <h3 class="card-title mb-4 text-center text-primary">OTP Status</h3>

<?php
// Fetch form data
$email = $conn->real_escape_string($_POST['email']);
$code = rand(100000, 999999);

// Check if email exists
$res = $conn->query("SELECT * FROM users WHERE email='$email'");
if ($res->num_rows === 0) {
    echo '<div class="alert alert-danger rounded-3">❌ Email not found. 
          <a href="forgot_password.php" class="alert-link">Try again</a></div>';
} else {
    // Save OTP in session
    $_SESSION['reset_code'] = $code;
    $_SESSION['reset_email'] = $email;

    try {
        // Setup PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'biswabanditamaharana123@gmail.com';
        $mail->Password = 'ojckavopkcrhoagz'; // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('biswabanditamaharana123@gmail.com', 'Admin');
        $mail->addAddress($email);
        $mail->Subject = 'Your Password Reset Code';
        $mail->Body = "Your 6-digit code is: $code";

        $mail->send();

        echo '<div class="alert alert-success rounded-3">
                ✅ Code sent to <strong>' . htmlspecialchars($email) . '</strong>.<br>
                <a href="verify_code.php" class="btn btn-success w-100 mt-3 rounded-3">Go to Reset Password</a>
              </div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-danger rounded-3">
                ❌ Email could not be sent.<br>
                <strong>Error:</strong> ' . $mail->ErrorInfo . '<br>
                <a href="forgot_password.php" class="btn btn-danger mt-3 w-100 rounded-3">Back to Forgot Password</a>
              </div>';
    }
}
?>

        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
