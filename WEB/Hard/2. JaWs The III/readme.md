the challenge will a role and password to log in

role: Arlong
pass: Jaws

but inside is empty. check the JWT and change it

other than role, they is also id and email that need to change

lastly it have secret key.
to brute force password using JohntheRipper with rockyou wordlist

copy jwt into .txt file

run in kali

john .txt --wordlist=rockyou.txt --format=HMAC-SHa256

the password is
wompwomp