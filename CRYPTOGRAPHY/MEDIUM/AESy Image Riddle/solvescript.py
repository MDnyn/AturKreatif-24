from Crypto.Cipher import AES
from Crypto.Util.Padding import pad, unpad
from Crypto.Random import get_random_bytes
from Crypto.Protocol.KDF import PBKDF2
import os

def encrypt_image(input_image_path, output_image_path, password):
    if not os.path.exists(input_image_path):
        print("Error: Image file not found.")
        return

    iv = get_random_bytes(16)
    salt = get_random_bytes(16)
    key = PBKDF2(password.encode('utf-8'), salt, dkLen=32, count=1000000)
    cipher = AES.new(key, AES.MODE_CBC, iv)

    with open(input_image_path, 'rb') as f:
        plaintext = f.read()
    
    padded_plaintext = pad(plaintext, AES.block_size)
    
    ciphertext = cipher.encrypt(padded_plaintext)

    with open(output_image_path, 'wb') as f:
        f.write(iv)
        f.write(salt)
        f.write(ciphertext)

    print("Image encrypted successfully. Encrypted image saved as:", output_image_path)

def decrypt_image(input_image_path, output_image_path, password):
    if not os.path.exists(input_image_path):
        print("Error: Encrypted image file not found.")
        return

    with open(input_image_path, 'rb') as f:
        iv = f.read(16)
        salt = f.read(16)
        ciphertext = f.read()

    key = PBKDF2(password.encode('utf-8'), salt, dkLen=32, count=1000000)

    cipher = AES.new(key, AES.MODE_CBC, iv)

    try:
        decrypted_data = cipher.decrypt(ciphertext)
        unpadded_data = unpad(decrypted_data, AES.block_size)

        with open(output_image_path, 'wb') as f:
            f.write(unpadded_data)

        print("Image decrypted successfully. Decrypted image saved as:", output_image_path)
    except Exception as e:
        print("Error decrypting image:", e)

def main():
    print("-----ATURKREATIF24 USIM-----")

    print("Welcome to ImageCryptor!")
    print("1. Encrypt Image")
    print("2. Decrypt Image")
    choice = input("Enter your choice (1 or 2): ")

    print("----------------------------")

    if choice == "1":
        input_image_path = input("Enter the path to the image file to encrypt: ")
        output_image_path = input("Enter the path to save the encrypted image: ")
        password = input("Enter the encryption password: ")
        encrypt_image(input_image_path, output_image_path, password)
    elif choice == "2":
        input_image_path = input("Enter the path to the encrypted image file: ")
        output_image_path = input("Enter the path to save the decrypted image: ")
        password = input("Enter the decryption password: ")
        decrypt_image(input_image_path, output_image_path, password)
    else:
        print("Invalid choice. Please enter 1 or 2.")

if __name__ == "__main__":
    main()



