
<link rel="stylesheet" href="assets/css/sidebarstyles.css">
<!-- navbar.php -->
<div class="admin-navbar-custom">
  <div class="admin-logo-custom">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
      <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512h388.6c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304h-91.4z"/>
    </svg>
    <span>Admin Dashboard</span>
  </div>
  <div class="admin-menu-custom">
    <div class="admin-notification-custom">
      🔔 <span class="admin-badge-custom">3</span>
      <div class="admin-notification-dropdown-custom">
        <ul>
          <li>New user registered</li>
          <li>Server backup completed</li>
          <li>3 unread messages</li>
        </ul>
      </div>
    </div>
    <button class="admin-logout-custom">Logout</button>
  </div>
</div>

<!-- ✅ Navbar Script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // ✅ Logout Button Functionality
    const logoutButton = document.querySelector(".admin-logout-custom");
    if (logoutButton) {
      logoutButton.addEventListener("click", function () {
        console.log("Logout button clicked"); // Debugging
        window.location.href = "../logout.php"; // Ensure this path is correct
      });
    }

    // ✅ Notification Dropdown Functionality
    const notificationIcon = document.querySelector(".admin-notification-custom");
    const dropdown = document.querySelector(".admin-notification-dropdown-custom");

    if (notificationIcon && dropdown) {
      notificationIcon.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevent event bubbling
        dropdown.classList.toggle("show"); // Toggle visibility using class
      });

      // Close dropdown when clicking outside
      document.addEventListener("click", function (event) {
        if (!notificationIcon.contains(event.target) && !dropdown.contains(event.target)) {
          dropdown.classList.remove("show"); // Hide dropdown
        }
      });
    }
  });
</script>

