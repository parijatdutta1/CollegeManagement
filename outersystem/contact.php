<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact & Support</title>
    <link rel="stylesheet" href="chat/styles.css">
    <style>
        /* Base Styling */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #0056b3;
        }
        h1, h2, h3, h4 {
            color: #2c3e50;
            margin: 0;
        }

        /* Hero Section */
        .hero-section-contact {
            background: linear-gradient(135deg, #2c3e50, #4a69bd);
            color: white;
            text-align: center;
            padding: 120px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .hero-section-contact h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 15px;
            animation: fadeIn 1s ease-in-out;
        }
        .hero-section-contact p {
            font-size: 20px;
            margin: 0;
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Section Styling */
        .contact-info-section {
            max-width: 1000px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .contact-info-section h2 {
            margin-bottom: 30px;
            font-size: 32px;
            font-weight: 600;
            border-bottom: 3px solid #007bff;
            display: inline-block;
            padding-bottom: 10px;
        }
        .contact-info-section p {
            font-size: 16px;
            margin: 15px 0;
        }

        /* Contact Cards */
        .contact-cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }
        .contact-card-item {
            padding: 25px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .contact-card-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .contact-card-item h3 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #007bff;
        }
        .contact-card-item p {
            font-size: 16px;
            margin: 10px 0;
        }

        /* FAQ Styling */
        .faq-section {
            max-width: 1000px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .faq-section h2 {
            margin-bottom: 30px;
            font-size: 32px;
            font-weight: 600;
            border-bottom: 3px solid #007bff;
            display: inline-block;
            padding-bottom: 10px;
        }
        .faq-item-contact {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .faq-item-contact:hover {
            background-color: #e9ecef;
        }
        .faq-item-contact h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #007bff;
        }
        .faq-item-contact p {
            font-size: 16px;
            margin: 0;
        }

        /* Form Styling */
        .inquiry-form-contact {
            max-width: 800px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .inquiry-form-contact h2 {
            margin-bottom: 30px;
            font-size: 32px;
            font-weight: 600;
            border-bottom: 3px solid #007bff;
            display: inline-block;
            padding-bottom: 10px;
        }
        .inquiry-form-contact label {
            font-weight: 600;
            font-size: 16px;
            color: #2c3e50;
        }
        .inquiry-form-contact input, .inquiry-form-contact textarea {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f8f9fa;
            transition: border-color 0.3s ease;
        }
        .inquiry-form-contact input:focus, .inquiry-form-contact textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        .inquiry-form-contact textarea {
            height: 150px;
            resize: none;
        }
        .inquiry-form-contact button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 15px 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .inquiry-form-contact button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Chatbot Section */
        .chatbot-container-contact {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            width: 350px;
            z-index: 1000;
        }
        .chatbot-header-contact {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .chatbot-header-contact h3 {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
        }
        .chatbot-header-contact button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .chatbot-header-contact button:hover {
            background-color: #0056b3;
        }
        .chatbot-body-contact {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .chatbot-body-contact input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f8f9fa;
        }
        .chatbot-body-contact button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 18px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .chatbot-body-contact button:hover {
            background-color: #0056b3;
        }

        /* Open Chat Button */
        #open-chat {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        #open-chat:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .hero-section-contact h1 {
                font-size: 36px;
            }
            .hero-section-contact p {
                font-size: 18px;
            }
            .contact-info-section, .faq-section, .inquiry-form-contact {
                margin: 30px 20px;
                padding: 25px;
            }
            .chatbot-container-contact {
                width: 90%;
                right: 5%;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER & NAVIGATION -->
    <?php include '../assets/phppages/headernav.php'; ?>
    <div class="hero-section-contact">
        <h1>Contact & Support</h1>
        <p>Your trusted partner in resolving inquiries and providing support.</p>
    </div>

    <section class="contact-info-section">
        <h2>Contact Information</h2>
        <div class="contact-cards-container">
            <div class="contact-card-item">
                <h3>RFMO</h3>
                <p>Email: <a href="mailto:rfmo@example.com">rfmo@example.com</a></p>
                <p>Phone: +123-456-7890</p>
            </div>
            <div class="contact-card-item">
                <h3>Dean/Associate Dean/SPOC R&D</h3>
                <p>Email: <a href="mailto:deanrd@example.com">deanrd@example.com</a></p>
                <p>Phone: +123-987-6543</p>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item-contact">
            <h4>How do I apply for a research grant?</h4>
            <p>Visit the <a href="/grants">Research Grants</a> page for guidelines and application forms.</p>
        </div>
        <div class="faq-item-contact">
            <h4>How can I navigate the website?</h4>
            <p>Use the navigation bar at the top to access different sections like Research Grants, Events, and Resources.</p>
        </div>
    </section>

    <section class="inquiry-form-contact">
        <h2>Inquiry Form</h2>
        <form action="submit_inquiry.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Your Message" required></textarea>
            
            <button type="submit">Submit Inquiry</button>
        </form>
    </section>
    <!-- Chatbot Section -->
    <div class="chatbot-container-contact">
        <div class="chatbot-header-contact">
            <h3>Live Chat Support</h3>
            <button id="close-chat" onclick="toggleChat()">X</button>
        </div>
        <div class="chatbot-body-contact">
            <div id="chat-messages"></div>
            <form id="chat-form" onsubmit="sendMessage(event)">
                <input type="text" id="user-input" placeholder="Type your message..." required />
                <button type="submit">Send</button>
            </form>
        </div>
    </div>

    <button id="open-chat" onclick="toggleChat()">💬</button>
</main>
<!-- FOOTER -->
<?php include '../assets/phppages/footer.php'; ?>
<script src="chat/script.js"></script>
    <script>
        function startChat() {
            alert("Live chat feature is under development. Please check back soon!");
        }
    </script>
</body>
</html>