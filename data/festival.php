<?php
require_once __DIR__ . '/../db/conn.php';

$festivalInfo = [
    'name' => 'EchoFest',
    'year' => '2026',
    'dates' => 'July 15-17, 2026',
    'venue' => 'Open Air Arena',
    'location' => 'Pristina, Kosovo',
    'audience' => 'Fans, newcomers, and returning members',
    'focus' => 'Lineup, tickets, story, and profile',
];

$festivalLocations = [
    'xk' => [
        'flag' => 'XK',
        'country' => 'Kosovo',
        'city' => 'Pristina',
        'dates' => 'July 15-17, 2026',
        'venue' => 'Pristina National Stadium, Rr. Agim Ramadani, Pristina 10000',
    ],
    'al' => [
        'flag' => 'AL',
        'country' => 'Albania',
        'city' => 'Durres',
        'dates' => 'August 5-7, 2026',
        'venue' => 'Arena Kombetare, Durres, Albania',
    ],
];

function loadLineupData() {
    global $pdo;

    $stmt = $pdo->query("SELECT artist, stage, day, image, hits FROM lineup ORDER BY id");
    $lineup = $stmt->fetchAll();

    foreach ($lineup as &$event) {
        $event['hits'] = json_decode($event['hits'] ?? '[]', true) ?: [];
    }
    unset($event);

    return $lineup;
}

function loadTicketData(string $file = __DIR__ . '/tickets.json'): array
{
    global $pdo;

    $stmt = $pdo->query("SELECT id, img_class, img_src, name, description AS `desc`, price, available, coming_date FROM tickets ORDER BY sort_order, id");
    $tickets = $stmt->fetchAll();

    foreach ($tickets as &$ticket) {
        $ticket['price'] = (int) $ticket['price'];
        $ticket['available'] = (bool) $ticket['available'];
        if (empty($ticket['img_class'])) {
            $ticket['img_class'] = 'img-' . $ticket['id'];
        }
    }
    unset($ticket);

    return $tickets;
}
