<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    // You can process the email here, for example, save it to a database
    // For demonstration purposes, let's just redirect to subscribe1.html

    //if user go to path text, the html file will appear, please hide it!
    header("Location: subscribe1.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Landing Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
        h1 {
            text-align: center;
        }
        form {
            text-align: center;
        }
        input[type="email"], input[type="submit"] {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Subscribe to Our Newsletter</h1>
        <form action="subscribe1.html" method="POST">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="submit" value="Subscribe">
        </form>
        
        <!-- Remove or comment out the line below to hide the link -->
        <!-- <p><a href="subscribe1.html">Subscribe Page</a></p> -->
    </div>
</body>
</html>
