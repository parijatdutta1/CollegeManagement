<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFMO Section</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        
        /* Unique Container */
        .rfmo-container {
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
        }
        
        /* Section Titles */
        .rfmo-section-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .rfmo-section-subtitle {
            font-size: 16px;
            color: #555;
        }
        
        /* Tabs */
        .rfmo-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .rfmo-tab-link {
            background: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
            transition: 0.3s;
            font-size: 16px;
        }
        .rfmo-tab-link:hover, .rfmo-tab-link.active {
            background: #0056b3;
        }
        
        /* Tab Content */
        .rfmo-tab-content {
            display: none;
            text-align: left;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .rfmo-tab-content.active {
            display: block;
        }
        
        /* Cards */
        .rfmo-info-cards {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .rfmo-card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 250px;
            transition: 0.3s;
        }
        .rfmo-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Timeline */
        .rfmo-timeline {
            list-style: none;
            padding: 0;
        }
        .rfmo-timeline li {
            background: #007BFF;
            color: white;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        
        /* Download Button */
        .rfmo-download-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .rfmo-download-btn:hover {
            background: #218838;
        }
        
        /* Submission Form */
        .rfmo-submission-form {
            margin-top: 20px;
            text-align: center;
        }
        .rfmo-submission-form input {
            display: block;
            margin: 10px auto;
        }
        .rfmo-submit-btn {
            padding: 10px 15px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .rfmo-submit-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <?php include 'assets/phppages/headernav.php'; ?>
    <div class="rfmo-container">
        <h2 class="rfmo-section-title">RFMO: Research Funding & Evaluation Hub</h2>
        <p class="rfmo-section-subtitle">Explore funding opportunities, evaluation processes, and project submissions.</p>
        
        <div class="rfmo-tabs">
            <button class="rfmo-tab-link active" onclick="openTab(event, 'funding')">Seed Funding & Evaluation</button>
            <button class="rfmo-tab-link" onclick="openTab(event, 'evaluation')">Quarterly Evaluation & Reporting</button>
            <button class="rfmo-tab-link" onclick="openTab(event, 'submission')">Proposal & Report Submission</button>
        </div>
        
        <div id="funding" class="rfmo-tab-content active">
            <h3>Seed Funding & Evaluation Process</h3>
            <div class="rfmo-info-cards">
                <div class="rfmo-card"><h4>Available Funding</h4><p>Up to <b>$50,000</b> for research projects.</p></div>
                <div class="rfmo-card"><h4>Eligibility</h4><p>Applicants must be affiliated with a recognized institution.</p></div>
                <div class="rfmo-card"><h4>Evaluation Criteria</h4><p>Proposals reviewed on innovation, feasibility, and impact.</p></div>
            </div>
        </div>
        
        <div id="evaluation" class="rfmo-tab-content">
            <h3>Quarterly Evaluation & Reporting</h3>
            <ul class="rfmo-timeline">
                <li><b>Quarter 1:</b> Initial report submission</li>
                <li><b>Quarter 2:</b> Mid-term assessment</li>
                <li><b>Quarter 3:</b> Results analysis</li>
                <li><b>Quarter 4:</b> Final report & funding review</li>
            </ul>
        </div>
    </div>
    <?php include 'assets/phppages/footer.php'; ?>
    <script>
        function openTab(event, tabName) {
            document.querySelectorAll(".rfmo-tab-content").forEach(tab => tab.classList.remove("active"));
            document.querySelectorAll(".rfmo-tab-link").forEach(tab => tab.classList.remove("active"));
            document.getElementById(tabName).classList.add("active");
            event.currentTarget.classList.add("active");
        }
    </script>
</body>
</html>
