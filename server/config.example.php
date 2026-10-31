<?php
// Documentation example only. The application reads secrets from host environment
// variables in server/config.php. Never commit production credentials.
putenv('ZACHS_DB_HOST=localhost');
putenv('ZACHS_DB_NAME=YOUR_DATABASE_NAME');
putenv('ZACHS_DB_USER=YOUR_DATABASE_USER');
// Set ZACHS_DB_PASSWORD securely on your host, never here.
// Set ZACHS_ADMIN_USERNAME and ZACHS_ADMIN_PASSWORD_HASH securely on your host.
// See server/README.md for setup and verification.
// Do not require this example file in production.
