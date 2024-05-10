from cryptography.fernet import Fernet

key = ' gyPhfCRdWBbKNAZ8EAzDO1yzC4-weiCTzxRz4udb8oA='

f = Fernet(key)

token = 'gAAAAABmNFO9UlRAr3leKWFZUK2oyjhPjqcCiTnSjVqK7YOlkd-H90PSiswWYEwJQqP_vd9447oQ58Kv8uajtXSPBpjPUpAYd50Qa7YVv8hwSHg7_oRmjX4='

print(f.decrypt(token))
