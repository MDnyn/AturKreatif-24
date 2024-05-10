Cryptography 

title: Decode Mania

First Step: Base64 Decoding:
Upon examining the encrypted text provided, it appears to be encoded in a format resembling Base64. We can try to decode it using Base64. This often reveals the original message hidden beneath the ROT13 encryption.Decoding the ROT13-transformed text using Base64.

UTF16LE Conversian:
After decoding with Base64, the resulting text might contain null characters,indicated by seemingly empty spaces or unprintable characters. Given the presence of null characters, it's likely that the text has been encoded in UTF16LE (UTF-16 Little Endian) format. Converting the text from UTF16LE should reveal the flag, as null characters are represented differently in UTF16LE.

4ghexe34gvs24{X3GVC4x_x3e1CG0_F4L4AT}

ROT13 Decoding:
the format of flag seems to be visible but we still can't read it. So, you can try to use rot13 to decode it.

now we finally get the flag 4turkr34tif24{K3TIP4k_k3r1PT0_S4Y4NG}

