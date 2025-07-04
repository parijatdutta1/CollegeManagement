// assets/js/inquiries_script.js

// Ensure script executes only after DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    function openModal(email) {
        let emailInput = document.getElementById('recipientEmail');
        if (emailInput) {
            emailInput.value = email;
            document.getElementById('replyModal').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        } else {
            console.error("recipientEmail input not found!");
        }
    }
    

    function closeModal() {
        document.getElementById('replyModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    // Attach event listeners dynamically
    document.querySelectorAll(".reply-btn").forEach(button => {
        button.addEventListener("click", function () {
            openModal(this.getAttribute("data-email"));
        });
    });

    document.querySelector(".close").addEventListener("click", closeModal);
    document.getElementById("overlay").addEventListener("click", closeModal);
});
