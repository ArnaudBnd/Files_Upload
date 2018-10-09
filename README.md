# File upload

## Installation

install mkcert with:
- `brew install mkcert`(on mac of you're using antoher OS go at this website : https://github.com/FiloSottile/mkcert)
- `$ mkcert -install`
with your own configurations:
- `$ mkcert example.com '*.example.org' myapp.dev localhost 127.0.0.1 ::1`

### Requirements
* php

if you installed dependencies & mkcert you can now run the project with : 

`$ php -S localhost:8000 index.php`