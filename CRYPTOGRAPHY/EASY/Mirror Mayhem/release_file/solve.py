from cryptography.hazmat.primitives.ciphers import Cipher, algorithms, modes
from cryptography.hazmat.backends import default_backend
import base64

def decrypt_aes_ciphertext(key, ciphertext):
    # Decode the base64 encoded key and ciphertext
    decoded_key = base64.b64decode(key)
    decoded_ciphertext = base64.b64decode(ciphertext)
    
    # Create an AES decryptor with the provided key
    backend = default_backend()
    cipher = Cipher(algorithms.AES(decoded_key), modes.ECB(), backend=backend)
    decryptor = cipher.decryptor()
    
    # Decrypt the ciphertext
    decrypted_data = decryptor.update(decoded_ciphertext) + decryptor.finalize()
    
    return decrypted_data

def main():
    key = "VeF4bktQK5tzZVOpR1g1Llu1TolPT7v8B4yAQUIqC7I="
    ciphertext = "gAAAAABmKR7_pOcJCcI-u3isPan71FQluD2QLTU_r7df222Ek-2Y2jymVTKBeFkn7-NAuRmnySRXHGbQ_PCddlx0K-Lpg7mEVEJFncosuYr1sQlxz0J1mnI="
    
    decrypted_data = decrypt_aes_ciphertext(key, ciphertext)
    
    print("Decrypted data:", decrypted_data.decode())

if __name__ == "__main__":
    main()
```
