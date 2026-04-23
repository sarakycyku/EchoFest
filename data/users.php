<?php
$usersFile = __DIR__ . '/users.json';
$users = json_decode(file_get_contents($usersFile), true) ?? [];

function saveUsers($data) {
    global $usersFile;
    file_put_contents($usersFile, json_encode($data, JSON_PRETTY_PRINT));
}