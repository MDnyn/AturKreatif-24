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
    <style>
        body {
            background: url('assets/med-2-5.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-primary" style="margin-top:50px">
						<div class="panel-heading">
							<h3 class="panel-title" style="color:black">YEAYYYY</h3>
						</div>
						<div class="panel-body">
							<form action="respond.php" method="GET">
								<input type="submit" value="Yes, I will come :)"/>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-primary" style="margin-top:50px">
						<div class="panel-heading">
							<h3 class="panel-title" style="color:black">Awww shucks ಥ⁠_⁠ಥ</h3>
						</div>
						<div class="panel-body">
							<form action="respond.php" method="POST">
								<input type="submit" value="Sorry, I don't know you ¯⁠\⁠_⁠ಠ⁠_⁠ಠ⁠_⁠/⁠¯"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

