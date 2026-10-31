# Zach's Quality Services — Tips & Insights (PHP)

The site uses public entry points `/tips.php` and `/tip.php?id=123`, which load the templates under `/server/`. Public articles are stored in a MySQL `posts` table. Administration is restricted to authenticated users.

## Production prerequisites

- PHP 8.1+ with mysqli, fileinfo and sessions.
- MySQL database and application user with access to that database.
- HTTPS on an Apache/cPanel host; **GitHub Pages cannot run PHP**.
- A secure environment configuration outside version control with:

```text
ZACHS_DB_HOST
ZACHS_DB_NAME
ZACHS_DB_USER
ZACHS_DB_PASSWORD
ZACHS_ADMIN_USERNAME
ZACHS_ADMIN_PASSWORD_HASH
```

Create a password hash on a trusted PHP command line with `php -r 'echo password_hash("YOUR_NEW_PASSWORD", PASSWORD_DEFAULT), PHP_EOL;'`. Do not commit or paste the generated hash, plaintext password or database password into the repository. The host must make the values accessible via `getenv()` to the PHP process. If cPanel does not support secure environment variables for this hosting plan, arrange another host-level secret-loading method before enabling the application.

## Database

Review and apply [schema.sql](schema.sql) on a new database or after confirming compatibility with the existing schema. Do not overwrite a working production database or existing article data.

## Pages

- Public index: `/tips.php`
- Public article: `/tip.php?id=1`
- Administrator login: `/server/admin-login.php`
- Administrator manager: `/server/tips-manager.php`
- Create article: `/server/post.php`
- Edit article: `/server/post-edit.php?id=1`
- Sign out: `/server/logout.php`

## Security and deployment checks

1. Confirm the database credentials are configured only on the PHP host.
2. Verify admin login, logout, session cookies and CSRF validation over HTTPS.
3. Confirm unauthenticated users cannot view or submit creation/edit pages.
4. Ensure `/server/uploads/` is writable, blocks PHP/script execution, and disallows directory listing.
5. Restrict uploads to intended image formats and enforce both server and application size limits.
6. Test article creation, editing, public listing, individual pages and pagination.
7. Verify navigation and media paths from both the homepage and nested pages.
8. Test direct access to the public PHP routes and verify PHP is executed rather than served as source.

**Deployment status:** Source code and paths are prepared; a production smoke test and real database configuration are still required. Existing posts must not be lost during setup.
