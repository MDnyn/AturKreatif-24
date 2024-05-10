<!DOCTYPE html>
<html>
<head>
    <title>Final Level</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST["password"];
        if ($password == "saveme") {
            echo "<h1>Here is your flag. But it was encrypted. But it's easy to decrypt it if you understand this language</h1>";
            echo '(function() {
                var encryptedFlag = "uèêä¶äèÒÌs¨ðå~ÞÎ¨ÝÅ±§ãÙàÙâÈÈuæêï";
                var key = "AturKreatif";
                var decryptedFlag = "";
                for (var i = 0; i < encryptedFlag.length; i++) {
                    decryptedFlag += String.fromCharCode((encryptedFlag.charCodeAt(i) - key.charCodeAt(i % key.length) + 256) % 256);
                }
                alert(decryptedFlag);
            })();';
        } else {
            echo "<p>Incorrect password. Please try again.</p>";
        }
    } else {
       ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Submit">
        </form>
        <?php
    }
   ?>

</body>
</html>