<?php

if (!extension_loaded('pdo_mysql')) {
    fwrite(STDERR, 'PDO MySQL is required'); exit(1);
}

$db = new PDO('mysql:host=mysql;dbname=test', 'demo', 'demo');

$version = $db->query('SELECT version()')->fetchColumn();
echo sprintf('<h1>Successfully connected to MySQL %s</h1>', $version);

