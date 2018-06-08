<?php

if (!extension_loaded('pdo_mysql')) {
    fwrite(STDERR, 'PDO MySQL is required'); exit(1);
}

$db = new PDO('mysql:host=mysql;dbname=test', 'demo', 'demo');

migrateUp($db);

$db->query('INSERT INTO history values ()');

$runsCount = $db->query('SELECT count(*) FROM `history`')->fetchColumn();
$lastRun = $db->query('SELECT max(time) FROM history')->fetchColumn();
echo sprintf('<h1>Script was run %s times. Last run time: %s</h1>', $runsCount, $lastRun);

function migrateUp(PDO $db) {
    if ($db->query("SHOW TABLES LIKE 'history'")->rowCount() === 0) {
        echo 'Table "history" does not exist. Creating. <br />';
        $db->query("CREATE TABLE history (
            time    TIMESTAMP   NOT NULL    DEFAULT now()
        )")->execute();
    }
}
