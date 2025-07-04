<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - GEPO</title>
    <link rel="stylesheet" href="aboutusstyles.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
          font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            
        }

.carousel-container {
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  width: 100%;
  max-width: 1200px;
  margin: 50px auto;
}

.carousel {
  display: flex;
  overflow: hidden;
  width: 100%;
  max-width: 900px;
}

.card {
  flex: 0 0 300px;
  margin: 0 10px;
  background: white;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  padding: 20px;
  transition: transform 0.3s ease-in-out;
}

.card img {
  width: 100%;
  border-radius: 8px;
}

.card:hover {
  transform: scale(1.05);
}

button {
  background-color: white;
  border: none;
  color: #555;
  font-size: 24px;
  padding: 10px;
  cursor: pointer;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 10;
}

.prev-btn {
  left: 10px;
}

.next-btn {
  right: 10px;
}

button:hover {
  color: #000;
}

        h2 {
            color: #333;
            font-size: 40px;
            text-align: center;
        }
        .faq {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px 0;
            padding: 15px;
            transition: background 0.3s, color 0.3s, transform 0.2s;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .faq:hover {
            background: rgb(13 148 136 / var(--tw-bg-opacity, 1));
            color: #fff;
            transform: scale(1.02);
        }
        .faq h3 {
            margin: 0;
            padding-left: 30px;
            position: relative;
            font-size: 18px;
            transition: color 0.3s;
            display: flex;
            align-items: center;
        }
        .faq:hover h3 {
            color: #fff;
        }
        .faq h3::before {
            content: '\25CF'; /* Bullet point */
            color: rgb(13 148 136 / var(--tw-bg-opacity, 1));
            font-size: 1.5em;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            transition: color 0.3s;
        }
        .faq:hover h3::before {
            color: #fff;
        }
        .faq p {
            margin: 10px 0 0;
            display: block;
            opacity: 0; /* Initially hide the description */
            visibility: hidden; /* Initially hide the description */
            transition: opacity 0.3s ease-in-out, visibility 0s 0.3s; /* Smooth transition for opacity */
        }
        .faq:hover p {
            opacity: 1; /* Show description on hover */
            visibility: visible; /* Make description visible */
            transition: opacity 0.3s ease-in-out, visibility 0s; /* Reverse the visibility transition */
        }

@media (max-width: 768px) {
  .card {
    flex: 0 0 80%;
  }
}

    </style>


    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<?php include 'assets/phppages/headernav.php'; ?>

<body class="bg-gray-100">
<div class="h-screen bg-cover bg-center flex flex-col justify-start items-start text-white text-left" 
     style="background-image: url('https://whelanwebdesign.com/wp-content/uploads/2020/04/Home-Banner-V2.jpg');">
  <!-- Container to adjust text position -->
  <div class="mt-32 ml-16">
    <h1 class="text-4xl font-bold mb-6">We deliver happiness</h1>
    <p class="text-lg max-w-2xl mb-8">
      The greatest, most sustainable happiness comes from making others happy. It is our privilege to deliver you happiness every single day.
    </p>
    <!-- Button -->
    <button class="bg-blue-600 hover:bg-blue-800 text-white font-semibold py-2 px-6 rounded shadow-lg">
      Learn More
    </button>
  </div>
</div>





  <section class="bg-gray-100">
    <div class="container mx-auto px-6 py-12">
      <nav class="flex justify-center space-x-10">
        <a href="#" class="text-blue-600 border-b-2 border-blue-600 pb-1">ABOUT US</a>
        <a href="#" class="text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 pb-1">JOB OPENINGS</a>
      </nav>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12 text-center">
        <div class="bg-white shadow rounded-lg p-6">
          <img src="https://via.placeholder.com/50" alt="Mission" class="mx-auto">
          <h3 class="text-xl font-semibold mt-4">Our mission</h3>
          <p class="text-gray-600 mt-2">
            Make communication frictionless and secure.
          </p>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
          <img src="https://via.placeholder.com/50" alt="Vision" class="mx-auto">
          <h3 class="text-xl font-semibold mt-4">Our vision</h3>
          <p class="text-gray-600 mt-2">
            Communications empowering people to accomplish more.
          </p>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
          <img src="https://via.placeholder.com/50" alt="Value" class="mx-auto">
          <h3 class="text-xl font-semibold mt-4">Our value</h3>
          <p class="text-gray-600 mt-2">
            Care: Community, Customers, Company.
          </p>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
          <img src="https://via.placeholder.com/50" alt="Culture" class="mx-auto">
          <h3 class="text-xl font-semibold mt-4">Our culture</h3>
          <p class="text-gray-600 mt-2">
            Delivering happiness.
          </p>
        </div>
      </div>
    </div>
  </section>

  <div class="bg-gray-100 py-12">
  <div class="text-center mb-8">
    <h2 class="text-3xl font-bold">Meet our Leaders</h2>
    <p class="text-gray-500">Some engaging slogan goes here</p>
  </div>

  <div class="flex items-center justify-center relative max-w-7xl mx-auto my-12">
    <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white text-gray-600 text-2xl p-2 rounded-full shadow hover:text-black">❮</button>
    <div class="flex overflow-x-scroll scroll-smooth w-full max-w-5xl">
      <div class="flex-shrink-0 w-72 m-4 bg-white rounded-lg shadow-lg p-4 transform hover:scale-105 transition-transform">
        <img class="rounded-lg w-full" src="https://media.istockphoto.com/id/1399565382/photo/young-happy-mixed-race-businessman-standing-with-his-arms-crossed-working-alone-in-an-office.jpg?s=612x612&w=0&k=20&c=buXwOYjA_tjt2O3-kcSKqkTp2lxKWJJ_Ttx2PhYe3VM=" alt="Designer">
        <h3 class="text-lg font-semibold mt-4">Designer</h3>
        <p class="text-gray-500">Lorem ipsum dolor sit explicabo adipisicing elit</p>
      </div>
      <div class="flex-shrink-0 w-72 m-4 bg-white rounded-lg shadow-lg p-4 transform hover:scale-105 transition-transform">
        <img class="rounded-lg w-full" src="https://media.istockphoto.com/id/1399565382/photo/young-happy-mixed-race-businessman-standing-with-his-arms-crossed-working-alone-in-an-office.jpg?s=612x612&w=0&k=20&c=buXwOYjA_tjt2O3-kcSKqkTp2lxKWJJ_Ttx2PhYe3VM=" alt="Developer">
        <h3 class="text-lg font-semibold mt-4">Developer</h3>
        <p class="text-gray-500">Lorem ipsum dolor sit explicabo adipisicing elit</p>
      </div>
      <div class="flex-shrink-0 w-72 m-4 bg-white rounded-lg shadow-lg p-4 transform hover:scale-105 transition-transform">
        <img class="rounded-lg w-full" src="https://media.istockphoto.com/id/1399565382/photo/young-happy-mixed-race-businessman-standing-with-his-arms-crossed-working-alone-in-an-office.jpg?s=612x612&w=0&k=20&c=buXwOYjA_tjt2O3-kcSKqkTp2lxKWJJ_Ttx2PhYe3VM=" alt="Marketer">
        <h3 class="text-lg font-semibold mt-4">Marketer</h3>
        <p class="text-gray-500">Lorem ipsum dolor sit explicabo adipisicing elit</p>
      </div>
    </div>
    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white text-gray-600 text-2xl p-2 rounded-full shadow hover:text-black">❯</button>
  </div>
  <h2>Frequently Asked Questions (FAQs)</h2>
    <div class="faq">
        <h3>What are global partnerships?</h3>
        <p>Global partnerships are collaborative agreements between our college and international institutions aimed at enhancing educational opportunities, research, and cultural exchange.</p>
    </div>
    <div class="faq">
        <h3>How do global partnerships benefit students?</h3>
        <p>Students benefit from global partnerships through access to exchange programs, joint research initiatives, and opportunities to study abroad, which enrich their academic experience and cultural understanding.</p>
    </div>
    <div class="faq">
        <h3>How can I get involved in global partnerships?</h3>
        <p>Students can get involved by participating in exchange programs, attending informational sessions, and reaching out to the Office of Global Partnerships for more information.</p>
    </div>
    <div class="faq">
        <h3>Who can I contact for more information?</h3>
        <p>For more information about global partnerships, please contact the Office of Global Partnerships at <a href="mailto:globalpartnerships@college.edu" style="color: #fff; text-decoration: underline;">globalpartnerships@college.edu</a>.</p>
    </div>
</div>
<?php include 'assets/phppages/footer.php'; ?>



<!-- <script>
  function toggleFAQ(button) {
    const content = button.nextElementSibling;
    const symbol = button.querySelector('span');
    
    if (content.style.display === "none") {
      content.style.display = "block";
      symbol.textContent = '-';
    } else {
      content.style.display = "none";
      symbol.textContent = '+';
    }
  }
</script> -->


  <!-- <div class="slider-container">
  <h2 class="slider-title">Meet our Leaders</h2>
  <p class="slider-slogan">Some engaging slogan goes here</p>
  <div class="slider">
    <button class="slider-btn prev-btn">&#8592;</button>
    <div class="slider-cards">
      <div class="card">
        <div class="image-placeholder"></div>
        <p class="card-text">Leader 1</p>
      </div>
      <div class="card">
        <div class="image-placeholder"></div>
        <p class="card-text">Leader 2</p>
      </div>
      <div class="card">
        <div class="image-placeholder"></div>
        <p class="card-text">Leader 3</p>
      </div>
    </div>
    <button class="slider-btn next-btn">&#8594;</button>
  </div>
</div> -->


<script>
const carousel = document.querySelector('.overflow-x-scroll');
    const prevBtn = document.querySelector('.left-4');
    const nextBtn = document.querySelector('.right-4');

    prevBtn.addEventListener('click', () => {
      carousel.scrollBy({
        left: -300,
        behavior: 'smooth',
      });
    });

    nextBtn.addEventListener('click', () => {
      carousel.scrollBy({
        left: 300,
        behavior: 'smooth',
      });
    });

</script>
</body>
<!-- <body>
   
   

    <main>
        <section class="about-us">
            <h1>About Us</h1>
            <div class="vision-mission">
                <h2>Vision</h2>
                <p>To foster global collaboration and create international opportunities for students, faculty, and partners.</p>

                <h2>Mission</h2>
                <p>To bridge the gap between local and global educational landscapes, enabling meaningful partnerships and impactful initiatives.</p>

                <h2>Objectives</h2>
                <ul>
                    <li>Facilitate international academic and cultural exchange.</li>
                    <li>Provide support and resources for global collaboration.</li>
                    <li>Promote research and faculty development through global partnerships.</li>
                </ul>
            </div>

            <div class="leadership">
                <h2>Leadership Team</h2>
                <div class="team">
                    <div class="member">
                        <img src="path/to/photo1.jpg" alt="Leader 1">
                        <h3>Dr. John Doe</h3>
                        <p>Director, GEPO</p>
                    </div>
                    <div class="member">
                        <img src="path/to/photo2.jpg" alt="Leader 2">
                        <h3>Dr. Jane Smith</h3>
                        <p>Deputy Director, GEPO</p>
                    </div>
                </div>
            </div>

            <div class="org-structure">
                <h2>Organizational Structure</h2>
                <img src="path/to/structure-diagram.png" alt="Organizational Structure">
            </div>

            <div class="faqs">
                <h2>FAQs</h2>
                <details>
                    <summary>What is GEPO?</summary>
                    <p>GEPO stands for Global Education Partnership Office, a platform dedicated to fostering international collaborations.</p>
                </details>
                <details>
                    <summary>Who can join GEPO programs?</summary>
                    <p>Students, faculty, and researchers affiliated with our partner institutions are eligible to join GEPO programs.</p>
                </details>
                <details>
                    <summary>How can I become a partner?</summary>
                    <p>You can fill out our Partnership Inquiry Form available in the Global Partnerships section.</p>
                </details>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 GEPO | All Rights Reserved</p>
    </footer>
</body> -->

<!-- <script src="https://cdn.tailwindcss.com"></script> -->

</html>
