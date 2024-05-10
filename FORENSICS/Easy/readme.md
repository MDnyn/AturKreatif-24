# 1. Shark With Wire
Open the pcap file using wireshark.

Use `http` as filter.

Check for `POST` method and inspect it or simply `Analyze > Follow > HTTP Stream`

You will found the username and password which is the flag.


# 2. VerySusPicture
Provided 2 image files, one is png and the other one is jpeg. Note that steghide only can embed into JPEG, BMP, WAV, and AU (Source: Trust me bro - ChatGPT).

Participants have to check both images using command `file` and `binwalk`. In theory, command `file` used for checking the extension of the file while `binwalk` used for analyzing all type of extensions found in the binaries of the file. 

So, the users can use command `steghide info apetgk2.jpeg` and it will prompt a passphrase indicating that there is indeed a file being embedded inside of it. Without password, it is impossible to brute-force the password using any tools. So, to proceed we inspect the other image which is the png file. 

Remember that png file can't be extracted its embedded file using steghide due to unsupport format. So, we used binwalk instead to check any hidden file inside of it using this command `binwalk thisisimage.png`. It will display a zip file. Next, we use this command `binwalk -e thisisimage.png` to extract the zip file. Then we `cd _thisisimage.png.extracted` and `ls -la`. It will display 2 files which is `0.zip` and `pass.txt`.

Then, we try to unzip the `0.zip` file but it will require password. To crack zip file's password, we need to use `zip2john` so we type `zip2john 0.zip > hash.txt`. Zip2john will generate a hash which will later be used by `john` to crack the hash into a plaintext which is the password using `john hash.txt`. 

The password will be `nice`. That is the password for that zip file. We then unzip it and `cat pass.txt`. It will show `HeheheNotBad...` . That is  the password for the `apetgk2.jpeg`. Next, we use command `steghide extract -sf apetgk2.jpeg` and it will prompt for the passphrase so we use `HeheheNotBad...` as password. It will extract `flag.txt` that contain encoded message, `NHR1cmtyMzR0aWYyNHtub3RiYWRfbm90YmFkfQ==`. Convert it from base64 to plaintext and you will get `4turkr34tif24{notbad_notbad}`.


## 3. RunMeifUDare

Open the pcap file using wireshark.

Set `http` as filter. 

Check for `GET` method to see what file that being downloaded.

Now we know that there is file that being downloaded using `http`, so we go to `File > Export Objects > HTTP`. You will see a file named `index.zip` from ip `192.168.22.79:8000`. Click `Save`. Now locate the zip file and unzip it. It will prompt for password, use `binwalk -e index.zip`. 

Then, `cd _index.zip.extracted` and `zip2john 0.zip > hash.txt`. Next, use `john hash.txt` and you will get the zip file password. Extract it `unzip index.zip` and you will get `index.exe`. Remember that this is malware and malware mostly target windows operating system only. So, we need to run the .exe file only on windows. If you use kali, that's for static analysis and most malware analysis's tools available for windows instead of kali.

Last step, run it :)  

 PS: This is malware analysis so make sure to turn off real-time protection in `Windows Security > Virus & Threat Protection Settings > Manage Settings > Turn off Real-time Protection` first before running the .exe if you are doing dynamic analysis.
