from Crypto.Cipher import AES
import hashlib

message = ""

words = ["apple", "banana", "cherry", "date", "elderberry", "fig", "grape", "honeydew", "kiwi", "lemon"]

def derive_key_iv(passphrase):
    key = hashlib.sha256(passphrase.encode()).digest()[:32] 
    iv = hashlib.sha256(passphrase[::-1].encode()).digest()[:16] 
    return key, iv

def encrypt_message(key, iv, message):
    cipher = AES.new(key, AES.MODE_CBC, iv)
    padded_message = message.encode() + ((16 - len(message) % 16) * chr(16 - len(message) % 16)).encode()
    cipher_text = cipher.encrypt(padded_message)
    return cipher_text.hex()

passphrase = ''.join(words[:2])  
print("Passphrase:", passphrase)

key, iv = derive_key_iv(passphrase)

cipher_text = encrypt_message(key, iv, message)
print("Cipher text:", cipher_text)


