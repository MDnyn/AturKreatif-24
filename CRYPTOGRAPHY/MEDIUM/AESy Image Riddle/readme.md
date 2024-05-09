Cryptography
title: AESy Image Riddle

The challenge involves a Python script that encrypts and decrypts an image. The script requires a password for encryption and uses the same password for decryption. However, the password provided in the instructions will not decrypt the image. The password is hashed using SHA-512, and players need to crack it.

1) Password cracking using HASHCAT

Players can use Hashcat for this purpose. They need to create a file, say hashed_password.txt, and put the hashed password in it. The command to crack the password using Hashcat is as follows:

hashcat -m 1800 hashed_password.txt (wordlists_path)

Players need to wait for the password to be cracked. If the status shows “cracked”, it means that the password has been successfully cracked using Hashcat and the correct wordlist.

password: 2cute4u

2) identifying issues 

After retrieving the password, players need to read the script carefully. The script is broken, and the image cannot be decrypted. Players need to analyze the code and understand what the algorithm does. The broken part of the script is in the decrypt_image function.

In the broken script, the decrypt_image function has three main issues:

The key for the AES cipher is incorrectly derived from the password. Instead of using PBKDF2 to derive the key (as in the encryption part), it simply takes the first 16 bytes of the password. This is incorrect because the encryption uses a key derived from the password using PBKDF2, not the password itself.

key = password.encode('utf-8')[:16]

The salt used in the key derivation is not read from the encrypted image file. Also, the ciphertext is read incorrectly. Only 16 bytes are read as ciphertext, which is not the entire ciphertext.

iv = f.read(16)
ciphertext = f.read(16)

no unpad functions from the Crypto.Util.Padding module in the PyCrypto library for the decryption part

unpadded_data = pad(plaintext, AES.block_size)

3) Solution

The key is correctly derived using PBKDF2, just like in the encryption part. This ensures that the same key is used for both encryption and decryption. 

key = PBKDF2(password.encode('utf-8'), salt, dkLen=32, count=1000000)

The salt is correctly read from the encrypted image file. Also, the entire ciphertext is read, not just 16 bytes.

iv = f.read(16)
salt = f.read(16)
ciphertext = f.read()

add unpad functions from the Crypto.Util.Padding module

from Crypto.Util.Padding import pad, unpad

The unpad function is used to remove the padding from the plaintext after it has been decrypted. After the ciphertext (the encrypted image data) is decrypted, we get the original plaintext with padding. The unpad function removes these extra bytes that were added during the padding process to recover the original plaintext (the original image data).

unpadded_data = unpad(decrypted_data, AES.block_size)

