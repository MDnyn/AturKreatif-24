Cryptography 

Q1: Decode Mania

1.d3JvbmdfcGFzc3dvcmRfSEFIQUhBSEFIQQ==
2.ANO0NUHNptOeNUVNZjN0NUDNnDOzNQVNANO7NRfNMDO0NTxNpNOuNTfNKjOeNTHNpNO0NTxNpNO1NTfNKjOvNTRNqjOuNT4NMjO9NN==

Initial Assessment:
Upon examining the encrypted text provided, it appears to be encoded in a format resembling Base64. However, direct decoding using Base64 yields unreadable gibberish. This suggests that additional encryption layers might be in place.

First Step: ROT13 Decoding:
Since the text exhibits characteristics of Base64 but fails to decode properly, let's attempt to apply ROT13 (a simple letter substitution cipher) to the text. This step is often used to obscure text and can serve as a common first layer of encryption.

Second Step: Base64 Decoding:
With the text now transformed by ROT13, we can attempt to decode it using Base64. This often reveals the original message hidden beneath the ROT13 encryption.Decoding the ROT13-transformed text using Base64.

Third Step: Null Characters Identification:
After decoding with Base64, the resulting text might contain null characters, indicated by seemingly empty spaces or unprintable characters. These null characters are significant and play a role in the final decryption process.

Final Step: UTF16LE Conversion:
Given the presence of null characters, it's likely that the text has been encoded in UTF16LE (UTF-16 Little Endian) format. Converting the text from UTF16LE should reveal the flag, as null characters are represented differently in UTF16LE.