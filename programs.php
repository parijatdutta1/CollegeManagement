<?php
// Sample data for programs and initiatives
$programs = [
    [
        'title' => 'Community Outreach',
        'description' => 'Engaging with local communities to foster collaboration and growth.',
        'image' => 'https://via.placeholder.com/150/92c952',
        'link' => 'community_outreach.php'
    ],
    [
        'title' => 'Sustainability Initiatives',
        'description' => 'Promoting eco-friendly practices and reducing environmental impact.',
        'image' => 'https://via.placeholder.com/150/771796',
        'link' => 'sustainability_initiatives.php'
    ],
    [
        'title' => 'Research and Development',
        'description' => 'Innovating for a better future through cutting-edge research.',
        'image' => 'https://via.placeholder.com/150/24f355',
        'link' => 'research_and_development.php'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs and Initiatives</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php include 'assets/phppages/headernav.php'; ?>
</head>


<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-center text-green-600 mb-8">Programs and Initiatives</h1>
        <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            <?php foreach ($programs as $program): ?>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="<?php echo $program['image']; ?>" alt="<?php echo $program['title']; ?>" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-green-700"><?php echo $program['title']; ?></h2>
                        <p class="text-gray-600 mt-4"><?php echo $program['description']; ?></p>
                        <a href="<?php echo $program['link']; ?>" class="mt-6 inline-block bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300">
                            Learn More
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="bg-indigo-900 h-12"></div>

<!-- Partners Section -->
<div class="bg-indigo-900 h-12"></div>

<!-- Partners Section -->
<section class="flex flex-col items-center py-16 bg-gray-200 rounded-lg mx-4 sm:mx-16 mt-12 shadow-md">
  <!-- Title -->
  <h2 class="text-2xl font-semibold text-gray-700 mb-8">OUR PARTNERS</h2>

  <!-- Partner Boxes -->
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full max-w-4xl px-4">
    <!-- Partner 1 -->
    <div class="h-24 bg-gray-300 rounded-md shadow-md flex items-center justify-center text-gray-700 text-lg font-medium">
      Partner 1
    </div>

    <!-- Partner 2 -->
    <div class="h-24 bg-gray-300 rounded-md shadow-md flex items-center justify-center text-gray-700 text-lg font-medium">
      Partner 2
    </div>

    <!-- Partner 3 -->
    <div class="h-24 bg-gray-300 rounded-md shadow-md flex items-center justify-center text-gray-700 text-lg font-medium">
      Partner 3
    </div>

    <!-- Partner 4 -->
    <div class="h-24 bg-gray-300 rounded-md shadow-md flex items-center justify-center text-gray-700 text-lg font-medium">
      Partner 4
    </div>
  </div>
</section>



<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg flex flex-col lg:flex-row w-11/12 lg:w-3/4">
      <!-- Left Section -->
      <div class="bg-indigo-900 text-white p-10 flex flex-col justify-center lg:w-1/2">
        <h2 class="text-4xl font-bold mb-4">“Let’s Make it Happen Together!”</h2>
        <p class="text-lg">Join us and start your journey with our amazing tools and services.</p>
      </div>
      
      <!-- Right Section -->
      <div class="bg-green-500 p-10 lg:w-1/2">
        <h2 class="text-2xl font-bold mb-6 text-indigo-900">Create An Account</h2>
        <form class="space-y-4">
          <div class="flex space-x-4">
            <input type="text" placeholder="First Name" class="w-1/2 p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
            <input type="text" placeholder="Last Name" class="w-1/2 p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>
          <div>
            <input type="email" placeholder="Email" class="w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>
          <div>
            <input type="text" placeholder="Address" class="w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>
          <div class="flex space-x-4">
            <input type="password" placeholder="Create Password" class="w-1/2 p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
            <input type="password" placeholder="Confirm Password" class="w-1/2 p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>
          <div class="flex items-center space-x-2">
            <input type="checkbox" id="terms" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 rounded">
            <label for="terms" class="text-sm text-gray-800">Creating your account means you accept our <a href="#" class="text-indigo-900 underline">Terms & Conditions</a>.</label>
          </div>
          <button type="submit" class="w-full bg-indigo-900 text-white py-3 rounded-md hover:bg-indigo-800">Create Account</button>
        </form>

        <div class="mt-6 space-y-2">
          <button class="w-full bg-blue-600 text-white py-2 rounded-md flex items-center justify-center space-x-2 hover:bg-blue-500">
            <span>Sign up Using Facebook</span>
          </button>
          <button class="w-full bg-blue-400 text-white py-2 rounded-md flex items-center justify-center space-x-2 hover:bg-blue-300">
            <span>Sign up Using Twitter</span>
          </button>
        </div>
        
        <p class="text-center text-sm mt-6 text-gray-800">
          @copyright 2030. Company inc ltd
        </p>
      </div>
    </div>
  </div>
</body>
<?php include 'assets/phppages/footer.php'; ?>
</html>
