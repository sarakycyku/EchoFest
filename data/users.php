<?php
$usersFile = __DIR__ . '/users.json';

$users = [];
if (file_exists($usersFile)) {
    $users = json_decode(file_get_contents($usersFile), true) ?? [];
}

/* Admina hardcoded */
$admins = [
    "admin1" => [
        "password"   => '$2y$10$zACmuYDI936I.R9.rWyT9OBxXlJfJ625gRWLRAFRbEK95vOOAE7pK', // Hash për "Admin123#
        "email"      => "admin1@echofest.com",
        "first_name" => "Sara",
        "last_name"  => "Admin",
        "phone"      => "049123456",
        "age"        => 25,
        "role"       => "admin"
    ],

    "admin2" => [
        "password"   => '$2y$10$DKkB9az/MewyGmEzhh9yxumumeTDIdxXbrUWgS7qWgs0l3M6Iv4.e', 
        "email"      => "admin2@echofest.com",
        "first_name" => "Echo",
        "last_name"  => "Fest",
        "phone"      => "044987654",
        "age"        => 30,
        "role"       => "admin"
    ]
];

$users = array_merge($admins, $users);

function saveUsers($data) {
    global $usersFile;

    // Mos i ruaj adminat në JSON
    foreach ($data as $username => $user) {
        if (isset($user["role"]) && $user["role"] === "admin") {
            unset($data[$username]);
        }
    }

    file_put_contents($usersFile, json_encode($data, JSON_PRETTY_PRINT));
}
?>