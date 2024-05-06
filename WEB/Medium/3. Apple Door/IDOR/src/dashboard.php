<?php

// Check if the "myCookie" cookie exists
if(!isset($_COOKIE['ID'])){
    header("Location: login.php");
}
elseif (($_COOKIE['ID'])=="7") {
    header("Location: home.php");
} 

elseif(($_COOKIE['id'])=="0") {
    header("Location: home.php");
}

elseif (($_COOKIE['ID'])=="") {
    header("Location: login.php");
}
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <a href="logout.php">logout</a>
</body>
</html>'?>