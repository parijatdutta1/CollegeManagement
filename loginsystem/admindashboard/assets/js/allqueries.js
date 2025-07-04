fetch("index.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "action=fetch_data"
})
.then(response => response.text())  // Change .json() to .text() for debugging
.then(data => {
    console.log("Raw Response:", data);  // Print the response to see if it's HTML or JSON
    try {
        let jsonData = JSON.parse(data);
        console.log("Parsed JSON:", jsonData);
    } catch (error) {
        console.error("JSON Parsing Error:", error);
    }
})
.catch(error => console.error("Fetch Error:", error));

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.action-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const action = this.getAttribute('data-action');

            fetch("index.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `action=${action}&id=${id}`
            })
            .then(response => response.json())

            
        });
    });
});
