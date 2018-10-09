# File upload

Project to secure an image upload (jpeg/jpg/png) with php

## Installation project

- install node v8.9.4
- git clone
- npm install

## Installation mkcert

- `$ mkcert -install`

Created a new local CA at "/Users/filippo/Library/Application Support/mkcert" 💥
The local CA is now installed in the system trust store! ⚡️
The local CA is now installed in the Firefox trust store (requires restart)! 🦊

`$ mkcert example.com '*.example.org' myapp.dev localhost 127.0.0.1 ::1`

Using the local CA at "/Users/filippo/Library/Application Support/mkcert" ✨

Created a new certificate valid for the following names 📜
 - "example.com"
 - "*.example.org"
 - "myapp.dev"
 - "localhost"
 - "127.0.0.1"
 - "::1"

The certificate is at "./example.com+5.pem" and the key at "./example.com+5-key.pem" ✅

### Requirements
* php

if you installed dependencies & mkcert you can now run the project with : 

`php -S localhost:8000 index.php`