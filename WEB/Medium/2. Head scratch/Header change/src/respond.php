<?php
if ($_SERVER['REQUEST_METHOD'] === 'HEAD') {
header("HINT: $3cr3+.php , password = saveme");
}
// Handle GET and POST methods as before
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Process GET request
    echo "";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process POST request
    echo "";
}
?>

<!doctype html>
<html>
<head>
    <title>NAK KIRA BERAPA KEPALA</title>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body {
            background: url('assets/med-2-5.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body style="padding-top: 100px;">
    <div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class=" w3-round w3-green" style="margin-bottom: 50px; padding:8px 60px">Will you come to my wedding?</h1>
			</div>
		</div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel-body text-center">
                    <form action="respond.php" method="GET">
                        <button type="submit" class="w3-button w3-black w3-round w3-padding-large w3-large">Yes, I will come :)</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel-body text-center">
                    <form action="respond.php" method="POST">
                        <button type="submit" class="w3-button w3-black w3-round w3-padding-large w3-large">Sorry, I don't know you ¯\_(ツ)_/¯</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

