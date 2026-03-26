<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="../css/header.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="../css/footer.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" ...>


</head>
<body class="font-['Space_Grotesk'] overflow-x-hidden bg-black text-white">

   <nav id="navbar" class="fixed top-0 left-0 right-0 bg-black/80 backdrop-blur-lg border-b border-cyan-500/30 z-50">
    <div class="container mx-auto px-6 h-full flex items-center justify-between relative">
            
        <!-- Logo Image -->
<div class="relative mr-2">
    <img src="../images/logo2.png" alt="Logo" class="w-12 h-12 md:w-16 md:h-16 rounded-md object-cover">
</div>

            <!-- Center Links -->
            <div class="absolute left-1/2 transform -translate-x-1/2 flex gap-8">
                <a href="#home" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">Home</a>
                <a href="#about" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">About</a>
                <a href="#services" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">Gallery</a>
                <a href="#portfolio" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">Tickets</a>
                <a href="#contact" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">Line Up</a>
            </div>

            <!-- Right Buttons -->
            <div class="hidden md:flex gap-4">
                <!-- Login -->
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-600/50 to-purple-600/50 rounded-lg blur opacity-75 group-hover:opacity-100 transition-all duration-500"></div>
                    <button class="login-btn px-4 py-2 bg-gradient-to-r from-indigo-900/90 to-purple-900/90 rounded-lg text-white text-sm font-medium relative z-10 flex items-center justify-center gap-2 group-hover:from-indigo-800/90 group-hover:to-purple-800/90 transition-all duration-300">
                        <span class="bg-gradient-to-r from-cyan-300 to-indigo-300 bg-clip-text text-transparent">Login</span>
                    </button>
                </div>

                <!-- Signup -->
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500/50 to-indigo-500/50 rounded-lg blur opacity-75 group-hover:opacity-100 transition-all duration-500"></div>
                    <button class="signup-btn px-4 py-2 bg-gradient-to-r from-cyan-700/90 to-indigo-700/90 rounded-lg text-white text-sm font-medium relative z-10 flex items-center justify-center gap-2 group-hover:from-cyan-600/90 group-hover:to-indigo-600/90 transition-all duration-300">
                        <span class="bg-gradient-to-r from-indigo-200 to-cyan-200 bg-clip-text text-transparent">Signup</span>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex md:hidden">
                <button id="mobile-menu-button" class="relative w-10 h-10 focus:outline-none group" aria-label="Toggle menu">
                    <div class="absolute w-5 transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                        <span class="block h-0.5 w-5 bg-cyan-400 mb-1 transform transition duration-300 ease-in-out" id="line1"></span>
                        <span class="block h-0.5 w-5 bg-cyan-400 mb-1 transform transition duration-300 ease-in-out" id="line2"></span>
                        <span class="block h-0.5 w-5 bg-cyan-400 transform transition duration-300 ease-in-out" id="line3"></span>
                    </div>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden h-0 overflow-hidden transition-all duration-300 ease-in-out mt-20">
                <div class="pt-2 pb-4 flex flex-col gap-2">
                    <a href="#home" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">Home</a>
                    <a href="#about" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">About</a>
                    <a href="#services" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">Gallery</a>
                    <a href="#portfolio" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">Tickets</a>
                    <a href="#contact" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">Line Up</a>

                    <div class="px-4 pt-2 flex gap-2">
                        <button class="login-btn w-1/2 px-4 py-2 bg-gradient-to-r from-indigo-700 to-purple-700 rounded-lg text-white text-sm font-medium flex items-center justify-center gap-2 hover:from-indigo-600 hover:to-purple-600 transition-all duration-300">
                            <span class="bg-gradient-to-r from-cyan-300 to-indigo-300 bg-clip-text text-transparent">Login</span>
                        </button>
                        <button class="signup-btn w-1/2 px-4 py-2 bg-gradient-to-r from-cyan-500 to-indigo-500 rounded-lg text-white text-sm font-medium flex items-center justify-center gap-2 hover:from-cyan-400 hover:to-indigo-400 transition-all duration-300">
                            <span class="bg-gradient-to-r from-indigo-200 to-cyan-200 bg-clip-text text-transparent">Signup</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </nav>
