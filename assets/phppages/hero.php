

<!doctype html>
  <html>
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
    </style>
  </head>
  <body>
    <div class="bg-gray-200" >
        <div class="container mx-auto py-8 px-4 md:px-0 md:flex md:justify-center md:items-center">
            <div class="md:w-1/2 lg:w-1/3 md:mr-8">
                <h1 class="text-3xl font-bold mb-4">Responsive Design</h1>
                <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ullamcorper euismod
                    massa eget dapibus. Sed in leo vel justo blandit faucibus id nec sapien.</p>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Learn More
          </button>
            </div>
            <div class="md:w-1/2 lg:w-2/3 mt-8 md:mt-0">
                <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f" alt="Responsive Design" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
  </body>
  </html>





