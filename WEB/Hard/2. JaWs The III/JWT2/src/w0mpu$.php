<?php

// Set your secret key
$secret = 'wompwomp';

// Check if the JWT cookie is already set
if(isset($_COOKIE['JWT2'])) {
    // Decode JWT
    list($base64UrlHeader, $base64UrlPayload, $base64UrlSignature) = explode('.', $_COOKIE['JWT2']);
    $header = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $base64UrlHeader)), true);
    $payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $base64UrlPayload)), true);
    $signature = base64_decode(str_replace(['-', '_'], ['+', '/'], $base64UrlSignature));
    
    // Verify signature
    $expectedSignature = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $secret, true);
    
    if(hash_equals($signature, $expectedSignature) && $payload['role'] === 'Jinbei') {
        // If JWT is valid and role is Jinbei, display flag
        echo "<div class=text-center> <h1>Welcome Master Jinbei! Here is the flag: </br> 4turkr34tif24{f4ns3rv1c3s_1n_0n3_pi3c3_1s_h4r4m} </h1></div>    ";
        // You should consider additional checks to prevent JWT replay attacks and other security vulnerabilities
    } elseif($payload['role'] === 'Jinbei') {
      // If role is Jinbei but signature is invalid, display message
      echo "<div class=text-center> <h1>If you are really master Jinbei, what is the secret key?</h1></div>"; 
    } else {
        // If JWT is invalid or role is not Jinbei, display message
        echo "<div class=text-center>
        <h1>Hello, Arlong. You are not strong enough, even Nami could beat you wkwkw.</h1>
        <h2>No flag for you :p </h2>
      </div>";
    }
} else {
    // If JWT cookie is not set, generate JWT and set cookie
    $jwt = generateJWT(['role' => 'Arlong'], $secret);
    setcookie('JWT2', $jwt, time() + (86400 * 30), "/"); // Set cookie for 30 days
    echo "<div class=text-center>
    <h1>Hello, Arlong. You are not strong enough, even Nami could beat you wkwkw.</h1>
    <h2>No flag for you :p </h2>
  </div>";
}

// Function to encode JWT
function generateJWT($payload, $secret) {
  $header = json_encode(['typ' => 'JWT2', 'alg' => 'HS256']);
  $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
  $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode(json_encode($payload)));
  $signature = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $secret, true);
  $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
  return $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;
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
    <form class="form-signin" action="index.php" method="GET">
      <div class="text-center mb-4">
        <input type="submit" class="btn btn-danger" value="logout" />
      </div>
    </form>
    <div class="text-center">
      <img src="Jinbei.png" alt="Jinbei" style="width: 50%;" />
    </div>
    </div>
  </body>
</html>
