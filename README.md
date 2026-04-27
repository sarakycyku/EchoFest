# EchoFest
EchoFest eshte nje platforme e thjeshte web per me zbulu evente dhe me ble bileta online. I lejon perdoruesit per te  eksploruar festivale dhe per te menaxhuar biletat e tyre, ndersa admini ka nje dashboard te vetin.
## Ekzekutimi i programit

Duhet te keni te instaluar nje server lokal si p.sh XAMPP i cili ne vete perfshin Apache + PHP + MySQL.

Hap CMD dhe shkruaj

``git clone https://github.com/sarakycyku/EchoFest.git``

Projekti duhet te ruhet ne folderin htdocs

Starto Apache ne XAMPP Control Panel.
<img width="839" height="541" alt="image" src="https://github.com/user-attachments/assets/d10be144-d4c3-4366-9c2f-4bfb9b7f17b6" />


 
 Hap browserin dhe shkruaj:

``http://localhost/EchoFest/pages/index.php``

<img width="1919" height="978" alt="image" src="https://github.com/user-attachments/assets/f42c45c1-200d-4ac0-8892-f7865700d40b" />



ku hapet index page dhe perdoruesi nese ka account vazhdon vetem behet login ose nuk nuk ka behet  signup.

## Features

Autentikimi(Login & Signup)

Landing Page(index.php)

Shfaqja e eventeve (lineup.php)

Dashboard i perdoruesit(home.php)

Menaxhimi i profilit (profile.php, edit_profile.php)

Menaxhimi i biletave (tickets.php)

Blerja e biletave(purchase.php)

Dashboard i adminit(admin.php)

About us(aboutus.php)

## Log in
Te dhenat per admin jane statike
username:admin1
password:Admin123#
ndersa per perdoruesit nuk jane statike.

## Struktura 
``EchoFest/
├── .idea/
│
├── assets/
│   ├── css/
│   ├── images/
│   └── js/
│
├── classes/
│   ├── Event.php
│   ├── Person.php
│   └── TeamMember.php
│
├── data/
│   ├── events.json
│   ├── events.php
│   ├── events_data.json
│   ├── festival.php
│   ├── lineup_data.json
│   ├── tickets.json
│   ├── users.json
│   └── users.php
│
├── includes/
│   ├── cookies.php
│   ├── footer.php
│   └── header.php
│
├── logic/
│   ├── about.php
│   ├── admin.php
│   ├── cookies.php
│   ├── delete_logic.php
│   ├── edit_logic.php
│   ├── events.php
│   ├── lineup.php
│   ├── login_logic.php
│   ├── logout.php
│   ├── purchase_logic.php
│   └── signup_logic.php
│
├── pages/
│   ├── about.php
│   ├── admin.php
│   ├── edit_profile.php
│   ├── events.php
│   ├── index.php
│   ├── lineup.php
│   ├── login.php
│   ├── logout.php
│   ├── news.php
│   ├── privacy.html
│   ├── profile.php
│   ├── purchase.php
│   ├── signup.php
│   ├── terms.html
│   └── tickets.php
│
├── LICENSE
└── README.md``

