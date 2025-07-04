

<?php 
$conn = new mysqli('localhost', 'root', '', 'events_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$events = $conn->query("SELECT * FROM events");
?>c:\Users\sayan bera\OneDrive\Desktop\gepo media\girl.jpg









<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JIS Group Navbar and Banner</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    .navbar-brand img {
      height: 50px; /* Adjust height as needed */
    }
    .top-bar {
      background-color: #007bff; /* Blue background */
      color: white;
      font-size: 14px;
      padding: 5px 15px;
    }
    .top-bar a {
      color: white;
      margin-right: 15px;
      text-decoration: none;
    }
    .top-bar a:hover {
      text-decoration: underline;
    }
    .navbar {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .navbar-nav .nav-item {
      font-weight: 500;
    }
    .carousel-item img,
    .carousel-item video {
      width: 100%;
      height: 600px;
      object-fit: cover;
    }
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      display: flex;
    }

    .container2 {
      display: flex;
      margin-top: 50px;
    }
    .sidebar {
      width: 25%;
      background-color: #f4f4f4;
      border-right: 1px solid #ddd;
      height: 50vh;
      padding: 20px;
      box-sizing: border-box;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }
    .sidebar ul li {
      padding: 10px;
      cursor: pointer;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }
    .sidebar ul li:hover {
      background-color: #ddd;
    }
    .content {
      flex: 1;
      padding: 20px;
      box-sizing: border-box;
    }
    .section {
      display: none;
    }
    .section.active {
      display: block;
    }


    .notice-board {
      margin: 20px auto;
      max-width: 800px;
      font-family: Arial, sans-serif;
    }

    .notice {
      display: flex;
      align-items: flex-start;
      padding: 15px;
      border-bottom: 1px solid #ddd;
    }

    .notice:last-child {
      border-bottom: none;
    }

    .date {
      width: 120px;
      text-align: center;
      font-weight: bold;
      color: #007bff;
      margin-right: 20px;
    }

    .details {
      flex: 1;
    }

    .details h4 {
      margin: 0;
      font-size: 18px;
      color: #333;
    }

    .details p {
      margin: 5px 0 0;
      font-size: 14px;
      color: #555;
    }

    .icon {
      width: 50px;
      margin-right: 15px;
    }

    .icon img {
      width: 100%;
      height: auto;
    }


/* General Styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

.container-notice {
  display: flex;
  justify-content: space-between;
  padding: 20px;
  gap: 20px;
}

/* Notice Board Section */
.notice-board {
  width: 45%;
  background-color: #ffffff;
  border: 2px solid #f2f2f2;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  position: relative;
  overflow: hidden;
}

.notice-board h2 {
  color: #1c752a;
  border-left: 5px solid #f0c040;
  padding-left: 10px;
  margin-bottom: 10px;
}

.notice-content {
  background-color: #4caf50;
  color: white;
  padding: 15px;
  border: 2px solid #f08f8f;
  border-radius: 5px;
  max-height: 200px; /* Limit height */
  overflow: hidden; /* Hide overflowing content */
  position: relative;
}

/* Recent Events Section */
.recent-events {
  width: 45%;
  background-color: #ffffff;
  border: 2px solid #f2f2f2;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  position: relative;
}

.recent-events h2 {
  color: #1c752a;
  border-left: 5px solid #f0c040;
  padding-left: 10px;
  margin-bottom: 10px;
}

.event-list {
  max-height: 200px; /* Limit height */
  overflow-y: auto; /* Enable vertical scrolling */
}

.event-list::-webkit-scrollbar {
  width: 8px;
}

.event-list::-webkit-scrollbar-thumb {
  background: #4caf50;
  border-radius: 4px;
}

.event-list::-webkit-scrollbar-track {
  background: #f0f0f0;
}

.event-item {
  display: flex;
  align-items: center;
  background-color: #f9f9f9;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #e0e0e0;
  border-radius: 5px;
}

.event-date {
  text-align: center;
  background-color: #4caf50;
  color: white;
  padding: 10px;
  border-radius: 5px;
  margin-right: 15px;
}

.event-date span {
  font-size: 12px;
}

.event-date h3 {
  font-size: 24px;
  margin: 0;
}

.event-details p {
  margin: 5px 0;
}

.event-details strong {
  color: #333;
}

    
  </style>
</head>
<body>
  <!-- Top Bar -->
  <div class="top-bar d-flex justify-content-between align-items-center">
    <div>
      <a href="#">Careers</a>
      <a href="#">Student's Login</a>
      <a href="#">JIS Group Exhibition Brochure</a>
    </div>
    <div>
      <a href="#" class="btn btn-success btn-sm">Apply Now</a>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="https://jisgroup.org/assets/images/logo.png" alt="JIS Group Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Research Grants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Apply for Funding</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Resources</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Banner with Carousel -->
  <div id="mainBannerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Image Slide -->
      <div class="carousel-item active">
        <img src="girl.jpg" alt="Banner Image">
        <div class="carousel-caption">
          <h1>Empowering Innovation through Research</h1>
          <p>Join us in shaping the future through groundbreaking R&D initiatives.</p>
        </div>
      </div>
      <!-- Video Slide -->
      <div class="carousel-item">
        <video autoplay loop muted>
          <source src="sample-5s.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="carousel-caption">
          <h1>Explore the Potential of Research</h1>
          <p>Discover innovation through collaboration.</p>
        </div>
      </div>
    </div>
    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#mainBannerCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainBannerCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container2">
    <!-- Sidebar -->
    <div class="sidebar">
      <ul>
        <li onclick="showContent('overview')">Overview</li>
        <li onclick="showContent('goals')">Goals</li>
        <li onclick="showContent('message')">Message</li>
        <li onclick="showContent('governance')">Governance</li>
        <li onclick="showContent('feedback')">Feedback</li>
      </ul>
    </div>

    <!-- Content Area -->
    <div class="content">
      <!-- Section: Overview -->
      <div id="overview" class="section active">
        <h2>Overview</h2>
        <p>This section provides a brief overview of the webpage and its purpose. It explains the key features and the main objectives of this platform.</p>
      </div>

      <!-- Section: Goals -->
      <div id="goals" class="section">
        <h2>Goals</h2>
        <p>The goals of this organization include promoting innovation, achieving excellence in education, and creating opportunities for everyone to succeed.</p>
      </div>

      <!-- Section: Message -->
      <div id="message" class="section">
        <h2>Message</h2>
        <p>This is a special message from the founder: "We are dedicated to providing the best services and creating a meaningful impact in our community."</p>
      </div>

      <!-- Section: Governance -->
      <div id="governance" class="section">
        <h2>Governance</h2>
        <p>This section covers the governance policies, including transparency, accountability, and ethical standards for running the organization.</p>
      </div>

      <!-- Section: Feedback -->
      <div id="feedback" class="section">
        <h2>Feedback</h2>
        <p>Your feedback is essential to us! Feel free to share your thoughts, suggestions, and ideas to help us improve our services.</p>
      </div>
    </div>
  </div>

  <div class="container-notice">
    <!-- Notice Board Section -->
    <div class="notice-board">
        <h2>Notice Board</h2>
        <div class="notice-content" id="notice-board">
            <p>✔ Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <p>✔ Desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p>✔ Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
            <p>✔ Lorem Ipsum has been the industry's standard dummy text.</p>
            <p>✔ Various versions have evolved over the years, sometimes by accident.</p>
        </div>
    </div>

    <!-- Recent Events Section -->
    <!-- <div class="recent-events">
        <h2>Recent Event</h2>
        <div class="event-list">
            <div class="event-item">
                <div class="event-date">
                    <span>June</span>
                    <h3>21</h3>
                </div>
                <div class="event-details">
                    <p>Maths & English</p>
                    <p><strong>Offer With Higher Package Of 40 LPA</strong></p>
                </div>
            </div>
            <div class="event-item">
                <div class="event-date">
                    <span>June</span>
                    <h3>22</h3>
                </div>
                <div class="event-details">
                    <p>Science Workshop</p>
                    <p><strong>Introduction to Space Science</strong></p>
                </div>
            </div>
            <div class="event-item">
                <div class="event-date">
                    <span>June</span>
                    <h3>23</h3>
                </div>
                <div class="event-details">
                    <p>Programming Contest</p>
                    <p><strong>Win Exciting Prizes</strong></p>
                </div>
            </div>
            <div class="event-item">
                <div class="event-date">
                    <span>June</span>
                    <h3>24</h3>
                </div>
                <div class="event-details">
                    <p>Maths Olympiad</p>
                    <p><strong>National Level Event</strong></p>
                </div>
            </div>
        </div>
    </div> -->



    <div class="recent-events">
      <h2>Recent Event</h2>
      <div class="event-list">
          <?php while ($row = $events->fetch_assoc()) { 
              $eventDate = new DateTime($row['date']);
              $month = $eventDate->format('F'); 
              $day = $eventDate->format('d');  
          ?>
          <div class="event-item">
              <div class="event-date">
                  <span><?php echo $month; ?></span>
                  <h3><?php echo $day; ?></h3>
              </div>
              <div class="event-details">
                  <p><?php echo $row['title']; ?></p>
                  <p><strong><?php echo $row['description']; ?></strong></p>
              </div>
          </div>
          <?php } ?>
      </div>
  </div> 

  
</div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script>
    function showContent(sectionId) {
      // Hide all sections
      const sections = document.querySelectorAll('.section');
      sections.forEach(section => {
        section.classList.remove('active');
      });

      // Show the selected section
      const activeSection = document.getElementById(sectionId);
      activeSection.classList.add('active');
    }

    // Automatic scrolling for the Notice Board
const noticeBoard = document.getElementById('notice-board');
let scrollAmount = 0;

function scrollNoticeBoard() {
    scrollAmount += 1;
    noticeBoard.scrollTop = scrollAmount;

    if (scrollAmount >= noticeBoard.scrollHeight - noticeBoard.clientHeight) {
        scrollAmount = 0; // Reset scrolling
    }
}

// Scroll every 50ms
setInterval(scrollNoticeBoard, 50);

  </script>
</body>
</html>
