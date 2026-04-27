<?php

$festivalInfo = [
    'name' => 'EchoFest',
    'year' => '2026',
    'dates' => 'July 18-21, 2026',
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
    $file = __DIR__ . '../data/lineup_data.json';

    // Fallback for the current folder-based structure if the older path no longer resolves.
    if (!file_exists($file)) {
        $file = __DIR__ . '/lineup_data.json';
    }

    if (!file_exists($file)) {
        return [];
    }

    return json_decode(file_get_contents($file), true) ?? [];
}

function loadTicketData(string $file = __DIR__ . '../data/tickets.json'): array
{
    // Fallback for the current folder-based structure if the older path no longer resolves.
    if (!file_exists($file)) {
        $file = __DIR__ . '/tickets.json';
    }

    if (!file_exists($file)) {
        return [];
    }

    $data = json_decode(file_get_contents($file), true);
    return is_array($data) ? $data : [];
}
