<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo2-pabg.png">
    <link rel="stylesheet" href="../assets/css/loginp.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
         body {
    background-image: url('../assets/images/bg.png');
    background-size: cover;          
    background-position: center;    
    background-repeat: no-repeat;
    background-attachment: fixed;  
} 
    </style>
</head>
<body>
    <div class="login-container">
        <div class="future-card">
            <div class="chrome-header">
                <div class="retro-logo mt-1">
                    <div class="logo-chrome">
                        <img src="../assets/images/logo2-pabg.png" alt="Logo" width="150" height="150">
                        <div class="chrome-glow"></div>
                    </div>
                </div>
                <h1 class="y2k-title">
                    <span class="title-chrome">LOG</span>
                    <span class="title-neon">IN</span>
                </h1>
            </div>
            
            <form class="future-form" id="loginForm" novalidate>
                <div class="retro-field">
                    <div class="field-chrome">
                        <div class="chrome-border"></div>
                        <input type="text" id="username" name="username" required placeholder=" ">
                        <label for="username">Username</label>
                        <div class="field-hologram"></div>
                    </div>
                    <span class="retro-error" id="usernameError"></span>
                </div>

                <div class="retro-field">
                    <div class="field-chrome">
                        <div class="chrome-border"></div>
                        <input type="password" id="password" name="password" required placeholder=" ">
                        <label for="password">Password</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>

                <a href="login.html" class="login-btn px-6 py-2.5 bg-gradient-to-r from-indigo-900 to-purple-900 rounded-lg text-white text-sm hover:shadow-lg transition">
                Login </a>
                <div class="signup-option">
                <p>
                    Don't have an account?
                    <a href="signup.php">Sign up</a>
                </p>
                <div class="legal-links">
                <a href="#">Terms</a> • 
                <a href="#">Privacy</a>
</div>
</div>
            </form>
        </div>
    </div>
</body>
</html>