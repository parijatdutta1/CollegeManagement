<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {}
        }
      }
    </script>
    <style type="text/tailwindcss">
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        @layer components {
          .btn-primary {
            @apply py-2 px-5 bg-teal-600 text-white rounded-lg shadow-md hover:bg-teal-700 transition duration-300;
          }
        }
    </style>
</head>
<body class="bg-gray-100">
<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="mx-auto max-w-screen-xl px-6 sm:px-8 lg:px-10">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="https://jistesting.lovestoblog.com/" class="flex items-center">
                    <img src="../assets/images/JIS_Universitylogo.png" alt="JIS University Logo" class="h-12 w-auto">
                </a>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex md:items-center md:space-x-8 text-gray-800 font-semibold">
                <a href="../../aboutus.php" class="hover:text-teal-600 transition">About Us</a>
                <a href="../../research.php" class="hover:text-teal-600 transition">Research</a>
                <a href="../../public_eventsm.php" class="hover:text-teal-600 transition">Events</a>
                <a href="../../rfmo.php" class="hover:text-teal-600 transition">RFMO</a>
                <a href="../../resource.php" class="hover:text-teal-600 transition">Services</a>
                <a href="../../outersystem/contact.php" class="hover:text-teal-600 transition">Contact</a>
            </nav>

            <!-- Right Section: Login Button & Mobile Menu -->
            <div class="flex items-center space-x-6">
                <a href="../../loginsystem/loginindex.php" class="btn-primary hidden sm:inline-block">Login</a>
                
                <!-- Mobile Menu Button -->
                <button id="menuToggle" class="md:hidden p-2 text-gray-600 hover:text-teal-600 transition">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t p-5 space-y-4 shadow-lg">
        <a href="../../aboutus.php" class="block text-gray-800 hover:text-teal-600 transition">About Us</a>
        <a href="../../research.php" class="block text-gray-800 hover:text-teal-600 transition">Research</a>
        <a href="../../rfmo.php" class="block text-gray-800 hover:text-teal-600 transition">RFMO</a>
        <a href="../../resource.php" class="block text-gray-800 hover:text-teal-600 transition">Services</a>
        <a href="../../outersystem/contact.php" class="block text-gray-800 hover:text-teal-600 transition">Contact</a>
        <a href="../../loginsystem/loginindex.php" class="btn-primary block text-center">Login</a>
    </div>
</header>

<script>
    document.getElementById('menuToggle').addEventListener('click', function () {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
</script>
</body>
</html>
