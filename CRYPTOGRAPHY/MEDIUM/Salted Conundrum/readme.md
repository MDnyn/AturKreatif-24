Cryptography
title:Unlocking Symmetric Encryption Secrets

The challenge provides an encrypted message and a passphrase encrypted using RSA and encoded with Base64. Participants are tasked with decrypting the passphrase first using the provided private key and then using it to decrypt the encrypted message containing the hidden flag.

1) Decrypting the Passphrase:

Use the base64 command to decode the Base64 encoded ciphertext from passphrase.txt and save it to a binary file named encrypted.bin.

openssl base64 -d -in Passphrase.txt > encrypted.bin

Use OpenSSL to decrypt the binary ciphertext (encrypted.bin) using the provided private key (key.pem).

openssl rsautl -decrypt -inkey key.pem -in encrypted.bin

Alternatively, you can use the following command:
openssl base64 -d -in passphrase.txt | openssl rsautl -decrypt -inkey key.pem

passphrase: crackit01

2) Retrieve Flag:

Use OpenSSL to decrypt the encrypted message (salted.txt) using the passphrase obtained in the previous step.

openssl enc -d -aes-256-cbc -in salted.txt -out decrypted.txt -k crackit01 -pbkdf2 -md sha256

3) View Decrypted Message:

After running the decryption command, participants will have a file named decrypted.txt containing the decrypted message, which may contain the hidden flag.



Explanation of the command:
-d: Specifies decryption mode.
-aes-256-cbc: Specifies the encryption algorithm (AES-256 in CBC mode).
-in salted.txt: Specifies the input file containing the encrypted message.
-out decrypted.txt: Specifies the output file where the decrypted message will be stored.
-k passphrase: Specifies the passphrase used for decryption.
-pbkdf2 -md sha256: Specifies the use of the PBKDF2 key derivation function with SHA-256, ensuring a more secure key derivation method.
View the decrypted message: After running the command, they would have a decrypted.txt file containing the decrypted message
 
