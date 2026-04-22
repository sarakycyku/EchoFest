<?php

$users = [

    "admin1" => [
        "password" => "John12!",
        "role" => "admin",
        "first_name" => "John",
        "last_name" => "Doe",
        "email" => "admin1@gmail.com",
        "phone" => "044123456",
        "age" => 25,
        "city" => "Prishtine",
        "profile_picture" => "../assets/images/profile/user1.png"
    ],

    "admin2" => [
        "password" => "Smith3#",
        "role" => "admin",
        "first_name" => "Jane",
        "last_name" => "Smith",
        "email" => "admin2@echofest.com",
        "phone" => "612345678",
        "age" => 31,
        "city" => "Madrid",
        "profile_picture" => "../assets/images/profile/user2.png"
    ],

    "user1" => [
        "password" => "@user12?",
        "role" => "user",
        "first_name" => "Michael",
        "last_name" => "Brown",
        "email" => "user1@gmail.com",
        "phone" => "0693218866",
        "age" => 19,
        "city" => "Tirana",
        "profile_picture" => "../assets/images/profile/user3.png"
    ],

    "user2" => [
        "password" => "JEmiliy12.",
        "role" => "user",
        "first_name" => "Emily",
        "last_name" => "Johnson",
        "email" => "user2@gmail.com",
        "phone" => "070271796",
        "age" => 55,
        "city" => "Skopje",
        "profile_picture" => "../assets/images/profile/user4.png"
    ],

    "user3" => [
        "password" => "D4vid.",
        "role" => "user",
        "first_name" => "David",
        "last_name" => "Wilson",
        "email" => "user3@gmail.com",
        "phone" => "03454166693",
        "age" => 40,
        "city" => "Milan",
        "profile_picture" => "../assets/images/profile/user5.jpg"
    ]

];

$usersFile = __DIR__ . '/users.json';
if (file_exists($usersFile)) {
    $jsonUsers = json_decode(file_get_contents($usersFile), true);
    if ($jsonUsers) {
        $users = array_merge($users, $jsonUsers);
    }
}

function saveUsers($users) {
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}
?>