from Crypto.Cipher import AES
from Crypto.Util.Padding import unpad
from Crypto.Protocol.KDF import PBKDF2
import os

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
    input_image_path = "sec.png"  # Provide the path to the encrypted image file
    output_image_path = "dec.png"  # Provide the path to save the decrypted image
    password = "2cute4u"  # Provide your decryption password here
    decrypt_image(input_image_path, output_image_path, password)

if __name__ == "__main__":
    main()

