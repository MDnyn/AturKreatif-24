<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forbidden - Airplane Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #000; /* changed font color to black */
            text-align: left; /* aligned text to the left */
            padding-left: 20px; /* added left padding */
        }
       
        h1 {
            color: #000; /* changed color to black */
            cursor: pointer;
            display: inline; /* display inline to make clickable */
        }
        h1:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 onclick="redirect()">Forbidden</h1>
        <p>You don't have permission to access this page.</p>
        <script>
            function redirect() {
                window.location.href = 'display_page.php';
            }
        </script>
    </div>
</body>
</html>
