<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources & Support</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .hidden {
            display: none;
        }

        .toggle-section:hover {
            cursor: pointer;
        }

        .content-section {
            margin-top: 20px;
        }
        .resource-container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .resource-flex {
            display: flex;
        }
        .resource-flex-col {
            flex-direction: column;
        }
        .resource-items-center {
            align-items: center;
        }
        .resource-p-6 {
            padding: 1.5rem;
        }
        .resource-bg-white {
            background-color: white;
        }
        .resource-shadow-lg {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .resource-rounded-lg {
            border-radius: 0.5rem;
        }
        .resource-hover-bg-gray-100:hover {
            background-color: #f7fafc;
        }
        .resource-cursor-pointer {
            cursor: pointer;
        }

        .highlight {
            background-color: yellow;
            color: black;
            font-weight: bold;
            padding: 2px 4px;
            border-radius: 3px;
        }
    </style>
</head>

<?php include 'assets/phppages/headernav.php'; ?>


<body>
    <div class="w-full resource-flex resource-flex-col resource-items-center">
        <!-- Banner Section -->
        <div class="relative w-full h-60 bg-cover bg-center" style="background-image: url('https://teachonline.ca/sites/default/files/tools-trends/banner/resources-build-1140x400.jpg')">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-white text-center">
                <h1 class="text-3xl font-bold">Welcome to Resources & Support</h1>
                <p class="text-lg">Find the help you need quickly and easily</p>
            </div>
        </div>

        <!-- Options Section -->
        <div class="grid grid-cols-4 gap-6 my-6 px-6 w-full">
            <a href="#" class="toggle-section resource-flex resource-flex-col resource-items-center resource-p-6 resource-bg-white resource-shadow-lg resource-rounded-lg resource-hover-bg-gray-100 resource-cursor-pointer" data-target="student-resources">
                <i class="fa-solid fa-graduation-cap"></i>
                <p class="mt-2 font-semibold">Student Resources</p>
            </a>
            <a href="#" class="toggle-section resource-flex resource-flex-col resource-items-center resource-p-6 resource-bg-white resource-shadow-lg resource-rounded-lg resource-hover-bg-gray-100 resource-cursor-pointer" data-target="faculty-resources">
                <i class="fa-solid fa-chalkboard-user"></i>
                <p class="mt-2 font-semibold">Faculty Resources</p>
            </a>
            <a href="#" class="toggle-section resource-flex resource-flex-col resource-items-center resource-p-6 resource-bg-white resource-shadow-lg resource-rounded-lg resource-hover-bg-gray-100 resource-cursor-pointer" data-target="international-guidelines">
                <i class="fa-solid fa-globe"></i>
                <p class="mt-2 font-semibold">International Guidelines</p>
            </a>
            <a href="#" class="toggle-section resource-flex resource-flex-col resource-items-center resource-p-6 resource-bg-white resource-shadow-lg resource-rounded-lg resource-hover-bg-gray-100 resource-cursor-pointer" data-target="downloadable-pdfs">
                <i class="fa-solid fa-download"></i>
                <p class="mt-2 font-semibold">Downloadable PDFs</p>
            </a>
        </div>

        <!-- Search Bar -->
        <div class="w-full max-w-lg resource-flex resource-items-center border border-gray-300 rounded-md p-2 shadow-md">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input id="search-box" type="text" placeholder="Please describe your problem" class="flex-1 px-3 focus:outline-none" />
            <button id="search-button" class="border px-4 py-2">Search</button>
        </div>
    </div>

    <!-- Content Sections -->
    <div id="student-resources" class="content-section hidden w-full resource-bg-white resource-p-6 resource-rounded-lg resource-shadow-md resource-flex-col resource-items-center">
        <h2 class="text-2xl font-bold mb-4">Student Resources</h2>
        <p>Explore resources tailored for students, including study guides, online learning tools, and campus services.</p>
        <div class="section resource-flex-col resource-items-center">
            <h2>Visa Guidance</h2>
            <ul>
              <li>
                <input type="checkbox" id="visa1">
                <label for="visa1">Document Preparation</label>
                <div class="details">
                  Assistance with preparing essential documents such as passport, visa application forms, and invitation letters.
                </div>
              </li>
              <li>
                <input type="checkbox" id="visa2">
                <label for="visa2">Interview Guidance</label>
                <div class="details">
                  Tips and mock interviews to prepare students for visa officer interviews.
                </div>
              </li>
              <li>
                <input type="checkbox" id="visa3">
                <label for="visa3">Financial Proof Guidance</label>
                <div class="details">
                  Guidance on showing sufficient financial proof, including bank statements and sponsorship letters.
                </div>
              </li>
              
            </ul>
          </div>

          <div class="section resource-flex-col resource-items-center">
            <h2>Financial Aid</h2>
            <ul>
              <li>
                <input type="checkbox" id="aid1">
                <label for="aid1">Scholarship Programs</label>
                <div class="details">
                  Information on scholarships available for different academic programs and eligibility criteria.
                </div>
              </li>
              <li>
                <input type="checkbox" id="aid2">
                <label for="aid2">Grant Applications</label>
                <div class="details">
                  Guidance on applying for grants and funding from government or private organizations.
                </div>
              </li>
              <li>
                <input type="checkbox" id="aid3">
                <label for="aid3">Loan Assistance</label>
                <div class="details">
                  Help with understanding and applying for student loans, including interest rates and repayment terms.
                </div>
              </li>
              <li>
                <input type="checkbox" id="aid4">
                <label for="aid4">Emergency Funds</label>
                <div class="details">
                  Access to emergency financial assistance for unforeseen circumstances.
                </div>
              </li>
              <li>
                <input type="checkbox" id="aid5">
                <label for="aid5">Budget Planning</label>
                <div class="details">
                  Workshops and resources for creating and maintaining a student budget.
                </div>
              </li>
            </ul>
          </div>
      
          <!-- Cultural Integration Section -->
          <div class="section resource-flex-col resource-items-center">
            <h2>Cultural Integration</h2>
            <ul>
              <li>
                <input type="checkbox" id="culture1">
                <label for="culture1">Language Support</label>
                <div class="details">
                  Language classes and support for students to improve communication skills.
                </div>
              </li>
              <li>
                <input type="checkbox" id="culture2">
                <label for="culture2">Community Events</label>
                <div class="details">
                  Organizing cultural events to foster inclusivity and understanding among diverse groups.
                </div>
              </li>
              <li>
                <input type="checkbox" id="culture3">
                <label for="culture3">Buddy Programs</label>
                <div class="details">
                  Pairing new students with mentors to help them adapt to the campus environment.
                </div>
              </li>
              <li>
                <input type="checkbox" id="culture4">
                <label for="culture4">Cultural Workshops</label>
                <div class="details">
                  Sessions on understanding local customs, traditions, and practices.
                </div>
              </li>
              <li>
                <input type="checkbox" id="culture5">
                <label for="culture5">Diversity Forums</label>
                <div class="details">
                  Platforms for open discussions about cultural diversity and inclusion.
                </div>
              </li>
            </ul>
          </div>
      
          <!-- Health Services Section -->
          <div class="section resource-flex-col resource-items-center">
            <h2>Health Services</h2>
            <ul>
              <li>
                <input type="checkbox" id="health1">
                <label for="health1">Medical Check-ups</label>
                <div class="details">
                  Free or subsidized medical check-ups available on campus.
                </div>
              </li>
              <li>
                <input type="checkbox" id="health2">
                <label for="health2">Mental Health Counseling</label>
                <div class="details">
                  Access to professional counseling services for mental health and well-being.
                </div>
              </li>
              <li>
                <input type="checkbox" id="health3">
                <label for="health3">Health Insurance Assistance</label>
                <div class="details">
                  Help with choosing and understanding health insurance plans for students.
                </div>
              </li>
              <li>
                <input type="checkbox" id="health4">
                <label for="health4">Wellness Programs</label>
                <div class="details">
                  Workshops and activities focusing on fitness, nutrition, and stress management.
                </div>
              </li>
              <li>
                <input type="checkbox" id="health5">
                <label for="health5">Emergency Services</label>
                <div class="details">
                  Quick access to emergency medical care on or near campus.
                </div>
              </li>
            </ul>
          </div>
    </div>

    <div id="faculty-resources" class="content-section hidden w-full resource-bg-white resource-p-6 resource-rounded-lg resource-shadow-md resource-flex-col resource-items-center">
        <h2 class="text-2xl font-bold mb-4">Faculty Resources</h2>
        <p>Find resources for faculty members, including teaching tools, professional development, and administrative support.</p>
        <div class="section resource-flex-col resource-items-center">
            <h2>Grants</h2>
            <ul>
              <li>
                <input type="checkbox" id="grant1">
                <label for="grant1">Grant Opportunities</label>
                <div class="details">
                  Providing information on available grant opportunities across various academic and research fields.
                </div>
              </li>
              <li>
                <input type="checkbox" id="grant2">
                <label for="grant2">Application Guidance</label>
                <div class="details">
                  Offering step-by-step guidance for preparing and submitting grant applications.
                </div>
              </li>
              <li>
                <input type="checkbox" id="grant3">
                <label for="grant3">Budget Planning</label>
                <div class="details">
                  Assistance in preparing detailed and compliant budget plans for grant proposals.
                </div>
              </li>
              <li>
                <input type="checkbox" id="grant4">
                <label for="grant4">Grant Compliance</label>
                <div class="details">
                  Helping faculty adhere to regulations and compliance requirements for grants.
                </div>
              </li>
              <li>
                <input type="checkbox" id="grant5">
                <label for="grant5">Post-award Support</label>
                <div class="details">
                  Offering support in managing funds and fulfilling post-award responsibilities.
                </div>
              </li>
            </ul>
          </div>
      
          <!-- Proposal Writing Assistance Section -->
          <div class="section resource-flex-col resource-items-center">
            <h2>Proposal Writing Assistance</h2>
            <ul>
              <li>
                <input type="checkbox" id="proposal1">
                <label for="proposal1">Research Topic Refinement</label>
                <div class="details">
                  Providing feedback to refine and sharpen research topics for proposals.
                </div>
              </li>
              <li>
                <input type="checkbox" id="proposal2">
                <label for="proposal2">Formatting Assistance</label>
                <div class="details">
                  Ensuring proposals adhere to required formats and submission guidelines.
                </div>
              </li>
              <li>
                <input type="checkbox" id="proposal3">
                <label for="proposal3">Review and Feedback</label>
                <div class="details">
                  Offering reviews and constructive feedback on draft proposals.
                </div>
              </li>
              <li>
                <input type="checkbox" id="proposal4">
                <label for="proposal4">Collaborative Opportunities</label>
                <div class="details">
                  Helping faculty identify and connect with collaborators for joint proposals.
                </div>
              </li>
              <li>
                <input type="checkbox" id="proposal5">
                <label for="proposal5">Proposal Templates</label>
                <div class="details">
                  Providing templates and examples of successful proposals.
                </div>
              </li>
            </ul>
          </div>
      
          <!-- Institutional Support Section -->
          <div class="section resource-flex-col resource-items-center">
            <h2>Institutional Support</h2>
            <ul>
              <li>
                <input type="checkbox" id="support1">
                <label for="support1">Research Facilities</label>
                <div class="details">
                  Access to state-of-the-art labs, libraries, and other resources for research.
                </div>
              </li>
              <li>
                <input type="checkbox" id="support2">
                <label for="support2">Administrative Support</label>
                <div class="details">
                  Assistance with administrative processes related to research and teaching.
                </div>
              </li>
              <li>
                <input type="checkbox" id="support3">
                <label for="support3">Technology Integration</label>
                <div class="details">
                  Support in incorporating advanced technology tools into teaching and research.
                </div>
              </li>
              <li>
                <input type="checkbox" id="support4">
                <label for="support4">Workshops and Seminars</label>
                <div class="details">
                  Opportunities to attend or host workshops and seminars on relevant topics.
                </div>
              </li>
              <li>
                <input type="checkbox" id="support5">
                <label for="support5">Networking Opportunities</label>
                <div class="details">
                  Facilitating connections with other institutions, researchers, and funding agencies.
                </div>
              </li>
            </ul>
          </div>
    </div>

    <div id="international-guidelines" class="content-section hidden w-full resource-bg-white resource-p-6 resource-rounded-lg resource-shadow-md resource-flex-col resource-items-center">
        <h2 class="text-2xl font-bold mb-4">International Guidelines</h2>
        <p>Learn about the guidelines and support available for international students and staff.</p>

        <div class="section resource-flex-col resource-items-center">
            <h2>Travel Advisories</h2>
            <ul>
              <li>
                <input type="checkbox" id="travel1">
                <label for="travel1">Latest Travel Updates</label>
                <div class="details">
                  Stay informed about the latest travel advisories for international destinations.
                </div>
              </li>
              <li>
                <input type="checkbox" id="travel2">
                <label for="travel2">Country-specific Guidelines</label>
                <div class="details">
                  Learn about specific travel rules and restrictions for different countries.
                </div>
              </li>
              <li>
                <input type="checkbox" id="travel3">
                <label for="travel3">Health and Safety Tips</label>
                <div class="details">
                  Guidance on maintaining health and safety during international travel.
                </div>
              </li>
              <li>
                <input type="checkbox" id="travel4">
                <label for="travel4">Flight Cancellations</label>
                <div class="details">
                  Advice on handling flight cancellations and rescheduling effectively.
                </div>
              </li>
              <li>
                <input type="checkbox" id="travel5">
                <label for="travel5">Emergency Contacts</label>
                <div class="details">
                  A list of emergency contact numbers for various destinations.
                </div>
              </li>
            </ul>
          </div>
      
          <!-- Immigration Policies Section -->
          <div class="section resource-flex-col resource-items-center">
            <h2>Immigration Policies</h2>
            <ul>
              <li>
                <input type="checkbox" id="immigration1">
                <label for="immigration1">Visa Requirements</label>
                <div class="details">
                  Detailed information on visa requirements for your destination country.
                </div>
              </li>
              <li>
                <input type="checkbox" id="immigration2">
                <label for="immigration2">Work Permit Process</label>
                <div class="details">
                  Guidance on applying for work permits and related documentation.
                </div>
              </li>
              <li>
                <input type="checkbox" id="immigration3">
                <label for="immigration3">Residence Permits</label>
                <div class="details">
                  Instructions for obtaining residence permits in foreign countries.
                </div>
              </li>
              <li>
                <input type="checkbox" id="immigration4">
                <label for="immigration4">Renewal Procedures</label>
                <div class="details">
                  Tips on renewing visas and other essential immigration documents.
                </div>
              </li>
              <li>
                <input type="checkbox" id="immigration5">
                <label for="immigration5">Immigration Offices</label>
                <div class="details">
                  Contact details and locations of immigration offices worldwide.
                </div>
              </li>
            </ul>
          </div>
      
          <!-- Cultural Exchange Tips Section -->
          <div class="section resource-flex-col resource-items-center">
            <h2>Cultural Exchange Tips</h2>
            <ul>
              <li>
                <input type="checkbox" id="culture1">
                <label for="culture1">Cultural Etiquette</label>
                <div class="details">
                  Learn the do's and don'ts of cultural etiquette in various countries.
                </div>
              </li>
              <li>
                <input type="checkbox" id="culture2">
                <label for="culture2">Language Basics</label>
                <div class="details">
                  Common phrases and language tips to ease communication abroad.
                </div>
              </li>
              <li>
                <input type="checkbox" id="culture3">
                <label for="culture3">Festivals and Events</label>
                <div class="details">
                  Information on local festivals and events to experience during your stay.
                </div>
              </li>
              <li>
                <input type="checkbox" id="culture4">
                <label for="culture4">Food and Dining</label>
                <div class="details">
                  Tips on enjoying local cuisine and dining customs in different regions.
                </div>
              </li>
              <li>
                <input type="checkbox" id="culture5">
                <label for="culture5">Networking Opportunities</label>
                <div class="details">
                  Ways to connect with locals and other international travelers.
                </div>
              </li>
            </ul>
          </div>
    </div>

    <div id="downloadable-pdfs" class="content-section hidden w-full resource-bg-white resource-p-6 resource-rounded-lg resource-shadow-md resource-flex-col resource-items-center">
        <h2 class="text-2xl font-bold mb-4">Downloadable PDFs</h2>
        <p>Access a collection of downloadable PDFs, including course catalogs, brochures, and user manuals.</p>
    </div>
    <?php include 'assets/phppages/footer.php'; ?>
    <!-- JavaScript for toggle functionality -->
    <script>

    //     document.addEventListener('DOMContentLoaded', () => {
    //     const searchBox = document.getElementById('search-box');
    //     const searchButton = document.getElementById('search-button');

    //     const highlightMatches = (query) => {
    //         // Remove existing highlights
    //         const highlights = document.querySelectorAll('.highlight');
    //         highlights.forEach((highlight) => {
    //             const parent = highlight.parentNode;
    //             parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
    //         });

    //         if (!query) return;

    //         // Highlight matches
    //         const content = document.getElementById('content');
    //         const regex = new RegExp(query, 'gi');
    //         let found = false;

    //         content.querySelectorAll('*').forEach((node) => {
    //             if (node.nodeType === Node.TEXT_NODE && regex.test(node.textContent)) {
    //                 found = true;

    //                 const matchHTML = node.textContent.replace(regex, (match) => {
    //                     return `<span class="highlight">${match}</span>`;
    //                 });

    //                 const tempDiv = document.createElement('div');
    //                 tempDiv.innerHTML = matchHTML;

    //                 while (tempDiv.firstChild) {
    //                     node.parentNode.insertBefore(tempDiv.firstChild, node);
    //                 }
    //                 node.remove();
    //             }
    //         });

    //         if (!found) alert('No matching content found.');
    //     };

    //     // Event listener for the search button
    //     searchButton.addEventListener('click', (e) => {
    //         e.preventDefault();
    //         const query = searchBox.value.trim();
    //         highlightMatches(query);
    //     });

    //     // Event listener for the Enter key in the search box
    //     searchBox.addEventListener('keypress', (e) => {
    //         if (e.key === 'Enter') {
    //             e.preventDefault();
    //             const query = searchBox.value.trim();
    //             highlightMatches(query);
    //         }
    //     });
    // });


        document.addEventListener('DOMContentLoaded', () => {
            const optionLinks = document.querySelectorAll('.toggle-section');
            const contentSections = document.querySelectorAll('.content-section');

            optionLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute('data-target');

                    // Hide all content sections
                    contentSections.forEach(section => section.classList.add('hidden'));

                    // Show the targeted content section
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        targetSection.classList.remove('hidden');
                    }
                });
            });
        });


      // Search function to filter through the sections
document.getElementById('search-box').addEventListener('input', function(event) {
    const query = event.target.value.toLowerCase();
    
    // Get all sections
    const sections = document.querySelectorAll('.content-section');
    
    sections.forEach(section => {
        // Get the section title and content
        const title = section.querySelector('h2').textContent.toLowerCase();
        const paragraphs = section.querySelectorAll('p, .section h2, .details');
        
        let matchFound = title.includes(query); // Check if the title matches the query
        
        // Check if any paragraph or detail matches the search
        paragraphs.forEach(paragraph => {
            if (paragraph.textContent.toLowerCase().includes(query)) {
                matchFound = true;
            }
        });
        
        // Show or hide the section based on whether it matches the search query
        if (matchFound) {
            section.style.display = 'block'; // Show section if match is found
        } else {
            section.style.display = 'none'; // Hide section if no match is found
        }
    });
});

    </script>
</body>
</html>