<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Grant Listings</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .grant-container {
            max-width: 900px;
            margin: 80px auto 40px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        /* Filters */
        .grant-filters {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .grant-filter-btn {
            padding: 10px 16px;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            background: #007BFF;
            color: white;
            transition: 0.3s;
        }

        .grant-filter-btn.active, .grant-filter-btn:hover {
            background: #0056b3;
        }

        /* Grant Cards */
        .grant-cards-container {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .grant-card-item {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            border-left: 6px solid;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .grant-card-item h3 {
            margin: 0 0 12px;
        }

        .grant-card-item p {
            margin: 6px 0;
        }

        .grant-details-link {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            display: block;
            margin-top: 12px;
        }

        /* Status Colors */
        .grant-card-item[data-category="new"] { border-color: green; }
        .grant-card-item[data-category="ongoing"] { border-color: orange; }
        .grant-card-item[data-category="closed"] { border-color: red; opacity: 0.6; }

        /* Express Interest Button */
        .grant-interest-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 14px;
            margin-top: 12px;
            cursor: pointer;
            border-radius: 6px;
            display: block;
        }

        .grant-interest-btn:hover {
            background: #218838;
        }

        .grant-card-item[data-category="closed"] .grant-interest-btn {
            background: #dc3545;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <?php include 'assets/phppages/headernav.php'; ?>

    <div class="grant-container">
        <h1>📂 Research Grant Listings</h1>

        <!-- Filters -->
        <div class="grant-filters">
            <button class="grant-filter-btn active" data-filter="all">All Grants</button>
            <button class="grant-filter-btn" data-filter="new">New Grants</button>
            <button class="grant-filter-btn" data-filter="ongoing">Ongoing Projects</button>
            <button class="grant-filter-btn" data-filter="closed">Closed Grants</button>
        </div>

        <!-- Grants List -->
        <div class="grant-cards-container">
            <div class="grant-card-item" data-category="new">
                <h3>📌 AI Research Fund</h3>
                <p>📅 <strong>Deadline:</strong> March 15, 2025</p>
                <p>🏢 <strong>Funding Org:</strong> Tech Innovators Inc.</p>
                <p>💰 <strong>Grant Amount:</strong> $500,000</p>
                <p>📖 <strong>Description:</strong> A fund for AI-driven research projects.</p>
                <a href="#" class="grant-details-link">🔗 More Details</a>
                <button class="grant-interest-btn">🟢 Express Interest</button>
            </div>

            <div class="grant-card-item" data-category="ongoing">
                <h3>📌 Renewable Energy Grant</h3>
                <p>📅 <strong>Deadline:</strong> April 30, 2025</p>
                <p>🏢 <strong>Funding Org:</strong> Green Future Foundation</p>
                <p>💰 <strong>Grant Amount:</strong> $1,000,000</p>
                <p>📖 <strong>Description:</strong> Funding for sustainable energy solutions.</p>
                <a href="#" class="grant-details-link">🔗 More Details</a>
                <button class="grant-interest-btn">🟡 Express Interest</button>
            </div>

            <div class="grant-card-item" data-category="closed">
                <h3>📌 Medical Research Grant</h3>
                <p>📅 <strong>Deadline:</strong> Jan 10, 2024</p>
                <p>🏢 <strong>Funding Org:</strong> Health First Institute</p>
                <p>💰 <strong>Grant Amount:</strong> $750,000</p>
                <p>📖 <strong>Description:</strong> Supporting innovative medical research.</p>
                <a href="#" class="grant-details-link">🔗 More Details</a>
                <button class="grant-interest-btn">🔴 Closed</button>
            </div>
        </div>
    </div>

    <?php include 'assets/phppages/footer.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filterButtons = document.querySelectorAll(".grant-filter-btn");
            const grantCards = document.querySelectorAll(".grant-card-item");

            filterButtons.forEach(button => {
                button.addEventListener("click", function() {
                    filterButtons.forEach(btn => btn.classList.remove("active"));
                    this.classList.add("active");

                    const filter = this.getAttribute("data-filter");
                    grantCards.forEach(card => {
                        card.style.display = (filter === "all" || card.getAttribute("data-category") === filter) ? "block" : "none";
                    });
                });
            });
        });
    </script>
</body>
</html>
