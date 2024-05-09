<?php
// Start the session
session_start();

$message = '';

// Database connection details
$servername = "db";
$databasename = "sqli"; // Make sure this matches your actual database name
$username = "mysql";
$password = "root";

// Create a connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['login'])) {

    // Get username and password from user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username contains "OR"
    if (stripos($username, 'OR') !== false || 
    stripos($username, 'AND') !== false ||
    stripos($username, 'LIKE') !== false ||
    stripos($username, '--') !== false ||
    stripos($username, '=') !== false)   {
        $message = 'SQL injection attempt detected!';
    } else {
        // Vulnerable SQL query (vulnerable to SQL injection)
        $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        // Check if login is successful
        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username; // Set session variable
            header('Location: Quivnix.php'); // Redirect to flag.php
            exit();
        } else {
            $message = 'Login failed. Invalid username or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href="img/auch.png">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('img/inject.jpg');
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        
        h2 {
            color: #333;
        }
        
        p {
            color: red;
        }
        
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Level 2</h2>
        <h4>Filter: OR, AND, LIKE, --, = </h4>
        <p><?php echo $message; ?></p>
        <p><?php echo $sql; ?></p>
        <form action="Glipzor.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" required><br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
