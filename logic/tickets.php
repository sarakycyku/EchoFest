<?php
include __DIR__ . '/../includes/header.php';

$locations = [
    'xk' => ['country' => 'Kosovo', 'city' => 'Pristina', 'dates' => 'July 15-17, 2026', 'venue' => 'Pristina National Stadium, Pristina 10000'],
    'al' => ['country' => 'Albania', 'city' => 'Durres', 'dates' => 'August 5-7, 2026', 'venue' => 'Arena Kombetare, Durres, Albania']
];

//lexon lokacionin nga GET, default xk
$selected = isset($_GET['loc']) && array_key_exists($_GET['loc'], $locations) ? $_GET['loc'] : 'xk';
$event = $locations[$selected];

$tickets = [
    [
        'id' => 'early',
        'img_class' => 'img-early',
        'img_src' => '/EchoFest/assets/images/ticket1.jpg',
        'name' => 'Early Bird',
        'desc' => 'Lock in the best price and be among the first to experience EchoFest! Early Bird tickets give you full access to all main stages and performances. Perfect for the dedicated music fan who plans ahead. These limited tickets won\'t last long, so grab yours now and save big while securing your spot at the biggest festival of the summer.',
        'price' => 79,
        'available' => true,
        'coming_date' => null
    ],
    [
        'id' => 'regular',
        'img_class' => 'img-regular',
        'img_src' => '/EchoFest/assets/images/ticket2.jpg',
        'name' => 'Regular',
        'desc' => 'The complete festival experience with added perks! Skip the long lines with fast-track entry and enjoy complimentary water refills throughout the day. Regular tickets include access to all stages plus special areas not available to Early Bird holders. Get ready for three days of non-stop music, amazing vibes, and memories that will last forever.',
        'price' => 129,
        'available' => false,
        'coming_date' => 'Coming May 1, 2026'
    ],
    [
        'id' => 'vip',
        'img_class' => 'img-vip',
        'img_src' => '/EchoFest/assets/images/ticket3.jpg',
        'name' => 'VIP Experience',
        'desc' => 'Live like a rockstar with our exclusive VIP package! Enjoy premium viewing areas with the best sightlines, relax in air-conditioned VIP lounges, and indulge in complimentary gourmet food and premium drinks. Meet your favorite artists, access private restrooms, and receive an exclusive merchandise pack. This is the ultimate festival experience for those who demand the very best.',
        'price' => 299,
        'available' => false,
        'coming_date' => 'Coming June 1, 2026'
    ]
];
?>
