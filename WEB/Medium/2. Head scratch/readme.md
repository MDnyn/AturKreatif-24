there is lot of hint everywhere

go to respond.php
will found post and get request

open burp, change reguest to HEAD

get $3cR3+.php with password saveme
will gave you this code

decrypt
	        javascript:(function() {
            var encryptedFlag = "uèêä¶äèÒÌs¨ðxØÑÂÛ¾";
            var key = "AturKreatif";
            var decryptedFlag = "";
            for (var i = 0; i < encryptedFlag.length; i++) {
                decryptedFlag += String.fromCharCode((encryptedFlag.charCodeAt(i) - key.charCodeAt(i % key.length) + 256) % 256);
            }
            alert(decryptedFlag);
        })();

get flag

----------------------this for reference--------------------------------------
encrypt
			javascript:(function() {
			var plaintext = "4turkr34tif24{--flag--}";
			var key = "AturKreatif";
			var encryptedFlag = "";
			for (var i = 0; i < plaintext.length; i++) {
				encryptedFlag += String.fromCharCode((plaintext.charCodeAt(i) + key.charCodeAt(i % key.length)) % 256);
			}
			alert(encryptedFlag);
		})();

