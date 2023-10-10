<?php
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$email = test_input("test@email.com");
$validateMessage = "email are valid";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $validateMessage = "Invalid email format";
} 

echo $validateMessage;