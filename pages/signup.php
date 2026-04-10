<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>

<link rel="icon" type="image/x-icon" href="../assets/images/logo2-pabg.png">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../assets/css/signupp.css">

<style>
body {
    background: #111 url('../assets/images/bg.png') center/cover no-repeat;
    overflow-y:scroll; 
}
</style>
</head>

<body>

<div class="login-container">
    <div class="future-card">

        <!-- HEADER -->
        <div class="chrome-header">
            <div class="retro-logo">
                <div class="logo-chrome">
                    <img src="../assets/images/logo2-pabg.png" width="150" height="200" alt="Logo">
                </div>
            </div>

            <h1 class="y2k-title">
                <span class="title-chrome">SIGN</span>
                <span class="title-neon">UP</span>
            </h1>
        </div>

        <!-- FORM -->
        <form class="future-form">

            <!-- NAME -->
            <div class="form-row">
                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="text" placeholder=" " required>
                        <label>First Name</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>

                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="text" placeholder=" " required>
                        <label>Last Name</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>
            </div>

            <!-- USERNAME + EMAIL -->
            <div class="form-row">
                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="text" placeholder=" " required>
                        <label>Username</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>

                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="email" placeholder=" " required>
                        <label>Email</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>
            </div>

            <!-- PHONE + CITY -->
            <div class="form-row">
                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="text" placeholder=" ">
                        <label>Phone</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>

                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="text" placeholder=" ">
                        <label>City</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="form-row">
                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="password" placeholder=" " required>
                        <label>Password</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>

                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="password" placeholder=" " required>
                        <label>Confirm Password</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>
            </div>
              <p class="legal-links">
                By signing up you agree to our 
                <a href="terms.html">Terms & Conditions</a> and 
                <a href="#">Privacy Policy</a>
            </p>
            <!-- BUTTON -->
            <button class="login-btn w-full py-2 rounded bg-gradient-to-r from-cyan-500 to-indigo-600  transition">
    Create Account
  </button>
            
  <!-- Link to Login -->
            <p class="switch-form">
                Already have an account? <a href="login.php" class="future-link">Login</a>
            </p>
        </form>

    </div>
</div>

</body>
</html>