<?php
ob_start();
$servername='sqldb';
$username='nothing';
$password='toor123!';
$dbname = 'nothing_db';
$conn=mysqli_connect(
    $servername,
    $username,
    $password,
    $dbname
);
  if(!$conn){
      die('Could not Connect MySql Server:');
    }

session_start();
// require_once "db.php";
if (isset($_SESSION['id']) != "") {
    header("Location: dashboard.php");
}
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // $query = "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . $password . "'";
    $query = "SELECT * FROM user_profile WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_array($result)) {
        $type = '7';
        setcookie("id", $type);
        echo $type;
        header("Location: dashboard.php");
        ob_end_flush();
    } else {
    $error_message = "Incorrect Email or Password!!!";
    }
}
echo '
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow ">

 


            <form action="" method="post">
                <div class="col-md-12 right-box">
                    <div class="row align-items-center">
                    
                        <div class="header-text mb-4">
                            <h2>Hello, Again</h2>
                            <p>We are happy to have you back.</p>
                            <span class="text-danger"><?php if (isset($error_message)) echo $error_message; ?></span>

                        </div>
                        
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" required>
                            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                            <!----------------------- Make sure the email have @ to prevent sqli hehe -------------------------->

                        </div>
                        <div class="input-group mb-1">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6"  placeholder="Password" required>
                            <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>

                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">


                        </div>
                        
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-dark w-100 fs-6" type="submit" name="login">Login</button>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
  
    </div>
    </body>
</html>';
?>