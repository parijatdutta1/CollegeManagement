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
</head>
<body class="bg-gray-100">

<footer class="bg-teal-800 text-white py-6 mt-10">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-left">
            <div>
                <h2 class="text-lg font-semibold">Company</h2>
                <p class="mt-2 text-xs text-gray-300">Providing quality education and research opportunities.</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Quick Links</h2>
                <ul class="mt-2 space-y-1 text-gray-300 text-xs">
                    <li><a href="../../aboutus.php" class="hover:text-white transition">About Us</a></li>
                    <li><a href="../../research.php" class="hover:text-white transition">Research</a></li>
                    <li><a href="../../rfmo.php" class="hover:text-white transition">RFMO</a></li>
                    <li><a href="../../resource.php" class="hover:text-white transition">Services</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Contact Us</h2>
                <p class="mt-2 text-xs text-gray-300">123 University Road, City, Country</p>
                <p class="text-xs text-gray-300">Email: <a href="mailto:info@jisuniversity.com" class="hover:text-white transition">info@jisuniversity.com</a></p>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Follow Us</h2>
                <div class="flex space-x-3 mt-2">
                    <a href="#" class="text-gray-300 hover:text-white transition text-sm"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white transition text-sm"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white transition text-sm"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <p class="mt-6 text-xs text-gray-400 border-t border-gray-500 pt-2 text-center">© 2024 JIS University. All Rights Reserved.</p>
    </div>
</footer>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>
</html>
