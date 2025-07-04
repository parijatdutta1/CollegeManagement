<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JIS Global Engagement</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <script defer src="script.js"></script>

    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            line-height: 1.6;
        }

        /* NAVIGATION BAR */
        .jis-global-engagement-contact-btn {
            background: #ffcc00;
            color: #003366;
            padding: 8px 15px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .jis-global-engagement-contact-btn:hover {
            background: white;
            color: #003366;
        }

        .jis-global-engagement-hamburger {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* HERO SECTION */
        .jis-global-engagement-hero {
            background: url('assets/images/jisbg.png') center/cover;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
            position: relative;
        }

        .jis-global-engagement-hero-content {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .jis-global-engagement-hero h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .jis-global-engagement-cta-buttons {
            margin-top: 15px;
        }

        .jis-global-engagement-primary-btn, .jis-global-engagement-secondary-btn {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            margin: 5px;
        }

        .jis-global-engagement-primary-btn {
            background: #ffcc00;
            color: #003366;
        }

        .jis-global-engagement-secondary-btn {
            background: white;
            color: #003366;
            border: 2px solid #ffcc00;
        }

        .jis-global-engagement-primary-btn:hover, .jis-global-engagement-secondary-btn:hover {
            opacity: 0.8;
        }

        /* R&D SECTION */
        .jis-global-engagement-rd-section {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px;
            background: #f5f5f5;
            gap: 30px;
        }

        /* Equal Height for Both Sections */
        .jis-global-engagement-overview, .jis-global-engagement-rd-initiatives {
            background: white;
            padding: 20px;
            width: 45%;
            height: 350px; /* Fixed height */
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Scrollbar for R&D Initiatives */
        .jis-global-engagement-rd-initiatives {
            overflow-y: auto;
            background: #e0e0e0;
        }

        /* Initiative List */
        .jis-global-engagement-initiative-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Initiative Button */
        .jis-global-engagement-initiative-btn {
            background: white;
            border: 2px solid #003366;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
        }

        .jis-global-engagement-initiative-btn span {
            font-size: 1.2rem;
            margin-right: 10px;
            color: #003366;
        }

        .jis-global-engagement-initiative-btn:hover {
            background: #003366;
            color: white;
        }

        .jis-global-engagement-initiative-btn:hover span {
            color: white;
        }

        /* Hidden Additional Info */
        .jis-global-engagement-hidden-text {
            display: none;
            background: #d9d9d9;
            padding: 10px;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
        }

        /* Show Additional Info on Hover */
        .jis-global-engagement-initiative-item:hover .jis-global-engagement-hidden-text {
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .jis-global-engagement-rd-section {
                flex-direction: column;
                align-items: center;
            }

            .jis-global-engagement-overview, .jis-global-engagement-rd-initiatives {
                width: 90%;
                height: auto;
            }
        }

        /* ANNOUNCEMENT SECTION */
        .jis-global-engagement-announcement-section {
            width: 90%;
            margin: 40px auto;
            background: grey;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Section Title */
        .jis-global-engagement-announcement-title {
            text-align: center;
            margin-bottom: 20px;
            color: #003366;
        }

        /* Announcement List */
        .jis-global-engagement-announcement-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Individual Announcement */
        .jis-global-engagement-announcement {
            display: flex;
            align-items: center;
            background: #f5f5f5;
            padding: 12px;
            border-radius: 6px;
            transition: 0.3s;
            cursor: pointer;
        }

        .jis-global-engagement-announcement:hover {
            background: #e0e0e0;
        }

        /* Date Box */
        .jis-global-engagement-date {
            width: 60px;
            height: 60px;
            background: #003366;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            margin-right: 15px;
        }

        .jis-global-engagement-date .jis-global-engagement-day {
            font-size: 18px;
            font-weight: bold;
        }

        .jis-global-engagement-date .jis-global-engagement-month {
            font-size: 12px;
            text-transform: uppercase;
        }

        /* Announcement Content */
        .jis-global-engagement-announcement-content p {
            font-size: 14px;
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .jis-global-engagement-announcement-section {
                width: 95%;
            }

            .jis-global-engagement-announcement {
                flex-direction: column;
                align-items: flex-start;
            }

            .jis-global-engagement-date {
                width: 50px;
                height: 50px;
                margin-bottom: 5px;
            }

            .jis-global-engagement-date .jis-global-engagement-day {
                font-size: 16px;
            }

            .jis-global-engagement-date .jis-global-engagement-month {
                font-size: 10px;
            }
        }

        /* SLIDER SECTION */
        .jis-global-engagement-projects-slider-heading {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }

        /* Slider Container */
        .jis-global-engagement-projects-slider-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            max-width: 1800px;
            margin: auto;
            position: relative;
        }

        /* Slider */
        .jis-global-engagement-projects-slider {
            display: flex;
            overflow: hidden;
            width: 80%;
        }

        /* Card Styling */
        .jis-global-engagement-projects-card {
            min-width: 300px;
            margin: 10px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: 0.3s ease-in-out;
            cursor: pointer;
            background-color: #eaebec;
        }

        /* Hover Effect for Cards */
        .jis-global-engagement-projects-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        /* Image Styling */
        .jis-global-engagement-projects-card img {
            width: 100%;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
        }

        /* Image Hover Effect */
        .jis-global-engagement-projects-card:hover img {
            transform: scale(1.1);
        }

        /* Title Styling */
        .jis-global-engagement-projects-card h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        /* Description Styling */
        .jis-global-engagement-projects-card p {
            font-size: 14px;
            color: #555;
        }

        /* Read More Button */
        .jis-global-engagement-projects-read-more {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s ease-in-out;
        }

        /* Read More Hover Effect */
        .jis-global-engagement-projects-read-more:hover {
            background: #0056b3;
            transform: scale(1.1);
        }

        /* Navigation Buttons */
        .jis-global-engagement-projects-prev-btn, .jis-global-engagement-projects-next-btn {
            background: #333;
            color: white;
            border: none;
            padding: 10px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 50%;
            transition: 0.3s ease-in-out;
        }

        /* Hover Effect for Navigation Buttons */
        .jis-global-engagement-projects-prev-btn:hover, .jis-global-engagement-projects-next-btn:hover {
            background: #555;
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <!-- HEADER & NAVIGATION -->
    <?php include 'assets/phppages/headernav.php'; ?>

    <!-- HERO SECTION -->
    <section class="jis-global-engagement-hero">
        <div class="jis-global-engagement-hero-content">
            <h1>Your Gateway to Global Collaboration and International Opportunities</h1>
            <p>Join hands with us to explore a world of international partnerships and learning.</p>
            <div class="jis-global-engagement-cta-buttons">
                <button class="jis-global-engagement-primary-btn">Partner with Us</button>
                <button class="jis-global-engagement-secondary-btn">Join a Program</button>
                <button class="jis-global-engagement-secondary-btn">Contact Us</button>
            </div>
        </div>
    </section>

    <!-- R&D SECTION -->
    <section class="jis-global-engagement-rd-section">
        <!-- Overview Section -->
        <div class="jis-global-engagement-overview">
            <h2>Overview Section :</h2>
            <p>
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.
            </p>
        </div>

        <!-- R&D Initiatives -->
        <div class="jis-global-engagement-rd-initiatives">
            <h2>R&D Initiatives</h2>
            <div class="jis-global-engagement-initiative-list">
                <div class="jis-global-engagement-initiative-item">
                    <button class="jis-global-engagement-initiative-btn">
                        <span>➜</span> Advanced Science & Technology
                    </button>
                    <p class="jis-global-engagement-hidden-text">Exploring quantum computing, nanotechnology, and next-gen communication systems.</p>
                </div>
                <div class="jis-global-engagement-initiative-item">
                    <button class="jis-global-engagement-initiative-btn">
                        <span>➜</span> Healthcare & Biotechnology
                    </button>
                    <p class="jis-global-engagement-hidden-text">Innovations in medical imaging, AI-driven diagnostics, and personalized medicine.</p>
                </div>
                <div class="jis-global-engagement-initiative-item">
                    <button class="jis-global-engagement-initiative-btn">
                        <span>➜</span> Sustainable Energy Solutions
                    </button>
                    <p class="jis-global-engagement-hidden-text">Research on solar efficiency, wind energy advancements, and eco-friendly batteries.</p>
                </div>
                <div class="jis-global-engagement-initiative-item">
                    <button class="jis-global-engagement-initiative-btn">
                        <span>➜</span> Artificial Intelligence & Data Science
                    </button>
                    <p class="jis-global-engagement-hidden-text">Developing machine learning models for automation, robotics, and decision-making.</p>
                </div>
                <div class="jis-global-engagement-initiative-item">
                    <button class="jis-global-engagement-initiative-btn">
                        <span>➜</span> Smart Cities & IoT
                    </button>
                    <p class="jis-global-engagement-hidden-text">Integrating AI in urban planning, traffic control, and automated infrastructure.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ANNOUNCEMENT SECTION -->
    <section class="jis-global-engagement-announcement-section">
        <h2 class="jis-global-engagement-announcement-title">📢 Latest Announcements</h2>
        <div class="jis-global-engagement-announcement-list">
            <div class="jis-global-engagement-announcement">
                <div class="jis-global-engagement-date">
                    <span class="jis-global-engagement-day">24</span>
                    <span class="jis-global-engagement-month">JAN</span>
                </div>
                <div class="jis-global-engagement-announcement-content">
                    <p>University will remain Closed on 25.01.2024</p>
                </div>
            </div>
            <div class="jis-global-engagement-announcement">
                <div class="jis-global-engagement-date">
                    <span class="jis-global-engagement-day">3</span>
                    <span class="jis-global-engagement-month">AUG</span>
                </div>
                <div class="jis-global-engagement-announcement-content">
                    <p>FIRST SEMESTER Class Commencement NOTICE for AY 2023-2024</p>
                </div>
            </div>
            <div class="jis-global-engagement-announcement">
                <div class="jis-global-engagement-date">
                    <span class="jis-global-engagement-day">13</span>
                    <span class="jis-global-engagement-month">JUNE</span>
                </div>
                <div class="jis-global-engagement-announcement-content">
                    <p>Mid-term examination for PhD course work common papers (RPD1001 & RPD1002)</p>
                </div>
            </div>
            <div class="jis-global-engagement-announcement">
                <div class="jis-global-engagement-date">
                    <span class="jis-global-engagement-day">16</span>
                    <span class="jis-global-engagement-month">APR</span>
                </div>
                <div class="jis-global-engagement-announcement-content">
                    <p>Notice Regarding Closure of Physical Classes with effect from 17-04-2023</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SLIDER SECTION -->
    <h2 class="jis-global-engagement-projects-slider-heading">Key Projects</h2>
    <div class="jis-global-engagement-projects-slider-container">
        <button class="jis-global-engagement-projects-prev-btn">❮</button>
        <div class="jis-global-engagement-projects-slider">
            <div class="jis-global-engagement-projects-card">
                <img src="data:image/jpeg;base64,..." alt="AI Research">
                <h3>AI & Machine Learning Grant</h3>
                <p>Funding innovative AI solutions in healthcare, automation, and finance, enabling groundbreaking advancements.</p>
                <a href="#" class="jis-global-engagement-projects-read-more">Read More</a>
            </div>
            <div class="jis-global-engagement-projects-card">
                <img src="https://www.shutterstock.com/shutterstock/photos/1798109056/display_1500/stock-photo-project-manager-and-computer-science-engineer-talking-while-using-a-digital-tablet-computer-1798109056.jpg" alt="Renewable Energy">
                <h3>Renewable Energy Solutions</h3>
                <p>Supporting research in solar, wind, and bio-energy to create sustainable and efficient energy alternatives.</p>
                <a href="#" class="jis-global-engagement-projects-read-more">Read More</a>
            </div>
            <div class="jis-global-engagement-projects-card">
                <img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/The_Business_End_of_IT_Upskilling_IT_Professionals_to_Master_ITSM.jpg" alt="Biomedical Research">
                <h3>Biomedical Breakthroughs</h3>
                <p>Funding medical research on cancer treatment, vaccines, and innovative healthcare technologies.</p>
                <a href="#" class="jis-global-engagement-projects-read-more">Read More</a>
            </div>
            <div class="jis-global-engagement-projects-card">
                <img src="https://www.atees.org/blog/wp-content/uploads/2019/06/shutterstock-1199480788.png" alt="Space Exploration">
                <h3>Space Exploration Projects</h3>
                <p>Investing in space tech for planetary exploration, satellite systems, and interstellar research.</p>
                <a href="#" class="jis-global-engagement-projects-read-more">Read More</a>
            </div>
            <div class="jis-global-engagement-projects-card">
                <img src="https://jaro-website.s3.ap-south-1.amazonaws.com/2024/01/Scope-of-Master-of-Science-Degree-in-Computer-Science.jpg" alt="Blockchain">
                <h3>Blockchain for Secure Data</h3>
                <p>Supporting research in blockchain for cybersecurity, digital identity, and decentralized applications.</p>
                <a href="#" class="jis-global-engagement-projects-read-more">Read More</a>
            </div>
        </div>
        <button class="jis-global-engagement-projects-next-btn">❯</button>
    </div>

    <!-- FOOTER -->
    <?php include 'assets/phppages/footer.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const hamburger = document.querySelector(".hamburger");
            const navLinks = document.querySelector(".nav-links");

            hamburger.addEventListener("click", () => {
                navLinks.classList.toggle("show");
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const slider = document.querySelector(".jis-global-engagement-projects-slider");
            const prevBtn = document.querySelector(".jis-global-engagement-projects-prev-btn");
            const nextBtn = document.querySelector(".jis-global-engagement-projects-next-btn");

            let scrollAmount = 0;
            const scrollStep = 320;

            prevBtn.addEventListener("click", function () {
                scrollAmount -= scrollStep;
                if (scrollAmount < 0) scrollAmount = 0;
                slider.scrollTo({ left: scrollAmount, behavior: "smooth" });
            });

            nextBtn.addEventListener("click", function () {
                if (scrollAmount < slider.scrollWidth - slider.clientWidth) {
                    scrollAmount += scrollStep;
                    slider.scrollTo({ left: scrollAmount, behavior: "smooth" });
                }
            });
        });
    </script>
</body>
</html>