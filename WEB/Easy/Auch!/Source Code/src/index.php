<?php
// Start the session
session_start();

$message = '';

// Check if the form is submitted
if (isset($_POST['login'])) {

    // Include the conn.php file
    require_once('conn.php');


    // Get username and password from user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnerable SQL query (vulnerable to SQL injection)
    $sql = "SELECT * FROM login WHERE username='" . $username . "' AND password='" . $password . "'";
    $result = mysqli_query($conn, $sql);

    // Check for errors
    if ($result === false) {
        die("Error executing SQL query: " . mysqli_error($conn));
    }

    // Check if login is successful
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username; // Set session variable
        header('Location: ZmxhZy5waHA=.php'); // Redirect to flag.php
        exit();
    } else {
        $message = 'Login failed. Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fabulous Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
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
        <h2>Login Form</h2>
        <p><?php echo $message; ?></p>
        <form action="index.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" required><br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
