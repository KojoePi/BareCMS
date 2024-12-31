<?php
// check.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>System Check</h1>";

// PHP Version
echo "<h2>PHP Version:</h2>";
echo PHP_VERSION . "<br>";

// Verzeichnisberechtigungen
echo "<h2>Verzeichnisberechtigungen:</h2>";
$dir = __DIR__;
echo "Aktuelles Verzeichnis: $dir<br>";
echo "Readable: " . (is_readable($dir) ? 'Ja' : 'Nein') . "<br>";
echo "Writable: " . (is_writable($dir) ? 'Ja' : 'Nein') . "<br>";

// JSON Funktionen
echo "<h2>JSON Funktionen:</h2>";
echo "json_encode verfügbar: " . (function_exists('json_encode') ? 'Ja' : 'Nein') . "<br>";
echo "json_decode verfügbar: " . (function_exists('json_decode') ? 'Ja' : 'Nein') . "<br>";

// Dateioperationen testen
echo "<h2>Dateioperationen:</h2>";
$testfile = 'test.txt';
$success = @file_put_contents($testfile, 'test');
echo "Schreiben: " . ($success !== false ? 'OK' : 'Fehler') . "<br>";
if (file_exists($testfile)) {
    echo "Lesen: " . (@file_get_contents($testfile) === 'test' ? 'OK' : 'Fehler') . "<br>";
    @unlink($testfile);
    echo "Löschen: OK<br>";
}

// Server-Informationen
echo "<h2>Server-Informationen:</h2>";
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
