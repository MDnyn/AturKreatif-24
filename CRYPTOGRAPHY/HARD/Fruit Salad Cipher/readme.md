Cryptography
title: Fruit Salad Cipher Challenge

from Crypto.Cipher import AES
import hashlib

# Encrypted ciphertext
cipher_text = " 0d1c0cbc0951ada8c5c0ae691d57ab38fff1aaaec6e005982ced4fcf6005ae306d31b50bf06aac104b3e9170deca17f1"

# List of words for passphrase
words = ["pear", "kiwi", "orange", "mango", "pineapple", "grapes", "watermelon", "strawberry", "blueberry", "raspberry",
    "blackberry", "genip", "peach", "apple", "plum", "cherry", "lemon", "lime", "grapefruit", "papaya", "avocado", "fig",
    "date", "coconut", "passion fruit", "guava", "lychee", "apricot", "nectarine", "pomegranate", "cranberry", "tangerine",
    "clementine", "cantaloupe", "honeydew melon", "dragon fruit", "persimmon", "jackfruit", "durian", "starfruit",
    "elderberry", "blackcurrant", "gooseberry", "boysenberry", "mulberry", "loquat", "kumquat", "acerola cherry",
    "ackee", "açaí", "akebia", "ambarella", "annona", "araza", "babaco", "bael fruit", "barbados cherry", "buddha's hand",
    "cactus pear", "camu camu", "canistel", "cape gooseberry", "carob", "chayote", "cupuaçu", "damson", "feijoa",
    "finger lime", "gac fruit", "banana", "goumi", "hala fruit", "horned melon", "ice cream bean", "jabuticaba", "jambolan",
    "jujube", "kei apple", "langsat", "longan", "miracle fruit", "monstera deliciosa", "noni", "pawpaw", "pitaya",
    "rambutan", "salak", "santol", "sapodilla", "tamarillo", "tamarind", "ugli fruit", "ugni", "yuzu", "finger citron",
    "white sapote", "physalis", "pepino melon"]

# Function to derive key and IV from passphrase using SHA-256-based KDF
def derive_key_iv(passphrase, revpassphrase):
    key = hashlib.sha256(passphrase.encode()).digest()[:32]  # 256-bit key
    iv = hashlib.sha256(revpassphrase.encode()).digest()[:16]  # 128-bit IV
    return key, iv

# Function to decrypt ciphertext using key and IV
def decrypt_ciphertext(key, iv, cipher_text):
    cipher = AES.new(key, AES.MODE_CBC, iv)
    decrypted_text = cipher.decrypt(bytes.fromhex(cipher_text))

    #remove padding
    padding_length = decrypted_text[-1]
    decrypted_message = decrypted_text[:-padding_length]
    return decrypted_message
    #return decrypted_text

# Brute-force all possible combinations of two words for passphrase
for i in range(len(words)):
    for j in range(i + 1, len(words)):
        passphrase = words[i] + words[j]
        revpassphrase = words[j] + words[i] 
        key, iv = derive_key_iv(passphrase, revpassphrase)
        decrypted_message = decrypt_ciphertext(key, iv, cipher_text)
        if decrypted_message.startswith(b"4turkr34tif24{"):
            print("Passphrase found:", passphrase)
            print("Decrypted message:", decrypted_message)
            break
    else:
        continue
    break
else:
    print("Passphrase not found. Try again or check the implementation.")



Importing Required Libraries:

The code begins with importing necessary libraries. Crypto.Cipher is imported to use the AES encryption algorithm, and hashlib is imported for hashing functions.
Setting Up the Encrypted Ciphertext and Passphrase List:
The encrypted ciphertext (cipher_text) is provided in hexadecimal format.
A list of words (words) is provided for passphrase generation. This list will be used to brute-force the passphrase.

Defining Key and IV Derivation Functions:

derive_key_iv(passphrase): This function takes a passphrase as input and derives a 256-bit key and a 128-bit IV (Initialization Vector) using SHA-256-based Key Derivation Function (KDF).
decrypt_ciphertext(key, iv, cipher_text): This function takes the derived key, IV, and ciphertext as input and decrypts the ciphertext using AES in CBC (Cipher Block Chaining) mode. It also removes padding from the decrypted message.

Brute-Forcing Passphrases:

The script attempts to brute-force all possible combinations of two words from the provided word list.
For each combination of two words, a passphrase is generated.
The key and IV are derived from the passphrase.
The ciphertext is decrypted using the derived key and IV.
If the decrypted message starts with the specified prefix (`b"4turkr34tif24{"), it means that the passphrase is likely correct, and the decrypted message is printed along with the passphrase.
If the passphrase is not found, a message indicating this is printed.