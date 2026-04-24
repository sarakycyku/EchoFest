<?php
// fillon sessioni
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_after_login'] = 'purchase.php?' . http_build_query($_GET);
    header("Location: ../pages/login.php");
    exit;
}

//merr te dhenat e userit nga user.php
include "../data/users.php";

$username = $_SESSION['username'];
$data = $users[$username];

$firstName = $data['first_name'] ?? '';
$lastName = $data['last_name'] ?? '';
$email = $data['email'] ?? '';
$phone = $data['phone'] ?? '';

include '../includes/header.php';
?>

<link rel="stylesheet" href="../assets/css/purchase.css">

<h1 class="page-title">Complete Your Purchase</h1>

<form method="POST" action="purchase_logic.php">
    <div class="purchase-layout">

        <div class="forms-col">

            <div class="panel">
                <div class="panel-title">Personal Information</div>
                <div class="form-grid">
                    <div class="field">
                        <label>First Name <span class="req">*</span></label>
                        <input type="text" name="first_name"
                            value="<?= $firstName ?>"
                            class="<?= $firstName ? 'prefilled' : '' ?>"
                            placeholder="First Name"
                            <?= $firstName ? 'readonly' : 'required' ?>>
                    </div>
                    <div class="field">
                        <label>Last Name <span class="req">*</span></label>
                        <input type="text" name="last_name"
                            value="<?= $lastName ?>"
                            class="<?= $lastName ? 'prefilled' : '' ?>"
                            placeholder="Last Name"
                            <?= $lastName ? 'readonly' : 'required' ?>>
                    </div>
                    <div class="field">
                        <label>Email <span class="req">*</span></label>
                        <input type="email" name="email"
                            value="<?= $email ?>"
                            class="<?= $email ? 'prefilled' : '' ?>"
                            placeholder="john@example.com"
                            <?= $email ? 'readonly' : 'required' ?>>
                    </div>
                    <div class="field">
                        <label>Phone Number <span class="req">*</span></label>
                        <input type="tel" name="phone"
                            value="<?= $phone ?>"
                            class="<?= $phone ? 'prefilled' : '' ?>"
                            placeholder="+383 44 000 000"
                            <?= $phone ? 'readonly' : 'required' ?>>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-title">Billing Address</div>
                <div class="form-grid">
                    <div class="field">
                        <label>Address <span class="req">*</span></label>
                        <input type="text" name="address" placeholder="123 Main Street" required>
                    </div>
                    <div class="field">
                        <label>City <span class="req">*</span></label>
                        <input type="text" name="city" placeholder="Pristina" required>
                    </div>
                    <div class="field">
                        <label>Country <span class="req">*</span></label>
                        <input type="text" name="country" placeholder="Kosovo" required>
                    </div>
                </div>
            </div>

        </div>
</form>

<?php include '../includes/footer.php'; ?>