Cryptography
title: AESy Image Riddle

The challenge involves a Python script that encrypts and decrypts an image. The script requires a password for encryption and uses the same password for decryption. However, the password provided in the instructions will not decrypt the image. The password is hashed using SHA-512, and players need to crack it.

1) Password cracking using HASHCAT

Players can use Hashcat for this purpose. They need to create a file, say hashed_password.txt, and put the hashed password in it. The command to crack the password using Hashcat is as follows:

hashcat -m 1800 hashed_password.txt (wordlists_path)

Players need to wait for the password to be cracked. If the status shows “cracked”, it means that the password has been successfully cracked using Hashcat and the correct wordlist.

password: 2cute4u

You can open solve.py to see the suggested solution for the decryption script.

from Crypto.Cipher import AES
from Crypto.Util.Padding import unpad
from Crypto.Protocol.KDF import PBKDF2
import os

def decrypt_image(input_image_path, output_image_path, password):
    # Check if the input image file exists
    if not os.path.exists(input_image_path):
        print("Error: Encrypted image file not found.")
        return

    # Open the input image file in binary read mode
    with open(input_image_path, 'rb') as f:
        # Read the first 16 bytes as the Initialization Vector (IV)
        iv = f.read(16)
        # Read the next 16 bytes as the salt
        salt = f.read(16)
        # Read the rest of the file as ciphertext
        ciphertext = f.read()

    # Derive the encryption key from the password using PBKDF2
    key = PBKDF2(password.encode('utf-8'), salt, dkLen=32, count=1000000)

    # Create an AES cipher object with the derived key, CBC mode, and IV
    cipher = AES.new(key, AES.MODE_CBC, iv)

    try:
        # Decrypt the ciphertext using the cipher
        decrypted_data = cipher.decrypt(ciphertext)
        # Remove padding from the decrypted data
        unpadded_data = unpad(decrypted_data, AES.block_size)

        # Write the decrypted data to the output image file
        with open(output_image_path, 'wb') as f:
            f.write(unpadded_data)

        # Print success message with the path to the decrypted image
        print("Image decrypted successfully. Decrypted image saved as:", output_image_path)
    except Exception as e:
        # Print error message if decryption fails
        print("Error decrypting image:", e)

def main():
    # Provide the path to the encrypted image file
    input_image_path = "sec.png"  
    # Provide the path to save the decrypted image
    output_image_path = "dec.png"  
    # Provide your decryption password here
    password = "2cute4u"  
    # Call decrypt_image function with specified parameters
    decrypt_image(input_image_path, output_image_path, password)

if __name__ == "__main__":
    # Call main function when the script is executed
    main()

Imports: The script imports necessary modules from the Crypto package, including AES cipher, unpad function for removing padding, and PBKDF2 for key derivation.

Function Definition: The decrypt_image function is defined to handle the decryption process. It takes three parameters: input_image_path (the path to the encrypted image file), output_image_path (the path to save the decrypted image), and password (the decryption password).

Error Handling: The function begins by checking if the input image file exists. If not, it prints an error message and returns.

Reading Input File: It then opens the input image file in binary read mode ('rb') and reads the first 16 bytes as the Initialization Vector (IV), the next 16 bytes as the salt, and the rest of the file as the ciphertext. In CBC mode, the IV must be the same size as the block size of the cipher, which is 128 bits (16 bytes) for AES. 

Key Derivation: The script derives the encryption key from the provided password using PBKDF2 with the specified parameters: 1,000,000 iterations, a key length of 32 bytes (dkLen=32), and the provided salt.

Decryption: It creates an AES cipher object (AES.new()) with the derived key, CBC mode, and the IV. Then, it attempts to decrypt the ciphertext using this cipher.

Padding Removal: After decryption, the script removes the padding from the decrypted data using the unpad() function.

Writing Decrypted Data: Finally, the script writes the decrypted data to the output image file in binary write mode ('wb') and prints a success message along with the path to the decrypted image.

Exception Handling: The decryption process is wrapped in a try-except block to catch and handle any exceptions that may occur during decryption.

Main Function: The main() function is defined to specify the input and output image paths and the decryption password. It then calls the decrypt_image function with these parameters.

Script Execution: The script checks if it's being run as the main program (__name__ == "__main__") and if so, it calls the main() function to start the decryption process.
