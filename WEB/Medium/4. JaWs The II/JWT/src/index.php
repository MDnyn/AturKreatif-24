<?php

// Set your secret key
$secret = 'dudududu';

// Check if the JWT cookie is already set
if(isset($_COOKIE['JWT'])) {
    // Decode JWT
    list($base64UrlHeader, $base64UrlPayload, $base64UrlSignature) = explode('.', $_COOKIE['JWT']);
    $header = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $base64UrlHeader)), true);
    $payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $base64UrlPayload)), true);
    $signature = base64_decode(str_replace(['-', '_'], ['+', '/'], $base64UrlSignature));
    
    // Verify signature
    $expectedSignature = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $secret, true);
    
    if(hash_equals($signature, $expectedSignature) && $payload['role'] === 'admin') {
        // If JWT is valid and role is admin, display flag
        echo'<!DOCTYPE html>
        <html>
        <head>
            <title>JWT?</title>
        <!-- my sign is: dudududu -->
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" type="text/css" href="styles.css">
          <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
          <style>
            body,h1 {font-family: "Raleway", sans-serif}
            body, html {height: 100%}
            .bgimg {
              background-image: url("JaWsT.jpeg");
              min-height: 100%;
              background-position: center;
              background-size: cover;
            }
          </style>
        </head>
        <body>
          <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
            <div class="w3-display-topleft w3-padding-large w3-xlarge">
              <img src="logo.png" alt="Logo" style="width: 12%;">
                </div>
                <div class="w3-display-middle">
            <h2 class="w3-big w3-animate-top" style="text-align: center; color: white;"><div class=text-center>Welcome admin! Here is the flag: </br> 4turkr34tif24{j4ws_4t_univ3rs4l_studi0_j4p4n_w4s_4m4zing}</h2>
            <hr class="w3-border-black" style="margin:auto;width:100%">
        </div>
                <div class="w3-display-bottomleft w3-padding-large">
                <a style="color: white;">Made by NetbyteSec Sdn. Bhd.</a>
              </div>
          </div>
          <script src="script.js"></script>
        </body>
        </html>';
        // You should consider additional checks to prevent JWT replay attacks and other security vulnerabilities
    } elseif($payload['role'] === 'admin') {
        // If role is Jinbei but signature is invalid, display message
        echo'<!DOCTYPE html>
        <html>
        <head>
            <title>JWT?</title>
        <!-- my sign is: dudududu -->
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" type="text/css" href="styles.css">
          <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
          <style>
            body,h1 {font-family: "Raleway", sans-serif}
            body, html {height: 100%}
            .bgimg {
              background-image: url("JaWsT.jpeg");
              min-height: 100%;
              background-position: center;
              background-size: cover;
            }
          </style>
        </head>
        <body>
          <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
            <div class="w3-display-topleft w3-padding-large w3-xlarge">
              <img src="logo.png" alt="Logo" style="width: 12%;">
                </div>
                <div class="w3-display-middle">
            <h2 class="w3-big w3-animate-top" style="text-align: center; color: white;"><div class=text-center>You are not admin. admin know the password</h2>
            <hr class="w3-border-black" style="margin:auto;width:100%">
        </div>
                <div class="w3-display-bottomleft w3-padding-large">
                <a style="color: white;">Made by NetbyteSec Sdn. Bhd.</a>
              </div>
          </div>
          <script src="script.js"></script>
        </body>
        </html>';
    };
} else {
    // If JWT cookie is not set, generate JWT and set cookie
    $jwt = generateJWT(['role' => 'user'], $secret);
    setcookie('JWT', $jwt, time() + (86400 * 30), "/"); // Set cookie for 30 days
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>JWT?</title>
    <!-- my sign is: dudududu -->
    <!-- I put here becase I always forgot my sign teehee -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="styles.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <style>
        body,h1 {font-family: "Raleway", sans-serif}
        body, html {height: 100%}
        .bgimg {
          background-image: url("JaWsT.jpeg");
          min-height: 100%;
          background-position: center;
          background-size: cover;
        }
      </style>
    </head>
    <body>
      <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
        <div class="w3-display-topleft w3-padding-large w3-xlarge">
          <img src="logo.png" alt="Logo" style="width: 12%;">
            </div>
            <div class="w3-display-middle">
        <h2 class="w3-jumbo w3-animate-top" style="text-align: center; color: white;">Only admin get the flag</h2>
        <hr class="w3-border-black" style="margin:auto;width:100%">
        <p class="w3-large w3-center" style="color: white;">Have you guys gone to Universal Studio Japan? There is this attraction called JaWs. Check it out here</p>
        <p class="w3-xlarge" style="text-align: center;">
            <form action="https://www.youtube.com/watch?v=ILNWBtPxcro" method="post" target="_blank">
                <button type="submit" class="w3-button w3-round w3-black w3-opacity w3-hover-opacity-off" style="padding:8px 60px; margin: 0 auto; display: block;">Flag</button>
            </form>
        </p>
        </p>   
    </div>
            <div class="w3-display-bottomleft w3-padding-large">
            <a style="color: white;">Made by NetbyteSec Sdn. Bhd.</a>
          </div>
      </div>
      <script src="script.js"></script>
    </body>
    </html>';
}

// Function to encode JWT
function generateJWT($payload, $secret) {
  $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
  $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
  $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode(json_encode($payload)));
  $signature = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $secret, true);
  $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
  return $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;
}
?>


