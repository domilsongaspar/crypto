# Crypto

## Your personal cryptography dictionary

Crypto is a web application designed to provide every user with their own
cryptography dictionary. It lets users create fast and secure cryptography
systems, manage multiple configurations, and use them in their own projects.

## How it works

Crypto receives data and replaces each character with a nine-character text
made of letters, numbers, and other symbols. For example:

```text
A = $3P0+71B4
```

Each account can keep its own cryptography systems. The API changes character
codes in the cryptography system, making it harder for malicious users to
create a dictionary and improving data security.

## Features

- Create custom cryptography systems.
- A personal cryptography dictionary for every user.
- Manage cryptography systems through a Crypto account.
- An API for integrating cryptography into websites and other applications.
- A test page for trying encryption and decryption.
- An interface available in Portuguese and English.

## Requirements

- Git
- Docker
- Docker Compose

1. Clone the repository:
   ```sh
   git clone <repo_url> crypto
   cd crypto
   ```
2. Create and fill your `.env` file (optional).
3. Add the domain to your hosts file.

   On Linux or macOS, run:
   ```sh
   echo "127.0.0.1 www.crypto.com" | sudo tee -a /etc/hosts
   ```

   On Windows, open Notepad as Administrator and edit:
   `C:\Windows\System32\drivers\etc\hosts`

   Add this line to the file:
   ```text
   127.0.0.1 www.crypto.com
   ```

4. Build and start all services:
   ```sh
   docker compose up --build
   ```
5. Access the application at http://www.crypto.com

Then open the application at the address configured by the local environment.

## Structure

- `pt/`: Portuguese pages.
- `en/`: English pages.
- `api/`: endpoints for managing and using cryptography systems.
- `css/` and `js/`: application styles and scripts.
- `files/`: cryptography configurations and repositories.
- `db_backup/`: database backup.

## License

Copyright 2022 Domilson Gaspar. All rights reserved.