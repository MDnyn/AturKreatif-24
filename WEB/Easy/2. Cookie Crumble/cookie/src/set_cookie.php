<?php
// Set the hidden message
$hidden_message = "4turkr34tif24{flag}";

// Set the cookie with the hidden message
setcookie('hidden_message', $hidden_message, time() + (86400 * 30), '/'); // Cookie expires in 30 days

// Redirect to another page or just end the script
exit();
?>
