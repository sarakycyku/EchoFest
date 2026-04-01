<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="icon" type="image/x-icon" href="../images/logo2-pabg.png">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
         body {
    background-image: url('../images/bg.png');
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
                        <img src="../images/logo2-pabg.png" alt="Logo" width="150" height="150">
                        <div class="chrome-glow"></div>
                    </div>
                </div>
                <h1 class="y2k-title">
                    <span class="title-chrome">ECHO</span>
                    <span class="title-neon">FEST</span>
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
                    <span class="retro-error" id="passwordError"></span>
                </div>

                <button class="login-btn">
                    <span class="bg-gradient-to-r from-cyan-300 to-indigo-300 bg-clip-text ">Login</span>
                </button>
            </form>
        </div>
    </div>
</body>
</html>