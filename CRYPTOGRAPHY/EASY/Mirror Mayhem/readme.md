Cryptography 
 
title: Mirror Mayhem

Upon examination, the provided strings consist of a key and a token. At first glance, they resemble Base64-encoded data, which is commonly used in various encryption techniques. However, to determine the specific encryption method used, further investigation is required.

Recognizing Fernet Encryption:

1. Base64 Encoding:

Both the key and the token are indeed Base64-encoded, indicated by the alphanumeric characters and special characters present in the strings.

2. Research and Documentation:

To identify the encryption method associated with Base64-encoded keys and tokens, participants can refer to the Fernet documentation at https://cryptography.io/en/latest/fernet/. Fernet is a symmetric encryption method commonly used for securing data.

3. Characteristics of Fernet:

Fernet encryption involves generating a key, which is then used for both encryption and decryption.
The encryption process produces a token, which, along with the key, is required for decryption.
Fernet tokens are Base64-encoded ciphertexts.

4. Decrypting with Fernet:

Based on the recognition of Fernet encryption, participants can create a decryption script utilizing the cryptography library..refer python file, solve.py. This script utilizes the Fernet class from the cryptography.fernet module to decrypt the provided token using the specified key. Upon successful decryption, the plaintext flag is revealed. Participants can run this script with the provided key and token to obtain the decrypted flag.
