<?php
require_once __DIR__ . '/../db/conn.php';

$users = [];

/* Admina hardcoded */
$admins = [
    "admin1" => [
        "password"   => '$2y$10$zACmuYDI936I.R9.rWyT9OBxXlJfJ625gRWLRAFRbEK95vOOAE7pK',
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

$stmt = $pdo->query("SELECT username, password, email, first_name, last_name, phone, age, role, created_at FROM users WHERE role <> 'admin' ORDER BY id");
$rows = $stmt->fetchAll();

foreach ($rows as $row) {
    $username = $row['username'];
    unset($row['username']);
    $users[$username] = $row;
}

$users = array_merge($admins, $users);

function saveUsers($data) {
    global $pdo;

    foreach ($data as $username => $user) {
        if (isset($user["role"]) && $user["role"] === "admin") {
            continue;
        }

        $stmt = $pdo->prepare("
            INSERT INTO users (username, password, email, first_name, last_name, phone, age, role, created_at)
            VALUES (:username, :password, :email, :first_name, :last_name, :phone, :age, :role, :created_at)
            ON DUPLICATE KEY UPDATE
                password = VALUES(password),
                email = VALUES(email),
                first_name = VALUES(first_name),
                last_name = VALUES(last_name),
                phone = VALUES(phone),
                age = VALUES(age),
                role = VALUES(role)
        ");

        $stmt->execute([
            ':username' => $username,
            ':password' => $user['password'],
            ':email' => $user['email'],
            ':first_name' => $user['first_name'],
            ':last_name' => $user['last_name'],
            ':phone' => $user['phone'],
            ':age' => $user['age'],
            ':role' => $user['role'] ?? 'user',
            ':created_at' => $user['created_at'] ?? date('Y-m-d H:i:s'),
        ]);
    }
}
?>
