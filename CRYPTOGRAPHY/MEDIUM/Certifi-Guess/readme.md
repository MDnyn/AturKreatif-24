Cryptography

title:Certifi-Guess

flag1:

To retrieve flag1, participants can decrypt the encrypted file (Cert-cret.txt) using the provided server.key associated with the certificate (server.crt). The decryption process can be accomplished using the OpenSSL command-line tool.

openssl pkeyutl -decrypt -inkey server.key -in cert-cret.txt -out decrypted_flag1.txt

This command decrypts the contents of encrypted_flag1.txt using the private key (server.key) and outputs the decrypted flag to decrypted_flag1.txt. After executing the decryption command, participants can access the decrypted flag from the decrypted_flag1.txt file.

flag1: 4turkr34tif24{You_Encrypted_Your_Success!}

flag2:

Players can try to establish a connection using both server.crt and server.key files in the working directory.Run the following command in the terminal to initiate the SSL/TLS server:

openssl s_server -cert server.crt -key server.key -accept 443

This command launches an SSL/TLS server (s_server) listening on port 443. Once the server is active, it awaits incoming connections on port 443. Players can establish a connection using a web browser or tools like openssl s_client. For example, use the following command to connect to the server:

openssl s_client -connect localhost:443

This command connects to the local SSL/TLS server (localhost) on port 443 using the openssl s_client tool.

After establishing the connection, players can interact with the server. Upon connection, a metadata popup may appear on the client side. One of the fields, particularly under "description," appears suspicious and encoded in Base64. Players can attempt to decode it using CyberChef. The decoded content from the "description" field might not reveal flag2. Players should explore other potential solutions to uncover the flag.

Participants can use OpenSSL commands to examine the certificate's metadata and search for the flag. They can start by viewing the details of the certificate using this command:

openssl x509 -in cert.pem -text -noout

This command will display detailed information about the certificate, including the common name (CN), organization, expiration date, and more. Participants need to locate the flag within the certificate's metadata. Since the flag is embedded in one of the fields, they should carefully inspect each field to find it. The flag might be hidden within the common name (CN) or any other field modified during the certificate creation process.

To find flag2, carefully examine the garbage text in the Subject Alternative Name field of the certificate (server.crt). Look out for the word "flag" among the gibberish text. You can use the following command to help you:

openssl x509 -in server.crt -text -noout | grep flag

If you find any Base64-encoded text alongside the word "flag," you can copy it and decode it using CyberChef.

flag2: 4turkr34tif24{You_Cert-ainly_Nailed_It!}
