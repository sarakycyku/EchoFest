<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../pages/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../pages/admin_tickets.php");
    exit;
}

$action = $_POST['action'] ?? '';
$ticketsFile = __DIR__ . '/../data/tickets.json';

$tickets = json_decode(file_get_contents($ticketsFile), true);

//me shtu ticket
if ($action === 'add') {
    $id = trim($_POST['id'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $price = (int)($_POST['price'] ?? 0);
    $coming = trim($_POST['coming_date'] ?? '');
    $img = trim($_POST['img_src'] ?? '');
    $desc = trim($_POST['desc'] ?? '');

    //validimi per coming date
    if ($coming !== '') {
        preg_match('/\d{4}/', $coming, $yearMatch);
        $year = isset($yearMatch[0]) ? (int)$yearMatch[0] : 0;

        if ($year < (int)date('Y')) {
            $_SESSION['admin_msg'] = "Coming date nuk mund te jete ne te kaluaren.";
            header("Location: ../pages/admin_tickets.php");
            exit;
        }
    }

    //validimi per id
    if (!preg_match('/^[a-z0-9-]{3,}$/', $id)) {
        $_SESSION['admin_msg'] = "ID duhet te kete minimum 3 karaktere (vetem a-z, 0-9, -)";
        header("Location: /EchoFest/pages/admin/admin_tickets.php");
        exit;
    }

    //kontrollon a ekzison id
    foreach ($tickets as $t) {
        if ($t['id'] === $id) {
            $_SESSION['admin_msg'] = "Ticket with ID '$id' already exists.";
            header("Location: ../pages/admin_tickets.php");
            exit;
        }
    }

    $tickets[] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'available' => false,
        'coming_date' => $coming === '' ? null : $coming,
        'img_src' => $img === '' ? '../assets/images/ticket1.jpg' : $img,
        'desc' => $desc,
    ];

    $_SESSION['admin_msg'] = "Ticket '$name' added successfully.";
}
//enable/disable
elseif ($action === 'enable' || $action === 'disable') {
    $id = $_POST['id'] ?? '';

    foreach ($tickets as &$t) {
        if ($t['id'] === $id) {
            $t['available'] = ($action === 'enable');
            break;
        }
    }
    unset($t);

    $_SESSION['admin_msg'] = "Ticket '$id' is " . ($action === 'enable' ? 'enabled' : 'disabled') . ".";
}
//delete tickts
elseif ($action === 'delete') {
    $id = $_POST['id'] ?? '';

    $tickets = array_filter($tickets, fn($t) => $t['id'] !== $id);
    $tickets = array_values($tickets); //me indeksu

    $_SESSION['admin_msg'] = "Ticket '$id' is deleted.";
}

//me shkru jsonin e ri
file_put_contents($ticketsFile, json_encode($tickets, JSON_PRETTY_PRINT));

header("Location: /EchoFest/pages/admin/admin_tickets.php");
exit;
?>