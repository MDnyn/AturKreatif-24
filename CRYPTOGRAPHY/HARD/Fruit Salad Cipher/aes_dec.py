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
