<?php
// Set the hidden message
$hidden_message = "4turkr34tif24{g3n84_84k3ry}";

// Set the cookie with the hidden message
setcookie('hidden_message', $hidden_message, time() + (86400 * 30), '/'); // Cookie expires in 30 days
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies at GENBA</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #500242; /* Light pink background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff; /* White container */
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #ff69b4; /* Pink heading */
            margin-bottom: 20px;
        }
        .message {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }
        .no-message {
            font-size: 16px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cookies at GENBA</h1>
        
    </div>
</body>
</html>
