<?php
// Erstelle dieses Skript temporär, führe es aus und lösche es danach wieder!
$username = 'admin';  // Ändere dies nach Bedarf
$password = 'YOURSECUREPASSWORD';  // Ändere dies in ein sicheres Passwort. Nutze unbedingt auch SOnderzeichen und Großbuchstaben für dein Passwort

$credentials = [
    'username' => $username,
    'password' => password_hash($password, PASSWORD_DEFAULT)
];

file_put_contents('credentials.json', json_encode($credentials, JSON_PRETTY_PRINT));
echo "Credentials wurden erstellt!";
?>
