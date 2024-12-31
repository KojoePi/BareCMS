# bareCMS
A lightweight, file-based Content Management System without database.
FILES STILL IN TESTING BUT COMING in 1st week of January 2025

## Features
No database server required (Flat-File CMS)
Responsive Design with Tailwind CSS
Simple navigation with main and side menu
Hierarchical page structure with parent-child relationships
Support for external links
PHP code in pages possible
User-friendly backend
Markdown support (optional)
Mobile-friendly backend
Lightweight (~100KB core size)

## Dependencies
PHP 7.4+ (recommended: PHP 8+)
Apache2 or Nginx webserver
Tailwind CSS (via CDN)
CodeMirror for syntax highlighting (via CDN)

## Installation
### 1. Upload Files
Upload all files to your webserver directory.

### 2. Create Directory Structure

```
mkdir content
```
```
touch config.json
```
```
touch pages.json
```
```
touch nav-main.html
```
```
touch nav-side.html
```

### 3. Set Permissions
Set owner (replace www-data with your webserver user)
```
chown -R www-data:www-data
```

#### Set directory permissions
```
find . -type d -exec chmod 755 {} \;
```
#### Set file permissions
```
find . -type f -exec chmod 644 {} \;
```

#### Set special permissions for writable files
```
chmod 664 config.json
```
```
chmod 664 pages.json`
```
```
chmod 664 nav-main.html`
```
```
chmod 664 nav-side.html`
```
```
chmod 664 credentials.json`
```
#### Set permissions for content directory
```
chmod 775 content```
```
chmod 664 content/*.html
```
```
chmod 664 content/*.php
```

### 4. Create Login Credentials
#### Create a temporary file create_credentials.php:
```
<?php
// Define initial password
$initialPassword = 'YourSecurePassword123!'; // Change this!
$username = 'admin';

$credentials = [
    'username' => $username,
    'password' => password_hash($initialPassword, PASSWORD_DEFAULT)
];

file_put_contents('credentials.json', json_encode($credentials, JSON_PRETTY_PRINT));

echo "Credentials created successfully!<br>";
echo "Username: " . $username . "<br>";
echo "Password: " . $initialPassword . "<br>";
echo "<br>Please note these credentials and delete this script immediately!";
?>
```
#### Follow these steps:

Access create_credentials.php in your browser
Note down the credentials
Delete create_credentials.php immediately
Change password after first login

### 5. Basic Configuration
#### Create an initial config.json:
```
{
    "site_title": "Your Website",
    "site_name": "BareCMS",
    "site_url": "https://your-domain.com",
    "site_icon": "/logo.png"
}
```
## Security Notes
Change default password immediately
Enable HTTPS
Set secure file permissions
Protect sensitive JSON files
Keep PHP up to date
Create regular backups

## Recommended Webserver Configuration
### Nginx
```
location ~ /\. {
    deny all;
}
```
```
location ~* \.(json)$ {
    deny all;
}
```
```
location = /config.json {
    deny all;
}
```
```
location = /credentials.json {
    deny all;
}
```
```
location = /pages.json {
    deny all;
}"
```
### Apache (.htaccess)
```
<FilesMatch "\.(json)$">
    Order Deny,Allow
    Deny from all
</FilesMatch>
```
### Restrict backend access (optional)
```
<Files "backend.php">
    Order Deny,Allow
    Deny from all
    Allow from 127.0.0.1
    # Add your IP address here
    Allow from your.ip.address
</Files>
```
## Creating PHP Pages
In the backend, you can include PHP code in your pages. The system automatically detects PHP code and saves the file with the correct extension.

## Backup
### Regularly backup:

All JSON files
The content directory
Custom templates

#### Known Limitations
No multi-user management
No integrated image management
No content versioning

### License
MIT License

Made with ♥ by relayted.de
