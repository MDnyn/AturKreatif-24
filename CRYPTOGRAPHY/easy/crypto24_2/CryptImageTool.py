import os
from Crypto.Cipher import AES
from Crypto.Util.Padding import pad, unpad
from Crypto.Random import get_random_bytes
from hashlib import sha256

def generate_key(password):
    
    return sha256(password.encode()).digest()

def encrypt_file(file_path, key):
   
    if not os.path.exists(file_path):
        print("Error: File not found.")
        return

    
    with open(file_path, 'rb') as file:
        data = file.read()

    
    padded_data = pad(data, AES.block_size)

    
    iv = get_random_bytes(AES.block_size)


    cipher = AES.new(key, AES.MODE_CBC, iv=iv)

    
    encrypted_data = cipher.encrypt(padded_data)

   
    encrypted_file_path = file_path + ".encrypted"
    with open(encrypted_file_path, 'wb') as encrypted_file:
        encrypted_file.write(iv)
        encrypted_file.write(encrypted_data)

    print("File encrypted successfully. Encrypted file saved as:", encrypted_file_path)

def decrypt_file(encrypted_file_path, key):
    
    if not os.path.exists(encrypted_file_path):
        print("Error: Encrypted file not found.")
        return


    with open(encrypted_file_path, 'rb') as encrypted_file:
        iv = encrypted_file.read(AES.block_size)
        encrypted_data = encrypted_file.read()

    
    cipher = AES.new(key, AES.MODE_CBC, iv=iv)

  
    decrypted_data = cipher.decrypt(encrypted_data)

    unpadded_data = unpad(decrypted_data, AES.block_size)

    original_file_path = os.path.splitext(encrypted_file_path)[0]

    with open(original_file_path, 'wb') as decrypted_file:
        decrypted_file.write(unpadded_data)

    print("File decrypted successfully. Decrypted file saved as:", original_file_path)

def main():
    choice = input("Choose an option:\n1. Encrypt file\n2. Decrypt file\nEnter your choice (1 or 2): ")

    if choice == "1":
        file_path = input("Enter the file path to encrypt: ")
        password = input("Enter the encryption password: ")
        key = generate_key(password)
        encrypt_file(file_path, key)
    elif choice == "2":
        encrypted_file_path = input("Enter the path to the encrypted file: ")
        password = input("Enter the decryption password: ")
        key = generate_key(password)
        decrypt_file(encrypted_file_path, key)
    else:
        print("Invalid choice. Please enter 1 or 2.")

if __name__ == "__main__":
    main()
