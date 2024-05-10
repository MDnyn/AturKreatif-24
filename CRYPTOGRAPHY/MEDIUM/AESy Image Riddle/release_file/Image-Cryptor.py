def encrypt_file(input_file, output_file, password):
    print("File encrypted successfully.")

def decrypt_file(input_file, output_file, password):
    print("Sorryy..Not to easy dear")
    print(" ____________________________________________________________")
    print("/                                                            \\")
    print("|           _____________________________                    |")
    print("|          |                             |                   |")
    print("|          |   Hacked by Br0F0rce       |                   |")
    print("|          |_____________________________|                   |")
    print("|                                                            |")
    print("\\____________________________________________________________/")
    print("But he left this clue for you...")
    print("The image was encrypted using AES encryption with CBC mode and PKCS7 padding.")
    print("A randomly generated IV (Initialization Vector) and salt were used for encryption.")
    print("The encryption key was encoded using utf-8 and derived from the user-provided password using PBKDF2 with 1,000,000 iterations and a key length of 32 bytes.")

def main():
    option = input("Choose an option (encrypt/decrypt): ").lower()

    if option == 'encrypt':
        input_file = input("Enter the path of the file to encrypt: ")
        output_file = input("Enter the desired name for the encrypted file: ")
        password = input("Enter the password: ")
        encrypt_file(input_file, output_file, password)
    elif option == 'decrypt':
        input_file = input("Enter the path of the encrypted file: ")
        output_file = input("Enter the desired name for the decrypted file: ")
        password = input("Enter the password: ")
        decrypt_file(input_file, output_file, password)
    else:
        print("Invalid option. Please choose 'encrypt' or 'decrypt'.")

if __name__ == "__main__":
    main()

