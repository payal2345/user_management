<?php 
require_once('tcpdf/tcpdf.php');
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
$pdf = new TCPDF();
$pdf->AddPage();

// Get absolute path to the uploaded image
$imagePath = 'uploads/' . $user['profile_image'];
if (file_exists($imagePath)) {
    $imageHTML = "<img src='" . $imagePath . "' width='100'>";
} else {
    $imageHTML = "<p><em>No profile image found.</em></p>";
}

$html = "
  <h2 style='color:#0066cc;'>User Profile</h2>
  <hr>
  $imageHTML
  <p><strong>Name:</strong> " . htmlspecialchars($user['name']) . "</p>
  <p><strong>Email:</strong> " . htmlspecialchars($user['email']) . "</p>
";

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('profile.pdf', 'D');
