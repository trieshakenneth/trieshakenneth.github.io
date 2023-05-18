<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $age = $_POST["age"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirm_password"];

  // Regular expressions for validation
  $nameRegex = "/^[A-Za-z\s]+$/";
  $emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
  $phoneRegex = "/^\d{10}$/";
  $ageRegex = "/^\d+$/";
  $passwordRegex = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";

  // Validate name
  if (!preg_match($nameRegex, $name)) {
    echo "Invalid name format.";
    exit;
  }

  // Validate email
  if (!preg_match($emailRegex, $email)) {
    echo "Invalid email format.";
    exit;
  }

  // Validate phone
  if (!preg_match($phoneRegex, $phone)) {
    echo "Invalid phone format.";
    exit;
  }

  // Validate age
  if (!preg_match($ageRegex, $age)) {
    echo "Invalid age format.";
    exit;
  }

  // Validate password
  if (!preg_match($passwordRegex, $password)) {
    echo "Password must be at least 8 characters long and contain at least one letter and one digit.";
    exit;
  }

  // Confirm password
  if ($password !== $confirmPassword) {
    echo "Passwords do not match.";
    exit;
  }

  // All fields are valid
  echo "Form submitted successfully!";
}
?>
