<?php include '../assets/phppages/headernav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="assets/css/loginindex.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#10B981',
                        secondary: '#6B7280',
                    },
                },
            },
        };
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');
            const dropdownLabel = document.getElementById('dropdownLabel');
            const hiddenRoleInput = document.getElementById('roleInput');
            const dynamicFieldContainer = document.getElementById('dynamicFieldContainer');
            const form = document.getElementById('loginForm');
            const loading = document.getElementById('loading');
            loading.style.display = 'flex';
            setTimeout(() => {
            loading.style.display = 'none';
            }, 1500);
            // Mapping of roles to input field configurations
            const roleFields = {
                faculty: {
                    placeholder: 'Enter Your ID',
                    type: 'text',
                    name: 'faculty_id',
                },
                administrator: {
                    placeholder: 'Enter Your Email',
                    type: 'email',
                    name: 'email',
                },
                principal: {
                    placeholder: 'Enter Your Email',
                    type: 'email',
                    name: 'email',
                },
            };

            dropdownButton.addEventListener('click', (event) => {
                event.preventDefault();
                dropdownMenu.classList.toggle('hidden');
                event.stopPropagation(); // Prevent clicks from propagating to document listener
            });

            document.addEventListener('click', () => {
                dropdownMenu.classList.add('hidden'); // Close the dropdown menu
            });

            dropdownMenu.addEventListener('click', (event) => {
                event.stopPropagation(); // Prevent clicks inside dropdown from closing it
            });

            document.querySelectorAll('.dropdown-item').forEach((item) => {
                item.addEventListener('click', (event) => {
                    event.preventDefault();
                    const selectedRole = item.getAttribute('data-role');
                    dropdownLabel.textContent = item.textContent.trim();
                    hiddenRoleInput.value = selectedRole;

                    const fieldConfig = roleFields[selectedRole];
                    if (fieldConfig) {
                        dynamicFieldContainer.innerHTML = `
                            <input 
                                type="${fieldConfig.type}" 
                                name="${fieldConfig.name}" 
                                placeholder="${fieldConfig.placeholder}" 
                                class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        `;
                    }
                    dropdownMenu.classList.add('hidden'); // Close the dropdown menu
                });
            });

            form.addEventListener('submit', (event) => {
                if (!hiddenRoleInput.value) {
                    event.preventDefault();
                    alert('Please select a login type.');
                } else {
                    loading.style.display = 'flex'; // Show loading animation
                }
            });
        });
    </script>
</head>

<div class="loading-container" id="loading">
  <div class="loader"></div>
  <p>Loading...</p>
</div>

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 bg-gray-100 flex items-center justify-center">
                    <img src="images.png" alt="Login Illustration" class="w-full h-auto object-cover p-4 md:p-8">
                </div>
                <div class="md:w-1/2 p-8">
                    <div class="text-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Welcome Back!</h1>
                        <p class="text-sm text-secondary">Sign in to your account</p>
                    </div>
                    <form id="loginForm" action="process_login.php" method="POST">
                        <div class="relative mb-4">
                            <button 
                                id="dropdownButton" 
                                type="button" 
                                class="w-full py-3 px-4 bg-gray-100 border border-gray-300 rounded-lg text-left flex items-center justify-between focus:ring-2 focus:ring-primary">
                                <span id="dropdownLabel">Select Login Type</span>
                                <svg class="w-5 h-5 text-secondary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a 1 0 01-1.414 0l-4-4a 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div id="dropdownMenu" class="hidden absolute mt-2 w-full bg-white border border-gray-300 rounded-lg shadow-lg z-50">
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-primary hover:text-white dropdown-item" data-role="faculty">Faculty</a>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-primary hover:text-white dropdown-item" data-role="administrator">Administrator</a>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-primary hover:text-white dropdown-item" data-role="principal">Principal</a>
                            </div>
                        </div>
                        <input type="hidden" id="roleInput" name="role">
                        <div id="dynamicFieldContainer" class="mb-4"></div>
                        <div class="mb-6">
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                placeholder="Password" 
                                class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <button 
                                type="submit" 
                                class="w-full py-3 bg-primary text-white font-semibold rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-primary">
                                Sign In
                            </button>
                        </div>
                    </form>
                    <p class="mt-4 text-center text-sm text-gray-600">
                        Don't have an account? 
                        <a href="register.php" class="text-primary font-semibold hover:underline">Register Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php include '../assets/phppages/footer.php'; ?>