##Getting Started

**Prerequisites**

This bundle requires Symfony 4.4+ and the openssl extension.

Protip: Though the bundle doesn't enforce you to do so, it is highly recommended to use HTTPS.

**Installation**

*   Download the repository on your local
*   Download libraries with Composer install

*   Create private.pem and public.pem files:

*   Create database with doctrine check and connect

1- openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096

2- openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout


**Usage**

Import collection.json file to postman. You can find collection file under the postman folder

Open cmd file location:

* Create user with a command:  php bin/console user:create

Postman create jwt token:
* Open postman application run user login under the user folder edit raw data


You can use this api with `Authorization: Bearer {token}`