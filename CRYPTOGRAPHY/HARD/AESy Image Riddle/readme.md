Cryptography
title: AESy Image Riddle

The challenge involves a Python script that encrypts and decrypts an image. The script requires a password for encryption and uses the same password for decryption. However, the password provided in the instructions will not decrypt the image. The password is hashed using SHA-512, and players need to crack it.

1) Password cracking using HASHCAT

Players can use Hashcat for this purpose. They need to create a file, say hashed_password.txt, and put the hashed password in it. The command to crack the password using Hashcat is as follows:

hashcat -m 1800 hashed_password.txt (wordlists_path)

Players need to wait for the password to be cracked. If the status shows “cracked”, it means that the password has been successfully cracked using Hashcat and the correct wordlist.

password: 2cute4u

You can open solve.py to see the suggested solution for the decryption script.
