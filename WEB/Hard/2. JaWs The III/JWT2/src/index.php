<?php
// Define valid rolename and password
$valid_rolename = "Arlong";
$valid_password = "Jaws";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve rolename and password from form
    $rolename = $_POST["rolename"];
    $password = $_POST["password"];

    // Check if rolename and password are correct
    if ($rolename === $valid_rolename && $password === $valid_password) {
        // Redirect to wompus.php
        header("Location: w0mpu$.php");
        exit();
    } else {
        // Incorrect rolename or password
        echo "Incorrect rolename or password. Please try again.";
    }
}
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Same but not same</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootswatch/3.2.0/united/bootstrap.min.css"
    />
    <style type="text/css">
      .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 15px;
        margin: auto;
      }
    </style>
  </head>
  <body>
    <div class="text-center">
      <h1>Welcome back to the beach, Sharks</h1>
      <h2>Only true Sharks will get the flag</h2>
    </div>
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="text-center mb-4">
        <label for="rolename">rolename</label>
        <input
          type="text"
          name="rolename"
          placeholder="rolename"
          class="form-control"
          required
          autofocus
        />
        <label for="password">Password</label>
        <input
          type="password"
          name="password"
          class="form-control"
          placeholder="Password"
          required
        />
        <br />
        <input type="submit" class="btn btn-success" value="login" />
      </div>
    </form>
  </body>































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































  <!--I miss uncle john-->
</html>